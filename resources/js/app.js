
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


