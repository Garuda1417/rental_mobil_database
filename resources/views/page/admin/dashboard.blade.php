<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Intelligence Center - NEO DRIVE Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .text-neon { color: #ccff00 !important; }
        .bg-neon { background-color: #ccff00 !important; }
        .border-neon { border-color: #ccff00 !important; }
        .shadow-neon { box-shadow: 0 0 15px rgba(204, 255, 0, 0.2); }
        
        /* Custom scrollbar for cyber theme */
        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }
        ::-webkit-scrollbar-track {
            background: #08090b;
        }
        ::-webkit-scrollbar-thumb {
            background: #222;
            border-radius: 2px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #ccff00;
        }
    </style>
</head>
<body class="bg-[#08090b] text-white min-h-screen font-sans selection:bg-neon selection:text-black flex">

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed top-6 right-6 z-50 flex flex-col gap-3 pointer-events-none"></div>

    <!-- System Diagnostics Modal -->
    <div id="diagnostics-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center hidden">
        <div class="bg-[#111318] border border-gray-800 p-6 rounded-lg max-w-md w-full relative">
            <div class="absolute top-4 right-4">
                <button onclick="toggleModal('diagnostics-modal', false)" class="text-gray-500 hover:text-white font-bold">&times;</button>
            </div>
            <div class="flex items-center space-x-2 mb-6">
                <div class="w-1.5 h-5 bg-neon"></div>
                <h3 class="font-heading text-sm font-bold uppercase tracking-wider">System Diagnostics</h3>
            </div>
            <div class="space-y-4 text-xs font-semibold uppercase tracking-wider" id="diagnostics-list">
                <div class="flex justify-between items-center py-2 border-b border-gray-900">
                    <span class="text-gray-400">PHP Artisan Server</span>
                    <span class="text-neon" id="diag-artisan">checking...</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-900">
                    <span class="text-gray-400">Vite Compiler Engine</span>
                    <span class="text-neon" id="diag-vite">checking...</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-900">
                    <span class="text-gray-400">Database Pool Integrity</span>
                    <span class="text-neon" id="diag-db">checking...</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-900">
                    <span class="text-gray-400">Telemetry Server Node</span>
                    <span class="text-neon" id="diag-node">checking...</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-gray-400">CPU Temperature</span>
                    <span class="text-white" id="diag-cpu">34°C</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ────────────────────────────────────────────────────────
         SIDEBAR NAVIGATION
    ──────────────────────────────────────────────────────── -->
    <aside class="w-64 border-r border-gray-800 bg-[#0b0c0f] flex flex-col justify-between hidden md:flex shrink-0">
        <div>
            <!-- Header Brand -->
            <div class="p-6 border-b border-gray-900 flex items-center space-x-2">
                <div class="w-1.5 h-6 bg-neon"></div>
                <span class="font-heading text-lg font-bold tracking-wider">NEO <span class="text-neon">CORE</span></span>
            </div>

            <!-- Profile Info -->
            <div class="p-6 border-b border-gray-900 bg-black/20">
                <div class="flex items-center space-x-3">
                    <div class="relative w-10 h-10 rounded bg-[#111318] border border-gray-800 flex items-center justify-center font-heading font-black text-neon text-sm">
                        AD
                        <div class="absolute bottom-0 right-0 w-2.5 h-2.5 rounded-full bg-neon border-2 border-[#0b0c0f]"></div>
                    </div>
                    <div>
                        <span class="text-xs font-bold block">Alex Mercer</span>
                        <span class="text-[9px] text-gray-500 uppercase tracking-widest block font-bold">System Admin</span>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5" id="sidebar-nav">
                <span class="text-[9px] text-gray-600 uppercase font-bold tracking-widest px-3 block mb-2">Systems</span>
                
                <button onclick="switchView('dashboard')" data-view="dashboard" class="nav-item w-full flex items-center space-x-3 px-3 py-2.5 rounded bg-neon/10 text-neon font-bold text-xs uppercase tracking-widest text-left">
                    <span>📊</span>
                    <span>Dashboard</span>
                </button>
                
                <button onclick="switchView('bookings')" data-view="bookings" class="nav-item w-full flex items-center space-x-3 px-3 py-2.5 rounded text-gray-400 hover:text-white hover:bg-gray-900/50 transition font-bold text-xs uppercase tracking-widest text-left">
                    <span>📅</span>
                    <span>Bookings Manager</span>
                </button>

                <button onclick="switchView('fleet')" data-view="fleet" class="nav-item w-full flex items-center space-x-3 px-3 py-2.5 rounded text-gray-400 hover:text-white hover:bg-gray-900/50 transition font-bold text-xs uppercase tracking-widest text-left">
                    <span>🏎️</span>
                    <span>Fleet Configurator</span>
                </button>

                <button onclick="switchView('telemetry')" data-view="telemetry" class="nav-item w-full flex items-center space-x-3 px-3 py-2.5 rounded text-gray-400 hover:text-white hover:bg-gray-900/50 transition font-bold text-xs uppercase tracking-widest text-left">
                    <span>📡</span>
                    <span>System Telemetry</span>
                </button>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-900">
            <a href="/" class="flex items-center justify-center space-x-2 w-full border border-gray-800 hover:border-red-500/50 text-gray-400 hover:text-red-400 font-bold text-[10px] uppercase tracking-widest py-2.5 transition">
                <span>🚪</span>
                <span>Exit Neo Core</span>
            </a>
        </div>
    </aside>

    <!-- ────────────────────────────────────────────────────────
         MAIN CONTENT AREA
    ──────────────────────────────────────────────────────── -->
    <main class="flex-grow flex flex-col min-w-0 h-screen overflow-hidden">
        
        <!-- Header -->
        <header class="border-b border-gray-800 bg-[#0b0c0f]/80 backdrop-blur-md px-6 py-4 flex justify-between items-center z-10">
            <div class="flex items-center space-x-3">
                <span class="text-xs text-gray-500 font-bold font-heading uppercase tracking-widest">Command Center</span>
                <span class="text-gray-700">/</span>
                <span class="text-xs text-neon id-view-title font-bold font-heading uppercase tracking-widest">Live Telemetry</span>
            </div>
            
            <div class="flex items-center space-x-4">
                <span class="text-[10px] text-neon bg-neon/10 border border-neon/20 px-2 py-1 font-heading font-bold uppercase tracking-widest rounded animate-pulse">
                    Node Connected
                </span>
                <span class="text-[10px] text-gray-500 font-bold uppercase tracking-widest hidden sm:inline">
                    Server Latency: <span class="text-white" id="latency-ticker">12ms</span>
                </span>
            </div>
        </header>

        <!-- Page Inner Container (Scrollable) -->
        <div class="p-6 md:p-8 space-y-6 overflow-y-auto flex-grow h-[calc(100vh-65px)]">
            
            <!-- Welcome Alert / Title Banner -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-gradient-to-r from-neon/10 to-transparent border border-neon/20 p-6 rounded-lg relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-neon"></div>
                <div>
                    <h1 class="font-heading text-2xl md:text-3xl font-black uppercase tracking-tight mb-1" id="main-banner-title">System Intelligence Dashboard</h1>
                    <p class="text-gray-400 text-xs" id="main-banner-desc">Real-time status of reservations, configured vehicle specifications, and active user traffic.</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="runDiagnostics()" class="bg-[#111318] border border-gray-800 text-gray-400 hover:text-white text-xs px-4 py-2 font-bold uppercase tracking-wider transition">
                        System Diagnostics
                    </button>
                    <button onclick="exportReport()" class="bg-neon text-black text-xs px-4 py-2 font-bold uppercase tracking-wider hover:bg-lime-400 transition">
                        Export Report
                    </button>
                </div>
            </div>

            <!-- Stats Grid (Visible on all tabs for quick telemetry) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-[#111318] border border-gray-800 p-5 rounded relative overflow-hidden">
                    <span class="text-[9px] text-gray-500 uppercase tracking-widest block font-bold mb-2">Total Reservations</span>
                    <div class="flex justify-between items-end">
                        <p class="font-heading text-3xl font-black text-neon shadow-neon" id="stat-total-bookings">0</p>
                        <span class="text-[10px] text-emerald-400 font-bold bg-emerald-500/10 px-1.5 py-0.5 rounded">+12.4%</span>
                    </div>
                    <div class="w-full bg-gray-900 h-1 mt-4 rounded-full overflow-hidden">
                        <div class="bg-neon h-full w-[78%]"></div>
                    </div>
                </div>
                <div class="bg-[#111318] border border-gray-800 p-5 rounded relative overflow-hidden">
                    <span class="text-[9px] text-gray-500 uppercase tracking-widest block font-bold mb-2">Total Configured Value</span>
                    <div class="flex justify-between items-end">
                        <p class="font-heading text-3xl font-black" id="stat-configured-val">$3.41B</p>
                        <span class="text-[10px] text-emerald-400 font-bold bg-emerald-500/10 px-1.5 py-0.5 rounded">+8.2%</span>
                    </div>
                    <div class="w-full bg-gray-900 h-1 mt-4 rounded-full overflow-hidden">
                        <div class="bg-white h-full w-[65%]"></div>
                    </div>
                </div>
                <div class="bg-[#111318] border border-gray-800 p-5 rounded relative overflow-hidden">
                    <span class="text-[9px] text-gray-500 uppercase tracking-widest block font-bold mb-2">Conversion Rate</span>
                    <div class="flex justify-between items-end">
                        <p class="font-heading text-3xl font-black">4.82%</p>
                        <span class="text-[10px] text-red-400 font-bold bg-red-500/10 px-1.5 py-0.5 rounded">-1.5%</span>
                    </div>
                    <div class="w-full bg-gray-900 h-1 mt-4 rounded-full overflow-hidden">
                        <div class="bg-red-500 h-full w-[45%]"></div>
                    </div>
                </div>
                <div class="bg-[#111318] border border-gray-800 p-5 rounded relative overflow-hidden">
                    <span class="text-[9px] text-gray-500 uppercase tracking-widest block font-bold mb-2">Active Sessions</span>
                    <div class="flex justify-between items-end">
                        <p class="font-heading text-3xl font-black" id="stat-sessions">1,402</p>
                        <span class="text-[10px] text-emerald-400 font-bold bg-emerald-500/10 px-1.5 py-0.5 rounded">+22.8%</span>
                    </div>
                    <div class="w-full bg-gray-900 h-1 mt-4 rounded-full overflow-hidden">
                        <div class="bg-neon h-full w-[90%]"></div>
                    </div>
                </div>
            </div>

            <!-- ==========================================
                 PANEL 1: DASHBOARD VIEW
                 ========================================== -->
            <div id="panel-dashboard" class="panel-view grid grid-cols-1 lg:grid-cols-12 gap-6">
                <!-- Left: Quick Queue Table -->
                <div class="lg:col-span-8 bg-[#111318] border border-gray-800 rounded flex flex-col justify-between">
                    <div class="p-6 border-b border-gray-900 flex justify-between items-center">
                        <div>
                            <h3 class="font-heading text-sm font-bold uppercase tracking-wider">Recent Reservations</h3>
                            <p class="text-gray-500 text-[10px] mt-0.5">Quick queue management for recently created bookings.</p>
                        </div>
                        <input type="text" oninput="filterQuickTable(this.value)" placeholder="Search Name..." class="bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-[10px] px-3 py-1.5 rounded w-40 text-white uppercase tracking-wider">
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-gray-400 divide-y divide-gray-900">
                            <thead class="bg-black/30 font-heading text-[10px] text-gray-500 uppercase tracking-wider">
                                <tr>
                                    <th class="p-4">Client Details</th>
                                    <th class="p-4">Model Choice</th>
                                    <th class="p-4">Schedule</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-900" id="quick-booking-rows">
                                <!-- Generated Dynamically -->
                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 border-t border-gray-900 bg-black/10 flex justify-between items-center text-[10px] text-gray-500 font-bold uppercase tracking-widest">
                        <span id="quick-count-lbl">Showing 3 reservations</span>
                        <button onclick="switchView('bookings')" class="text-neon hover:underline">Manage All Bookings &rarr;</button>
                    </div>
                </div>

                <!-- Right: Analytics Details -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-[#111318] border border-gray-800 p-6 rounded">
                        <h3 class="font-heading text-xs font-bold uppercase tracking-wider mb-6">Model Popularity Share</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-xs font-bold mb-1.5">
                                    <span class="text-white font-heading">NEO AVENTUS</span>
                                    <span class="text-neon" id="share-aventus-pct">54%</span>
                                </div>
                                <div class="w-full bg-gray-900 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-neon h-full" id="share-aventus-bar" style="width: 54%;"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs font-bold mb-1.5">
                                    <span class="text-white font-heading">VORTEX-X</span>
                                    <span class="text-cyan-400" id="share-vortex-pct">28%</span>
                                </div>
                                <div class="w-full bg-gray-900 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-cyan-400 h-full" id="share-vortex-bar" style="width: 28%;"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs font-bold mb-1.5">
                                    <span class="text-white font-heading">GHOST-R</span>
                                    <span class="text-gray-400" id="share-ghost-pct">18%</span>
                                </div>
                                <div class="w-full bg-gray-900 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-white h-full" id="share-ghost-bar" style="width: 18%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#111318] border border-gray-800 p-6 rounded">
                        <h3 class="font-heading text-xs font-bold uppercase tracking-wider mb-6">Live Activity Stream</h3>
                        <div class="space-y-4 text-xs" id="activity-stream">
                            <!-- Populated Dynamically -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- ==========================================
                 PANEL 2: BOOKINGS MANAGER VIEW
                 ========================================== -->
            <div id="panel-bookings" class="panel-view grid grid-cols-1 lg:grid-cols-12 gap-6 hidden">
                <!-- Left: Full bookings List -->
                <div class="lg:col-span-8 bg-[#111318] border border-gray-800 rounded flex flex-col justify-between">
                    <div class="p-6 border-b border-gray-900 flex flex-wrap justify-between items-center gap-4">
                        <div>
                            <h3 class="font-heading text-sm font-bold uppercase tracking-wider">All Reservations</h3>
                            <p class="text-gray-500 text-[10px] mt-0.5">Filter, search, and approve all scheduled test drives.</p>
                        </div>
                        <div class="flex gap-2">
                            <select onchange="filterFullTable()" id="filter-status" class="bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-[10px] px-3 py-1.5 rounded text-gray-300 font-bold uppercase tracking-wider">
                                <option value="All">All Statuses</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                            <input type="text" id="search-input-full" oninput="filterFullTable()" placeholder="Search Name..." class="bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-[10px] px-3 py-1.5 rounded w-40 text-white uppercase tracking-wider">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-gray-400 divide-y divide-gray-900">
                            <thead class="bg-black/30 font-heading text-[10px] text-gray-500 uppercase tracking-wider">
                                <tr>
                                    <th class="p-4">Client</th>
                                    <th class="p-4">Contact</th>
                                    <th class="p-4">Model Choice</th>
                                    <th class="p-4">Schedule</th>
                                    <th class="p-4">Location</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-900" id="full-booking-rows">
                                <!-- Generated Dynamically -->
                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 border-t border-gray-900 bg-black/10 flex justify-between items-center text-[10px] text-gray-500 font-bold uppercase tracking-widest" id="full-table-footer">
                        <span>Showing 3 reservations</span>
                    </div>
                </div>

                <!-- Right: Create Booking Form -->
                <div class="lg:col-span-4">
                    <div class="bg-[#111318] border border-gray-800 p-6 rounded">
                        <h3 class="font-heading text-xs font-bold uppercase tracking-wider mb-6">Create Custom Booking</h3>
                        <form id="create-booking-form" onsubmit="createBooking(event)" class="space-y-4 text-xs font-semibold uppercase tracking-wider">
                            <div>
                                <label class="text-[9px] text-gray-500 block mb-1">Client Name</label>
                                <input type="text" required id="form-name" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-white px-3 py-2 rounded">
                            </div>
                            <div>
                                <label class="text-[9px] text-gray-500 block mb-1">Email Address</label>
                                <input type="email" required id="form-email" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-white px-3 py-2 rounded lowercase">
                            </div>
                            <div>
                                <label class="text-[9px] text-gray-500 block mb-1">Phone Number</label>
                                <input type="text" required id="form-phone" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-white px-3 py-2 rounded">
                            </div>
                            <div>
                                <label class="text-[9px] text-gray-500 block mb-1">Model Choice</label>
                                <select required id="form-model" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-white px-3 py-2 rounded">
                                    <option value="NEO AVENTUS">NEO AVENTUS</option>
                                    <option value="VORTEX-X">VORTEX-X</option>
                                    <option value="GHOST-R">GHOST-R</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-[9px] text-gray-500 block mb-1">Date</label>
                                <input type="date" required id="form-date" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-white px-3 py-2 rounded">
                            </div>
                            <div>
                                <label class="text-[9px] text-gray-500 block mb-1">Nearest Location</label>
                                <select required id="form-location" class="w-full bg-black/60 border border-gray-800 focus:border-neon focus:outline-none text-white px-3 py-2 rounded">
                                    <option value="Jakarta Experience Center">Jakarta Experience Center</option>
                                    <option value="Tokyo Neo Gallery">Tokyo Neo Gallery</option>
                                    <option value="Los Angeles Studio">Los Angeles Studio</option>
                                </select>
                            </div>
                            <button type="submit" class="w-full bg-neon text-black font-bold uppercase tracking-widest py-3 text-[10px] hover:bg-lime-400 transition mt-2">
                                Add Reservation
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ==========================================
                 PANEL 3: FLEET CONFIGURATOR
                 ========================================== -->
            <div id="panel-fleet" class="panel-view grid grid-cols-1 lg:grid-cols-3 gap-6 hidden">
                <!-- Aventus Config Card -->
                <div class="bg-[#111318] border border-gray-800 p-6 rounded relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-neon"></div>
                    <span class="text-[9px] text-neon font-bold tracking-widest block uppercase mb-2">V12 Hybrid Flagship</span>
                    <h3 class="font-heading text-xl font-bold uppercase mb-6">NEO AVENTUS</h3>
                    <div class="space-y-4 mb-8 text-xs">
                        <div class="flex justify-between border-b border-gray-900 pb-2">
                            <span class="text-gray-500">Base MSRP Price</span>
                            <input type="text" id="price-aventus" value="$1,200,000" class="bg-black/60 border border-gray-800 text-right px-2 py-0.5 text-white font-bold max-w-[120px] focus:outline-none focus:border-neon">
                        </div>
                        <div class="flex justify-between border-b border-gray-900 pb-2">
                            <span class="text-gray-500">Power Output</span>
                            <span class="text-white font-bold">950 HP</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-900 pb-2">
                            <span class="text-gray-500">Global Allocation</span>
                            <span class="text-white font-bold">88 Units</span>
                        </div>
                    </div>
                    <button onclick="saveCarSettings('aventus')" class="w-full bg-neon text-black font-bold text-[10px] py-2.5 uppercase tracking-widest hover:bg-lime-400 transition">Save Specs</button>
                </div>

                <!-- Vortex-X Config Card -->
                <div class="bg-[#111318] border border-gray-800 p-6 rounded relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-cyan-400"></div>
                    <span class="text-[9px] text-cyan-400 font-bold tracking-widest block uppercase mb-2">Quad-Motor EV</span>
                    <h3 class="font-heading text-xl font-bold uppercase mb-6">VORTEX-X</h3>
                    <div class="space-y-4 mb-8 text-xs">
                        <div class="flex justify-between border-b border-gray-900 pb-2">
                            <span class="text-gray-500">Base MSRP Price</span>
                            <input type="text" id="price-vortex" value="$950,000" class="bg-black/60 border border-gray-800 text-right px-2 py-0.5 text-white font-bold max-w-[120px] focus:outline-none focus:border-cyan-400">
                        </div>
                        <div class="flex justify-between border-b border-gray-900 pb-2">
                            <span class="text-gray-500">Power Output</span>
                            <span class="text-white font-bold">1,100 HP</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-900 pb-2">
                            <span class="text-gray-500">Global Allocation</span>
                            <span class="text-white font-bold">120 Units</span>
                        </div>
                    </div>
                    <button onclick="saveCarSettings('vortex')" class="w-full bg-cyan-400 text-black font-bold text-[10px] py-2.5 uppercase tracking-widest hover:bg-cyan-300 transition">Save Specs</button>
                </div>

                <!-- Ghost-R Config Card -->
                <div class="bg-[#111318] border border-gray-800 p-6 rounded relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-white"></div>
                    <span class="text-[9px] text-white font-bold tracking-widest block uppercase mb-2">V8 twin-turbo stealth</span>
                    <h3 class="font-heading text-xl font-bold uppercase mb-6">GHOST-R</h3>
                    <div class="space-y-4 mb-8 text-xs">
                        <div class="flex justify-between border-b border-gray-900 pb-2">
                            <span class="text-gray-500">Base MSRP Price</span>
                            <input type="text" id="price-ghost" value="$880,000" class="bg-black/60 border border-gray-800 text-right px-2 py-0.5 text-white font-bold max-w-[120px] focus:outline-none focus:border-white">
                        </div>
                        <div class="flex justify-between border-b border-gray-900 pb-2">
                            <span class="text-gray-500">Power Output</span>
                            <span class="text-white font-bold">720 HP</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-900 pb-2">
                            <span class="text-gray-500">Global Allocation</span>
                            <span class="text-white font-bold">50 Units</span>
                        </div>
                    </div>
                    <button onclick="saveCarSettings('ghost')" class="w-full bg-white text-black font-bold text-[10px] py-2.5 uppercase tracking-widest hover:bg-gray-100 transition">Save Specs</button>
                </div>
            </div>

            <!-- ==========================================
                 PANEL 4: SYSTEM TELEMETRY
                 ========================================== -->
            <div id="panel-telemetry" class="panel-view grid grid-cols-1 lg:grid-cols-12 gap-6 hidden">
                <!-- Telemetry Metrics -->
                <div class="lg:col-span-4 bg-[#111318] border border-gray-800 p-6 rounded flex flex-col justify-between gap-6">
                    <div>
                        <h3 class="font-heading text-xs font-bold uppercase tracking-wider mb-6">Active Resource Load</h3>
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between text-xs font-bold mb-1.5">
                                    <span class="text-gray-400">CPU Load</span>
                                    <span class="text-neon" id="telemetry-cpu-val">42%</span>
                                </div>
                                <div class="w-full bg-gray-900 h-2 rounded overflow-hidden">
                                    <div class="bg-neon h-full transition-all duration-700" id="telemetry-cpu-bar" style="width: 42%;"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs font-bold mb-1.5">
                                    <span class="text-gray-400">Memory Usage</span>
                                    <span class="text-cyan-400" id="telemetry-ram-val">68%</span>
                                </div>
                                <div class="w-full bg-gray-900 h-2 rounded overflow-hidden">
                                    <div class="bg-cyan-400 h-full transition-all duration-700" id="telemetry-ram-bar" style="width: 68%;"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs font-bold mb-1.5">
                                    <span class="text-gray-400">Network Latency</span>
                                    <span class="text-white" id="telemetry-net-val">12ms</span>
                                </div>
                                <div class="w-full bg-gray-900 h-2 rounded overflow-hidden">
                                    <div class="bg-white h-full transition-all duration-700" id="telemetry-net-bar" style="width: 12%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border border-gray-800/80 p-4 bg-black/30 rounded text-center">
                        <span class="text-[9px] text-gray-500 block uppercase font-bold tracking-widest mb-1">Core Cluster Status</span>
                        <span class="text-xs text-neon font-black font-heading uppercase tracking-widest">Active & Stable</span>
                    </div>
                </div>

                <!-- Telemetry Terminal Stream (8 Cols) -->
                <div class="lg:col-span-8 bg-[#090b0e] border border-gray-800 rounded p-6 flex flex-col justify-between h-[360px]">
                    <div class="flex justify-between items-center border-b border-gray-900 pb-3 mb-3">
                        <div class="flex items-center space-x-2">
                            <div class="w-2.5 h-2.5 rounded-full bg-red-500 animate-pulse"></div>
                            <span class="font-heading text-[10px] font-bold uppercase tracking-widest text-red-500">Live Console Feed</span>
                        </div>
                        <button onclick="clearConsole()" class="text-[9px] text-gray-500 hover:text-white uppercase font-bold tracking-wider">Clear Logs</button>
                    </div>

                    <div class="flex-grow overflow-y-auto font-mono text-[10px] text-gray-400 space-y-1.5 pr-2" id="telemetry-console">
                        <div>[23:51:00] INITIALIZING SYSTEMS CONNECTORS...</div>
                        <div>[23:51:01] TELEMETRY STACK BINDING ACTIVE ON NODE #4-TURIN</div>
                        <div>[23:51:02] DATABASE POOL INTEGRITY: OK (12 ACTIVE POOLS)</div>
                        <div>[23:51:04] VITE COMPILER COMPILE SUCCESSFUL</div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- ────────────────────────────────────────────────────────
         INTERACTIVE SPA CONTROLLER & STATE LOGIC
    ──────────────────────────────────────────────────────── -->
    <script>
        // Local state for all reservations
        let bookings = [];

        // Seed initial data if localStorage is empty
        const initialSeed = [
            { id: 1, name: 'Alexander Novak', email: 'a.novak@domain.com', phone: '+1 (310) 000-0000', model: 'NEO AVENTUS', date: '2026-07-22', location: 'Jakarta Experience Center', status: 'Pending' },
            { id: 2, name: 'Rin Tohsaka', email: 'rin@fuyuki.org', phone: '+81 90 1234 5678', model: 'VORTEX-X', date: '2026-07-23', location: 'Tokyo Neo Gallery', status: 'Pending' },
            { id: 3, name: 'James Sterling', email: 'j.sterling@london-automotive.co', phone: '+44 20 7946 0958', model: 'GHOST-R', date: '2026-07-25', location: 'Los Angeles Studio', status: 'Approved' }
        ];

        // Seeding to localStorage
        function loadState() {
            const data = localStorage.getItem('neo_reservations');
            if (data) {
                bookings = JSON.parse(data);
            } else {
                bookings = [...initialSeed];
                localStorage.setItem('neo_reservations', JSON.stringify(bookings));
            }
            updateDOM();
        }

        // Save active state to localStorage
        function saveState() {
            localStorage.setItem('neo_reservations', JSON.stringify(bookings));
            updateDOM();
        }

        // Render Tables & Statistics dynamically
        function updateDOM() {
            // Stats Panel
            document.getElementById('stat-total-bookings').textContent = bookings.length;

            // Stats values based on count
            const baseVal = 3.41;
            const newCount = bookings.length;
            const configuredVal = (baseVal + (newCount - 3) * 1.2).toFixed(2);
            document.getElementById('stat-configured-val').textContent = `$${configuredVal}B`;

            // Calculate Model Shares
            const total = bookings.length || 1;
            const aventusCount = bookings.filter(b => b.model === 'NEO AVENTUS').length;
            const vortexCount = bookings.filter(b => b.model === 'VORTEX-X').length;
            const ghostCount = bookings.filter(b => b.model === 'GHOST-R').length;

            const aventusPct = Math.round((aventusCount / total) * 100);
            const vortexPct = Math.round((vortexCount / total) * 100);
            const ghostPct = Math.round((ghostCount / total) * 100);

            // Update shares UI
            document.getElementById('share-aventus-pct').textContent = `${aventusPct}%`;
            document.getElementById('share-aventus-bar').style.width = `${aventusPct}%`;

            document.getElementById('share-vortex-pct').textContent = `${vortexPct}%`;
            document.getElementById('share-vortex-bar').style.width = `${vortexPct}%`;

            document.getElementById('share-ghost-pct').textContent = `${ghostPct}%`;
            document.getElementById('share-ghost-bar').style.width = `${ghostPct}%`;

            // Render Dashboard Mini Queue (Only Pending or Approved, max 3)
            const quickContainer = document.getElementById('quick-booking-rows');
            quickContainer.innerHTML = '';
            
            const recentBookings = [...bookings].reverse().slice(0, 3);
            recentBookings.forEach(b => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-black/20 transition';
                
                let badgeClass = 'bg-yellow-500/10 border-yellow-500/20 text-yellow-500';
                if (b.status === 'Approved') badgeClass = 'bg-emerald-500/10 border-emerald-500/20 text-emerald-400';
                if (b.status === 'Cancelled') badgeClass = 'bg-red-500/10 border-red-500/20 text-red-400';

                let actionHtml = `<span class="text-[9px] text-gray-600 uppercase font-bold tracking-wider">No Action</span>`;
                if (b.status === 'Pending') {
                    actionHtml = `
                        <button onclick="updateBookingStatus(${b.id}, 'Approved')" class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 hover:bg-emerald-500 hover:text-black transition px-2 py-1 text-[9px] font-bold uppercase tracking-widest rounded">Confirm</button>
                        <button onclick="updateBookingStatus(${b.id}, 'Cancelled')" class="bg-red-500/10 border border-red-500/30 text-red-400 hover:bg-red-500 hover:text-white transition px-2 py-1 text-[9px] font-bold uppercase tracking-widest rounded">Deny</button>
                    `;
                }

                let modelBadge = 'text-neon bg-neon/10 border-neon/20';
                if (b.model === 'VORTEX-X') modelBadge = 'text-cyan-400 bg-cyan-500/10 border-cyan-500/20';
                if (b.model === 'GHOST-R') modelBadge = 'text-white bg-white/10 border-white/20';

                tr.innerHTML = `
                    <td class="p-4">
                        <div class="font-bold text-white">${b.name}</div>
                        <div class="text-[10px] text-gray-500 lowercase">${b.email}</div>
                    </td>
                    <td class="p-4">
                        <span class="text-[10px] ${modelBadge} border px-2 py-0.5 font-heading font-bold uppercase tracking-widest rounded">
                            ${b.model}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="font-heading font-bold text-white">${formatDateLabel(b.date)}</div>
                        <div class="text-[9px] text-gray-500 uppercase tracking-widest">14:00 GMT+7</div>
                    </td>
                    <td class="p-4">
                        <span class="text-[9px] border px-2 py-0.5 rounded font-bold uppercase tracking-widest ${badgeClass}">
                            ${b.status}
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-1">${actionHtml}</td>
                `;
                quickContainer.appendChild(tr);
            });

            document.getElementById('quick-count-lbl').textContent = `Showing recent ${recentBookings.length} reservations`;

            // Render Full Bookings manager List
            renderFullBookingsTable();
        }

        // Render full list with optional filters
        function renderFullBookingsTable() {
            const statusFilter = document.getElementById('filter-status').value;
            const searchVal = document.getElementById('search-input-full').value.toLowerCase();
            
            const filtered = bookings.filter(b => {
                const matchesStatus = (statusFilter === 'All' || b.status === statusFilter);
                const matchesSearch = b.name.toLowerCase().includes(searchVal) || b.email.toLowerCase().includes(searchVal);
                return matchesStatus && matchesSearch;
            });

            const fullContainer = document.getElementById('full-booking-rows');
            fullContainer.innerHTML = '';

            filtered.forEach(b => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-black/20 transition';
                
                let badgeClass = 'bg-yellow-500/10 border-yellow-500/20 text-yellow-500';
                if (b.status === 'Approved') badgeClass = 'bg-emerald-500/10 border-emerald-500/20 text-emerald-400';
                if (b.status === 'Cancelled') badgeClass = 'bg-red-500/10 border-red-500/20 text-red-400';

                let actionHtml = `
                    <button onclick="deleteBooking(${b.id})" class="bg-gray-800/80 border border-gray-700 text-gray-400 hover:text-white transition px-2 py-1 text-[9px] font-bold uppercase tracking-widest rounded">Delete</button>
                `;
                if (b.status === 'Pending') {
                    actionHtml = `
                        <button onclick="updateBookingStatus(${b.id}, 'Approved')" class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 hover:bg-emerald-500 hover:text-black transition px-2 py-1 text-[9px] font-bold uppercase tracking-widest rounded">Confirm</button>
                        <button onclick="updateBookingStatus(${b.id}, 'Cancelled')" class="bg-red-500/10 border border-red-500/30 text-red-400 hover:bg-red-500 hover:text-white transition px-2 py-1 text-[9px] font-bold uppercase tracking-widest rounded">Deny</button>
                    `;
                }

                let modelBadge = 'text-neon bg-neon/10 border-neon/20';
                if (b.model === 'VORTEX-X') modelBadge = 'text-cyan-400 bg-cyan-500/10 border-cyan-500/20';
                if (b.model === 'GHOST-R') modelBadge = 'text-white bg-white/10 border-white/20';

                tr.innerHTML = `
                    <td class="p-4 font-bold text-white">${b.name}</td>
                    <td class="p-4">
                        <div class="text-white">${b.phone}</div>
                        <div class="text-[10px] text-gray-500 lowercase">${b.email}</div>
                    </td>
                    <td class="p-4">
                        <span class="text-[10px] ${modelBadge} border px-2 py-0.5 font-heading font-bold uppercase tracking-widest rounded">
                            ${b.model}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="font-heading font-bold text-white">${formatDateLabel(b.date)}</div>
                    </td>
                    <td class="p-4 text-gray-300">${b.location}</td>
                    <td class="p-4">
                        <span class="text-[9px] border px-2 py-0.5 rounded font-bold uppercase tracking-widest ${badgeClass}">
                            ${b.status}
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-1">${actionHtml}</td>
                `;
                fullContainer.appendChild(tr);
            });

            document.getElementById('full-table-footer').innerHTML = `<span>Showing ${filtered.length} reservations</span>`;
        }

        // Live filtering on quick table
        function filterQuickTable(val) {
            const query = val.toLowerCase();
            const rows = document.querySelectorAll('#quick-booking-rows tr');
            rows.forEach(row => {
                const name = row.querySelector('.font-bold').textContent.toLowerCase();
                if (name.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Filter full table based on active elements
        function filterFullTable() {
            renderFullBookingsTable();
        }

        // Confirm / Deny action handler
        function updateBookingStatus(id, newStatus) {
            const target = bookings.find(b => b.id === id);
            if (target) {
                target.status = newStatus;
                saveState();
                showToast(`Reservation for ${target.name} has been ${newStatus}.`, newStatus === 'Approved' ? 'success' : 'warn');
                addActivityLog(`${target.name}'s test drive was ${newStatus.toLowerCase()}.`, newStatus === 'Approved' ? 'neon' : 'red');
            }
        }

        // Delete Booking
        function deleteBooking(id) {
            const index = bookings.findIndex(b => b.id === id);
            if (index > -1) {
                const name = bookings[index].name;
                bookings.splice(index, 1);
                saveState();
                showToast(`Reservation for ${name} deleted successfully.`, 'error');
                addActivityLog(`Reservation entry for ${name} removed from registry.`, 'gray');
            }
        }

        // Create new Booking
        function createBooking(event) {
            event.preventDefault();
            const name = document.getElementById('form-name').value;
            const email = document.getElementById('form-email').value;
            const phone = document.getElementById('form-phone').value;
            const model = document.getElementById('form-model').value;
            const date = document.getElementById('form-date').value;
            const location = document.getElementById('form-location').value;

            const newId = bookings.length ? Math.max(...bookings.map(b => b.id)) + 1 : 1;
            const newBooking = { id: newId, name, email, phone, model, date, location, status: 'Pending' };

            bookings.push(newBooking);
            saveState();

            // Clear Form
            document.getElementById('create-booking-form').reset();
            showToast(`Added custom booking for ${name}!`, 'success');
            addActivityLog(`New reservation request submitted by ${name}.`, 'cyan');
        }

        // SPA View Switcher
        function switchView(viewName) {
            // Hide all panels
            document.querySelectorAll('.panel-view').forEach(panel => {
                panel.classList.add('hidden');
            });
            // Show active panel
            document.getElementById(`panel-${viewName}`).classList.remove('hidden');

            // Deactivate all sidebar items
            document.querySelectorAll('#sidebar-nav .nav-item').forEach(btn => {
                btn.classList.remove('bg-neon/10', 'text-neon');
                btn.classList.add('text-gray-400');
            });

            // Activate current item
            const activeBtn = document.querySelector(`#sidebar-nav [data-view="${viewName}"]`);
            if (activeBtn) {
                activeBtn.classList.remove('text-gray-400');
                activeBtn.classList.add('bg-neon/10', 'text-neon');
            }

            // Update main titles
            const titleEl = document.getElementById('main-banner-title');
            const descEl = document.getElementById('main-banner-desc');
            const breadcrumbEl = document.querySelector('.id-view-title');

            if (viewName === 'dashboard') {
                titleEl.textContent = 'System Intelligence Dashboard';
                descEl.textContent = 'Real-time status of reservations, configured vehicle specifications, and active user traffic.';
                breadcrumbEl.textContent = 'Live Telemetry';
            } else if (viewName === 'bookings') {
                titleEl.textContent = 'Bookings Manager';
                descEl.textContent = 'Manage, review, and filter test drive reservations dynamically.';
                breadcrumbEl.textContent = 'Bookings Manager';
            } else if (viewName === 'fleet') {
                titleEl.textContent = 'Fleet Pricing & Configuration';
                descEl.textContent = 'Configure baseline MSRP pricing models and specifications for flagship models.';
                breadcrumbEl.textContent = 'Fleet Control';
            } else if (viewName === 'telemetry') {
                titleEl.textContent = 'Cluster Diagnostics';
                descEl.textContent = 'Active system logs and CPU/RAM/Network utilization meters.';
                breadcrumbEl.textContent = 'System Telemetry';
            }
        }

        // Save Car Settings
        function saveCarSettings(car) {
            const input = document.getElementById(`price-${car}`);
            if (input) {
                showToast(`${car.toUpperCase()} settings saved successfully! MSRP: ${input.value}`, 'success');
                addActivityLog(`Configured base MSRP for ${car.toUpperCase()} to ${input.value}.`, 'white');
            }
        }

        // Diagnostics Simulation
        function runDiagnostics() {
            toggleModal('diagnostics-modal', true);
            
            document.getElementById('diag-artisan').textContent = 'checking...';
            document.getElementById('diag-artisan').className = 'text-yellow-500';
            document.getElementById('diag-vite').textContent = 'checking...';
            document.getElementById('diag-vite').className = 'text-yellow-500';
            document.getElementById('diag-db').textContent = 'checking...';
            document.getElementById('diag-db').className = 'text-yellow-500';
            document.getElementById('diag-node').textContent = 'checking...';
            document.getElementById('diag-node').className = 'text-yellow-500';

            setTimeout(() => {
                document.getElementById('diag-artisan').textContent = 'SERVING (127.0.0.1:8000)';
                document.getElementById('diag-artisan').className = 'text-neon';
                
                document.getElementById('diag-vite').textContent = 'READY (VITE V4.x)';
                document.getElementById('diag-vite').className = 'text-neon';

                document.getElementById('diag-db').textContent = 'INTEGRATED (sqlite)';
                document.getElementById('diag-db').className = 'text-neon';

                document.getElementById('diag-node').textContent = 'CONNECTED';
                document.getElementById('diag-node').className = 'text-neon';

                showToast('Diagnostics completed! Systems fully operational.', 'success');
            }, 1200);
        }

        // Simulated CSV Export
        function exportReport() {
            let csvContent = "data:text/csv;charset=utf-8,ID,Client Name,Email,Phone,Model,Date,Location,Status\n";
            bookings.forEach(b => {
                csvContent += `${b.id},"${b.name}",${b.email},${b.phone},"${b.model}",${b.date},"${b.location}",${b.status}\n`;
            });
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `NEO_DRIVE_Reservations_${new Date().toISOString().split('T')[0]}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            showToast('CSV report downloaded successfully.', 'success');
        }

        // Toggle Modal Helper
        function toggleModal(modalId, isVisible) {
            const modal = document.getElementById(modalId);
            if (isVisible) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }

        // Toast alert system
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            let colorClass = 'border-neon bg-black/90 text-neon';
            if (type === 'warn') colorClass = 'border-yellow-500 bg-black/90 text-yellow-500';
            if (type === 'error') colorClass = 'border-red-500 bg-black/90 text-red-500';

            toast.className = `border px-4 py-3 rounded text-xs font-semibold tracking-wider uppercase backdrop-blur-sm pointer-events-auto transition duration-500 translate-y-4 opacity-0 ${colorClass}`;
            toast.textContent = message;

            container.appendChild(toast);

            // Trigger animation
            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-4', 'opacity-0');
            });

            // Fadeout after 3.5s
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-[-4px]');
                setTimeout(() => {
                    container.removeChild(toast);
                }, 500);
            }, 3500);
        }

        // Add Live Activity Log
        function addActivityLog(message, color = 'neon') {
            const stream = document.getElementById('activity-stream');
            const div = document.createElement('div');
            div.className = 'flex items-start space-x-3 transition-all duration-500 translate-y-2 opacity-0';

            let bullet = '⚡';
            let colorStyle = 'text-neon';
            if (color === 'cyan') { bullet = '⚡'; colorStyle = 'text-cyan-400'; }
            if (color === 'red') { bullet = '⚠️'; colorStyle = 'text-red-500'; }
            if (color === 'gray') { bullet = '🗑️'; colorStyle = 'text-gray-500'; }

            div.innerHTML = `
                <span class="${colorStyle}">${bullet}</span>
                <div>
                    <p class="text-gray-300">${message}</p>
                    <span class="text-[9px] text-gray-600 block mt-1">Just now</span>
                </div>
            `;
            stream.insertBefore(div, stream.firstChild);

            requestAnimationFrame(() => {
                div.classList.remove('translate-y-2', 'opacity-0');
            });

            // Keep maximum 4 logs
            if (stream.children.length > 4) {
                stream.removeChild(stream.lastChild);
            }
        }

        // Helper date formatting
        function formatDateLabel(dateStr) {
            const date = new Date(dateStr);
            const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
            const days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
            
            const dayName = days[date.getDay()];
            const dayNum = date.getDate();
            const monthName = months[date.getMonth()];
            
            return `${dayName} ${dayNum} ${monthName} 2026`;
        }

        // Live Telemetry updates (CPU, RAM, Console logs)
        function initTelemetryMeters() {
            // Ticker CPU / RAM
            setInterval(() => {
                const cpu = Math.floor(Math.random() * 40) + 15; // 15-55
                const ram = Math.floor(Math.random() * 15) + 60; // 60-75
                const net = Math.floor(Math.random() * 8) + 8;    // 8-16ms

                // Telemetry dashboard page
                const cpuVal = document.getElementById('telemetry-cpu-val');
                const cpuBar = document.getElementById('telemetry-cpu-bar');
                const ramVal = document.getElementById('telemetry-ram-val');
                const ramBar = document.getElementById('telemetry-ram-bar');
                const netVal = document.getElementById('telemetry-net-val');
                const netBar = document.getElementById('telemetry-net-bar');

                if (cpuVal && cpuBar) {
                    cpuVal.textContent = `${cpu}%`;
                    cpuBar.style.width = `${cpu}%`;
                }
                if (ramVal && ramBar) {
                    ramVal.textContent = `${ram}%`;
                    ramBar.style.width = `${ram}%`;
                }
                if (netVal && netBar) {
                    netVal.textContent = `${net}ms`;
                    netBar.style.width = `${net * 5}%`;
                }

                // Latency header ticker
                document.getElementById('latency-ticker').textContent = `${net}ms`;
            }, 3000);

            // Console Stream Logs
            const terminal = document.getElementById('telemetry-console');
            const messages = [
                "API request incoming on GET /api/v1/telemetry...",
                "Client connection pool optimized successfully.",
                "Database response resolved within 4ms.",
                "Diagnostics integrity scan passed.",
                "Vite compiler asset bundling successfully cached.",
                "Live Node #4-Turin handshake completed.",
                "User telemetry ping completed: Latency: 11ms."
            ];

            setInterval(() => {
                if (!terminal) return;
                const time = new Date().toTimeString().split(' ')[0];
                const msg = messages[Math.floor(Math.random() * messages.length)];
                
                const logDiv = document.createElement('div');
                logDiv.textContent = `[${time}] ${msg}`;
                terminal.appendChild(logDiv);
                terminal.scrollTop = terminal.scrollHeight;

                if (terminal.children.length > 50) {
                    terminal.removeChild(terminal.firstChild);
                }
            }, 5000);
        }

        function clearConsole() {
            const console = document.getElementById('telemetry-console');
            if (console) console.innerHTML = '<div>[Console Cleared]</div>';
        }

        // Initialize state
        window.addEventListener('DOMContentLoaded', () => {
            loadState();
            initTelemetryMeters();

            // Populate initial activities
            addActivityLog("Rin Tohsaka requested test drive for VORTEX-X.", "cyan");
            addActivityLog("Alexander Novak requested test drive for NEO AVENTUS.", "neon");
            addActivityLog("Telemetry checked for Node #4-Turin. Everything stable.", "gray");
        });
    </script>
</body>
</html>
