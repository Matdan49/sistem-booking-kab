<style>
    /* ==================================================================
       🏛️ THEME LUXURY GLASSMORPHISM & MAXIMUM DROPDOWN LAYER LOCK
       ================================================================== */
    
    /* Membuka sekatan limpahan container supaya dropdown profil tidak tersangkut di belakang */
    html, body, main, app-layout, #app, .py-12, .py-16,
    header, .max-w-7xl, div[class*="max-w"], div[class*="mx-auto"], x-slot[name="header"] {
        overflow: visible !important;
    }

    /* Lapisan navigasi utama kekal konsisten (Deep Navy Slate) */
    nav, #navigation-menu {
        position: relative !important;
        z-index: 50 !important;
        overflow: visible !important;
        background-color: #1e293b !important; 
        border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    }

    /* Kotak Dropdown Profil terapung di lapisan paling depan (Z-Index Maksimum) */
    nav [class*="origin-top-right"],
    nav .absolute {
        z-index: 99999 !important;
        background-color: #ffffff !important;
        border: 1px solid rgba(15, 23, 42, 0.08) !important;
        border-radius: 12px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
        padding: 6px !important;
    }

    /* Warna Teks di dalam Dropdown Menu */
    nav [class*="origin-top-right"] a,
    nav [class*="origin-top-right"] button,
    nav .absolute a,
    nav .absolute button {
        color: #334155 !important;
        font-weight: 700 !important;
        font-size: 13px !important;
        border-radius: 8px !important;
        transition: all 0.15s ease !important;
    }

    /* Kesan sorotan (Hover) dropdown */
    nav [class*="origin-top-right"] a:hover, 
    nav .absolute a:hover,
    nav [class*="origin-top-right"] button:hover {
        background-color: #f1f5f9 !important;
        color: #f28c18 !important;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        {{-- BANNER HEADER: SLATE CORPORATE BLUE CAP --}}
        <div class="bg-[#1e293b] p-5 rounded-2xl shadow-md flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative z-40 border border-slate-700/50">
            
            <h2 class="font-black text-xl text-white leading-tight flex items-center gap-3 tracking-wide">
                <div class="p-2 bg-slate-800 text-amber-400 rounded-xl border border-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <span class="uppercase font-extrabold text-base tracking-wider text-slate-100">
                    {{ __('Senarai Peralatan Logistik KAB') }}
                </span>
            </h2>
            
            <div>
                {{-- Pautan Balik ke Menu Dashboard Utama --}}
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold uppercase tracking-widest rounded-xl border border-slate-700 transition duration-150 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Dashboard Utama
                </a>
            </div>
        </div>
    </x-slot>

    {{-- INTERFACE BASE: GAMBAR LATAR BELAKANG KOLEJ KAB YANG WARM (Z-10 MATCHING) --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920');">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-20">
            
            {{-- SUBHEADLINE BANNER --}}
            <div class="text-center mb-10">
                <p class="text-xs uppercase font-black text-amber-500 tracking-widest drop-shadow-sm">Aset & Peralatan Kolej</p>
                <h3 class="text-2xl font-black text-slate-800 tracking-tight mt-1 uppercase">Sila Pilih Logistik Keperluan Program</h3>
            </div>

            {{-- GRID TIGA KAD PRESTIGE GLASSMORPHISM (FROSTED WARM SAND GLASS) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                {{-- KAD 1: PA SYSTEM --}}
                <div class="group bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] rounded-3xl overflow-hidden flex flex-col justify-between transform hover:-translate-y-2 transition-all duration-300">
                    <div>
                        <div class="overflow-hidden relative h-48 border-b border-slate-900/10">
                            <img class="h-full w-full object-cover transform group-hover:scale-105 transition-all duration-500" src="https://images.unsplash.com/photo-1484755560693-a4074577af3a?q=80&w=600" alt="PA System">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                            <span class="absolute top-4 right-4 px-3 py-1 bg-amber-500 text-white text-[10px] font-black uppercase tracking-wider rounded-lg shadow">Audio & Sistem Siar Raya</span>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-black text-slate-800 group-hover:text-amber-600 transition-colors duration-300 uppercase">Set PA System & Mikrofon</h4>
                            <p class="text-xs text-slate-600 font-semibold mt-2 leading-relaxed">Set pembesar suara akustik mudah alih berkualiti tinggi beserta mikrofon tanpa wayar (wireless) untuk kegunaan acara kolej.</p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('bookings.create', ['kab_id' => 4]) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-md transition duration-150">
                            ⚡ Pilih & Tempah Peralatan
                        </a>
                    </div>
                </div>

                {{-- KAD 2: KANOPI --}}
                <div class="group bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] rounded-3xl overflow-hidden flex flex-col justify-between transform hover:-translate-y-2 transition-all duration-300">
                    <div>
                        <div class="overflow-hidden relative h-48 border-b border-slate-900/10">
                            <img class="h-full w-full object-cover transform group-hover:scale-105 transition-all duration-500" src="https://images.unsplash.com/photo-1561489413-985b06da5bee?q=80&w=600" alt="Kanopi">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                            <span class="absolute top-4 right-4 px-3 py-1 bg-amber-500 text-white text-[10px] font-black uppercase tracking-wider rounded-lg shadow">Struktur Luar</span>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-black text-slate-800 group-hover:text-amber-600 transition-colors duration-300 uppercase">Kanopi / Khemah Piramid</h4>
                            <p class="text-xs text-slate-600 font-semibold mt-2 leading-relaxed">Khemah kanopi kukuh saiz standard 20x20 kaki, amat ideal untuk aktiviti jualan mega, pesta sukan, mahupun pameran terbuka luar dewan.</p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('bookings.create', ['kab_id' => 5]) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-md transition duration-150">
                            ⚡ Pilih & Tempah Peralatan
                        </a>
                    </div>
                </div>

                {{-- KAD 3: MEJA & KERUSI --}}
                <div class="group bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] rounded-3xl overflow-hidden flex flex-col justify-between transform hover:-translate-y-2 transition-all duration-300">
                    <div>
                        <div class="overflow-hidden relative h-48 border-b border-slate-900/10">
                            <img class="h-full w-full object-cover transform group-hover:scale-105 transition-all duration-500" src="https://images.unsplash.com/photo-1517502884422-41eaaced0168?q=80&w=600" alt="Meja Kerusi">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                            <span class="absolute top-4 right-4 px-3 py-1 bg-amber-500 text-white text-[10px] font-black uppercase tracking-wider rounded-lg shadow">Kelengkapan Asas</span>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-black text-slate-800 group-hover:text-amber-600 transition-colors duration-300 uppercase">Set Meja Lipat & Kerusi Plastik</h4>
                            <p class="text-xs text-slate-600 font-semibold mt-2 leading-relaxed">Logistik tambahan berkapasiti tinggi yang merangkumi meja banquet lipat dan kerusi plastik untuk kaunter pendaftaran atau tetamu.</p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('bookings.create', ['kab_id' => 6]) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-md transition duration-150">
                            ⚡ Pilih & Tempah Peralatan
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>