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

    /* Kotak Dropdown Profil terapung di lapisan paling depan */
    nav [class*="origin-top-right"], nav .absolute {
        z-index: 99999 !important;
        background-color: #ffffff !important;
        border: 1px solid rgba(15, 23, 42, 0.08) !important;
        border-radius: 12px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15) !important;
        padding: 6px !important;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        {{-- BANNER HEADER: SLATE CORPORATE BLUE CAP --}}
        <div class="bg-[#1e293b] p-5 rounded-2xl shadow-md flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative z-40 border border-slate-700/50">
            <h2 class="font-black text-xl text-white leading-tight flex items-center gap-3 tracking-wide">
                <div class="p-2 bg-slate-800 text-amber-400 rounded-xl border border-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    </svg>
                </div>
                <span class="uppercase font-extrabold text-base tracking-wider text-slate-100">
                    {{ __('Tetapan Profil Pengguna') }}
                </span>
            </h2>
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-600 hover:brightness-110 text-white text-xs font-black tracking-wider uppercase rounded-xl shadow transition duration-150">
                ⬅️ Kembali Ke Dashboard
            </a>
        </div>
    </x-slot>

    {{-- INTERFACE BASE: Latar Belakang Gambar Warm --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920');">

        {{-- Disinilah fungsi asal dikekalkan sepenuhnya mengikut struktur asal bos --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12 relative z-20">
            
            {{-- SEKSYEN 1: UPDATE PROFILE INFORMATION --}}
            <div class="w-full">
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- SEKSYEN 2: UPDATE PASSWORD --}}
            <div class="w-full">
                @include('profile.partials.update-password-form')
            </div>

            {{-- SEKSYEN 3: DELETE ACCOUNT --}}
            <div class="w-full">
                @include('profile.partials.delete-user-form')
            </div>
            
        </div>
    </div>
</x-app-layout>