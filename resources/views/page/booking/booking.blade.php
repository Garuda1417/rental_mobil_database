<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reserve Your Flight - NEO DRIVE</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .text-neon { color: #ccff00 !important; }
        .bg-neon { background-color: #ccff00 !important; }
        .border-neon { border-color: #ccff00 !important; }
    </style>
</head>
<body class="bg-[#0b0c0f] text-white min-h-screen flex flex-col justify-between font-sans selection:bg-neon selection:text-black">

    <!-- NAVBAR -->
    <header class="border-b border-gray-800/80 bg-black/60 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold font-heading tracking-wider text-neon">
                NEO-DRIVE
            </a>

            <nav class="hidden md:flex space-x-8 text-xs tracking-widest text-gray-300 font-semibold uppercase">
                <a href="/" class="hover:text-neon transition">Home</a>
                <a href="/showroom" class="text-neon border-b-2 border-neon pb-1">Showroom</a>
                <a href="/heritage" class="hover:text-neon transition">Heritage</a>
                <a href="#" class="hover:text-neon transition">Technology</a>
            </nav>

            <a href="#" class="bg-neon text-black font-bold text-xs px-5 py-2.5 uppercase tracking-wider hover:bg-lime-400 transition">
                Book Test Drive &gt;
            </a>
        </div>
    </header>

    <!-- MAIN BOOKING CONTENT -->
    <main class="max-w-5xl mx-auto px-6 py-10 w-full flex-grow">
        
        <!-- STEP TITLE & PROGRESS -->
        <div class="text-center mb-10">
            <span class="text-[10px] text-neon font-heading font-bold uppercase tracking-widest block mb-2">Step 02 of 03</span>
            <h1 class="font-heading text-3xl md:text-5xl font-black uppercase tracking-tight mb-3">
                Reserve Your Flight
            </h1>
            <p class="text-xs text-gray-400 font-medium">Experience the raw power of NEO-AVENTUS.</p>

            <!-- Step Progress Indicator Bar -->
            <div class="flex justify-center items-center space-x-6 mt-8 text-[11px] font-heading uppercase font-bold tracking-wider">
                <div class="flex items-center text-gray-500">
                    <span class="text-neon mr-1.5">✓</span> 01 Vehicle
                </div>
                <div class="h-0.5 w-8 bg-neon"></div>
                <div class="text-neon border-b-2 border-neon pb-0.5">
                    02 Details
                </div>
                <div class="h-0.5 w-8 bg-gray-800"></div>
                <div class="text-gray-600">
                    03 Confirm
                </div>
            </div>
        </div>

        <!-- PUBLIC: Recent Reservations (from admin) -->
        <div class="max-w-2xl mx-auto mb-6" id="public-bookings-panel">
            <div class="bg-[#111318] border border-gray-800 p-4 rounded space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] text-neon font-heading font-bold uppercase tracking-widest">Recent Reservations</span>
                    <a href="/admin" class="text-[10px] text-gray-400 hover:text-neon">Admin Portal</a>
                </div>
                <div id="public-bookings-list" class="space-y-3">
                    <!-- Populated via JS -->
                </div>
            </div>
        </div>

        <!-- MAIN FORM CONTAINER -->
        <div class="bg-[#111318] border border-gray-800/80 rounded-lg p-6 md:p-8 grid grid-cols-1 lg:grid-cols-12 gap-8 shadow-2xl">
            
            <!-- SISI KIRI: CAR SUMMARY CARD (5 COLS) -->
            <div class="lg:col-span-5 flex flex-col justify-between border-b lg:border-b-0 lg:border-r border-gray-800/80 pb-6 lg:pb-0 lg:pr-8">
                <div>
                    <!-- Image Preview -->
                    <div class="relative bg-black/60 border border-gray-800 rounded p-2 mb-6">
                        <div class="absolute top-1 left-1 w-2 h-2 border-t border-l border-neon"></div>
                        <div class="absolute bottom-1 right-1 w-2 h-2 border-b border-r border-neon"></div>
                        <img src="{{ asset('images/hero-car.jpg') }}" alt="NEO AVENTUS" class="w-full h-40 object-cover rounded">
                    </div>

                    <!-- Selected Specs -->
                    <span class="text-[9px] text-gray-500 font-bold uppercase tracking-widest block">Selected Model</span>
                    <h2 class="font-heading text-2xl font-bold text-white uppercase tracking-wide mb-4" id="selected-model-name">SELECT A CAR</h2>

                    <div class="space-y-2 text-xs border-t border-b border-gray-800/60 py-4 my-4" id="selected-specs">
                        <div class="flex justify-between">
                            <span class="text-gray-500 uppercase font-semibold">Plate Number</span>
                            <span class="text-neon font-medium" id="spec-plate">--</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 uppercase font-semibold">Year</span>
                            <span class="text-white font-medium" id="spec-year">--</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 uppercase font-semibold">Price/Day</span>
                            <span class="text-neon font-medium" id="spec-price">--</span>
                        </div>
                    </div>

                    <!-- Deposit Box -->
                    <div class="bg-black/50 border border-neon/30 p-4 rounded mt-4">
                        <span class="text-[9px] text-gray-400 font-bold uppercase tracking-widest block mb-1">Refundable Deposit</span>
                        <p class="font-heading text-2xl font-bold text-neon mb-1">$5,000</p>
                        <span class="text-[10px] text-gray-500 block">Fully refundable within 30 days of reservation.</span>
                    </div>
                </div>

                <p class="text-[9px] text-gray-600 uppercase tracking-widest mt-6 font-bold">
                    Estimated Delivery: Q3 2026
                </p>
            </div>

            <!-- SISI KANAN: FORM INPUTS (7 COLS) -->
            <form id="booking-form" class="lg:col-span-7 flex flex-col justify-between space-y-6">
                <div class="space-y-6">
                    <!-- SECTION 0: VEHICLE SELECTION -->
                    <div>
                        <span class="text-[10px] text-neon font-heading font-bold uppercase tracking-widest block mb-4">
                            00 Select Your Vehicle
                        </span>

                        <div>
                            <label class="text-[10px] text-gray-400 uppercase font-bold tracking-wider block mb-1.5">Available Vehicles</label>
                            <select id="car-select" name="car_id" required class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-xs text-gray-300 px-3 py-2.5 rounded appearance-none cursor-pointer">
                                <option value="" disabled selected>Loading vehicles...</option>
                            </select>
                            <input type="hidden" name="model_choice" id="model-choice-input" value="">
                        </div>
                    </div>
                    <div>
                        <span class="text-[10px] text-neon font-heading font-bold uppercase tracking-widest block mb-4">
                            01 Personal Information
                        </span>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="text-[10px] text-gray-400 uppercase font-bold tracking-wider block mb-1.5">First Name</label>
                                <input id="form-name" name="name" type="text" value="Alexander" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-xs text-white px-3 py-2.5 rounded">
                            </div>
                            <div>
                                <label class="text-[10px] text-gray-400 uppercase font-bold tracking-wider block mb-1.5">Last Name</label>
                                <input name="last_name" type="text" value="Novak" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-xs text-white px-3 py-2.5 rounded">
                            </div>
                        </div>
                        <!-- Hidden fields required by API -->
                        <input type="hidden" id="form-date" name="date" value="{{ date('Y-m-d') }}">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-[10px] text-gray-400 uppercase font-bold tracking-wider block mb-1.5">Email Address</label>
                                <input id="form-email" name="email" type="email" value="a.novak@domain.com" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-xs text-white px-3 py-2.5 rounded">
                            </div>
                            <div>
                                <label class="text-[10px] text-gray-400 uppercase font-bold tracking-wider block mb-1.5">Phone Number</label>
                                <input id="form-phone" name="phone" type="text" value="+1 (310) 000-0000" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-xs text-white px-3 py-2.5 rounded">
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: LOCATION & SCHEDULE -->
                    <div>
                        <span class="text-[10px] text-neon font-heading font-bold uppercase tracking-widest block mb-4">
                            02 Preferred Location & Schedule
                        </span>

                        <div class="mb-4">
                            <label class="text-[10px] text-gray-400 uppercase font-bold tracking-wider block mb-1.5">Select Nearest Experience Center</label>
                            <select id="form-location" name="location" required class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-xs text-gray-300 px-3 py-2.5 rounded appearance-none cursor-pointer">
                                <option value="" disabled selected>Choose your nearest location...</option>
                                <option value="Jakarta Flagship Experience Center">Jakarta Flagship Experience Center</option>
                                <option value="Tokyo Neo Gallery">Tokyo Neo Gallery</option>
                                <option value="Los Angeles Studio">Los Angeles Studio</option>
                            </select>
                        </div>

                        <!-- Preferred Date Picker -->
                        <div>
                            <label class="text-[10px] text-gray-400 uppercase font-bold tracking-wider block mb-2">Preferred Date</label>
                            <div class="flex items-center space-x-2">
                                <button type="button" class="p-2 border border-gray-800 text-gray-500 text-xs rounded hover:border-gray-600">&lt;</button>
                                
                                <div class="grid grid-cols-5 gap-2 flex-grow text-center font-heading">
                                    <div class="date-option bg-neon text-black rounded py-2 cursor-pointer transition">
                                        <span class="text-[9px] block uppercase font-bold">WED</span>
                                        <span class="text-sm font-black">22</span>
                                        <span class="text-[8px] block uppercase font-bold">JUL</span>
                                    </div>
                                    <div class="date-option bg-black/60 border border-gray-800 text-gray-300 rounded py-2 cursor-pointer hover:border-gray-600 transition">
                                        <span class="text-[9px] block uppercase text-gray-500 font-bold">THU</span>
                                        <span class="text-sm font-bold">23</span>
                                        <span class="text-[8px] block uppercase text-gray-500 font-bold">JUL</span>
                                    </div>
                                    <div class="date-option bg-black/60 border border-gray-800 text-gray-300 rounded py-2 cursor-pointer hover:border-gray-600 transition">
                                        <span class="text-[9px] block uppercase text-gray-500 font-bold">FRI</span>
                                        <span class="text-sm font-bold">24</span>
                                        <span class="text-[8px] block uppercase text-gray-500 font-bold">JUL</span>
                                    </div>
                                    <div class="date-option bg-black/60 border border-gray-800 text-gray-300 rounded py-2 cursor-pointer hover:border-gray-600 transition">
                                        <span class="text-[9px] block uppercase text-gray-500 font-bold">SAT</span>
                                        <span class="text-sm font-bold">25</span>
                                        <span class="text-[8px] block uppercase text-gray-500 font-bold">JUL</span>
                                    </div>
                                    <div class="date-option bg-black/60 border border-gray-800 text-gray-300 rounded py-2 cursor-pointer hover:border-gray-600 transition">
                                        <span class="text-[9px] block uppercase text-gray-500 font-bold">SUN</span>
                                        <span class="text-sm font-bold">26</span>
                                        <span class="text-[8px] block uppercase text-gray-500 font-bold">JUL</span>
                                    </div>
                                </div>

                                <button type="button" class="p-2 border border-gray-800 text-gray-500 text-xs rounded hover:border-gray-600">&gt;</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BOTTOM BUTTONS -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-800/80">
                    <a href="/showroom" class="text-[10px] text-gray-500 font-bold uppercase tracking-wider hover:text-white transition">
                        &larr; Back to Customization
                    </a>
                    <button type="submit" class="bg-neon text-black font-bold text-xs px-6 py-3.5 uppercase tracking-wider hover:bg-lime-400 transition flex items-center">
                        Secure My Reservation <span class="ml-2">&rarr;</span>
                    </button>
                </div>
            </form>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="border-t border-gray-800/80 bg-black/40 py-10 mt-12">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8 text-xs">
            <div>
                <span class="font-heading text-neon font-bold text-lg block mb-3">NEO-DRIVE</span>
                <p class="text-gray-500 leading-relaxed text-[11px]">
                    Redefining the apex of automotive performance. Every machine engineered beyond limits.
                </p>
            </div>
            <div>
                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest block mb-3">Vehicles</span>
                <ul class="space-y-2 text-gray-500 text-[11px]">
                    <li><a href="#" class="hover:text-white">NEO-AVENTUS</a></li>
                    <li><a href="#" class="hover:text-white">NEO-VENOM</a></li>
                    <li><a href="#" class="hover:text-white">NEO-APEX</a></li>
                </ul>
            </div>
            <div>
                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest block mb-3">Experience</span>
                <ul class="space-y-2 text-gray-500 text-[11px]">
                    <li><a href="#" class="hover:text-white">Test Drive</a></li>
                    <li><a href="#" class="hover:text-white">Configuration Studio</a></li>
                </ul>
            </div>
            <div>
                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest block mb-3">Company</span>
                <ul class="space-y-2 text-gray-500 text-[11px]">
                    <li><a href="#" class="hover:text-white">About NEO-DRIVE</a></li>
                    <li><a href="/heritage" class="hover:text-white">Heritage</a></li>
                    <li><a href="#" class="hover:text-white">Technology</a></li>
                    <li><a href="/admin" class="text-neon hover:text-white transition">Admin Portal</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        let carsList = [];

        // Load cars from database
        async function loadCars() {
            try {
                const response = await fetch('/api/admin/cars');
                const data = await response.json();
                carsList = data;
                populateCarSelect(data);
            } catch (error) {
                console.error('Error loading cars:', error);
                const select = document.getElementById('car-select');
                select.innerHTML = '<option value="" disabled selected>Error loading vehicles</option>';
            }
        }

        // Populate car selection dropdown
        function populateCarSelect(cars) {
            const select = document.getElementById('car-select');
            select.innerHTML = '<option value="" disabled selected>Choose a vehicle...</option>';
            
            if (cars.length === 0) {
                select.innerHTML = '<option value="" disabled>No vehicles available</option>';
                return;
            }

            cars.forEach(car => {
                const option = document.createElement('option');
                option.value = car.id;
                option.textContent = `${car.make} ${car.model} (${car.plate_number}) - Rp${car.price_per_day.toLocaleString('id-ID')}/day`;
                option.dataset.carData = JSON.stringify(car);
                select.appendChild(option);
            });
        }

        // Handle car selection change
        document.getElementById('car-select').addEventListener('change', function() {
            const selectedIndex = this.selectedIndex;
            if (selectedIndex > 0) {
                const car = carsList[selectedIndex - 1];
                updateCarSummary(car);
                document.getElementById('model-choice-input').value = `${car.make} ${car.model}`;
            }
        });

        // Update car summary display
        function updateCarSummary(car) {
            document.getElementById('selected-model-name').textContent = `${car.make} ${car.model}`;
            document.getElementById('spec-plate').textContent = car.plate_number;
            document.getElementById('spec-year').textContent = car.year;
            document.getElementById('spec-price').textContent = `Rp${car.price_per_day.toLocaleString('id-ID')}`;
        }

        // Handle form submission with AJAX
        document.getElementById('booking-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const carSelect = document.getElementById('car-select');
            if (!carSelect.value) {
                alert('Silakan pilih kendaraan terlebih dahulu!');
                return;
            }

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Processing...';

            try {
                const formData = {
                    name: document.getElementById('form-name').value,
                    email: document.getElementById('form-email').value,
                    phone: document.getElementById('form-phone').value,
                    car_id: parseInt(carSelect.value),
                    model_choice: document.getElementById('model-choice-input').value,
                    date: document.getElementById('form-date').value,
                    location: document.getElementById('form-location').value
                };

                const response = await fetch('/bookings/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(formData)
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();

                if (data.success) {
                    // Show success message
                    const successMsg = `✓ Booking berhasil dibuat!\nNama: ${data.booking.user.name}\nMobil: ${data.booking.car.make} ${data.booking.car.model}`;
                    
                    // Redirect after showing message
                    setTimeout(() => {
                        window.location.href = '/booking/success?id=' + data.booking.id;
                    }, 500);
                } else {
                    throw new Error(data.message || 'Booking failed');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('❌ Error: ' + error.message + '\nSilakan coba lagi.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = originalBtnText;
            }
        });

        // Load cars on page load
        document.addEventListener('DOMContentLoaded', () => {
            loadCars();
        });
    </script>
</body>
</html>