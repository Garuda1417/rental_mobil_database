<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom - NEO AVENTUS</title>
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

    <!-- MAIN SHOWROOM CONTENT -->
    <main class="max-w-7xl mx-auto px-6 py-8 w-full flex-grow grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        
        <div class="lg:col-span-7 flex flex-col justify-between">
            <!-- Large Image Container dengan Corner Frame Effect -->
            <div class="relative bg-gray-900/40 border border-gray-800 rounded-lg overflow-hidden group">
                <!-- Frame Corners Style -->
                <div class="absolute top-2 left-2 w-3 h-3 border-t-2 border-l-2 border-neon z-10"></div>
                <div class="absolute bottom-2 right-2 w-3 h-3 border-b-2 border-r-2 border-neon z-10"></div>

                <!-- Car Image -->
                <img id="main-car-image" src="{{ asset('images/hero-car.jpg') }}" alt="NEO AVENTUS" class="w-full h-[400px] md:h-[480px] object-cover object-center transition-all duration-500">

                <!-- View Tag -->
                <span id="car-view-tag" class="absolute bottom-4 left-4 text-[10px] font-heading font-bold text-neon uppercase tracking-widest bg-black/60 px-2 py-1 backdrop-blur-sm">
                    Front View
                </span>
            </div>

            <!-- Image Thumbnails / Gallery Navigation -->
            <div class="grid grid-cols-4 gap-3 mt-4">
                <div class="showroom-thumb active border-2 border-neon rounded overflow-hidden cursor-pointer h-16 bg-gray-900 transition-all duration-300 opacity-100" data-img="{{ asset('images/hero-car.jpg') }}" data-label="Front View">
                    <img src="{{ asset('images/hero-car.jpg') }}" class="w-full h-full object-cover">
                </div>
                <div class="showroom-thumb border border-gray-800 rounded overflow-hidden opacity-50 hover:opacity-100 cursor-pointer h-16 bg-gray-900 transition-all duration-300" data-img="{{ asset('images/apex-01.png') }}" data-label="Track Apex View">
                    <img src="{{ asset('images/apex-01.png') }}" class="w-full h-full object-cover">
                </div>
                <div class="showroom-thumb border border-gray-800 rounded overflow-hidden opacity-50 hover:opacity-100 cursor-pointer h-16 bg-gray-900 transition-all duration-300" data-img="{{ asset('images/vortex-x.png') }}" data-label="Electric Vortex View">
                    <img src="{{ asset('images/vortex-x.png') }}" class="w-full h-full object-cover">
                </div>
                <div class="showroom-thumb border border-gray-800 rounded overflow-hidden opacity-50 hover:opacity-100 cursor-pointer h-16 bg-gray-900 transition-all duration-300" data-img="{{ asset('images/ghost-r.png') }}" data-label="Stealth Edition View">
                    <img src="{{ asset('images/ghost-r.png') }}" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- SISI KANAN: CONFIGURATOR PANEL (5 COLS) -->
        <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
            <div>
                <!-- Title & Price Header -->
                <h1 class="font-heading text-4xl md:text-5xl font-black text-neon tracking-tight uppercase mb-2">
                    NEO AVENTUS
                </h1>
                <p class="text-gray-400 text-xs leading-relaxed mb-6 font-medium">
                    A street-legal hypercar built with F1-derived aerodynamics and a 950-horsepower hybrid V12. Zero compromises at every latitude.
                </p>

                <div class="mb-8">
                    <span class="text-[10px] text-gray-500 font-bold uppercase tracking-widest block mb-1">Starting From</span>
                    <p class="font-heading text-3xl font-bold text-neon">$1,200,000</p>
                </div>

                <!-- Option 1: Exterior Paint -->
                <div class="mb-6">
                    <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest block mb-3">Select Exterior Paint</span>
                    <div class="flex items-center space-x-3">
                        <button class="w-7 h-7 rounded-full bg-neon ring-2 ring-offset-2 ring-offset-black ring-neon"></button>
                        <button class="w-7 h-7 rounded-full bg-[#2a2d34] hover:opacity-80 transition"></button>
                        <button class="w-7 h-7 rounded-full bg-gray-200 hover:opacity-80 transition"></button>
                        <button class="w-7 h-7 rounded-full bg-red-600 hover:opacity-80 transition"></button>
                        <span class="text-xs text-blue-300 font-medium ml-2">Electric Neon Lime</span>
                    </div>
                </div>

                <!-- Option 2: Wheels & Trim -->
                <div class="mb-8">
                    <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest block mb-3">Wheels & Trim</span>
                    <div class="flex flex-wrap gap-3">
                        <button class="bg-neon text-black font-bold text-xs px-4 py-2.5 rounded uppercase tracking-wider">
                            21" Matte Black Alloys
                        </button>
                        <button class="border border-gray-800 text-gray-400 font-bold text-xs px-4 py-2.5 rounded uppercase tracking-wider hover:border-gray-600 transition">
                            22" Aerodynamic Carbon
                        </button>
                    </div>
                </div>

                <!-- Summary Breakdown Table -->
                <div class="border border-gray-800 rounded bg-black/40 text-xs divide-y divide-gray-800/60 mb-4">
                    <div class="flex justify-between p-3">
                        <span class="text-gray-400 uppercase font-semibold">Base Price</span>
                        <span class="font-bold font-heading">$1,200,000</span>
                    </div>
                    <div class="flex justify-between p-3">
                        <span class="text-gray-400 uppercase font-semibold">Wheels & Trim</span>
                        <span class="text-gray-300">Included</span>
                    </div>
                    <div class="flex justify-between p-3">
                        <span class="text-gray-400 uppercase font-semibold">Exterior Paint</span>
                        <span class="text-gray-300">Included</span>
                    </div>
                </div>

                <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">
                    Est. Delivery: Q3 2026 &bull; Limited to 88 Units Worldwide
                </p>
            </div>
        </div>

    </main>

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="border border-gray-800 rounded-3xl bg-black/60 p-6">
            <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-heading font-black text-neon uppercase">Lokasi Showroom</h2>
                    <p class="text-gray-400 text-sm md:text-base max-w-2xl mt-2">Temukan showroom aktif kami untuk melihat unit mobil dan melakukan test drive.</p>
                </div>
                <span class="text-[10px] uppercase tracking-widest text-gray-500">Total Showroom: {{ $showrooms->count() }}</span>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                @forelse ($showrooms as $showroom)
                    <div class="border border-gray-800 rounded-2xl p-5 bg-gray-900/50 hover:border-neon transition">
                        <h3 class="text-lg font-bold text-neon">{{ $showroom->name }}</h3>
                        <p class="text-sm text-gray-300 mt-2">{{ $showroom->city }}</p>
                        @if ($showroom->address)
                            <p class="text-sm text-gray-400 mt-3">{{ $showroom->address }}</p>
                        @endif
                        @if ($showroom->phone)
                            <p class="text-sm text-gray-400 mt-2">Tel: {{ $showroom->phone }}</p>
                        @endif
                    </div>
                @empty
                    <div class="sm:col-span-2 xl:col-span-3 border border-dashed border-gray-700 rounded-2xl p-8 text-center text-gray-400 bg-gray-900/30">
                        Belum ada showroom tersedia. Silakan kunjungi halaman admin untuk menambahkan showroom baru.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- BOTTOM BAR / STICKY FOOTER ACTION -->
    <div class="border-t border-gray-800 bg-[#08090b] py-3 px-6 sticky bottom-0 z-40">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <div>
                <span class="text-[9px] text-gray-500 uppercase tracking-widest block font-bold">NEO-AVENTUS &mdash; Configured Price</span>
                <p class="font-heading text-xl font-bold text-neon">$1,200,000</p>
            </div>

            <div class="hidden md:flex items-center space-x-2 text-[10px] text-gray-400 uppercase font-semibold">
                <span class="bg-gray-900 border border-gray-800 px-3 py-1.5 rounded">Electric Neon Lime</span>
                <span class="bg-gray-900 border border-gray-800 px-3 py-1.5 rounded">21" Matte Black Alloys</span>
            </div>

            <div class="flex items-center space-x-4">
                <span class="hidden lg:inline text-[10px] text-gray-500 uppercase font-bold">Est. Q3 2026 Delivery</span>
                <a href="/booking" class="bg-neon text-black font-bold text-xs px-6 py-3 uppercase tracking-wider hover:bg-lime-400 transition">
                    Proceed to Booking
                </a>
            </div>
        </div>
    </div>

</body>
</html>