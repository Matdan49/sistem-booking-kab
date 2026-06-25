<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
                {{-- Heroicon: Clipboard Document --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                {{ __('Sistem e-Booking Kolej KAB') }}
            </h2>
            
            {{-- Butang Premium: Gradient Blue --}}
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-bold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                {{-- Heroicon: Plus --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Terus ke Borang Tempahan
            </a>
        </div>
    </x-slot>

    <div class="py-16 bg-gray-50 min-h-screen flex flex-col justify-center">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 w-full">
            
            {{-- Banner Aluan Bersama Ikon Berdenyut --}}
            <div class="bg-blue-100 border-l-4 border-blue-600 text-blue-800 p-4 rounded-r-xl mb-8 flex items-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 animate-pulse text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-sm font-medium">Selamat Datang! Sila pilih kategori fasiliti yang ingin ditempah untuk melihat jadual dan kekosongan.</p>
            </div>

            <div class="text-center mb-12">
                <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">Apa Yang Anda Ingin Tempah?</h3>
                <p class="text-sm text-gray-500 mt-2">Sila pilih kategori permohonan di bawah untuk melihat direktori penuh.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                {{-- Kad 1: Tempat & Ruang --}}
                <a href="{{ route('fasiliti.tempat') }}" class="group bg-white p-8 rounded-3xl shadow-md border border-gray-100 hover:shadow-2xl hover:border-blue-500 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center">
                    <div class="w-24 h-24 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-inner group-hover:shadow-blue-500/50">
                        {{-- Heroicon: Building (Dewan/Ruang) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition">Tempahan Tempat & Ruang</h4>
                    <p class="text-sm text-gray-500 mt-3 leading-relaxed px-4">Dewan, Gelanggang Sukan, Surau Al-Iman, Pusat Aktiviti Pelajar, Bilik Mesyuarat Utama, dan Dataran Kolej.</p>
                    <div class="mt-auto pt-6 inline-flex items-center text-sm font-bold text-blue-600 group-hover:translate-x-2 transition duration-300">
                        Lihat Senarai Tempat 
                        {{-- Heroicon: Arrow Right --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </div>
                </a>

                {{-- Kad 2: Peralatan Logistik --}}
                <a href="{{ route('fasiliti.peralatan') }}" class="group bg-white p-8 rounded-3xl shadow-md border border-gray-100 hover:shadow-2xl hover:border-amber-500 transition-all duration-300 transform hover:-translate-y-2 text-center flex flex-col items-center">
                    <div class="w-24 h-24 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-amber-600 group-hover:text-white transition-all duration-300 shadow-inner group-hover:shadow-amber-500/50">
                        {{-- Heroicon: Cube (Peralatan) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 group-hover:text-amber-700 transition">Tempahan Peralatan Logistik</h4>
                    <p class="text-sm text-gray-500 mt-3 leading-relaxed px-4">Sistem Pembesar Suara (PA), Portable Speaker, Khemah Kanopi, Kerusi Plastik, Meja Jamuan, dan Papan Putih.</p>
                    <div class="mt-auto pt-6 inline-flex items-center text-sm font-bold text-amber-600 group-hover:translate-x-2 transition duration-300">
                        Lihat Senarai Peralatan
                        {{-- Heroicon: Arrow Right --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </div>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>