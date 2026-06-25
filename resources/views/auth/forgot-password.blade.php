<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Kata Laluan - Sistem Tempahan KAB</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased relative min-h-screen overflow-x-hidden overflow-y-auto">
    
    {{-- Video Latar Belakang --}}
    <video autoplay loop muted playsinline class="fixed inset-0 w-full h-full object-cover -z-20">
        <source src="{{ asset('videos/bg-kolej.mp4') }}" type="video/mp4">
    </video>

    {{-- Lapisan Biru Korporat --}}
    <div class="fixed inset-0 bg-gradient-to-r from-blue-950/80 via-indigo-900/70 to-blue-800/40 -z-10"></div>

    <div class="relative min-h-screen flex flex-col justify-between">

        {{-- Navigasi Atas --}}
        <nav class="w-full p-4 sm:p-6 flex justify-center md:justify-between items-center text-white z-20">
            <div class="text-xl sm:text-2xl font-extrabold tracking-wider flex items-center">
                <span id="typewriter-text"></span>
                <span class="animate-pulse text-yellow-400 ml-1">|</span>
            </div>
            <div class="hidden md:flex space-x-6 font-semibold">
                <a href="{{ route('login') }}" class="hover:text-yellow-400 transition duration-300">Kembali ke Log Masuk</a>
            </div>
        </nav>

        {{-- Konten Utama (Kotak Lupa Kata Laluan) --}}
        <div class="flex-grow flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 z-10">
            
            <div class="w-full max-w-sm sm:max-w-md bg-white rounded-[2rem] shadow-2xl p-6 sm:p-8 text-center border-t-4 border-red-600 mt-10 md:mt-0 mb-20 md:mb-0">
                
                {{-- Ruangan Logo myKAB --}}
                <div class="flex justify-center -mt-10 sm:-mt-12 -mb-2">
                    <img src="{{ asset('images/logo_mykab.png') }}" alt="Logo myKAB" class="h-24 sm:h-28 w-auto object-contain hover:scale-110 transition transform duration-300">
                </div>

                <h2 class="text-lg sm:text-xl font-extrabold text-blue-950 mb-3">Lupa Kata Laluan?</h2>
                
                <p class="text-sm text-gray-500 mb-6 leading-relaxed px-2">
                    Jangan risau! Masukkan alamat emel anda yang telah didaftarkan di bawah, dan sistem kami akan menghantar pautan khas untuk anda menetapkan semula kata laluan.
                </p>

                {{-- Status Session (Mesej Berjaya Hantar Link) --}}
                @if (session('status'))
                    <div class="mb-6 font-medium text-sm text-green-700 bg-green-50 p-4 rounded-xl border border-green-200 shadow-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    {{-- Input Emel --}}
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan Alamat Emel"
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-200 transition outline-none text-gray-700">
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-left pl-4" />
                    </div>

                    {{-- Butang Hantar --}}
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-red-600 to-amber-500 hover:from-red-700 hover:to-amber-600 text-white rounded-full font-bold shadow-lg transition transform hover:-translate-y-0.5 mt-2 flex justify-center items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Hantar Pautan Reset
                    </button>
                    
                    {{-- Link Kembali ke Login --}}
                    <div class="mt-4 text-center">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 hover:underline transition duration-200">
                            Batal & Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Ruangan Logo Rasmi KPT / UPSI --}}
        <div class="w-full pb-6 pr-6 lg:pb-12 lg:pr-12 z-20 hidden md:flex justify-end items-center">
            <div class="flex items-center space-x-4 lg:space-x-6 bg-white/10 backdrop-blur-sm px-4 lg:px-6 py-2 lg:py-3 rounded-2xl border border-white/20 shadow-lg">
                <img src="{{ asset('images/logo-kpt.png') }}" alt="Kementerian Pendidikan Tinggi" class="h-8 lg:h-10 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
                <img src="{{ asset('images/logo-upsi.png') }}" alt="UPSI" class="h-10 lg:h-12 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
                <img src="{{ asset('images/logo-kab.png') }}" alt="KAB" class="h-10 lg:h-12 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
                <img src="{{ asset('images/logo-100tahun.png') }}" alt="100 Tahun UPSI" class="h-6 lg:h-8 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
            </div>
        </div>

    </div>

    {{-- Script Typewriter --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const text = "Jangan Risau, Kami Bantu!";
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
                    setTimeout(handleTypewriter, 100); 
                } 
                else if (isDeleting && i >= 0) {
                    typewriterEl.innerHTML = text.substring(0, i);
                    i--;
                    if (i < 0) {
                        isDeleting = false;
                        setTimeout(handleTypewriter, 500); 
                        return;
                    }
                    setTimeout(handleTypewriter, 50); 
                }
            }
            setTimeout(handleTypewriter, 500);
        });
    </script>
</body>
</html>