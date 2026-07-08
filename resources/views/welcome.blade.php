<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MYKAB - Sistem Tempahan Fasiliti</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fadeInLeft { from { opacity: 0; transform: translateX(-30px); } to { opacity: 1; transform: translateX(0); } }
        .animate-fade-in-left { animation: fadeInLeft 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .delay-200 { animation-delay: 200ms; opacity: 0; }
        .delay-400 { animation-delay: 400ms; opacity: 0; }
        
        .header-shadow { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }

        /* Animasi 1: Apungan Warna Biasa */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(40px, -50px) scale(1.1); }
            66% { transform: translate(-30px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 10s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }

        /* ==================================================
           ANIMASI 2: Efek "Lampu" Bertukar Warna (Glow Light)
           ================================================== */
        @keyframes colorShiftingLight {
            0%   { background-color: #243375; opacity: 0.07; transform: scale(1) translate(-50%, -50%); } /* Cahaya Biru */
            33%  { background-color: #DE2025; opacity: 0.09; transform: scale(1.2) translate(-40%, -50%); } /* Cahaya Merah */
            66%  { background-color: #f1c40f; opacity: 0.09; transform: scale(0.9) translate(-60%, -50%); } /* Cahaya Kuning */
            100% { background-color: #243375; opacity: 0.07; transform: scale(1) translate(-50%, -50%); } /* Balik Biru */
        }
        .animate-shifting-light { 
            animation: colorShiftingLight 15s infinite ease-in-out; 
            transform-origin: top left;
        }
    </style>
</head>
<body class="antialiased font-sans bg-gray-50 overflow-x-hidden">

    <!-- STICKY HEADER -->
    <header class="fixed top-0 left-0 w-full h-20 lg:h-24 bg-white/95 backdrop-blur-md header-shadow z-50 flex items-center justify-between px-6 lg:px-12 transition-all">
        
        <div class="flex items-center gap-3 lg:gap-4">
            <img src="{{ asset('images/logo-kab.png') }}" class="h-10 lg:h-14 object-contain" alt="KAB">
            <img src="{{ asset('images/logo-upsi.png') }}" class="h-10 lg:h-14 object-contain" alt="UPSI">
            <img src="{{ asset('images/logo_mykab.png') }}" class="h-8 lg:h-12 ml-1 lg:ml-2 object-contain" alt="MYKAB">
        </div>

        <nav class="flex gap-4 lg:gap-8 items-center">
            <a href="#tentang" class="font-black text-[#243375] hover:text-[#DE2025] hover:scale-105 transition-all duration-300 text-sm lg:text-lg uppercase tracking-wider hidden sm:block">
                Tentang myKAB
            </a>
            <a href="#hubungi" class="font-black text-[#243375] hover:text-[#DE2025] hover:scale-105 transition-all duration-300 text-sm lg:text-lg uppercase tracking-wider hidden sm:block">
                Hubungi
            </a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-black text-[#243375] hover:text-[#DE2025] hover:scale-105 transition-all duration-300 text-sm lg:text-lg uppercase tracking-wider border-b-4 border-[#243375] pb-1">
                        Papan Pemuka
                    </a>
                @else
                    <a href="{{ route('login') }}" class="font-black text-[#243375] hover:text-[#DE2025] hover:scale-105 transition-all duration-300 text-sm lg:text-lg uppercase tracking-wider border-b-4 border-[#243375] pb-1">
                        Log Masuk
                    </a>
                @endauth
            @endif
        </nav>
    </header>

    <!-- BAHAGIAN HERO -->
    <main class="flex w-full h-screen">
        
        <div class="relative w-full lg:w-[55%] h-full bg-cover bg-left flex flex-col justify-center px-10 lg:px-16 pt-20" 
             style="background-image: url('{{ asset('images/bg_graduan.png') }}');">
            
            <div class="absolute inset-0 bg-white/60"></div>

            <div class="relative z-10">
                <h1 class="text-[#243375] font-bold tracking-wide leading-[1.1] animate-fade-in-left" 
                    style="font-size: clamp(2rem, 3vw, 3.2rem);">
                    Urus Tempahan Fasiliti di<br>Kolej Aminuddin Baki
                </h1>

                <div class="flex items-start mt-8 animate-fade-in-left delay-200">
                    <span class="text-[#243375] font-black tracking-tighter drop-shadow-md" 
                          style="font-size: clamp(8rem, 13vw, 15rem); line-height: 0.75; margin-left: -0.5rem;">
                        M
                    </span>
                    <div class="flex flex-col text-[#DE2025] font-black uppercase ml-2 mt-2" 
                         style="font-size: clamp(1.5rem, 2.5vw, 2.8rem); line-height: 1.05;">
                        <span class="tracking-widest">udah</span>
                        <span class="tracking-widest">urah</span>
                        <span class="tracking-widest">ula tempah</span>
                        <span class="tracking-widest">dengan kami</span>
                    </div>
                </div>

                <div class="mt-12 animate-fade-in-left delay-400">
                    <p class="text-[#243375] font-semibold text-xl uppercase tracking-wide mb-3">
                        Tempah Sekarang Dengan
                    </p>
                    <img src="{{ asset('images/logo_mykab.png') }}" class="h-20 lg:h-24 object-contain" alt="MYKAB Besar">
                    <p class="text-[#243375] font-bold uppercase tracking-widest mt-1" style="font-size: 0.65rem; margin-left: 2.5rem;">
                        Kolej Aminuddin Baki Booking Facilities System
                    </p>
                </div>
            </div>
        </div>

        <div class="hidden lg:block relative w-[45%] h-full bg-cover bg-center" 
             style="background-image: url('{{ asset('images/bg_kanan_abstrak.png') }}'); background-color: #f1c40f;">
            
            <img src="{{ asset('images/badge_upsi.png') }}" 
                 class="absolute z-20 w-32 drop-shadow-2xl hover:scale-110 transition-transform duration-300" 
                 style="top: 45%; left: 10%;" 
                 alt="Badge UPSI">

            <img src="{{ asset('images/badge_kab.png') }}" 
                 class="absolute z-20 w-32 drop-shadow-2xl hover:scale-110 transition-transform duration-300" 
                 style="bottom: 15%; left: -3%;" 
                 alt="Badge KAB">
        </div>

    </main>

    <!-- ==========================================
         SEKSYEN TENTANG myKAB
         ========================================== -->
    <section id="tentang" class="relative scroll-mt-24 w-full bg-white py-24 px-8 lg:px-24 overflow-hidden border-t border-gray-100">
        
        <!-- LAMPU UTAMA (Tengah Skrin) - Bertukar Warna -->
        <div class="absolute top-1/2 left-1/2 w-[600px] h-[600px] rounded-full filter blur-[100px] animate-shifting-light pointer-events-none z-0"></div>

        <!-- Apungan Warna Sisi (Kekal sebagai sokongan lampu) -->
        <div class="absolute top-0 -left-12 w-72 h-72 bg-[#243375] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob pointer-events-none"></div>
        <div class="absolute -bottom-20 left-1/4 w-72 h-72 bg-[#f1c40f] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-4000 pointer-events-none"></div>

        <div class="relative z-10 max-w-5xl mx-auto text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#243375] mb-6 uppercase tracking-wider">
                Tentang <span class="text-[#DE2025]">myKAB</span>
            </h2>
            <div class="w-24 h-1 bg-[#f1c40f] mx-auto mb-10 rounded-full"></div>
            
            <p class="text-gray-700 text-lg lg:text-xl leading-relaxed mb-8">
                <strong>MYKAB e-Booking</strong> merupakan sebuah sistem inovasi digital yang dibangunkan khas untuk pengurusan fasiliti di <strong>Kolej Aminuddin Baki (KAB)</strong>. Sistem ini mendigitalkan sepenuhnya proses tempahan dewan, bilik mesyuarat, dan peralatan yang sebelum ini menggunakan kaedah borang manual.
            </p>
            <p class="text-gray-700 text-lg lg:text-xl leading-relaxed">
                Dengan adanya enjin pencegahan pertindihan masa pintar (<i>smart anti-clash engine</i>), warga kolej kini boleh menyemak kekosongan fasiliti secara masa nyata (<i>real-time</i>) dan membuat tempahan dengan lebih teratur, pantas, serta telus.
            </p>
        </div>
    </section>

    <!-- ==========================================
         SEKSYEN HUBUNGI KAMI
         ========================================== -->
    <section id="hubungi" class="relative scroll-mt-24 w-full bg-gray-50 py-24 px-8 lg:px-24 overflow-hidden border-t border-gray-200">
        
        <!-- LAMPU UTAMA (Tengah Skrin) - Bertukar Warna -->
        <div class="absolute top-1/2 left-1/2 w-[700px] h-[700px] rounded-full filter blur-[120px] animate-shifting-light pointer-events-none z-0" style="animation-delay: 5s;"></div>

        <div class="absolute top-10 right-1/4 w-72 h-72 bg-[#243375] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000 pointer-events-none"></div>

        <div class="relative z-10 max-w-5xl mx-auto text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#243375] mb-6 uppercase tracking-wider">
                Hubungi Kami
            </h2>
            <div class="w-24 h-1 bg-[#DE2025] mx-auto mb-16 rounded-full"></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Alamat -->
                <div class="bg-white/70 backdrop-blur-lg p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-2 transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-50 text-[#243375] rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg text-gray-800 mb-2">Pejabat Pengurusan</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Kolej Aminuddin Baki,<br>Universiti Pendidikan Sultan Idris,<br>35900 Tanjong Malim, Perak.</p>
                </div>

                <!-- Telefon -->
                <div class="bg-white/70 backdrop-blur-lg p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-2 transition-all duration-300">
                    <div class="w-16 h-16 bg-red-50 text-[#DE2025] rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg text-gray-800 mb-2">Talian Rasmi</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">+605-450 6000<br>(Waktu Pejabat Sahaja)</p>
                </div>

                <!-- Emel -->
                <div class="bg-white/70 backdrop-blur-lg p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-2 transition-all duration-300">
                    <div class="w-16 h-16 bg-yellow-50 text-yellow-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg text-gray-800 mb-2">E-Mel Bantuan</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">mykab.admin@upsi.edu.my<br>support@upsi.edu.my</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#243375] text-white py-6 text-center text-sm relative z-20">
        <p>&copy; {{ date('Y') }} Hak Cipta Terpelihara. Kolej Aminuddin Baki, Universiti Pendidikan Sultan Idris.</p>
    </footer>

</body>
</html>