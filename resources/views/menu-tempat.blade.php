<style>
    /* ==================================================================
       🏛️ FIX CORE: DROPDOWN & NAV BAR INTEGRATION (WARM THEME)
       ================================================================== */
    nav {
        background-color: #1e293b !important; 
        border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    }

    /* Warna tulisan menu asal navigasi cerah */
    nav a, nav span, nav div, nav svg {
        color: #e2e8f0 !important;
    }

    /* 🔥 FORCE DARK TEXT: Paksa tulisan nama 'Test User' & Butang Dropdown jadi Gelap Pekat */
    nav button, 
    nav [role="button"],
    nav div[class*="hidden sm:flex"] button, 
    nav button[class*="inline-flex items-center"],
    nav button[class*="inline-flex items-center"] *,
    nav div[class*="font-medium text-base"] {
        color: #0f172a !important; /* Warna Gelap Pekat (Slate 900) */
        background-color: #ffffff !important; /* Kotak Putih Bersih */
    }

    /* Kemaskan susun atur kotak nama butang Test User */
    nav button[class*="inline-flex items-center"],
    nav div[class*="hidden sm:flex"] button {
        padding-left: 14px !important;
        padding-right: 14px !important;
        padding-top: 6px !important;
        padding-bottom: 6px !important;
        border-radius: 10px !important;
        font-weight: 800 !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
        display: inline-flex !important;
        align-items: center !important;
        border: none !important;
    }

    /* Pastikan ikon anak panah kecil sebelah nama ikut jadi warna gelap */
    nav button[class*="inline-flex items-center"] svg,
    nav div[class*="hidden sm:flex"] button svg,
    nav button[class*="inline-flex items-center"] path {
        color: #0f172a !important;
        stroke: #0f172a !important;
        fill: none !important;
    }

    /* Terapungkan Dropdown List ke lapisan paling depan sekali */
    nav div[class*="origin-top-right"],
    nav .absolute,
    div[x-show="open"],
    div[class*="absolute right-0"] {
        z-index: 99999 !important;
        position: absolute !important;
        background-color: #ffffff !important;
        border: 1px solid rgba(15, 23, 42, 0.1) !important;
        border-radius: 12px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2) !important;
        padding: 6px !important;
    }

    /* Warna tulisan di dalam list menu apabila dropdown diklik buka */
    nav div[class*="origin-top-right"] a,
    nav div[class*="origin-top-right"] button,
    nav .absolute a,
    nav .absolute button,
    div[x-show="open"] a,
    div[x-show="open"] button {
        color: #1e293b !important; /* Kekal gelap dalam list dropdown */
        background-color: transparent !important;
        font-weight: 700 !important;
        font-size: 13px !important;
        border-radius: 8px !important;
        display: flex !important;
        width: 100% !important;
        padding: 8px 12px !important;
        box-shadow: none !important;
    }

    nav div[class*="origin-top-right"] a:hover, nav .absolute a:hover, div[x-show="open"] a:hover {
        background-color: #f1f5f9 !important;
        color: #f28c18 !important;
    }

    /* ------------------------------------------------------------------
       🎨 INTERFACE KAD GLASSMORPHISM WARM SAND (EDISI PREMIUM FASILITI)
       ------------------------------------------------------------------ */
    .glass-card-sand {
        background-color: rgba(251, 249, 244, 0.85);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .glass-card-sand:hover {
        transform: translateY(-8px);
        background-color: rgba(251, 249, 244, 0.95);
    }
</style>

<x-app-layout>
    <x-slot name="header">
        {{-- BANNER HEADER: SLATE CORPORATE BLUE CAP --}}
        <div class="bg-[#1e293b] p-5 rounded-2xl shadow-md flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative z-40 border border-slate-700/50">
            
            <h2 class="font-black text-xl text-white leading-tight flex items-center gap-3 tracking-wide">
                <div class="p-2 bg-slate-800 text-amber-400 rounded-xl border border-slate-700 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <span class="uppercase font-extrabold text-base tracking-wider text-slate-100">
                    {{ __('Senarai Tempat & Fasiliti KAB') }}
                </span>
            </h2>
            
            <div class="w-full sm:w-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white text-xs font-black tracking-wider uppercase rounded-xl border border-slate-700 shadow transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    {{-- INTERFACE BASE: GAMBAR LATAR BELAKANG KOLEJ KAB YANG WARM --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920');">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full relative z-20 space-y-10">
            
            {{-- SUBHEADLINE BANNER --}}
            <div class="text-left pb-4 border-b border-slate-900/10 flex justify-between items-end">
                <div>
                    <h3 class="text-xl font-black text-slate-900 tracking-wide uppercase bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-700">Sila Pilih Lokasi Tempahan Program</h3>
                    <p class="text-xs text-slate-600 mt-0.5 font-semibold">Pilih dewan atau ruang fizikal kolej bagi kelancaran penganjuran program anda.</p>
                </div>
                <span class="text-[10px] bg-slate-900 text-amber-400 border border-slate-700 shadow-sm font-black px-3 py-1.5 rounded-xl uppercase tracking-wider hidden sm:inline-block">
                    Direktori Bersepadu
                </span>
            </div>

            {{-- GRID TIGA KAD NEW WARM SAND STYLE --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                {{-- KAD 1: GELANGGANG SERBAGUNA --}}
                <div class="glass-card-sand rounded-[2rem] overflow-hidden flex flex-col justify-between group shadow-[0_30px_60px_-15px_rgba(0,0,0,0.2)] hover:shadow-[0_30px_50px_rgba(242,140,24,0.15)]">
                    <div>
                        <div class="overflow-hidden relative h-48 m-3 rounded-[1.5rem] shadow-inner">
                            <img class="h-full w-full object-cover transform group-hover:scale-105 transition-all duration-500" src="https://images.unsplash.com/photo-1544698310-74ea9d1c8258?q=80&w=600" alt="Gelanggang KAB">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 to-transparent"></div>
                            <span class="absolute top-3 right-3 px-3 py-1 bg-amber-500 text-slate-950 text-[9px] font-black uppercase tracking-wider rounded-lg shadow">Sukan & Rekreasi</span>
                        </div>
                        <div class="p-6 pt-2">
                            <h4 class="text-xl font-black text-slate-950 uppercase tracking-tight group-hover:text-amber-600 transition-colors duration-200">Gelanggang Serbaguna</h4>
                            <p class="text-xs text-slate-700 font-semibold mt-2.5 leading-relaxed">Hab sukan komuniti serbaguna Kolej KAB: Menyokong penuh pengurusan aktiviti Futsal, Badminton, Bola Tampar, serta latihan berkala Netball.</p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('bookings.create', ['kab_id' => 1]) }}" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3.5 bg-slate-900 hover:bg-slate-800 text-amber-400 font-black text-xs uppercase tracking-widest rounded-xl shadow-md transition duration-200">
                            ⚡ Pilih & Tempah Sekarang
                        </a>
                    </div>
                </div>

                {{-- KAD 2: SURAU AL-IMAN --}}
                <div class="glass-card-sand rounded-[2rem] overflow-hidden flex flex-col justify-between group shadow-[0_30px_60px_-15px_rgba(0,0,0,0.2)] hover:shadow-[0_30px_50px_rgba(242,140,24,0.15)]">
                    <div>
                        <div class="overflow-hidden relative h-48 m-3 rounded-[1.5rem] shadow-inner">
                            <img class="h-full w-full object-cover transform group-hover:scale-105 transition-all duration-500" src="https://images.unsplash.com/photo-1597935258735-e254c1839512?q=80&w=600" alt="Surau KAB">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 to-transparent"></div>
                            <span class="absolute top-3 right-3 px-3 py-1 bg-amber-500 text-slate-950 text-[9px] font-black uppercase tracking-wider rounded-lg shadow">Kerohanian</span>
                        </div>
                        <div class="p-6 pt-2">
                            <h4 class="text-xl font-black text-slate-950 uppercase tracking-tight group-hover:text-amber-600 transition-colors duration-200">Surau Al-Iman KAB</h4>
                            <p class="text-xs text-slate-700 font-semibold mt-2.5 leading-relaxed">Sektor pengurusan ruang ibadah kondusif: Disediakan khas untuk penganjuran solat berjemaah, majlis bacaan yasin, ceramah khas, dan usrah mahasiswa.</p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('bookings.create', ['kab_id' => 2]) }}" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3.5 bg-slate-900 hover:bg-slate-800 text-amber-400 font-black text-xs uppercase tracking-widest rounded-xl shadow-md transition duration-200">
                            ⚡ Pilih & Tempah Sekarang
                        </a>
                    </div>
                </div>

                {{-- KAD 3: DEWAN UTAMA --}}
                <div class="glass-card-sand rounded-[2rem] overflow-hidden flex flex-col justify-between group shadow-[0_30px_60px_-15px_rgba(0,0,0,0.2)] hover:shadow-[0_30px_50px_rgba(242,140,24,0.15)]">
                    <div>
                        <div class="overflow-hidden relative h-48 m-3 rounded-[1.5rem] shadow-inner">
                            <img class="h-full w-full object-cover transform group-hover:scale-105 transition-all duration-500" src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=600" alt="Dewan KAB">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 to-transparent"></div>
                            <span class="absolute top-3 right-3 px-3 py-1 bg-amber-500 text-slate-950 text-[9px] font-black uppercase tracking-wider rounded-lg shadow">Formal / Rasmi</span>
                        </div>
                        <div class="p-6 pt-2">
                            <h4 class="text-xl font-black text-slate-950 uppercase tracking-tight group-hover:text-amber-600 transition-colors duration-200">Dewan Utama KAB</h4>
                            <p class="text-xs text-slate-700 font-semibold mt-2.5 leading-relaxed">Infrastruktur perdana acara skala besar: Direka eksklusif bagi kelancaran majlis makan malam korporat, perhimpunan rasmi kolej, dan seminar mega.</p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('bookings.create', ['kab_id' => 3]) }}" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3.5 bg-slate-900 hover:bg-slate-800 text-amber-400 font-black text-xs uppercase tracking-widest rounded-xl shadow-md transition duration-200">
                            ⚡ Pilih & Tempah Sekarang
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>