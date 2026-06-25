<style>
    /* ==================================================================
       🏛️ FIX CORE: DROPDOWN NAVIGATION LAYER REPAIR
       ================================================================== */
    nav {
        background-color: #1e293b !important; 
        border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    }

    /* Memastikan tulisan menu teks navigasi utama cerah, KECUALI butang nama user */
    nav button, nav [role="button"], nav a {
        color: #e2e8f0 !important;
    }

    /* KHAS: Menggelapkan tulisan nama 'Test User' pada butang menu atas supaya nampak jelas */
    nav div[class*="hidden sm:flex"] button, 
    nav button[class*="inline-flex items-center"],
    nav div[class*="font-medium text-base"] {
        color: #0f172a !important; /* Warna Slate Gelap Pekat */
        background-color: #ffffff !important; /* Latar belakang putih lembut untuk butang */
        padding-left: 14px !important;
        padding-right: 14px !important;
        padding-top: 6px !important;
        padding-bottom: 6px !important;
        border-radius: 10px !important;
        font-weight: 800 !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
    }

    /* Memastikan dropdown terkeluar di lapisan paling depan tanpa tersekat */
    nav div[class*="origin-top-right"],
    nav .absolute,
    div[x-show="open"],
    div[class*="absolute right-0"] {
        z-index: 99999 !important;
        position: absolute !important;
        background-color: #ffffff !important;
        border: 1px solid rgba(15, 23, 42, 0.1) !important;
        border-radius: 12px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1) !important;
        padding: 6px !important;
    }

    nav div[class*="origin-top-right"] a,
    nav div[class*="origin-top-right"] button,
    nav .absolute a,
    nav .absolute button {
        color: #1e293b !important;
        font-weight: 700 !important;
        font-size: 13px !important;
        border-radius: 8px !important;
        transition: all 0.15s ease !important;
        display: flex !important;
        width: 100% !important;
        padding: 8px 12px !important;
    }

    nav div[class*="origin-top-right"] a:hover, 
    nav div[class*="origin-top-right"] button:hover,
    nav .absolute a:hover {
        background-color: #f1f5f9 !important;
        color: #f28c18 !important;
    }

    /* ------------------------------------------------------------------
       🎨 INTERFACE KAD GLASSMORPHISM WARM SAND
       ------------------------------------------------------------------ */
    .glass-card-sand {
        background-color: rgba(251, 249, 244, 0.82);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .animate-spin-slow {
        animation: spin 8s linear infinite;
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>

<x-app-layout>
    <x-slot name="header">
        {{-- BANNER HEADER: SLATE CORPORATE BLUE CAP --}}
        <div class="bg-[#1e293b] p-5 rounded-2xl shadow-md flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative z-40 border border-slate-700/50">
            
            <h2 class="font-black text-xl text-white leading-tight flex items-center gap-3 tracking-wide">
                <div class="p-2 bg-slate-800 text-amber-400 rounded-xl border border-slate-700 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <span class="uppercase font-extrabold text-base tracking-wider text-slate-100">
                    {{ __('Sistem e-Booking Kolej KAB') }}
                </span>
            </h2>
            
            {{-- NAVIGATION BUTTONS --}}
            <div class="flex items-center gap-3 w-full sm:w-auto">
                <a href="{{ route('bookings.status') }}" class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-600 hover:brightness-110 text-white text-xs font-black tracking-wider uppercase rounded-xl shadow-lg shadow-orange-500/20 transition duration-150">
                    📋 Semak Status Tempahan
                </a>

                <a href="{{ route('bookings.create') }}" class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white text-xs font-black tracking-wider uppercase rounded-xl border border-slate-700 shadow transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/xl" class="h-3.5 w-3.5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Borang Tempahan
                </a>
            </div>
        </div>
    </x-slot>

    {{-- INTERFACE BASE: GAMBAR LATAR BELAKANG KOLEJ KAB YANG WARM --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920');">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full relative z-20 space-y-10">
            
            {{-- Welcome Box Glassmorphism Translucent --}}
            <div class="bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 p-4 rounded-2xl flex items-center shadow-[0_20px_40px_-15px_rgba(0,0,0,0.15)]">
                <div class="p-2.5 bg-slate-900 text-amber-400 rounded-xl mr-4 border border-slate-700 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-spin-slow" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <p class="text-sm text-slate-800 font-semibold tracking-wide">
                    Selamat Kembali, <span class="text-slate-900 font-black underline decoration-amber-500/40 decoration-2">{{ Auth::user()->name }}</span>! Sila pilih kategori urusan tempahan anda.
                </p>
            </div>

            {{-- Tajuk Sektor --}}
            <div class="text-left pb-4 border-b border-slate-900/10 flex justify-between items-end">
                <div>
                    <h3 class="text-xl font-black text-slate-900 tracking-wide uppercase bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-700">Kategori Direktori Fasiliti</h3>
                    <p class="text-xs text-slate-600 mt-0.5 font-semibold">Sila pilih jenis aset fizikal atau logistik untuk penempahan bersepadu.</p>
                </div>
                <span class="text-[10px] bg-slate-900 text-amber-400 border border-slate-700 shadow-sm font-black px-3 py-1.5 rounded-xl uppercase tracking-wider hidden sm:inline-block">
                    Kolej KAB Teraju
                </span>
            </div>

            {{-- GRID UTAMA KAD CLASSMORPHISM SAND --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- KAD 1: SEKTOR TEMPAT & RUANG --}}
                <div class="glass-card-sand lg:col-span-1 p-8 rounded-[2rem] flex flex-col items-center justify-between text-center group shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] hover:shadow-[0_30px_50px_rgba(37,99,235,0.15)] hover:-translate-y-2">
                    <div class="flex flex-col items-center w-full">
                        <div class="w-16 h-16 bg-blue-500/10 border border-blue-500/20 text-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-slate-900 tracking-tight uppercase">Tempat & Ruang</h4>
                        <p class="text-xs text-slate-600 mt-3 leading-relaxed font-semibold px-2">
                            Dewan Besar Utama, Gelanggang Sukan Berpusat, Surau Al-Iman, dan Pusat Aktiviti Kemahasiswaan.
                        </p>
                    </div>

                    <a href="{{ route('fasiliti.tempat') }}" class="mt-8 w-full py-4 bg-blue-600 hover:bg-blue-700 text-white text-xs font-black uppercase tracking-widest rounded-xl flex items-center justify-center gap-2 shadow-lg shadow-blue-600/20 transition duration-150">
                        Uruskan Tempahan
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 transform group-hover:translate-x-1 transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                {{-- KAD 2: SEKTOR PERALATAN LOGISTIK --}}
                <div class="glass-card-sand lg:col-span-1 p-8 rounded-[2rem] flex flex-col items-center justify-between text-center group shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] hover:shadow-[0_30px_50px_rgba(5,150,105,0.15)] hover:-translate-y-2">
                    <div class="flex flex-col items-center w-full">
                        <div class="w-16 h-16 bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-slate-900 tracking-tight uppercase">Peralatan Logistik</h4>
                        <p class="text-xs text-slate-600 mt-3 leading-relaxed font-semibold px-2">
                            Sistem PA Studio, PA Bergerak, Set Khemah Kanopi, Kerusi Kuliah, Meja Banquet, dan Alatan Kejuruteraan.
                        </p>
                    </div>

                    <a href="{{ route('fasiliti.peralatan') }}" class="mt-8 w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black uppercase tracking-widest rounded-xl flex items-center justify-center gap-2 shadow-lg shadow-emerald-600/20 transition duration-150">
                        Uruskan Tempahan
                        <svg xmlns="http://www.w3.org/2000/xl" class="h-3.5 w-3.5 transform group-hover:translate-x-1 transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                {{-- KAD KANAN: PANEL INFOGRAFIK PANDUAN --}}
                <div class="lg:col-span-1 flex flex-col gap-6">
                    <div class="bg-[#fbf9f4]/80 backdrop-blur-md p-6 rounded-[2rem] border border-white/40 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] text-left">
                        <h5 class="text-slate-900 font-black text-xs tracking-wider uppercase flex items-center gap-2 mb-4">
                            ⚡ PROSEDUR ALUR SISTEM
                        </h5>
                        <ul class="space-y-3.5 text-xs text-slate-700 font-semibold">
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-lg bg-slate-900 text-amber-400 border border-slate-700 flex items-center justify-center font-black text-[10px] shrink-0 shadow-sm">01</span>
                                <span class="leading-relaxed">Pilih kluster aset pengurusan utama sama ada fizikal atau peralatan logistik.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-lg bg-slate-900 text-amber-400 border border-slate-700 flex items-center justify-center font-black text-[10px] shrink-0 shadow-sm">02</span>
                                <span class="leading-relaxed">Lakukan semakan ketersediaan pada kalendar fasiliti secara langsung.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-lg bg-slate-900 text-amber-400 border border-slate-700 flex items-center justify-center font-black text-[10px] shrink-0 shadow-sm">03</span>
                                <span class="leading-relaxed">Isi borang justifikasi permohonan berserta lampiran dokumen program anda.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-5 h-5 rounded-lg bg-slate-900 text-amber-400 border border-slate-700 flex items-center justify-center font-black text-[10px] shrink-0 shadow-sm">04</span>
                                <span class="leading-relaxed">Pantau kelulusan menerusi sub-menu Semak Status di bahagian atas.</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Amaran Klausa Syarat --}}
                    <div class="bg-amber-500/10 backdrop-blur-md p-4 rounded-2xl border border-amber-500/20 shadow-md text-left">
                        <p class="text-[11px] text-amber-900 leading-relaxed font-bold flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-700 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            <span><strong class="text-amber-950 uppercase tracking-wide text-[10px] block mb-0.5">Notifikasi Penting:</strong> Pihak pengurusan berhak menolak permohonan yang dihantar kurang dari tempoh 3 hari bekerja demi menjaga kualiti logistik program.</span>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>