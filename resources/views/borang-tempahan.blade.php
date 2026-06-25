<style>
    /* ==================================================================
       🏛️ THEME LUXURY GLASSMORPHISM & MAXIMUM DROPDOWN LAYER LOCK
       ================================================================== */
    
    /* Membuka sekatan limpahan container supaya dropdown profil tidak tersangkut di belakang */
    html, body, main, app-layout, #app, .py-12,
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <span class="uppercase font-extrabold text-base tracking-wider text-slate-100">
                    {{ __('Permohonan Tempahan Baru') }}
                </span>
            </h2>
            
            {{-- BUTTONS NAVIGASI PANTAS --}}
            <div class="flex items-center gap-3 w-full sm:w-auto">
                <a href="{{ route('bookings.status') }}" class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-600 hover:brightness-110 text-white text-xs font-black tracking-wider uppercase rounded-xl shadow transition duration-150">
                    📋 Semak Status
                </a>
                
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white text-xs font-black uppercase tracking-wider rounded-xl border border-slate-700 shadow transition duration-150">
                    ⬅️ Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    {{-- INTERFACE BASE: GAMBAR LATAR BELAKANG KOLEJ KAB YANG WARM (Z-10 MATCHING) --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920');">

        {{-- Bungkusan utama dipastikan mengikut hierarki z-20 --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-20">
            
            {{-- GRID UTAMA FORM & SIDEBAR --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                {{-- KAWASAN KIRI (2 PER TIGA): KAD INTEGRASI BORANG UTAMA (FROSTED WARM SAND GLASS) --}}
                <div class="lg:col-span-2 bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] rounded-3xl">
                    
                    {{-- HEADER INTERNAL BORANG --}}
                    <div class="p-6 sm:p-8 border-b border-slate-900/10">
                        <h3 class="text-base font-black text-slate-800 tracking-wide flex items-center gap-2 uppercase">
                            📝 Borang Maklumat (Sesi {{ Auth::user()->role === 'student' ? 'Pelajar' : 'Bukan Pelajar/Staf' }})
                        </h3>
                        <p class="text-slate-600 text-xs mt-0.5 font-semibold">Sila pastikan segala maklumat tarikh dan tujuan adalah rasmi.</p>
                    </div>

                    <form action="{{ route('bookings.store') }}" method="POST" class="p-6 sm:p-8 space-y-6">
                        @csrf

                        {{-- SELECTIONS FASILITI DINAMIK --}}
                        <div>
                            <label for="kab_id" class="block text-xs font-black uppercase tracking-wider text-slate-800 mb-2">Pilih Fasiliti / Peralatan</label>
                            <select id="kab_id" name="kab_id" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 outline-none transition duration-150 text-sm font-semibold shadow-sm" required>
                                <option value="" class="text-slate-500">-- Sila Pilih Fasiliti Semasa --</option>
                                @foreach($kabs as $fasiliti)
                                    <option value="{{ $fasiliti->id }}" {{ request('kab_id') == $fasiliti->id ? 'selected' : '' }} class="text-slate-800 text-xs">
                                        [{{ strtoupper($fasiliti->kategori) }}] {{ $fasiliti->nama_kab }} {{ $fasiliti->no_kab ? '('.$fasiliti->no_kab.')' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- GRID INPUT TARIKH & MASA --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="tarikh_guna" class="block text-xs font-black uppercase tracking-wider text-slate-800 mb-2">Tarikh Guna</label>
                                <input type="date" id="tarikh_guna" name="tarikh_guna" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 outline-none transition duration-150 text-sm font-semibold shadow-sm" required>
                            </div>
                            <div>
                                <label for="masa_mula" class="block text-xs font-black uppercase tracking-wider text-slate-800 mb-2">Masa Mula</label>
                                <input type="time" id="masa_mula" name="masa_mula" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 outline-none transition duration-150 text-sm font-semibold shadow-sm" required>
                            </div>
                            <div>
                                <label for="masa_tamat" class="block text-xs font-black uppercase tracking-wider text-slate-800 mb-2">Masa Tamat</label>
                                <input type="time" id="masa_tamat" name="masa_tamat" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 outline-none transition duration-150 text-sm font-semibold shadow-sm" required>
                            </div>
                        </div>

                        {{-- TUJUAN TEMPAHAN --}}
                        <div>
                            <label for="tujuan_tempahan" class="block text-xs font-black uppercase tracking-wider text-slate-800 mb-2">Tujuan Tempahan / Nama Program</label>
                            <textarea id="tujuan_tempahan" name="tujuan_tempahan" rows="4" placeholder="Contoh: Mesyuarat Ahli Jawatankuasa MEP / Aktiviti Staf..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-800 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 outline-none transition duration-150 text-sm font-semibold shadow-sm" required></textarea>
                        </div>

                        {{-- AMARAN PERTINDIHAN SLOT --}}
                        @error('booking_conflict')
                            <div class="mt-4 p-4 text-sm text-rose-800 rounded-xl bg-rose-500/10 border border-rose-500/20 flex items-center gap-2" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-rose-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <div>
                                    <span class="font-black text-rose-700">Slot Bertindih!</span> {{ $message }}
                                </div>
                            </div>
                        @enderror

                        {{-- BUTTON SUBMIT --}}
                        <div class="flex justify-end pt-5 border-t border-slate-900/10 mt-4">
                            <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-md transition duration-150 flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Hantar Permohonan Tempahan
                            </button>
                        </div>
                    </form>
                </div>

                {{-- SEKSYEN KANAN (1 PER TIGA): SIDEBAR PANDUAN MATCHING --}}
                <div class="flex flex-col gap-6 w-full lg:mt-0">
                    
                    {{-- Blok Informasi Peraturan Isian --}}
                    <div class="bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] p-6 rounded-3xl">
                        <h4 class="text-slate-900 font-black flex items-center gap-2 mb-4 tracking-wider uppercase text-xs">
                            💡 Peringatan Pengisian
                        </h4>
                        <ul class="space-y-4 text-xs font-semibold text-slate-700">
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-black">✔</span>
                                <span>Pastikan tarikh mula dan tamat tidak bertembung dengan aktiviti rasmi universiti.</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-black">✔</span>
                                <span>Nyatakan nama penuh program pada medan tujuan dengan jelas bagi mengelakkan penolakan permohonan.</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-black">✔</span>
                                <span>Anda boleh menyemak semula rekod status pada butang kelulusan di bahagian atas pada bila-bila masa.</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Blok Bantuan Khidmat Sokongan --}}
                    <div class="bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-sm p-4 rounded-2xl text-center">
                        <p class="text-[11px] text-slate-500 font-bold leading-relaxed">
                            Sistem e-Booking KAB dikawal selia sepenuhnya oleh Unit Pengurusan Fasiliti & Logistik Kolej Kediaman KAB.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>