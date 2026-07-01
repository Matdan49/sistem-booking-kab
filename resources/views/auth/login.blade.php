<!DOCTYPE html>
{{-- TAMBAH KELAS scroll-smooth DI SINI UNTUK KESAN MELUNCUR --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Tempahan KAB - UPSI</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- BUANG overflow-hidden DAN GANTI KEPADA overflow-x-hidden (Supaya boleh scroll ke bawah) --}}
<body class="antialiased relative min-h-screen overflow-x-hidden">
    
    {{-- Video Latar Belakang (Tukar 'absolute' ke 'fixed' supaya video tak terputus bila scroll bawah) --}}
    <video autoplay loop muted playsinline class="fixed inset-0 w-full h-full object-cover -z-20">
        <source src="{{ asset('videos/bg-kolej.mp4') }}" type="video/mp4">
    </video>

    {{-- Lapisan Biru Korporat myKAB (Tukar ke 'fixed' juga) --}}
    <div class="fixed inset-0 bg-gradient-to-r from-blue-950/80 via-indigo-900/70 to-blue-800/40 -z-10"></div>

    {{-- NAVBAR KUSTOM UNTUK HALAMAN LOGIN --}}
    <nav class="absolute top-0 w-full z-50 px-8 py-6 flex justify-center md:justify-end gap-8">
        <a href="#about" class="text-white font-bold text-sm uppercase tracking-widest hover:text-amber-400 transition duration-300 drop-shadow-md">
            About
        </a>
        <a href="#contact" class="text-white font-bold text-sm uppercase tracking-widest hover:text-amber-400 transition duration-300 drop-shadow-md">
            Contact
        </a>
    </nav>
    
    {{-- Konten Utama (Borang Log Masuk) --}}
    <div class="relative z-10 flex min-h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
        
        <div class="w-full max-w-sm sm:max-w-md bg-white rounded-[2rem] shadow-2xl p-6 sm:p-8 text-center border-t-4 border-red-600 mt-16 md:mt-0">
            
            {{-- Ruangan Logo myKAB --}}
            <div class="flex justify-center -mt-10 sm:-mt-12 -mb-4">
                <img src="{{ asset('images/logo_mykab.png') }}" alt="Logo myKAB" class="h-28 sm:h-36 w-auto object-contain hover:scale-110 transition transform duration-300">
            </div>

            <h2 class="text-lg sm:text-xl font-extrabold text-blue-950 mb-6" id="typewriter-text">Log Masuk Sistem</h2>

            {{-- Mesej Ralat --}}
            @if (session('error'))
                <div class="text-red-600 text-xs font-bold mb-4 bg-red-50 p-2 rounded-lg border border-red-100">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Mesej Status --}}
            @if (session('status'))
                <div class="mb-4 font-medium text-xs text-green-700 bg-green-50 p-2 rounded-lg border border-green-200">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                {{-- Input Emel --}}
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <input id="email" type="email" name="email" required autofocus placeholder="ID Pengguna / Emel"
                        class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-200 transition outline-none text-gray-700">
                </div>

                {{-- Input Password --}}
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input id="password" type="password" name="password" required placeholder="Kata Laluan"
                        class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-200 transition outline-none text-gray-700">
                </div>

                {{-- PAUTAN LUPA KATA LALUAN --}}
                <div class="flex justify-end -mt-2 mb-2 pr-2">
                    <a href="{{ route('password.request') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 hover:underline transition duration-200">
                        Lupa Kata Laluan?
                    </a>
                </div>

                {{-- Pilihan Peranan --}}
                <div>
                    <select id="role" name="role" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm text-gray-600 focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-200 transition text-center appearance-none outline-none font-medium">
                        <option value="" disabled selected>-- Pilih Peranan --</option>
                        <option value="student">Pelajar</option>
                        <option value="non-student">Bukan Pelajar / Staf</option>
                        <option value="pejabat">Pejabat Kolej</option>
                        <option value="pengetua">Pengetua</option>
                    </select>
                </div>

                <button type="submit" class="w-full py-3 bg-gradient-to-r from-red-600 to-amber-500 hover:from-red-700 hover:to-amber-600 text-white rounded-full font-bold shadow-lg transition transform hover:-translate-y-0.5 mt-2">
                    Sign In
                </button>

                {{-- Pautan Daftar --}}
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        Belum mendaftar akaun? 
                        <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-800 hover:underline transition duration-200">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </form>

            {{-- Pintasan Ujian WBL --}}
            <div class="mt-8 pt-4 border-t border-gray-100">
                <p class="text-[10px] text-gray-400 uppercase tracking-wider mb-3 font-bold">Pintasan Ujian WBL</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <a href="{{ route('login.quick', 'student') }}" class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs hover:bg-blue-100 font-semibold transition">Pelajar</a>
                    <a href="{{ route('login.quick', 'non-student') }}" class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs hover:bg-blue-100 font-semibold transition">Bukan Pelajar</a>
                    <a href="{{ route('login.quick', 'pejabat') }}" class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs hover:bg-blue-100 font-semibold transition">Pejabat</a>
                    <a href="{{ route('login.quick', 'pengetua') }}" class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs hover:bg-blue-100 font-semibold transition">Pengetua</a>
                </div>
            </div>

            <div class="mt-5 text-xs text-gray-400 font-medium">
                &copy; {{ date('Y') }} Kolej Aminuddin Baki, UPSI.
            </div>
        </div>
    </div>
    
    {{-- ====================================================================== --}}
    {{-- SEKSYEN ABOUT & CONTACT (REKAAN KORPORAT & PREMIUM)                    --}}
    {{-- ====================================================================== --}}
    <div class="max-w-6xl mx-auto px-6 pb-24 grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 relative z-20">
        
        {{-- 1. BAHAGIAN ABOUT (Warm Sand Glassmorphism) --}}
        <div id="about" class="scroll-mt-32 group relative overflow-hidden bg-[#fbf9f4]/95 backdrop-blur-xl border border-white/80 p-8 sm:p-10 rounded-[2rem] shadow-[0_20px_40px_-15px_rgba(0,0,0,0.1)] transition-all duration-300 hover:shadow-[0_20px_40px_-15px_rgba(30,58,138,0.15)]">
            
            {{-- Ikon Latar Belakang (Hiasan) --}}
            <div class="absolute -right-6 -top-6 text-blue-900/5 transition-transform duration-500 group-hover:scale-110 group-hover:rotate-6">
                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            </div>

            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-6 sm:mb-8">
                    <div class="p-3 sm:p-4 bg-blue-900/10 text-blue-950 rounded-2xl border border-blue-900/10 shadow-inner">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black text-slate-800 tracking-wide uppercase">
                        Tentang MyKAB
                    </h3>
                </div>
                
                <div class="space-y-4 text-sm sm:text-[15px] text-slate-600 font-medium leading-relaxed text-justify">
                    <p>
                        Sistem e-Booking Kolej Aminuddin Baki direka khusus untuk mendigitalkan proses pengurusan fasiliti dan peralatan kolej. Ia memberi kemudahan kepada pelajar dan staf untuk menyemak kekosongan secara masa nyata <span class="text-blue-900 font-bold">(real-time)</span> serta menghantar permohonan dengan pantas.
                    </p>
                    <p>
                        Melalui integrasi kelulusan berperingkat, sistem ini bermatlamat mewujudkan ekosistem pengurusan fasiliti yang lebih bersistematik, telus, dan selari dengan standard pendigitalan universiti moden.
                    </p>
                </div>
            </div>
        </div>

        {{-- 2. BAHAGIAN CONTACT (Deep Navy Slate Glassmorphism) --}}
        <div id="contact" class="scroll-mt-32 group relative overflow-hidden bg-gradient-to-br from-[#1e293b]/95 to-slate-900/95 backdrop-blur-xl border border-slate-700/50 p-8 sm:p-10 rounded-[2rem] shadow-[0_20px_40px_-15px_rgba(0,0,0,0.3)] transition-all duration-300 hover:shadow-[0_20px_40px_-15px_rgba(245,158,11,0.2)]">
            
            {{-- Ikon Latar Belakang (Hiasan) --}}
            <div class="absolute -right-4 -bottom-4 text-amber-400/5 transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-6">
                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
            </div>

            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-6 sm:mb-8">
                    <div class="p-3 sm:p-4 bg-amber-400/10 text-amber-400 rounded-2xl border border-amber-400/20 shadow-inner">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black text-amber-400 tracking-wide uppercase">
                        Hubungi Kami
                    </h3>
                </div>
                
                <p class="text-[13px] sm:text-sm text-slate-400 font-medium mb-6">
                    Sebarang pertanyaan atau bantuan teknikal berkaitan tempahan, sila hubungi pihak pengurusan fasiliti:
                </p>
                
                <ul class="space-y-5">
                    {{-- Telefon Rasmi --}}
                    <li class="flex items-start gap-4">
                        <div class="mt-0.5 p-2 bg-slate-800/80 rounded-xl border border-slate-700 text-emerald-400 shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">Telefon Rasmi</p>
                            <p class="text-sm font-semibold text-slate-200 mt-0.5">05-450 6000</p>
                        </div>
                    </li>

                    {{-- Emel Rasmi --}}
                    <li class="flex items-start gap-4">
                        <div class="mt-0.5 p-2 bg-slate-800/80 rounded-xl border border-slate-700 text-blue-400 shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">Emel Rasmi</p>
                            <a href="mailto:admin.kab@upsi.edu.my" class="text-sm font-semibold text-slate-200 mt-0.5 hover:text-blue-400 transition">admin.kab@upsi.edu.my</a>
                        </div>
                    </li>

                    {{-- Lokasi Pejabat --}}
                    <li class="flex items-start gap-4">
                        <div class="mt-0.5 p-2 bg-slate-800/80 rounded-xl border border-slate-700 text-amber-400 shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">Pejabat Pengurusan</p>
                            <p class="text-sm font-semibold text-slate-200 mt-0.5 leading-snug">Unit Pengurusan Fasiliti & Logistik,<br>Kolej Aminuddin Baki, UPSI</p>
                        </div>
                    </li>

                    {{-- Waktu Operasi --}}
                    <li class="flex items-start gap-4">
                        <div class="mt-0.5 p-2 bg-slate-800/80 rounded-xl border border-slate-700 text-purple-400 shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">Waktu Operasi</p>
                            <p class="text-sm font-semibold text-slate-200 mt-0.5">Isnin - Jumaat (8:00 Pagi - 5:00 Petang)</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    {{-- Ruangan Logo Rasmi --}}
    <div class="fixed bottom-6 right-6 lg:bottom-12 lg:right-12 z-50 hidden md:flex items-center space-x-4 lg:space-x-6 bg-white/20 backdrop-blur-md px-4 lg:px-6 py-2 lg:py-3 rounded-2xl border border-white/30 shadow-lg">
        <img src="{{ asset('images/logo-kpt.png') }}" alt="KPT" class="h-8 lg:h-10 w-auto object-contain opacity-90 hover:opacity-100 transition duration-300">
        <img src="{{ asset('images/logo-upsi.png') }}" alt="UPSI" class="h-10 lg:h-12 w-auto object-contain opacity-90 hover:opacity-100 transition duration-300">
        <img src="{{ asset('images/logo-kab.png') }}" alt="KAB" class="h-10 lg:h-12 w-auto object-contain opacity-90 hover:opacity-100 transition duration-300">
        <img src="{{ asset('images/logo-100tahun.png') }}" alt="100 Tahun UPSI" class="h-6 lg:h-8 w-auto object-contain opacity-90 hover:opacity-100 transition duration-300">
    </div>

    {{-- Script Typewriter --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const text = "Log Masuk Sistem";
            const typewriterEl = document.getElementById("typewriter-text");
            let i = 0; let isDeleting = false;
            function handleTypewriter() {
                if (!isDeleting && i <= text.length) {
                    typewriterEl.innerHTML = text.substring(0, i);
                    i++;
                    if (i > text.length) { isDeleting = true; setTimeout(handleTypewriter, 2000); return; }
                    setTimeout(handleTypewriter, 150); 
                } else if (isDeleting && i >= 0) {
                    typewriterEl.innerHTML = text.substring(0, i);
                    i--;
                    if (i < 0) { isDeleting = false; setTimeout(handleTypewriter, 500); return; }
                    setTimeout(handleTypewriter, 75); 
                }
            }
            setTimeout(handleTypewriter, 500);
        });
    </script>
</body>
</html>