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
                <h3 class="text-2xl font-black text-slate-800 tracking-tight mt-1 uppercase bg-white/70 inline-block px-6 py-2 rounded-xl backdrop-blur-sm shadow-sm border border-white/50">Sila Pilih Logistik Keperluan Program</h3>
            </div>

            {{-- GRID KAD PRESTIGE GLASSMORPHISM (KINI DINAMIK) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse($senarai_peralatan as $fasiliti)
                    <div class="group bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] rounded-3xl overflow-hidden flex flex-col justify-between transform hover:-translate-y-2 transition-all duration-300">
                        <div>
                            <div class="overflow-hidden relative h-48 border-b border-slate-900/10 bg-slate-200">
                                {{-- Gambar dari pangkalan data, fallback ke gambar lalai jika tiada --}}
                                <img class="h-full w-full object-cover transform group-hover:scale-105 transition-all duration-500" 
                                     src="{{ $fasiliti->gambar ? asset('images/fasiliti/' . $fasiliti->gambar) : 'https://images.unsplash.com/photo-1516280440502-a16f6b0fbe63?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' }}" 
                                     alt="{{ $fasiliti->nama_kab }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                                <span class="absolute top-4 right-4 px-3 py-1 bg-amber-500 text-white text-[10px] font-black uppercase tracking-wider rounded-lg shadow">Peralatan</span>
                            </div>
                            <div class="p-6">
                                <h4 class="text-xl font-black text-slate-800 group-hover:text-amber-600 transition-colors duration-300 uppercase">{{ $fasiliti->nama_kab }}</h4>
                                <p class="text-xs text-slate-600 font-semibold mt-2 leading-relaxed">{{ $fasiliti->deskripsi }}</p>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            @if($fasiliti->status == 'available')
                                <a href="{{ route('bookings.create', ['kab_id' => $fasiliti->id]) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-md transition duration-150">
                                    ⚡ Pilih & Tempah Peralatan
                                </a>
                            @else
                                <button class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-slate-400 text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-inner cursor-not-allowed" disabled>
                                    ⛔ Tidak Tersedia
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    {{-- Mesej jika tiada peralatan didaftarkan dalam sistem --}}
                    <div class="col-span-full py-16 text-center bg-white/50 backdrop-blur-sm rounded-3xl border border-white/60 shadow-sm">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-slate-200 text-slate-500 mb-5 shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-black text-slate-900 uppercase tracking-wide">Tiada Peralatan Direkodkan</h3>
                        <p class="text-sm text-slate-600 mt-2 font-medium max-w-md mx-auto leading-relaxed">Sistem belum mempunyai data logistik. Sila minta pihak pentadbir Kolej Aminuddin Baki untuk menambah senarai peralatan baharu.</p>
                    </div>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>