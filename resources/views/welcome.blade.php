<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEO DRIVE - Unleash The Future of Velocity</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-white relative min-h-screen overflow-x-hidden bg-black selection:bg-neon selection:text-black">

    <!-- Background Image dengan Overlay -->
    <div class="absolute top-0 left-0 w-full h-screen z-0">
        <img src="{{ asset('images/hero-car.jpg') }}" alt="Hero Background" class="w-full h-full object-cover object-center opacity-40">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-black/80"></div>
    </div>

    <!-- Container Utama -->
    <div class="relative z-10 flex flex-col justify-between min-h-screen max-w-7xl mx-auto px-6 py-6">
        
        <!-- NAVBAR -->
        <header class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-3">
                <div class="w-1.5 h-7 bg-neon"></div>
                <div>
                    <span class="text-[10px] text-neon tracking-widest block font-heading uppercase">2825 Flagship Edition</span>
                    <span class="text-2xl font-bold font-heading tracking-wider">NEO DRIVE</span>
                </div>
            </div>

            <nav class="hidden md:flex space-x-8 text-sm tracking-widest text-gray-300 font-semibold uppercase">
                <a href="#" class="hover:text-neon transition">Home</a>
                <a href="/showroom" class="hover:text-neon transition">Showroom</a>
                <a href="/heritage" class="hover:text-neon transition">Heritage</a>
                <a href="#" class="hover:text-neon transition">Technology</a>
            </nav>

            <div>
                <a href="#" class="bg-neon text-black font-bold text-xs px-5 py-3 uppercase tracking-wider flex items-center hover:bg-lime-400 transition">
                    Book Test Drive <span class="ml-2">&gt;</span>
                </a>
            </div>
        </header>

        <!-- HERO CONTENT -->
        <main class="my-auto py-12 max-w-2xl">
            <h1 class="font-heading text-5xl md:text-7xl font-black uppercase leading-none tracking-tight mb-4">
                Unleash <br>
                <span class="text-neon">The Future</span> <br>
                Of Velocity
            </h1>

            <p class="text-gray-400 text-sm md:text-base leading-relaxed mb-8 max-w-lg font-medium">
                Where cutting-edge aerodynamics meets uncompromising performance. Every NEO-DRIVE vehicle is engineered to redefine the limits of what is possible.
            </p>

            <div class="flex flex-wrap gap-4 font-heading text-xs font-bold tracking-wider">
                <a href="#" class="bg-neon text-black px-8 py-3.5 hover:bg-lime-400 transition uppercase">
                    Configure
                </a>
                <a href="#" class="border border-gray-600 bg-black/40 backdrop-blur-sm text-white px-8 py-3.5 hover:border-white transition uppercase">
                    Explore Fleet
                </a>
            </div>
        </main>

        <!-- FOOTER STATS -->
        <footer class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-6 border-t border-gray-800/80 mb-2">
            <div>
                <span class="text-[10px] text-gray-500 uppercase tracking-widest block font-bold">Horsepower</span>
                <p class="font-heading text-2xl font-bold">1,100+ <span class="text-xs text-neon font-normal">HP</span></p>
            </div>
            <div>
                <span class="text-[10px] text-gray-500 uppercase tracking-widest block font-bold">0-100 KM/H</span>
                <p class="font-heading text-2xl font-bold">1.9 <span class="text-xs text-gray-400 font-normal">SEC</span></p>
            </div>
            <div>
                <span class="text-[10px] text-gray-500 uppercase tracking-widest block font-bold">Top Speed</span>
                <p class="font-heading text-2xl font-bold">380 <span class="text-xs text-neon font-normal">KM/H</span></p>
            </div>
            <div>
                <span class="text-[10px] text-gray-500 uppercase tracking-widest block font-bold">Models Available</span>
                <p class="font-heading text-2xl font-bold">7 <span class="text-xs text-neon font-normal">NOW</span></p>
            </div>
        </footer>

    </div>

    <!-- SECTION: THE FLAGSHIPS -->
    <section class="relative z-10 w-full bg-[#08090b] py-24 px-6 border-t border-gray-800/50">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex justify-between items-end mb-12">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-8 h-[1px] bg-neon"></div>
                        <span class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">Model Lineup - 2825</span>
                    </div>
                    <h2 class="font-heading text-4xl md:text-5xl font-black uppercase tracking-tight">The Flagships</h2>
                </div>
                <a href="#" class="text-[10px] text-gray-500 hover:text-white transition uppercase tracking-widest font-bold hidden md:block">
                    View All Models &rarr;
                </a>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-1">
                <!-- Card 1 -->
                <div class="bg-[#111318] border border-gray-800/50 group hover:border-gray-600 transition duration-300">
                    <div class="h-56 overflow-hidden relative border-b border-gray-800/50">
                        <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-neon z-10 m-2"></div>
                        <img src="{{ asset('images/apex-01.png') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-105 opacity-90">
                    </div>
                    <div class="p-8">
                        <span class="text-[9px] text-neon font-bold uppercase tracking-widest block mb-4">Track-Bred Dominance</span>
                        <h3 class="font-heading text-2xl font-bold uppercase mb-8">APEX-01</h3>
                        
                        <div class="grid grid-cols-2 gap-y-6 gap-x-4 mb-8">
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Power</span>
                                <p class="text-xs font-bold font-heading">850 <span class="text-[9px] text-neon">HP</span></p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">0-100</span>
                                <p class="text-xs font-bold font-heading">2.5s</p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Top Speed</span>
                                <p class="text-xs font-bold font-heading">350 <span class="text-[9px] lowercase font-sans font-normal">km/h</span></p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Engine</span>
                                <p class="text-xs font-bold">V10 Biturbo</p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Weight</span>
                                <p class="text-xs font-bold">1,340 kg</p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Torque</span>
                                <p class="text-xs font-bold">920 Nm</p>
                            </div>
                        </div>

                        <div class="text-right mt-12">
                            <a href="/showroom" class="text-[10px] text-neon font-bold uppercase tracking-widest hover:text-white transition">
                                View Details &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#111318] border border-gray-800/50 group hover:border-gray-600 transition duration-300">
                    <div class="h-56 overflow-hidden relative border-b border-gray-800/50">
                        <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-cyan-400 z-10 m-2"></div>
                        <img src="{{ asset('images/vortex-x.png') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-105 opacity-90">
                    </div>
                    <div class="p-8">
                        <span class="text-[9px] text-cyan-400 font-bold uppercase tracking-widest block mb-4">Electric Evolution</span>
                        <h3 class="font-heading text-2xl font-bold uppercase mb-8">VORTEX-X</h3>
                        
                        <div class="grid grid-cols-2 gap-y-6 gap-x-4 mb-8">
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Power</span>
                                <p class="text-xs font-bold font-heading">1,100 <span class="text-[9px] text-cyan-400">HP</span></p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">0-100</span>
                                <p class="text-xs font-bold font-heading">1.9s</p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Top Speed</span>
                                <p class="text-xs font-bold font-heading">380 <span class="text-[9px] lowercase font-sans font-normal">km/h</span></p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Engine</span>
                                <p class="text-xs font-bold">Quad-Motor EV</p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Weight</span>
                                <p class="text-xs font-bold">1,520 kg</p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Torque</span>
                                <p class="text-xs font-bold">1,800 Nm</p>
                            </div>
                        </div>

                        <div class="text-right mt-12">
                            <a href="/showroom" class="text-[10px] text-cyan-400 font-bold uppercase tracking-widest hover:text-white transition">
                                View Details &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#111318] border border-gray-800/50 group hover:border-gray-600 transition duration-300">
                    <div class="h-56 overflow-hidden relative border-b border-gray-800/50">
                        <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-neon z-10 m-2"></div>
                        <img src="{{ asset('images/ghost-r.png') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-105 opacity-90">
                    </div>
                    <div class="p-8">
                        <span class="text-[9px] text-neon font-bold uppercase tracking-widest block mb-4">Stealth Redefined</span>
                        <h3 class="font-heading text-2xl font-bold uppercase mb-8">GHOST-R</h3>
                        
                        <div class="grid grid-cols-2 gap-y-6 gap-x-4 mb-8">
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Power</span>
                                <p class="text-xs font-bold font-heading">720 <span class="text-[9px] text-neon">HP</span></p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">0-100</span>
                                <p class="text-xs font-bold font-heading">2.8s</p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Top Speed</span>
                                <p class="text-xs font-bold font-heading">330 <span class="text-[9px] lowercase font-sans font-normal">km/h</span></p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Engine</span>
                                <p class="text-xs font-bold">V8 Twin-Turbo</p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Weight</span>
                                <p class="text-xs font-bold">1,210 kg</p>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-1">Torque</span>
                                <p class="text-xs font-bold">700 Nm</p>
                            </div>
                        </div>

                        <div class="text-right mt-12">
                            <a href="/showroom" class="text-[10px] text-neon font-bold uppercase tracking-widest hover:text-white transition">
                                View Details &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: PERSONALIZATION ENGINE -->
    <section class="relative z-10 w-full bg-[#0a0b0e] py-32 px-6 border-t border-b border-gray-800/50 overflow-hidden">
        <!-- Vertical Grid Lines Background -->
        <div class="absolute inset-0 flex justify-between pointer-events-none opacity-10">
            <div class="w-px h-full bg-gray-500"></div>
            <div class="w-px h-full bg-gray-500"></div>
            <div class="w-px h-full bg-gray-500"></div>
            <div class="w-px h-full bg-gray-500"></div>
            <div class="w-px h-full bg-gray-500"></div>
            <div class="w-px h-full bg-gray-500"></div>
            <div class="w-px h-full bg-gray-500"></div>
        </div>
        
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <div class="flex items-center justify-center space-x-6 mb-8">
                <div class="w-16 h-[1px] bg-neon/50"></div>
                <span class="text-[10px] text-neon uppercase tracking-widest font-bold">Personalization Engine</span>
                <div class="w-16 h-[1px] bg-neon/50"></div>
            </div>

            <h2 class="font-heading text-5xl md:text-7xl font-black uppercase tracking-tight mb-8 leading-none">
                <span class="text-white">Your Vision.</span><br>
                <span class="text-neon">Our Engineering.</span>
            </h2>

            <p class="text-gray-400 text-sm leading-relaxed mb-12 max-w-xl mx-auto font-medium">
                Configure every facet of your NEO-DRIVE &mdash; from carbon fiber weave to bespoke interior leather. 3,400+ combinations. Zero compromises.
            </p>

            <a href="/showroom" class="inline-block bg-neon text-black font-bold text-xs px-10 py-4 uppercase tracking-wider hover:bg-lime-400 transition mb-20">
                Customize Your Model
            </a>

            <!-- Fake Tabs/Tags -->
            <div class="flex flex-wrap justify-center gap-2">
                <span class="border border-gray-800 text-gray-600 text-[9px] uppercase font-bold tracking-widest px-6 py-2.5 bg-[#0e1015]">Exterior Color</span>
                <span class="border border-gray-800 text-gray-600 text-[9px] uppercase font-bold tracking-widest px-6 py-2.5 bg-[#0e1015]">Wheel Finish</span>
                <span class="border border-gray-800 text-gray-600 text-[9px] uppercase font-bold tracking-widest px-6 py-2.5 bg-[#0e1015]">Interior Trim</span>
                <span class="border border-gray-800 text-gray-600 text-[9px] uppercase font-bold tracking-widest px-6 py-2.5 bg-[#0e1015] hidden sm:inline-block">Performance Pack</span>
                <span class="border border-gray-800 text-gray-600 text-[9px] uppercase font-bold tracking-widest px-6 py-2.5 bg-[#0e1015] hidden md:inline-block">Aero Kit</span>
                <span class="border border-gray-800 text-gray-600 text-[9px] uppercase font-bold tracking-widest px-6 py-2.5 bg-[#0e1015] hidden lg:inline-block">Brake Calipers</span>
            </div>
            
            <!-- Corner Accents -->
            <div class="absolute bottom-4 left-0 w-8 h-8 border-b-2 border-l-2 border-neon opacity-50"></div>
            <div class="absolute bottom-4 right-0 w-8 h-8 border-b-2 border-r-2 border-neon opacity-50"></div>
        </div>
    </section>

    <!-- SECTION: FOOTER -->
    <footer class="relative z-10 w-full bg-[#050506] py-20 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-12 text-xs">
            <!-- Brand -->
            <div class="md:col-span-4">
                <div class="flex items-center space-x-2 mb-6">
                    <div class="w-1.5 h-5 bg-neon"></div>
                    <span class="font-heading text-white font-bold text-xl tracking-widest">NEO<span class="text-neon">DRIVE</span></span>
                </div>
                <p class="text-gray-500 leading-relaxed text-[11px] pr-8 font-medium">
                    Redefining the boundaries of automotive performance. Crafted for those who demand absolute precision in every detail.
                </p>
            </div>
            
            <!-- Models Links -->
            <div class="md:col-span-2">
                <span class="text-[10px] text-neon font-bold uppercase tracking-widest block mb-6">Models</span>
                <ul class="space-y-4 text-gray-500 text-[10px] uppercase tracking-wider font-semibold">
                    <li><a href="#" class="hover:text-white transition">APEX-01</a></li>
                    <li><a href="#" class="hover:text-white transition">VORTEX-X</a></li>
                    <li><a href="#" class="hover:text-white transition">GHOST-R</a></li>
                </ul>
            </div>
            
            <!-- Company Links -->
            <div class="md:col-span-2">
                <span class="text-[10px] text-neon font-bold uppercase tracking-widest block mb-6">Company</span>
                <ul class="space-y-4 text-gray-500 text-[10px] uppercase tracking-wider font-semibold">
                    <li><a href="#" class="hover:text-white transition">About NEO-DRIVE</a></li>
                    <li><a href="/heritage" class="hover:text-white transition">Heritage</a></li>
                    <li><a href="#" class="hover:text-white transition">Technology</a></li>
                    <li><a href="/admin" class="text-neon/80 hover:text-white transition font-bold">Admin Portal</a></li>
                </ul>
            </div>
            
            <!-- Intelligence Briefing -->
            <div class="md:col-span-4">
                <span class="text-[10px] text-neon font-bold uppercase tracking-widest block mb-6">Intelligence Briefing</span>
                <p class="text-gray-500 leading-relaxed text-[11px] mb-6 font-medium">
                    First access to new model reveals, performance data, and exclusive events.
                </p>
                <div class="flex border border-gray-800/80 focus-within:border-neon/50 transition bg-[#0a0b0e]">
                    <input type="email" placeholder="YOUR EMAIL ADDRESS" class="bg-transparent text-white text-[10px] uppercase tracking-widest px-4 py-3.5 w-full focus:outline-none">
                    <button class="bg-neon text-black font-bold text-[10px] uppercase tracking-widest px-6 hover:bg-lime-400 transition">
                        Join
                    </button>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Help Button -->
    <div class="fixed bottom-4 right-4 z-20">
        <button class="w-8 h-8 rounded-full bg-gray-900 text-gray-400 text-xs flex items-center justify-center border border-gray-700 hover:text-white">
            ?
        </button>
    </div>

</body>
</html>