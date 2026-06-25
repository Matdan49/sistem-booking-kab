<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akaun - Sistem Tempahan KAB</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- overflow-y-auto membenarkan skrin di-scroll secara natural --}}
<body class="antialiased relative min-h-screen overflow-x-hidden overflow-y-auto">
    
    {{-- Video Latar Belakang (Kekal Statik di Belakang) --}}
    <video autoplay loop muted playsinline class="fixed inset-0 w-full h-full object-cover -z-20">
        <source src="{{ asset('videos/bg-kolej.mp4') }}" type="video/mp4">
    </video>

    {{-- Lapisan Biru Korporat (Kekal Statik) --}}
    <div class="fixed inset-0 bg-gradient-to-r from-blue-950/80 via-indigo-900/70 to-blue-800/40 -z-10"></div>

    {{-- Pembungkus Utama untuk Kawal Ketinggian Scroll --}}
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

        {{-- Konten Utama (Kotak Register) --}}
        <div class="flex-grow flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 z-10">
            
            <div class="w-full max-w-md bg-white rounded-[2rem] shadow-2xl p-6 sm:p-8 text-center border-t-4 border-red-600 mt-10 md:mt-0 mb-20 md:mb-0">
                
                {{-- Ruangan Logo myKAB --}}
                <div class="flex justify-center -mt-10 sm:-mt-12 -mb-2">
                    <img src="{{ asset('images/logo_mykab.png') }}" alt="Logo myKAB" class="h-24 sm:h-28 w-auto object-contain hover:scale-110 transition transform duration-300">
                </div>

                <h2 class="text-lg sm:text-xl font-extrabold text-blue-950 mb-6">Pendaftaran Akaun Baru</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    {{-- Input Nama --}}
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama Penuh"
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-200 transition outline-none text-gray-700">
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-left pl-4" />
                    </div>

                    {{-- Input Emel --}}
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Alamat Emel"
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-200 transition outline-none text-gray-700">
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-left pl-4" />
                    </div>

                    {{-- Input Password --}}
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Kata Laluan"
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-200 transition outline-none text-gray-700">
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-left pl-4" />
                    </div>

                    {{-- Input Confirm Password --}}
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Sahkan Kata Laluan"
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-200 transition outline-none text-gray-700">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-left pl-4" />
                    </div>

                    {{-- Pilihan Peranan --}}
                    <div>
                        <select id="role" name="role" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full text-sm text-gray-600 focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-200 transition text-center appearance-none outline-none font-medium">
                            <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Daftar Sebagai --</option>
                            <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>Pelajar</option>
                            <option value="non-student" {{ old('role') === 'non-student' ? 'selected' : '' }}>Bukan Pelajar / Staf</option>
                            <option value="pejabat" {{ old('role') === 'pejabat' ? 'selected' : '' }}>Pejabat Kolej</option>
                            <option value="pengetua" {{ old('role') === 'pengetua' ? 'selected' : '' }}>Pengetua</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-1 text-xs text-left pl-4" />
                    </div>

                    {{-- Butang Daftar --}}
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-red-600 to-amber-500 hover:from-red-700 hover:to-amber-600 text-white rounded-full font-bold shadow-lg transition transform hover:-translate-y-0.5 mt-4">
                        Daftar Akaun
                    </button>
                    
                    {{-- Link Kembali ke Login --}}
                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-600">
                            Sudah mempunyai akaun? 
                            <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-800 hover:underline transition duration-200">
                                Log Masuk
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        {{-- Ruangan Logo Rasmi KPT / UPSI (Duduk Bawah Sekali) --}}
        <div class="w-full pb-6 pr-6 lg:pb-12 lg:pr-12 z-20 hidden md:flex justify-end items-center">
            <div class="flex items-center space-x-4 lg:space-x-6 bg-white/10 backdrop-blur-sm px-4 lg:px-6 py-2 lg:py-3 rounded-2xl border border-white/20 shadow-lg">
                <img src="{{ asset('images/logo-kpt.png') }}" alt="Kementerian Pendidikan Tinggi" class="h-8 lg:h-10 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
                <img src="{{ asset('images/logo-upsi.png') }}" alt="UPSI" class="h-10 lg:h-12 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
                <img src="{{ asset('images/logo-kab.png') }}" alt="KAB" class="h-10 lg:h-12 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
                <img src="{{ asset('images/logo-100tahun.png') }}" alt="100 Tahun UPSI" class="h-6 lg:h-8 w-auto object-contain opacity-90 hover:opacity-100 hover:scale-105 transition duration-300">
            </div>
        </div>

    </div>

    {{-- Script Typewriter (Sama macam Login) --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const text = "Sertai Komuniti Kami!";
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