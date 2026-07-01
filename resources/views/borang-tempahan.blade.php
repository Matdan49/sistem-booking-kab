<style>
    /* ==================================================================
       🏛️ THEME LUXURY GLASSMORPHISM & MAXIMUM DROPDOWN LAYER LOCK
       ================================================================== */
    html, body, main, app-layout, #app, .py-12,
    header, .max-w-7xl, div[class*="max-w"], div[class*="mx-auto"], x-slot[name="header"] {
        overflow: visible !important;
    }

    nav, #navigation-menu {
        position: relative !important;
        z-index: 50 !important;
        overflow: visible !important;
        background-color: #1e293b !important; 
        border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    }

    nav [class*="origin-top-right"],
    nav .absolute {
        z-index: 99999 !important;
        background-color: #ffffff !important;
        border: 1px solid rgba(15, 23, 42, 0.08) !important;
        border-radius: 12px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
        padding: 6px !important;
    }

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

    nav [class*="origin-top-right"] a:hover, 
    nav .absolute a:hover,
    nav [class*="origin-top-right"] button:hover {
        background-color: #f1f5f9 !important;
        color: #f28c18 !important;
    }
</style>

@section('title', 'Borang Tempahan')
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                    Semak Status
                </a>
                
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white text-xs font-black uppercase tracking-wider rounded-xl border border-slate-700 shadow transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    {{-- INTERFACE BASE: GAMBAR LATAR BELAKANG KOLEJ KAB YANG WARM --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920'); mt-[-1rem]">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-20 mt-2">
            
            {{-- GRID UTAMA FORM & SIDEBAR --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                {{-- KAWASAN KIRI: KAD BORANG UTAMA --}}
                <div class="lg:col-span-2 bg-[#fbf9f4]/90 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] rounded-3xl">
                    
                    {{-- HEADER INTERNAL BORANG --}}
                    <div class="p-6 sm:p-8 border-b border-slate-900/10">
                        <h3 class="text-base font-black text-slate-800 tracking-wide flex items-center gap-2 uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            Borang Maklumat (Sesi {{ Auth::user()->role === 'student' ? 'Pelajar' : 'Bukan Pelajar/Staf' }})
                        </h3>
                        <p class="text-slate-600 text-xs mt-1 font-semibold">Sila pastikan segala maklumat tarikh dan tujuan adalah rasmi.</p>
                    </div>

                    <form action="{{ route('bookings.store') }}" method="POST" class="p-6 sm:p-8 space-y-6">
                        @csrf

                        {{-- SELECTIONS FASILITI DINAMIK --}}
                        <div>
                            <label for="kab_id" class="block text-[11px] font-black uppercase tracking-wider text-slate-800 mb-2">Pilih Fasiliti / Peralatan</label>
                            <div class="relative">
                                <select id="kab_id" name="kab_id" class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition duration-150 text-sm font-bold shadow-sm appearance-none" required>
                                    <option value="" class="text-slate-500">-- Sila Pilih Fasiliti Semasa --</option>
                                    @foreach($kabs as $fasiliti)
                                        <option value="{{ $fasiliti->id }}" {{ request('kab_id') == $fasiliti->id ? 'selected' : '' }} class="text-slate-800 font-semibold">
                                            [{{ strtoupper($fasiliti->kategori) }}] {{ $fasiliti->nama_kab }} {{ $fasiliti->no_kab ? '('.$fasiliti->no_kab.')' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                            </div>
                        </div>

                        {{-- GRID INPUT TARIKH & MASA (FLATPICKR UPGRADE) --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- KOTAK MULA --}}
                            <div class="bg-white/70 p-5 rounded-2xl border border-slate-200/60 shadow-sm relative mt-2">
                                <div class="absolute -top-3 left-4 px-3 py-0.5 bg-[#fbf9f4] text-[10px] font-black uppercase tracking-widest text-slate-500 rounded-full border border-slate-200 shadow-sm">
                                    Mula Sesi
                                </div>
                                <div class="grid grid-cols-5 gap-3 mt-2">
                                    <div class="col-span-3">
                                        <label for="tarikh_mula" class="block text-[10px] font-black uppercase tracking-wider text-slate-700 mb-1.5">Tarikh Mula</label>
                                        <input type="text" id="tarikh_mula" name="tarikh_mula" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-sm font-bold shadow-inner" placeholder="Pilih Tarikh" required>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="masa_mula" class="block text-[10px] font-black uppercase tracking-wider text-slate-700 mb-1.5">Masa</label>
                                        <input type="text" id="masa_mula" name="masa_mula" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-sm font-bold shadow-inner text-center" placeholder="00:00" required>
                                    </div>
                                </div>
                            </div>

                            {{-- KOTAK TAMAT --}}
                            <div class="bg-white/70 p-5 rounded-2xl border border-slate-200/60 shadow-sm relative mt-2">
                                <div class="absolute -top-3 left-4 px-3 py-0.5 bg-[#fbf9f4] text-[10px] font-black uppercase tracking-widest text-slate-500 rounded-full border border-slate-200 shadow-sm">
                                    Tamat Sesi
                                </div>
                                <div class="grid grid-cols-5 gap-3 mt-2">
                                    <div class="col-span-3">
                                        <label for="tarikh_tamat" class="block text-[10px] font-black uppercase tracking-wider text-slate-700 mb-1.5">Tarikh Tamat</label>
                                        <input type="text" id="tarikh_tamat" name="tarikh_tamat" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-sm font-bold shadow-inner" placeholder="Pilih Tarikh" required>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="masa_tamat" class="block text-[10px] font-black uppercase tracking-wider text-slate-700 mb-1.5">Masa</label>
                                        <input type="text" id="masa_tamat" name="masa_tamat" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-sm font-bold shadow-inner text-center" placeholder="00:00" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TUJUAN TEMPAHAN --}}
                        <div>
                            <label for="tujuan_tempahan" class="block text-[11px] font-black uppercase tracking-wider text-slate-800 mb-2">Tujuan Tempahan / Nama Program</label>
                            <textarea id="tujuan_tempahan" name="tujuan_tempahan" rows="4" placeholder="Contoh: Mesyuarat Ahli Jawatankuasa MEP / Aktiviti Staf..." class="w-full bg-white/80 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition duration-150 text-sm font-bold shadow-sm" required></textarea>
                        </div>

                        {{-- AMARAN PERTINDIHAN SLOT --}}
                        @error('booking_conflict')
                            <div class="mt-4 p-4 text-sm text-rose-800 rounded-xl bg-rose-50 border border-rose-200 flex items-start gap-3 shadow-sm" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-rose-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <div>
                                    <span class="font-black text-rose-800 uppercase tracking-wider text-[11px] block mb-1">Slot Bertindih!</span> 
                                    <span class="font-semibold">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror

                        {{-- 🚀 KOTAK INFO CAJ (HANYA MUNCUL UNTUK BUKAN PELAJAR) --}}
                        @if(Auth::user()->role === 'non-student')
                            <div class="mt-6 p-4 bg-amber-50 border border-amber-200 rounded-xl flex items-start gap-3 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <h4 class="text-[11px] font-black text-amber-900 uppercase tracking-wider">Maklumat Caj Tempahan</h4>
                                    <p class="text-[11px] text-amber-800 font-bold mt-1.5 leading-relaxed">
                                        Kadar tetap sebanyak <span class="bg-amber-200 text-amber-900 px-1.5 py-0.5 rounded shadow-sm">RM 5.00/hari</span> akan dikenakan untuk kategori Staf / Bukan Pelajar. Pembayaran perlu dijelaskan di Pejabat Pengurusan KAB selepas permohonan diluluskan.
                                    </p>
                                </div>
                            </div>
                        @endif

                        {{-- BUTTON SUBMIT --}}
                        <div class="flex justify-end pt-6 border-t border-slate-900/10 mt-6">
                            <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-md shadow-blue-500/20 transition duration-150 flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Hantar Permohonan Tempahan
                            </button>
                        </div>
                    </form>
                </div>

                {{-- SEKSYEN KANAN: SIDEBAR PANDUAN --}}
                <div class="flex flex-col gap-6 w-full lg:mt-0">
                    
                    {{-- Blok Informasi Peraturan Isian --}}
                    <div class="bg-[#fbf9f4]/90 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] p-6 rounded-3xl">
                        <h4 class="text-slate-900 font-black flex items-center gap-2 mb-5 tracking-wider uppercase text-xs border-b border-slate-900/10 pb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                            Peringatan Pengisian
                        </h4>
                        <ul class="space-y-4 text-xs font-bold text-slate-700">
                            <li class="flex items-start gap-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                <span class="leading-relaxed">Pastikan tarikh mula dan tamat tidak bertembung dengan aktiviti rasmi universiti.</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                <span class="leading-relaxed">Nyatakan nama penuh program pada medan tujuan dengan jelas bagi mengelakkan penolakan permohonan.</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                <span class="leading-relaxed">Anda boleh menyemak semula rekod status pada butang kelulusan di bahagian atas pada bila-bila masa.</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Blok Bantuan Khidmat Sokongan --}}
                    <div class="bg-[#fbf9f4]/90 backdrop-blur-md border border-white/40 shadow-sm p-5 rounded-2xl text-center flex flex-col items-center gap-3">
                        <div class="p-2 bg-slate-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        </div>
                        <p class="text-[11px] text-slate-600 font-bold leading-relaxed px-2">
                            Sistem e-Booking KAB dikawal selia sepenuhnya oleh Unit Pengurusan Fasiliti & Logistik Kolej Kediaman KAB.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>

{{-- PANGGIL SECARA TERUS (BULLETPROOF & STABLE CDN) --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ms.js"></script>

<script>
    window.onload = function() {
        const bahasa = (typeof flatpickr.l10ns.ms !== 'undefined') ? 'ms' : 'default';

        // 1. Inisialisasi Kalendar TAMAT
        const tamatPicker = flatpickr("#tarikh_tamat", {
            dateFormat: "Y-m-d",
            minDate: "today",
            locale: bahasa,
            altInput: true,
            altFormat: "j F Y",
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                if (dayElem.classList.contains('flatpickr-disabled')) {
                    dayElem.style.background = '#fee2e2'; 
                    dayElem.style.color = '#dc2626'; 
                    dayElem.title = 'Tarikh ini telah penuh / ditempah';
                }
            }
        });

        // 2. Inisialisasi Kalendar MULA
        const mulaPicker = flatpickr("#tarikh_mula", {
            dateFormat: "Y-m-d",
            minDate: "today", 
            locale: bahasa,
            altInput: true,
            altFormat: "j F Y",
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                if (dayElem.classList.contains('flatpickr-disabled')) {
                    dayElem.style.background = '#fee2e2'; 
                    dayElem.style.color = '#dc2626'; 
                    dayElem.title = 'Tarikh ini telah penuh / ditempah';
                }
            },
            onChange: function(selectedDates, dateStr, instance) {
                tamatPicker.set('minDate', dateStr);
                if (!document.getElementById("tarikh_tamat").value) {
                    tamatPicker.setDate(dateStr);
                }
            }
        });

        // 3. Inisialisasi Masa
        flatpickr("#masa_mula, #masa_tamat", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i", 
            altInput: true,
            altFormat: "h:i K", 
            time_24hr: false
        });

        // 🚀 4. FUNGSI AJAX PINTAR (Dinamik kemas kini tarikh dgn Cache Buster)
        const fasilitiDropdown = document.getElementById('kab_id');
        
        fasilitiDropdown.addEventListener('change', function() {
            let kabId = this.value;
            
            if (!kabId) {
                mulaPicker.set('disable', []);
                tamatPicker.set('disable', []);
                return;
            }

            fetch(`/bookings/booked-dates/${kabId}?_=` + new Date().getTime())
                .then(response => response.json())
                .then(data => {
                    mulaPicker.set('disable', data);
                    tamatPicker.set('disable', data);
                    
                    mulaPicker.clear();
                    tamatPicker.clear();
                })
                .catch(error => console.error('Ralat mengambil data tarikh:', error));
        });
    };
</script>