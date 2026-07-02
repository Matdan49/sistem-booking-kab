<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="{{ asset('images/mykab_logo.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Halaman Utama') - {{ config('app.name', 'Sistem KAB') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    </head>
    <body class="font-sans antialiased">
        
        {{-- TAMBAHAN: Letak 'flex flex-col' supaya footer sentiasa di bawah --}}
        <div class="min-h-screen bg-gray-100 flex flex-col">
            
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white shadow relative z-40">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- TAMBAHAN: Letak 'flex-grow' supaya ia tolak footer ke bawah --}}
            <main class="flex-grow">
                {{ $slot }}
            </main>

            {{-- 🚀 FOOTER KREDIT WBL UPSI --}}
            <footer class="relative z-50 py-5 mt-auto border-t border-slate-900/10 bg-[#fbf9f4]/80 backdrop-blur-md">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-center">
                    <p class="text-[11px] font-black text-slate-500 uppercase tracking-widest flex items-center gap-1.5 drop-shadow-sm">
                        Powered by WBL DTD3053 AT20 META UPSI 
                        
                        {{-- Ikon Love (Solid SVG) Heroicons dengan kesan degupan --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-rose-500 animate-pulse drop-shadow-sm">
                            <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>
                    </p>
                </div>
            </footer>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/ms.js"></script>
        
        @stack('scripts')
    </body>
</html>