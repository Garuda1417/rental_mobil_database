<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage - NEO DRIVE</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .text-neon  { color: #ccff00 !important; }
        .bg-neon    { background-color: #ccff00 !important; }
        .border-neon{ border-color: #ccff00 !important; }

        /* Timeline vertical line */
        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0; bottom: 0;
            width: 1px;
            background: linear-gradient(to bottom, transparent, #ccff00 20%, #ccff00 80%, transparent);
            transform: translateX(-50%);
        }

        /* Scanline overlay on hero */
        .scanlines::after {
            content: '';
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 2px,
                rgba(0,0,0,.08) 2px,
                rgba(0,0,0,.08) 4px
            );
            pointer-events: none;
        }

        /* Number counter glow */
        .stat-glow { text-shadow: 0 0 20px rgba(204,255,0,.5); }

        /* Fade-in on scroll (CSS only trick via animation-timeline if supported, fallback graceful) */
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(32px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-on-scroll { animation: fadeSlideUp .8s ease forwards; }
    </style>
</head>
<body class="bg-[#0b0c0f] text-white min-h-screen flex flex-col font-sans selection:bg-neon selection:text-black">

    <!-- NAVBAR -->
    <header class="border-b border-gray-800/80 bg-black/60 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2">
                <div class="w-1.5 h-5 bg-neon"></div>
                <span class="font-heading text-xl font-bold tracking-wider">NEO <span class="text-neon">DRIVE</span></span>
            </a>
            <nav class="hidden md:flex space-x-8 text-xs tracking-widest text-gray-300 font-semibold uppercase">
                <a href="/" class="hover:text-neon transition">Home</a>
                <a href="/showroom" class="hover:text-neon transition">Showroom</a>
                <a href="/heritage" class="text-neon border-b-2 border-neon pb-1">Heritage</a>
                <a href="#" class="hover:text-neon transition">Technology</a>
            </nav>
            <a href="/booking" class="bg-neon text-black font-bold text-xs px-5 py-2.5 uppercase tracking-wider hover:bg-lime-400 transition">
                Book Test Drive &gt;
            </a>
        </div>
    </header>

    <!-- ═══════════════════════════════════════════════
         HERO SECTION
    ═══════════════════════════════════════════════ -->
    <section class="relative scanlines overflow-hidden min-h-[70vh] flex flex-col justify-end">
        <!-- BG gradient art — no image needed -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-black via-[#0a0f02] to-black"></div>
            <!-- Large neon circle glow -->
            <div class="absolute top-[-10%] left-[-5%] w-[60vw] h-[60vw] rounded-full"
                 style="background: radial-gradient(circle, rgba(204,255,0,0.07) 0%, transparent 70%);"></div>
            <!-- Grid pattern -->
            <div class="absolute inset-0 opacity-[0.04]"
                 style="background-image: linear-gradient(#ccff00 1px, transparent 1px), linear-gradient(90deg, #ccff00 1px, transparent 1px); background-size: 60px 60px;"></div>
        </div>

        <!-- Hero text -->
        <div class="relative z-10 max-w-7xl mx-auto px-6 pb-20 pt-32">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-10 h-[1px] bg-neon"></div>
                <span class="text-[10px] text-neon uppercase tracking-widest font-bold">Est. 1923 &bull; One Century of Speed</span>
            </div>
            <h1 class="font-heading text-6xl md:text-8xl font-black uppercase leading-none tracking-tight mb-6">
                Built on<br><span class="text-neon">Legend.</span>
            </h1>
            <p class="text-gray-400 text-sm max-w-xl leading-relaxed font-medium mb-10">
                For over a century, NEO DRIVE has pursued one obsession — the perfect machine. From hand-beaten aluminium bodies to AI-designed aerodynamics, every era has left its mark.
            </p>
            <!-- Scroll cue -->
            <div class="flex items-center space-x-3 text-[10px] text-gray-600 uppercase tracking-widest font-bold">
                <div class="w-[1px] h-10 bg-gray-700 mx-auto" style="margin-left:0"></div>
                <span>Scroll to explore the timeline</span>
            </div>
        </div>

        <!-- Bottom fade -->
        <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-[#0b0c0f] to-transparent"></div>
    </section>

    <!-- ═══════════════════════════════════════════════
         LEGACY STATS BAR
    ═══════════════════════════════════════════════ -->
    <section class="w-full bg-[#0e0f12] border-y border-gray-800/60">
        <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-2 font-bold">Founded</span>
                <p class="font-heading text-3xl font-black stat-glow text-neon">1923</p>
            </div>
            <div>
                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-2 font-bold">Race Victories</span>
                <p class="font-heading text-3xl font-black stat-glow">247 <span class="text-xs text-neon font-normal">WINS</span></p>
            </div>
            <div>
                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-2 font-bold">Patents Filed</span>
                <p class="font-heading text-3xl font-black stat-glow">1,840+</p>
            </div>
            <div>
                <span class="text-[9px] text-gray-600 uppercase tracking-widest block mb-2 font-bold">Countries</span>
                <p class="font-heading text-3xl font-black stat-glow">62 <span class="text-xs text-neon font-normal">NATIONS</span></p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         TIMELINE SECTION
    ═══════════════════════════════════════════════ -->
    <section class="relative w-full bg-[#0b0c0f] py-28 px-6 overflow-hidden">
        <div class="max-w-5xl mx-auto">

            <!-- Section Header -->
            <div class="text-center mb-24">
                <div class="flex items-center justify-center space-x-6 mb-6">
                    <div class="w-16 h-[1px] bg-neon/40"></div>
                    <span class="text-[10px] text-neon uppercase tracking-widest font-bold">The Timeline</span>
                    <div class="w-16 h-[1px] bg-neon/40"></div>
                </div>
                <h2 class="font-heading text-4xl md:text-5xl font-black uppercase tracking-tight">
                    A Century of <span class="text-neon">Milestones</span>
                </h2>
            </div>

            <!-- Timeline -->
            <div class="relative">
                <!-- Center line (hidden on mobile) -->
                <div class="hidden md:block timeline-line"></div>

                <!-- Era items -->

                <!-- 1923 -->
                <div class="flex flex-col md:flex-row items-start md:items-center gap-8 mb-20">
                    <div class="flex-1 md:text-right">
                        <div class="bg-[#111318] border border-gray-800/60 hover:border-neon/40 transition duration-300 p-8">
                            <div class="w-full h-40 mb-6 bg-[#0e0f12] border border-gray-800/50 flex items-center justify-center overflow-hidden relative">
                                <!-- CSS art: vintage engine blueprint -->
                                <div class="absolute inset-0 opacity-10"
                                     style="background: repeating-linear-gradient(45deg, #ccff00 0, #ccff00 1px, transparent 1px, transparent 8px);"></div>
                                <span class="font-heading text-7xl font-black text-gray-800 select-none">1923</span>
                            </div>
                            <span class="text-[9px] text-neon font-bold uppercase tracking-widest block mb-2">The Beginning</span>
                            <h3 class="font-heading text-xl font-bold uppercase mb-4">The First Spark</h3>
                            <p class="text-gray-500 text-xs leading-relaxed font-medium">
                                Founder Maximilian Varek hand-built the first NEO prototype in a Turin workshop. Running on a supercharged 2.3L straight-six, it completed the Mille Miglia in a record time that stunned the world.
                            </p>
                        </div>
                    </div>

                    <!-- Dot -->
                    <div class="hidden md:flex flex-col items-center flex-shrink-0">
                        <div class="w-4 h-4 rounded-full bg-neon ring-4 ring-neon/20"></div>
                    </div>

                    <div class="flex-1 hidden md:block"></div>
                </div>

                <!-- 1952 -->
                <div class="flex flex-col md:flex-row items-start md:items-center gap-8 mb-20">
                    <div class="flex-1 hidden md:block"></div>
                    <!-- Dot -->
                    <div class="hidden md:flex flex-col items-center flex-shrink-0">
                        <div class="w-4 h-4 rounded-full bg-gray-700 ring-4 ring-gray-700/20 border border-neon/30"></div>
                    </div>
                    <div class="flex-1">
                        <div class="bg-[#111318] border border-gray-800/60 hover:border-neon/40 transition duration-300 p-8">
                            <div class="w-full h-40 mb-6 bg-[#0e0f12] border border-gray-800/50 flex items-center justify-center overflow-hidden relative">
                                <div class="absolute inset-0 opacity-5"
                                     style="background: repeating-linear-gradient(0deg, #ccff00 0, #ccff00 1px, transparent 1px, transparent 20px), repeating-linear-gradient(90deg, #ccff00 0, #ccff00 1px, transparent 1px, transparent 20px);"></div>
                                <span class="font-heading text-7xl font-black text-gray-800 select-none">1952</span>
                            </div>
                            <span class="text-[9px] text-neon font-bold uppercase tracking-widest block mb-2">Golden Era</span>
                            <h3 class="font-heading text-xl font-bold uppercase mb-4">Le Mans Conquest</h3>
                            <p class="text-gray-500 text-xs leading-relaxed font-medium">
                                The NEO Barchetta swept 24 Heures du Mans, clinching first, second, and third positions in the GT class. It was the car that placed NEO DRIVE in the pantheon of motorsport legends.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 1978 -->
                <div class="flex flex-col md:flex-row items-start md:items-center gap-8 mb-20">
                    <div class="flex-1 md:text-right">
                        <div class="bg-[#111318] border border-gray-800/60 hover:border-neon/40 transition duration-300 p-8">
                            <div class="w-full h-40 mb-6 bg-[#0e0f12] border border-gray-800/50 flex items-center justify-center overflow-hidden relative">
                                <!-- CSS Art: circuit board-like lines -->
                                <svg class="absolute inset-0 w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="0" y1="50%" x2="35%" y2="50%" stroke="#ccff00" stroke-width="1"/>
                                    <circle cx="35%" cy="50%" r="4" fill="none" stroke="#ccff00" stroke-width="1"/>
                                    <line x1="35%" y1="50%" x2="35%" y2="20%" stroke="#ccff00" stroke-width="1"/>
                                    <line x1="35%" y1="20%" x2="65%" y2="20%" stroke="#ccff00" stroke-width="1"/>
                                    <circle cx="65%" cy="20%" r="4" fill="none" stroke="#ccff00" stroke-width="1"/>
                                    <line x1="65%" y1="20%" x2="65%" y2="80%" stroke="#ccff00" stroke-width="1"/>
                                    <circle cx="65%" cy="80%" r="4" fill="#ccff00"/>
                                    <line x1="65%" y1="80%" x2="100%" y2="80%" stroke="#ccff00" stroke-width="1"/>
                                </svg>
                                <span class="font-heading text-7xl font-black text-gray-800 select-none">1978</span>
                            </div>
                            <span class="text-[9px] text-neon font-bold uppercase tracking-widest block mb-2">The Revolution</span>
                            <h3 class="font-heading text-xl font-bold uppercase mb-4">Ground-Effect Pioneer</h3>
                            <p class="text-gray-500 text-xs leading-relaxed font-medium">
                                NEO's aerodynamics team, led by Dr. Lena Fischer, developed the first passive ground-effect underbody on a road car. This single innovation redefined what was considered possible in chassis dynamics.
                            </p>
                        </div>
                    </div>
                    <!-- Dot -->
                    <div class="hidden md:flex flex-col items-center flex-shrink-0">
                        <div class="w-4 h-4 rounded-full bg-gray-700 ring-4 ring-gray-700/20 border border-neon/30"></div>
                    </div>
                    <div class="flex-1 hidden md:block"></div>
                </div>

                <!-- 2001 -->
                <div class="flex flex-col md:flex-row items-start md:items-center gap-8 mb-20">
                    <div class="flex-1 hidden md:block"></div>
                    <!-- Dot -->
                    <div class="hidden md:flex flex-col items-center flex-shrink-0">
                        <div class="w-4 h-4 rounded-full bg-gray-700 ring-4 ring-gray-700/20 border border-neon/30"></div>
                    </div>
                    <div class="flex-1">
                        <div class="bg-[#111318] border border-gray-800/60 hover:border-neon/40 transition duration-300 p-8">
                            <div class="w-full h-40 mb-6 bg-[#0e0f12] border border-gray-800/50 flex items-center justify-center overflow-hidden relative">
                                <div class="absolute inset-0 opacity-10"
                                     style="background: radial-gradient(circle at 50% 50%, #ccff00 0%, transparent 60%);"></div>
                                <span class="font-heading text-7xl font-black text-gray-800 select-none">2001</span>
                            </div>
                            <span class="text-[9px] text-neon font-bold uppercase tracking-widest block mb-2">Digital Age</span>
                            <h3 class="font-heading text-xl font-bold uppercase mb-4">NEO Phantom — 1,000HP</h3>
                            <p class="text-gray-500 text-xs leading-relaxed font-medium">
                                When the industry said 1,000 horsepower was impossible in a street-legal car, NEO delivered the Phantom. Carbon monocoque, active aerodynamics, 0–100 in 2.7s. It became an instant icon.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2025 / Present -->
                <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                    <div class="flex-1 md:text-right">
                        <div class="bg-[#111318] border border-neon/30 hover:border-neon/60 transition duration-300 p-8 relative overflow-hidden">
                            <!-- Neon corner accent -->
                            <div class="absolute top-0 left-0 w-6 h-6 border-t-2 border-l-2 border-neon"></div>
                            <div class="absolute bottom-0 right-0 w-6 h-6 border-b-2 border-r-2 border-neon"></div>
                            <div class="w-full h-40 mb-6 bg-black border border-neon/10 flex items-center justify-center overflow-hidden relative">
                                <div class="absolute inset-0"
                                     style="background: radial-gradient(circle at 30% 60%, rgba(204,255,0,0.12) 0%, transparent 70%);"></div>
                                <img src="{{ asset('images/hero-car.jpg') }}" class="w-full h-full object-cover opacity-60">
                            </div>
                            <span class="text-[9px] text-neon font-bold uppercase tracking-widest block mb-2">Present Day &bull; Now</span>
                            <h3 class="font-heading text-xl font-bold uppercase mb-4 text-neon">NEO AVENTUS — The Future</h3>
                            <p class="text-gray-400 text-xs leading-relaxed font-medium">
                                A century of relentless pursuit culminates in the NEO AVENTUS. AI-optimised aerodynamics, 950HP hybrid V12, and a cockpit forged from 14 layers of carbon fibre. This is the flagship.
                            </p>
                            <a href="/showroom" class="inline-block mt-6 text-[10px] text-black bg-neon font-bold uppercase tracking-widest px-5 py-2.5 hover:bg-lime-400 transition">
                                Configure Yours &rarr;
                            </a>
                        </div>
                    </div>
                    <!-- Dot -->
                    <div class="hidden md:flex flex-col items-center flex-shrink-0">
                        <div class="w-5 h-5 rounded-full bg-neon ring-8 ring-neon/20 shadow-[0_0_20px_rgba(204,255,0,0.4)]"></div>
                    </div>
                    <div class="flex-1 hidden md:block"></div>
                </div>

            </div><!-- /timeline -->
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         PHILOSOPHY SECTION — "THE VAREK CODE"
    ═══════════════════════════════════════════════ -->
    <section class="w-full bg-[#08090b] border-t border-gray-800/50 py-28 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <!-- Left: quote / philosophy -->
            <div>
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-8 h-[1px] bg-neon"></div>
                    <span class="text-[10px] text-neon uppercase tracking-widest font-bold">The Varek Code</span>
                </div>
                <blockquote class="font-heading text-3xl md:text-4xl font-black uppercase leading-tight mb-8">
                    "Speed is <span class="text-neon">earned</span>,<br>
                    not given."
                </blockquote>
                <p class="text-gray-500 text-sm leading-relaxed mb-8 font-medium">
                    Maximilian Varek's founding philosophy still governs every decision at NEO DRIVE. Each vehicle is tested beyond the limits of reason before it reaches a customer. No shortcuts. No compromises. The machine must earn its badge.
                </p>
                <div class="border-l-2 border-neon pl-6 py-2">
                    <span class="text-xs text-white font-bold block">Maximilian Varek</span>
                    <span class="text-[10px] text-gray-500 uppercase tracking-wider">Founder, NEO DRIVE — Turin, 1923</span>
                </div>
            </div>

            <!-- Right: pillars grid -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-[#111318] border border-gray-800/60 p-6 hover:border-neon/30 transition">
                    <div class="text-3xl mb-4">⚙️</div>
                    <h4 class="font-heading text-sm font-bold uppercase mb-3">Engineering First</h4>
                    <p class="text-gray-500 text-[11px] leading-relaxed">Every styling decision must serve aerodynamic or structural function. Form follows force.</p>
                </div>
                <div class="bg-[#111318] border border-gray-800/60 p-6 hover:border-neon/30 transition">
                    <div class="text-3xl mb-4">🏁</div>
                    <h4 class="font-heading text-sm font-bold uppercase mb-3">Race-Proven Only</h4>
                    <p class="text-gray-500 text-[11px] leading-relaxed">No technology enters production that has not proven itself on the race circuit under real stress.</p>
                </div>
                <div class="bg-[#111318] border border-gray-800/60 p-6 hover:border-neon/30 transition">
                    <div class="text-3xl mb-4">🔬</div>
                    <h4 class="font-heading text-sm font-bold uppercase mb-3">Material Obsession</h4>
                    <p class="text-gray-500 text-[11px] leading-relaxed">Carbon fibre, titanium fasteners, aerospace alloys. Weight is the enemy of precision.</p>
                </div>
                <div class="bg-[#111318] border border-gray-800/60 p-6 hover:border-neon/30 transition">
                    <div class="text-3xl mb-4">🌍</div>
                    <h4 class="font-heading text-sm font-bold uppercase mb-3">Global Reach</h4>
                    <p class="text-gray-500 text-[11px] leading-relaxed">Built in Italy. Engineered in Germany. Driven everywhere. NEO DRIVE belongs to the world.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         CTA BANNER
    ═══════════════════════════════════════════════ -->
    <section class="relative w-full bg-neon py-20 px-6 overflow-hidden">
        <div class="absolute inset-0 opacity-10"
             style="background-image: linear-gradient(#000 1px, transparent 1px), linear-gradient(90deg, #000 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <span class="text-[10px] text-black/60 uppercase tracking-widest font-bold block mb-4">Join the Legacy</span>
            <h2 class="font-heading text-4xl md:text-6xl font-black uppercase text-black tracking-tight leading-tight mb-8">
                The Next Chapter<br>Starts With You.
            </h2>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/showroom" class="bg-black text-neon font-bold text-xs px-8 py-4 uppercase tracking-wider hover:bg-gray-900 transition">
                    Explore Showroom &rarr;
                </a>
                <a href="/booking" class="border-2 border-black text-black font-bold text-xs px-8 py-4 uppercase tracking-wider hover:bg-black hover:text-neon transition">
                    Reserve Your AVENTUS
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-[#050506] border-t border-gray-800/80 py-16 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10 text-xs">
            <div>
                <div class="flex items-center space-x-2 mb-5">
                    <div class="w-1.5 h-5 bg-neon"></div>
                    <span class="font-heading text-white font-bold text-lg tracking-widest">NEO<span class="text-neon">DRIVE</span></span>
                </div>
                <p class="text-gray-500 text-[11px] leading-relaxed">Redefining the boundaries of automotive performance. Crafted for those who demand absolute precision.</p>
            </div>
            <div>
                <span class="text-[10px] text-neon font-bold uppercase tracking-widest block mb-5">Vehicles</span>
                <ul class="space-y-3 text-gray-500 text-[11px]">
                    <li><a href="#" class="hover:text-white transition">NEO-AVENTUS</a></li>
                    <li><a href="#" class="hover:text-white transition">NEO-VENOM</a></li>
                    <li><a href="#" class="hover:text-white transition">NEO-APEX</a></li>
                </ul>
            </div>
            <div>
                <span class="text-[10px] text-neon font-bold uppercase tracking-widest block mb-5">Experience</span>
                <ul class="space-y-3 text-gray-500 text-[11px]">
                    <li><a href="/showroom" class="hover:text-white transition">Configuration Studio</a></li>
                    <li><a href="/booking" class="hover:text-white transition">Reserve</a></li>
                    <li><a href="/heritage" class="hover:text-white transition">Heritage</a></li>
                    <li><a href="/admin" class="text-neon hover:text-white transition font-bold">Admin Portal</a></li>
                </ul>
            </div>
            <div>
                <span class="text-[10px] text-neon font-bold uppercase tracking-widest block mb-5">Contact</span>
                <ul class="space-y-3 text-gray-500 text-[11px]">
                    <li>contact@neodrive.io</li>
                    <li>+39 02 9999 8888</li>
                    <li>Via Varek 1, Turin, Italy</li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>
