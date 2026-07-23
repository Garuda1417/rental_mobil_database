<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed - NEO DRIVE</title>
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
                <a href="/showroom" class="hover:text-neon transition">Showroom</a>
                <a href="/heritage" class="hover:text-neon transition">Heritage</a>
                <a href="#" class="hover:text-neon transition">Technology</a>
            </nav>

            <a href="/" class="bg-neon text-black font-bold text-xs px-5 py-2.5 uppercase tracking-wider hover:bg-lime-400 transition">
                Return Home &gt;
            </a>
        </div>
    </header>

    <!-- MAIN SUCCESS CONTENT -->
    <main class="max-w-3xl mx-auto px-6 py-20 w-full flex-grow">
        
        <!-- SUCCESS CARD -->
        <div class="text-center mb-12">
            <div class="text-6xl mb-6 animate-pulse">✓</div>
            <h1 class="font-heading text-4xl md:text-5xl font-black uppercase tracking-tight mb-3 text-neon">
                Booking Confirmed
            </h1>
            <p class="text-lg text-gray-400 font-medium">Your test drive reservation has been successfully created!</p>
        </div>

        <!-- BOOKING DETAILS CARD -->
        <div class="bg-[#111318] border border-neon/30 rounded-lg p-8 mb-8">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-2 h-6 bg-neon"></div>
                <h2 class="font-heading text-xl font-bold uppercase tracking-wider">Booking Details</h2>
            </div>

            <div class="space-y-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div>
                        <span class="text-[9px] text-gray-500 uppercase font-bold tracking-widest block mb-1">Booking ID</span>
                        <p class="text-sm text-neon font-bold" id="booking-id">#--</p>
                    </div>
                    <div>
                        <span class="text-[9px] text-gray-500 uppercase font-bold tracking-widest block mb-1">Status</span>
                        <p class="text-sm text-yellow-400 font-bold">Pending</p>
                    </div>
                    <div>
                        <span class="text-[9px] text-gray-500 uppercase font-bold tracking-widest block mb-1">Date</span>
                        <p class="text-sm text-white font-bold" id="booking-date">--</p>
                    </div>
                    <div>
                        <span class="text-[9px] text-gray-500 uppercase font-bold tracking-widest block mb-1">Time</span>
                        <p class="text-sm text-white font-bold" id="booking-time">--</p>
                    </div>
                </div>

                <div class="border-t border-gray-800 pt-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <span class="text-[9px] text-gray-500 uppercase font-bold tracking-widest block mb-2">Vehicle</span>
                            <p class="text-lg font-bold mb-1" id="vehicle-name">--</p>
                            <p class="text-sm text-gray-400" id="vehicle-plate">--</p>
                            <p class="text-xs text-gray-500 mt-2" id="vehicle-price">--</p>
                        </div>
                        <div>
                            <span class="text-[9px] text-gray-500 uppercase font-bold tracking-widest block mb-2">Your Details</span>
                            <p class="text-sm font-bold mb-1" id="customer-name">--</p>
                            <p class="text-sm text-gray-400 mb-1" id="customer-email">--</p>
                            <p class="text-sm text-gray-400" id="customer-phone">--</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- NEXT STEPS -->
        <div class="bg-black/40 border border-gray-800 rounded-lg p-6 mb-8">
            <h3 class="font-heading text-sm font-bold uppercase tracking-wider mb-4">What Happens Next?</h3>
            <ol class="space-y-3 text-sm text-gray-300">
                <li class="flex items-start space-x-3">
                    <span class="text-neon font-bold min-w-6">1.</span>
                    <span>Confirmation email akan dikirim ke alamat email Anda</span>
                </li>
                <li class="flex items-start space-x-3">
                    <span class="text-neon font-bold min-w-6">2.</span>
                    <span>Tim kami akan menghubungi Anda untuk mengkonfirmasi jadwal test drive</span>
                </li>
                <li class="flex items-start space-x-3">
                    <span class="text-neon font-bold min-w-6">3.</span>
                    <span>Datang ke showroom 15 menit lebih awal untuk check-in</span>
                </li>
                <li class="flex items-start space-x-3">
                    <span class="text-neon font-bold min-w-6">4.</span>
                    <span>Nikmati pengalaman mengemudi NEO-DRIVE yang luar biasa</span>
                </li>
            </ol>
        </div>

        <!-- ACTION BUTTONS -->
        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <a href="/" class="bg-gray-800 hover:bg-gray-700 text-white text-center font-bold text-xs px-8 py-4 uppercase tracking-wider transition border border-gray-700">
                ← Back to Home
            </a>
            <a href="/showroom" class="bg-neon hover:bg-lime-400 text-black text-center font-bold text-xs px-8 py-4 uppercase tracking-wider transition">
                View All Vehicles →
            </a>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="border-t border-gray-800/80 bg-black/40 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-xs text-gray-500 uppercase tracking-widest">
                Thank you for choosing NEO-DRIVE. We look forward to your visit!
            </p>
        </div>
    </footer>

    <script>
        // Fetch booking details from API
        document.addEventListener('DOMContentLoaded', async () => {
            const params = new URLSearchParams(window.location.search);
            const bookingId = params.get('id');
            
            if (!bookingId) {
                console.error('No booking ID provided');
                return;
            }

            // Set booking ID
            document.getElementById('booking-id').textContent = '#' + bookingId;

            // Set current date and time
            const now = new Date();
            document.getElementById('booking-date').textContent = now.toLocaleDateString('id-ID', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            document.getElementById('booking-time').textContent = now.toLocaleTimeString('id-ID', { 
                hour: '2-digit', 
                minute: '2-digit' 
            });

            // Fetch booking details from API
            try {
                const response = await fetch(`/api/admin/bookings/${bookingId}`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const booking = await response.json();

                // Populate vehicle details
                if (booking.car) {
                    document.getElementById('vehicle-name').textContent = `${booking.car.make} ${booking.car.model}`;
                    document.getElementById('vehicle-plate').textContent = `Plate: ${booking.car.plate_number}`;
                    document.getElementById('vehicle-price').textContent = `Rp${parseInt(booking.car.price_per_day).toLocaleString('id-ID')}/day`;
                }

                // Populate customer details
                if (booking.user) {
                    document.getElementById('customer-name').textContent = booking.user.name;
                    document.getElementById('customer-email').textContent = booking.user.email;
                    document.getElementById('customer-phone').textContent = booking.user.phone || '--';
                }
            } catch (error) {
                console.error('Error fetching booking details:', error);
                // Keep placeholder data if API fails
            }
        });
    </script>

</body>
</html>
