<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Tempahan KAB - UPSI</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased relative min-h-screen overflow-hidden">
    
    {{-- Video Latar Belakang --}}
    <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover -z-20">
        <source src="{{ asset('videos/bg-kolej.mp4') }}" type="video/mp4">
    </video>

    {{-- Lapisan Biru Korporat myKAB --}}
    <div class="absolute inset-0 bg-gradient-to-r from-blue-950/80 via-indigo-900/70 to-blue-800/40 -z-10"></div>

    {{-- Navigasi Atas (Diubah supaya responsif) --}}
    <nav class="absolute top-0 left-0 right-0 z-20 p-4 sm:p-6 flex justify-center md:justify-between items-center text-white">
        <div class="text-xl sm:text-2xl md:text-3xl font-extrabold tracking-wider flex items-center">
            <span id="typewriter-text"></span>
            <span class="animate-pulse text-yellow-400 ml-1">|</span>
        </div>
        <div class="hidden md:flex space-x-6 font-semibold">
            <a href="#" class="hover:text-yellow-400 transition duration-300">Home</a>
            <a href="#" class="hover:text-yellow-400 transition duration-300">News</a>
            <a href="#" class="hover:text-yellow-400 transition duration-300">FAQ</a>
            <a href="#" class="hover:text-yellow-400 transition duration-300">Team</a>
            <a href="#" class="hover:text-yellow-400 transition duration-300">Contact</a>
        </div>
    </nav>

    {{-- 🌟 KONTEN UTAMA: Ditambah justify-center supaya sentiasa duduk tengah --}}
    <div class="relative z-10 flex min-h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
        
        {{-- Kotak Login: max-w-md supaya tak terlalu sempit --}}
        <div class="w-full max-w-sm sm:max-w-md bg-white rounded-[2rem] shadow-2xl p-6 sm:p-8 text-center border-t-4 border-red-600 mt-16 md:mt-0">
            
            {{-- Ruangan Logo myKAB (Saiz logo mengecil sikit di skrin phone) --}}
            <div class="flex justify-center -mt-10 sm:-mt-12 -mb-4">
                <img src="{{ asset('images/logo_mykab.png') }}" alt="Logo myKAB" class="h-28 sm:h-36 w-auto object-contain hover:scale-110 transition transform duration-300">
            </div>

            <h2 class="text-lg sm:text-xl font-extrabold text-blue-950 mb-6">Log Masuk Sistem</h2>

            {{-- Mesej Ralat --}}
            @if (session('error'))
                <div class="text-red-600 text-xs font-bold mb-4 bg-red-50 p-2 rounded-lg border border-red-100">
                    {{ session('error') }}
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

                {{-- 🚀 PAUTAN KE MUKA SURAT REGISTER DISELITKAN DI SINI 🚀 --}}
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
    
    {{-- Ruangan Logo Rasmi KPT / UPSI (Disembunyikan di skrin phone supaya tak semak) --}}
    <div class="absolute bottom-6 right-6 lg:bottom-12 lg:right-12 z-20 hidden md:flex items-center space-x-4 lg:space-x-6 bg-white/10 backdrop-blur-sm px-4 lg:px-6 py-2 lg:py-3 rounded-2xl border border-white/20 shadow-lg">
        <img src="{{ asset('images/logo-kpt.png') }}" alt="Kementerian Pendidikan Tinggi" class="h-8 lg:h-10 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
        <img src="{{ asset('images/logo-upsi.png') }}" alt="UPSI" class="h-10 lg:h-12 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
        <img src="{{ asset('images/logo-kab.png') }}" alt="KAB" class="h-10 lg:h-12 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
        <img src="{{ asset('images/logo-100tahun.png') }}" alt="100 Tahun UPSI" class="h-6 lg:h-8 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
    </div>

    {{-- Script Typewriter Infiniti --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const text = "Selamat Datang!";
            const typewriterEl = document.getElementById("typewriter-text");
            let i = 0;
            let isDeleting = false;

            function handleTypewriter() {
                if (!isDeleting && i <= text.length) {
                    typewriterEl.innerHTML = text.substring(0, i);
                    i++;
                    if (i > text.length) {
                        isDeleting = true;
                        setTimeout(handleTypewriter, 2000); 
                        return;
                    }
                    setTimeout(handleTypewriter, 150); 
                } 
                else if (isDeleting && i >= 0) {
                    typewriterEl.innerHTML = text.substring(0, i);
                    i--;
                    if (i < 0) {
                        isDeleting = false;
                        setTimeout(handleTypewriter, 500); 
                        return;
                    }
                    setTimeout(handleTypewriter, 75); 
                }
            }
            setTimeout(handleTypewriter, 500);
        });
    </script>
</body>
</html>