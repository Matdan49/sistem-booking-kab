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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <span class="uppercase font-extrabold text-base tracking-wider text-slate-100">
                    {{ __('Status Rekod Permohonan Anda') }}
                </span>
            </h2>
            
            <div>
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold uppercase tracking-widest rounded-xl border border-slate-700 transition duration-150 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Dashboard Utama
                </a>
            </div>
        </div>
    </x-slot>

    {{-- Mesej Notifikasi Berjaya Padam --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative shadow-sm" role="alert">
                <span class="block sm:inline font-bold">🎉 {{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- INTERFACE BASE: GAMBAR LATAR BELAKANG KOLEJ KAB YANG WARM --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920'); mt-[-1rem]">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-20">
            
            {{-- KAD JADUAL UTAMA: ELEGAN GLASSMORPHISM --}}
            <div class="bg-[#fbf9f4]/90 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] rounded-3xl p-6 sm:p-8 mt-2">
                
                {{-- INTERNAL HEADLINE JADUAL & BUTANG BERSIHKAN SEJARAH --}}
                <div class="mb-6 border-b border-slate-900/10 pb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-base font-black text-slate-800 tracking-wide flex items-center gap-2 uppercase">
                            📋 Sejarah Tempahan Fasiliti Kolej
                        </h3>
                        <p class="text-slate-600 text-xs mt-0.5 font-semibold">Senarai di bawah memaparkan status terkini, kelulusan, serta ulasan rasmi daripada pentadbiran kolej.</p>
                    </div>
                    
                    {{-- Butang Padam Sejarah (Hanya muncul jika ada rekod) --}}
                    @if(count($bookings) > 0)
                        <form action="{{ route('bookings.clear_history') }}" method="POST" onsubmit="return confirm('AMARAN: Adakah anda pasti? Tindakan ini akan memadam semua sejarah permohonan tempahan anda dari paparan ini secara kekal.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2.5 bg-rose-100 text-rose-700 hover:bg-rose-200 hover:text-rose-800 font-black uppercase tracking-widest rounded-xl text-[10px] flex items-center gap-2 transition duration-200 shadow-sm border border-rose-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                Bersihkan Sejarah
                            </button>
                        </form>
                    @else
                        <span class="text-[10px] font-black bg-slate-900/10 text-slate-800 px-3 py-1.5 rounded-xl border border-slate-300 uppercase tracking-wider self-start md:self-center">
                            Tiada Rekod
                        </span>
                    @endif
                </div>

                {{-- STRUKTUR JADUAL KONTRAST TINGGI --}}
                <div class="overflow-x-auto rounded-2xl border border-slate-900/10 bg-white/50 backdrop-blur-sm">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-900/5 border-b border-slate-900/10 text-slate-800 text-xs font-black uppercase tracking-wider">
                                <th class="p-4 rounded-l-xl">Fasiliti / Aset</th>
                                <th class="p-4">Tarikh Guna</th>
                                <th class="p-4">Masa Sesi</th>
                                <th class="p-4">Tujuan Program</th>
                                <th class="p-4">Status Kelulusan</th>
                                <th class="p-4 rounded-r-xl">Catatan / Ulasan Pentadbir</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-slate-800 text-sm divide-y divide-slate-900/10">
                            @forelse($bookings as $booking)
                                <tr class="hover:bg-white/60 transition duration-150 group">
                                    {{-- NAMA FASILITI & HARGA --}}
                                    <td class="p-4 font-black text-slate-900 text-sm group-hover:text-blue-600 transition-colors duration-150">
                                        {{ $booking->nama_kab ?? 'Fasiliti ID: '.$booking->kab_id }}
                                        <div class="text-[10px] text-slate-500 font-semibold mt-1">Kod: {{ $booking->no_kab ?? 'Tiada Kod' }}</div>
                                        
                                        {{-- Paparan Caj Bayaran (Jika ada RM5, tunjuk warna oren. Jika Kosong, warna hijau) --}}
                                        @if(isset($booking->jumlah_bayaran) && $booking->jumlah_bayaran > 0)
                                            <div class="mt-2 inline-flex items-center gap-1 px-2.5 py-1 bg-amber-100 text-amber-700 border border-amber-200 rounded-lg text-[10px] font-black uppercase tracking-wider">
                                                💰 RM {{ number_format($booking->jumlah_bayaran, 2) }}
                                            </div>
                                        @else
                                            <div class="mt-2 inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-lg text-[10px] font-black uppercase tracking-wider">
                                                🆓 Percuma
                                            </div>
                                        @endif
                                    </td>
                                    
                                    {{-- TARIKH GUNA --}}
                                    <td class="p-4 whitespace-nowrap text-xs font-extrabold text-blue-600">
                                        {{ \Carbon\Carbon::parse($booking->tarikh_mula)->format('d M Y') }} 
                                            @if($booking->tarikh_mula != $booking->tarikh_tamat)
                                                - {{ \Carbon\Carbon::parse($booking->tarikh_tamat)->format('d M Y') }}
                                            @endif
                                    </td>
                                    
                                    {{-- MASA SESI --}}
                                    <td class="p-4 whitespace-nowrap text-xs text-slate-600 font-bold">
                                        {{ \Carbon\Carbon::parse($booking->masa_mula)->format('h:i A') }} - {{ \Carbon\Carbon::parse($booking->masa_tamat)->format('h:i A') }}
                                    </td>
                                    
                                    {{-- TUJUAN PROGRAM --}}
                                    <td class="p-4 max-w-xs truncate text-xs text-slate-600 font-semibold" title="{{ $booking->tujuan_tempahan }}">
                                        {{ $booking->tujuan_tempahan }}
                                    </td>
                                    
                                    {{-- STATUS KELULUSAN --}}
                                    <td class="p-4 whitespace-nowrap">
                                        @if($booking->status_kelulusan === 'pending')
                                            <span class="px-3 py-1.5 bg-amber-500 text-white rounded-xl text-xs font-black uppercase tracking-wider inline-block shadow-sm">Menunggu Pejabat</span>
                                        @elseif($booking->status_kelulusan === 'disokong_pejabat')
                                            <span class="px-3 py-1.5 bg-blue-500 text-white rounded-xl text-xs font-black uppercase tracking-wider inline-block shadow-sm">Disokong Pejabat</span>
                                        @elseif($booking->status_kelulusan === 'lulus_muktamad')
                                            <div class="flex flex-col items-start gap-2">
                                                <span class="px-3 py-1.5 bg-emerald-500 text-white rounded-xl text-xs font-black uppercase tracking-wider inline-block shadow-sm">Lulus Muktamad</span>
                                                {{-- Butang Cetak PDF --}}
                                                <a href="{{ route('bookings.pdf', $booking->id) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-red-600 to-rose-600 hover:brightness-110 text-white text-[10px] font-black uppercase tracking-wider rounded-lg shadow-md transition duration-150">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                    </svg>
                                                    Cetak PDF
                                                </a>
                                            </div>
                                        @elseif($booking->status_kelulusan === 'ditolak_pejabat' || $booking->status_kelulusan === 'ditolak_pengetua')
                                            <span class="px-3 py-1.5 bg-rose-600 text-white rounded-xl text-xs font-black uppercase tracking-wider inline-block shadow-sm">Ditolak</span>
                                        @endif
                                    </td>
                                    
                                    {{-- CATATAN PENTADBIR --}}
                                    <td class="p-4 text-xs font-semibold text-slate-800">
                                        @if(isset($booking->catatan_pejabat) && $booking->catatan_pejabat) 
                                            <div class="bg-white/60 p-2.5 rounded-xl border border-slate-900/5 text-slate-700 shadow-sm"><strong>Pejabat:</strong> {{ $booking->catatan_pejabat }}</div> 
                                        @endif
                                        @if(isset($booking->catatan_pengetua) && $booking->catatan_pengetua) 
                                            <div class="mt-2 bg-white/60 p-2.5 rounded-xl border border-slate-900/5 text-slate-700 shadow-sm"><strong>Pengetua:</strong> {{ $booking->catatan_pengetua }}</div> 
                                        @endif
                                        @if(empty($booking->catatan_pejabat) && empty($booking->catatan_pengetua)) 
                                            <span class="text-slate-500 font-bold italic">Tiada ulasan</span> 
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-16 text-center text-slate-500 font-bold tracking-wide bg-white/40">
                                        ℹ️ Tiada sebarang rekod permohonan tempahan ditemui dalam sistem.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>