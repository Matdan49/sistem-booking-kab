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

    nav [class*="origin-top-right"], nav .absolute {
        z-index: 99999 !important;
        background-color: #ffffff !important;
        border: 1px solid rgba(15, 23, 42, 0.08) !important;
        border-radius: 12px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
        padding: 6px !important;
    }

    nav [class*="origin-top-right"] a, nav [class*="origin-top-right"] button,
    nav .absolute a, nav .absolute button {
        color: #334155 !important; font-weight: 700 !important; font-size: 13px !important;
        border-radius: 8px !important; transition: all 0.15s ease !important;
    }

    nav [class*="origin-top-right"] a:hover, nav .absolute a:hover,
    nav [class*="origin-top-right"] button:hover {
        background-color: #f1f5f9 !important; color: #f28c18 !important;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        {{-- BANNER HEADER: SLATE CORPORATE BLUE CAP --}}
        <div class="bg-[#1e293b] p-5 rounded-2xl shadow-md flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative z-40 border border-slate-700/50">
            
            <h2 class="font-black text-xl text-white leading-tight flex items-center gap-3 tracking-wide">
                <div class="p-2 bg-slate-800 text-amber-400 rounded-xl border border-slate-700">
                    {{-- SVG Ikon Admin Professional --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <span class="uppercase font-extrabold text-base tracking-wider text-slate-100">
                    {{ __('Pusat Kawalan Kelulusan KAB') }}
                </span>
            </h2>
            
            <div class="flex gap-2">
                <a href="{{ route('admin.fasiliti.index') }}" class="flex items-center gap-2 px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold uppercase tracking-widest rounded-xl border border-slate-700 transition duration-150 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    Urus Fasiliti
                </a>
            </div>
        </div>
    </x-slot>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded-xl relative shadow-sm flex items-center gap-2" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span class="block sm:inline font-bold text-sm">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- Notifikasi Ralat --}}
    @if(session('error'))
        <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="bg-rose-100 border border-rose-400 text-rose-800 px-4 py-3 rounded-xl relative shadow-sm flex items-center gap-2" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span class="block sm:inline font-bold text-sm">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    {{-- INTERFACE BASE --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920'); mt-[-1rem]">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-20">
            
            <div class="bg-[#fbf9f4]/90 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] rounded-3xl p-6 sm:p-8 mt-2">
                
                <div class="mb-6 border-b border-slate-900/10 pb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-base font-black text-slate-800 tracking-wide flex items-center gap-2 uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                            Senarai Tindakan Kelulusan
                        </h3>
                        <p class="text-slate-600 text-xs mt-0.5 font-semibold">Urus dan pantau semua permohonan fasiliti kolej di sini.</p>
                    </div>
                </div>

                {{-- STRUKTUR JADUAL KONTRAST TINGGI --}}
                <div class="overflow-x-auto rounded-2xl border border-slate-900/10 bg-white/50 backdrop-blur-sm">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-900/5 border-b border-slate-900/10 text-slate-800 text-xs font-black uppercase tracking-wider">
                                <th class="p-4 rounded-l-xl">Pemohon & Fasiliti</th>
                                <th class="p-4">Tarikh & Masa</th>
                                <th class="p-4">Tujuan</th>
                                <th class="p-4">Status</th>
                                <th class="p-4 rounded-r-xl">Tindakan Admin</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-slate-800 text-sm divide-y divide-slate-900/10">
                            @forelse($bookings as $booking)
                                @if(empty($booking->is_hidden) || $booking->is_hidden == 0)
                                <tr class="hover:bg-white/60 transition duration-150 group">
                                    
                                    {{-- MAKLUMAT PEMOHON & FASILITI --}}
                                    <td class="p-4 font-black text-slate-900 text-sm">
                                        <div class="flex items-center gap-2 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                            {{ $booking->nama_pemohon ?? 'Pelajar' }}
                                        </div>
                                        <div class="text-xs text-blue-700 mt-1 font-bold">{{ $booking->nama_kab }}</div>
                                        @if(isset($booking->jumlah_bayaran) && $booking->jumlah_bayaran > 0)
                                            <div class="mt-2 inline-block px-2 py-0.5 bg-amber-100 text-amber-700 border border-amber-200 rounded text-[10px] font-black uppercase">
                                                Caj: RM {{ number_format($booking->jumlah_bayaran, 2) }}
                                            </div>
                                        @endif
                                    </td>
                                    
                                    {{-- TARIKH GUNA --}}
                                    <td class="p-4 text-xs font-semibold text-slate-700">
                                        <div class="flex items-center gap-1.5 text-blue-700 font-black mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            {{ \Carbon\Carbon::parse($booking->tarikh_mula)->format('d M Y') }} 
                                            @if($booking->tarikh_mula != $booking->tarikh_tamat)
                                                - {{ \Carbon\Carbon::parse($booking->tarikh_tamat)->format('d M Y') }}
                                            @endif
                                        </div>
                                        <div class="flex items-center gap-1.5 text-slate-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ \Carbon\Carbon::parse($booking->masa_mula)->format('h:i A') }} - {{ \Carbon\Carbon::parse($booking->masa_tamat)->format('h:i A') }}
                                        </div>
                                    </td>
                                    
                                    {{-- TUJUAN PROGRAM --}}
                                    <td class="p-4 max-w-[150px] text-xs text-slate-600 font-semibold leading-relaxed">
                                        {{ $booking->tujuan_tempahan }}
                                    </td>
                                    
                                    {{-- STATUS KELULUSAN --}}
                                    <td class="p-4 whitespace-nowrap">
                                        @if($booking->status_kelulusan === 'pending')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-100 border border-amber-200 text-amber-700 rounded-lg text-[10px] font-black uppercase tracking-wider shadow-sm">
                                                <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span></span>
                                                Menunggu Pejabat
                                            </span>
                                        @elseif($booking->status_kelulusan === 'disokong_pejabat')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-100 border border-blue-200 text-blue-700 rounded-lg text-[10px] font-black uppercase tracking-wider shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                Disokong
                                            </span>
                                        @elseif($booking->status_kelulusan === 'lulus_muktamad')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-100 border border-emerald-300 text-emerald-800 rounded-lg text-[10px] font-black uppercase tracking-wider shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                                Lulus Muktamad
                                            </span>
                                        @elseif($booking->status_kelulusan === 'ditolak_pejabat' || $booking->status_kelulusan === 'ditolak_pengetua')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-rose-100 border border-rose-300 text-rose-800 rounded-lg text-[10px] font-black uppercase tracking-wider shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                                Ditolak
                                            </span>
                                        @endif
                                    </td>
                                    
                                    {{-- BUTANG TINDAKAN KELULUSAN --}}
                                    <td class="p-4">
                                        @if(Auth::user()->role === 'pejabat' && $booking->status_kelulusan === 'pending')
                                            <form action="{{ route('bookings.sahkan.pejabat', $booking->id) }}" method="POST" class="mb-2" onsubmit="return confirm('Sokong permohonan ini ke Pengetua?');">
                                                @csrf
                                                <button type="submit" class="w-full flex items-center justify-center gap-1.5 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-[10px] font-black uppercase tracking-wider shadow transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                                    Sokong Permohonan
                                                </button>
                                            </form>
                                            <form action="{{ route('bookings.tolak', $booking->id) }}" method="POST" onsubmit="return confirm('Pasti untuk tolak?');">
                                                @csrf
                                                <input type="text" name="catatan" placeholder="Sebab ditolak..." class="w-full text-[10px] p-1.5 mb-1 border border-rose-200 rounded-lg focus:ring-rose-500 focus:border-rose-500" required>
                                                <button type="submit" class="w-full flex items-center justify-center gap-1.5 px-3 py-1.5 bg-rose-100 hover:bg-rose-200 text-rose-700 rounded-lg text-[10px] font-black uppercase tracking-wider shadow-sm transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                                    Tolak
                                                </button>
                                            </form>
                                        
                                        @elseif(Auth::user()->role === 'pengetua' && $booking->status_kelulusan === 'disokong_pejabat')
                                            <form action="{{ route('bookings.lulus.pengetua', $booking->id) }}" method="POST" class="mb-2" onsubmit="return confirm('Luluskan permohonan ini secara muktamad?');">
                                                @csrf
                                                <input type="text" name="catatan" placeholder="Nota pengetua (pilihan)..." class="w-full text-[10px] p-1.5 mb-1 border border-emerald-200 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                                                <button type="submit" class="w-full flex items-center justify-center gap-1.5 px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-[10px] font-black uppercase tracking-wider shadow transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                    Lulus Muktamad
                                                </button>
                                            </form>
                                            <form action="{{ route('bookings.tolak', $booking->id) }}" method="POST" onsubmit="return confirm('Pasti untuk tolak?');">
                                                @csrf
                                                <input type="text" name="catatan" placeholder="Sebab ditolak..." class="w-full text-[10px] p-1.5 mb-1 border border-rose-200 rounded-lg focus:ring-rose-500 focus:border-rose-500" required>
                                                <button type="submit" class="w-full flex items-center justify-center gap-1.5 px-3 py-1.5 bg-rose-100 hover:bg-rose-200 text-rose-700 rounded-lg text-[10px] font-black uppercase tracking-wider shadow-sm transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                                    Tolak
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-[10px] text-slate-400 font-bold italic flex items-center justify-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                                Selesai / Tiada Tindakan
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="5" class="p-16 text-center text-slate-500 font-bold tracking-wide bg-white/40">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-slate-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                        Tiada sebarang rekod permohonan tempahan menunggu dalam sistem.
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