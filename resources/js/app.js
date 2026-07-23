
document.addEventListener('DOMContentLoaded', () => {

    // Inject overlay + loader bar into every page
    const overlay = document.createElement('div');
    overlay.id = 'page-overlay';
    document.body.appendChild(overlay);

    const loader = document.createElement('div');
    loader.id = 'page-loader';
    document.body.appendChild(loader);

    // Fade IN on page load
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            overlay.classList.add('fade-out');
        });
    });

    // Intercept internal link clicks → fade OUT first, then navigate
    document.addEventListener('click', (e) => {
        const anchor = e.target.closest('a');
        if (!anchor) return;

        const href = anchor.getAttribute('href');
        if (!href) return;

        // Skip external links, anchors, and mailto
        const isExternal = anchor.hostname && anchor.hostname !== window.location.hostname;
        const isAnchor = href.startsWith('#');
        const isSpecial = href.startsWith('mailto') || href.startsWith('tel');
        if (isExternal || isAnchor || isSpecial) return;

        // Skip if modifier keys held (open in new tab etc.)
        if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;

        e.preventDefault();

        // Animate loader bar
        loader.style.width = '70%';
        loader.style.opacity = '1';

        // Fade overlay in
        overlay.classList.remove('fade-out');
        overlay.classList.add('fade-in');

        // Navigate after fade completes
        setTimeout(() => {
            window.location.href = href;
        }, 450);
    });

    // ─── Date Picker Selection Handler (Booking Page) ───
    document.addEventListener('click', (e) => {
        const dateOption = e.target.closest('.date-option');
        if (!dateOption) return;

        const container = dateOption.parentElement;
        const allOptions = container.querySelectorAll('.date-option');

        allOptions.forEach(opt => {
            // Remove active classes
            opt.classList.remove('bg-neon', 'text-black');
            opt.classList.add('bg-black/60', 'border', 'border-gray-800', 'text-gray-300');

            // Reset text colors on child spans
            const spans = opt.querySelectorAll('span');
            spans.forEach((span, idx) => {
                if (idx === 1) {
                    span.classList.remove('font-black');
                    span.classList.add('font-bold');
                } else {
                    span.classList.add('text-gray-500');
                }
            });
        });

        // Set active classes on clicked date
        dateOption.classList.remove('bg-black/60', 'border', 'border-gray-800', 'text-gray-300');
        dateOption.classList.add('bg-neon', 'text-black');

        const activeSpans = dateOption.querySelectorAll('span');
        activeSpans.forEach((span, idx) => {
            if (idx === 1) {
                span.classList.remove('font-bold');
                span.classList.add('font-black');
            } else {
                span.classList.remove('text-gray-500');
            }
        });

        // If there is a hidden date input on the page, populate it (format YYYY-MM-DD)
        try {
            const spans = dateOption.querySelectorAll('span');
            const day = spans[1]?.textContent.trim();
            const monStr = spans[2]?.textContent.trim().toUpperCase();
            const months = { 'JAN':1,'FEB':2,'MAR':3,'APR':4,'MAY':5,'JUN':6,'JUL':7,'AUG':8,'SEP':9,'OCT':10,'NOV':11,'DEC':12 };
            const month = months[monStr] || (new Date().getMonth()+1);
            const year = new Date().getFullYear();
            if (day) {
                const mm = String(month).padStart(2,'0');
                const dd = String(parseInt(day,10)).padStart(2,'0');
                const dateInput = document.getElementById('form-date');
                if (dateInput) dateInput.value = `${year}-${mm}-${dd}`;
            }
        } catch (e) {
            // noop
        }
    });

    // ─── Showroom Gallery Image Switcher ───
    document.addEventListener('click', (e) => {
        const thumb = e.target.closest('.showroom-thumb');
        if (!thumb) return;

        const mainImage = document.getElementById('main-car-image');
        const viewTag = document.getElementById('car-view-tag');
        if (!mainImage) return;

        const newSrc = thumb.dataset.img;
        const newLabel = thumb.dataset.label;

        // Smooth transition effect
        mainImage.style.opacity = '0.3';

        setTimeout(() => {
            if (newSrc) mainImage.src = newSrc;
            if (newLabel && viewTag) viewTag.textContent = newLabel;
            mainImage.style.opacity = '1';
        }, 150);

        // Update active thumbnail border styling
        const allThumbs = document.querySelectorAll('.showroom-thumb');
        allThumbs.forEach(t => {
            t.classList.remove('border-2', 'border-neon', 'opacity-100');
            t.classList.add('border', 'border-gray-800', 'opacity-50');
        });

        thumb.classList.remove('border', 'border-gray-800', 'opacity-50');
        thumb.classList.add('border-2', 'border-neon', 'opacity-100');
    });
});

// --- Booking data integration (admin CRUD + public view) ---
async function fetchBookings() {
    try {
        const res = await fetch('/api/admin/bookings');
        if (!res.ok) return [];
        return await res.json();
    } catch (e) {
        console.error('fetchBookings error', e);
        return [];
    }
}

function renderQuickTable(bookings) {
    const tbody = document.getElementById('quick-booking-rows');
    if (!tbody) return;
    tbody.innerHTML = bookings.slice(0,5).map(b => `
        <tr>
            <td class="p-4">
                <div class="font-bold text-white">${escapeHtml(b.user?.name || 'Guest')}</div>
                <div class="text-[10px] text-gray-500">${escapeHtml(b.user?.email || '')}</div>
            </td>
            <td class="p-4">${escapeHtml(b.car?.model || b.car_id)}</td>
            <td class="p-4">${escapeHtml(b.start_date)}${b.end_date && b.end_date !== b.start_date ? ' → '+escapeHtml(b.end_date) : ''}</td>
            <td class="p-4">${escapeHtml(b.status)}</td>
            <td class="p-4 text-right"><button class="text-neon">View</button></td>
        </tr>
    `).join('');
    const lbl = document.getElementById('quick-count-lbl');
    if (lbl) lbl.textContent = `Showing ${Math.min(5, bookings.length)} reservations`;
}

function renderFullTable(bookings) {
    const tbody = document.getElementById('full-booking-rows');
    if (!tbody) return;
    tbody.innerHTML = bookings.map(b => `
        <tr>
            <td class="p-4">${escapeHtml(b.user?.name || 'Guest')}</td>
            <td class="p-4">${escapeHtml(b.user?.email || '')} ${escapeHtml(b.user?.phone || '')}</td>
            <td class="p-4">${escapeHtml(b.car?.model || '')}</td>
            <td class="p-4">${escapeHtml(b.start_date)}</td>
            <td class="p-4">${escapeHtml(b.car?.showroom?.name || '')}</td>
            <td class="p-4">${escapeHtml(b.status)}</td>
            <td class="p-4 text-right"><button class="text-neon" onclick="updateBookingStatus(${b.id}, 'Approved')">Approve</button></td>
        </tr>
    `).join('');
    const footer = document.getElementById('full-table-footer');
    if (footer) footer.querySelector('span').textContent = `Showing ${bookings.length} reservations`;
}

function renderPublicBookings(bookings) {
    const container = document.getElementById('public-bookings-list');
    if (!container) return;
    container.innerHTML = bookings.slice(0,5).map(b => `
        <div class="bg-[#111318] border border-gray-800 p-3 rounded flex justify-between items-center">
            <div>
                <div class="font-bold">${escapeHtml(b.user?.name || 'Guest')}</div>
                <div class="text-[10px] text-gray-400">${escapeHtml(b.car?.model || '')} — ${escapeHtml(b.start_date)}</div>
            </div>
            <div class="text-neon text-xs font-bold">${escapeHtml(b.status)}</div>
        </div>
    `).join('');
}

function escapeHtml(str) {
    if (!str) return '';
    return String(str).replace(/[&<>"']/g, function (s) {
        return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'})[s];
    });
}

async function refreshBookings() {
    const bookings = await fetchBookings();
    renderQuickTable(bookings);
    renderFullTable(bookings);
    renderPublicBookings(bookings);
    const statTotal = document.getElementById('stat-total-bookings');
    if (statTotal) statTotal.textContent = bookings.length;
}

window.createBooking = async function (event) {
    event.preventDefault();
    const name = document.getElementById('form-name')?.value;
    const email = document.getElementById('form-email')?.value;
    const phone = document.getElementById('form-phone')?.value;
    const model_choice = document.getElementById('form-model')?.value;
    const date = document.getElementById('form-date')?.value;
    const location = document.getElementById('form-location')?.value;
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    if (!name || !email || !phone || !model_choice || !date || !location) return;

    const res = await fetch('/api/admin/bookings', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token || ''
        },
        body: JSON.stringify({ name, email, phone, model_choice, date, location })
    });
    if (res.ok) {
        await refreshBookings();
        const form = document.getElementById('create-booking-form');
        if (form) form.reset();
        showToast('Reservation added');
    } else {
        showToast('Failed to add reservation');
    }
};

window.updateBookingStatus = async function(id, status) {
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    await fetch(`/api/admin/bookings/${id}`, {
        method: 'PATCH',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token || '' },
        body: JSON.stringify({ status })
    });
    await refreshBookings();
}

function showToast(message) {
    const container = document.getElementById('toast-container');
    if (!container) return;
    const el = document.createElement('div');
    el.className = 'bg-[#111318] border border-gray-800 px-4 py-2 rounded text-xs text-white shadow-neon';
    el.textContent = message;
    container.appendChild(el);
    setTimeout(() => el.remove(), 3000);
}

// Refresh bookings on load for pages that have booking elements
document.addEventListener('DOMContentLoaded', () => {
    refreshBookings();
});


