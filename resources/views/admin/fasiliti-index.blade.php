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

    nav [class*="origin-top-right"],
    nav .absolute {
        z-index: 99999 !important;
        background-color: #ffffff !important;
        border: 1px solid rgba(15, 23, 42, 0.08) !important;
        border-radius: 12px !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
        padding: 6px !important;
    }

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

    nav [class*="origin-top-right"] a:hover, 
    nav .absolute a:hover,
    nav [class*="origin-top-right"] button:hover {
        background-color: #f1f5f9 !important;
        color: #f28c18 !important;
    }
</style>

@section('title', 'Urus Direktori Fasiliti')
<x-app-layout>
    <x-slot name="header">
        {{-- BANNER HEADER: SLATE CORPORATE BLUE CAP --}}
        <div class="bg-[#1e293b] p-5 rounded-2xl shadow-md flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative z-40 border border-slate-700/50">
            
            <h2 class="font-black text-xl text-white leading-tight flex items-center gap-3 tracking-wide">
                <div class="p-2 bg-slate-800 text-amber-400 rounded-xl border border-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <span class="uppercase font-extrabold text-base tracking-wider text-slate-100">
                    {{ __('Urus Direktori Fasiliti Kolej') }}
                </span>
            </h2>
            
            <div class="flex items-center gap-3 w-full sm:w-auto">
                <span class="px-4 py-2 bg-slate-800 border border-slate-600 text-amber-400 rounded-xl text-xs font-black uppercase tracking-widest shadow-inner">
                    Peranan: {{ Auth::user()->role }}
                </span>
                
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-xs font-bold uppercase tracking-widest rounded-xl border border-slate-600 transition duration-150 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded-xl relative shadow-sm flex items-center gap-2" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span class="block sm:inline font-bold text-sm">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- INTERFACE BASE --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920'); mt-[-1rem]">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-20 mt-2">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                {{-- KAWASAN KIRI: BORANG TAMBAH FASILITI --}}
                <div class="bg-[#fbf9f4]/95 backdrop-blur-md shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] border border-white/40 rounded-3xl p-6 sm:p-8 h-fit">
                    
                    <h3 class="text-base font-black text-slate-800 tracking-wide flex items-center gap-2 uppercase mb-6 border-b border-slate-900/10 pb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Tambah Direktori Baru
                    </h3>
                    
                    @if ($errors->any())
                        <div class="p-4 mb-6 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-xl shadow-sm">
                            <strong class="block mb-2 font-black flex items-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Ralat Input:
                            </strong>
                            <ul class="list-disc pl-5 space-y-1 font-semibold">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.fasiliti.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        
                        <div>
                            <label class="block text-[11px] font-black text-slate-800 uppercase tracking-wider mb-2">Nama Fasiliti / Barang</label>
                            <input type="text" name="nama_kab" required placeholder="Cth: Gelanggang Futsal, PA Sistem" class="w-full text-sm font-semibold px-4 py-3 bg-white/80 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 shadow-sm transition">
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-slate-800 uppercase tracking-wider mb-2">No. Kod (Opsional)</label>
                            <input type="text" name="no_kab" placeholder="Cth: GLG01, PAS02" class="w-full text-sm font-semibold px-4 py-3 bg-white/80 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 shadow-sm transition">
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-slate-800 uppercase tracking-wider mb-2">Kategori</label>
                            <div class="relative">
                                <select name="kategori" required class="w-full text-sm font-bold px-4 py-3 bg-white/80 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 shadow-sm transition appearance-none">
                                    <option value="tempat">Tempat / Ruang</option>
                                    <option value="peralatan">Peralatan Logistik</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-slate-800 uppercase tracking-wider mb-2">Status Ketersediaan</label>
                            <div class="relative">
                                <select name="status" required class="w-full text-sm font-bold px-4 py-3 bg-white/80 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 shadow-sm transition appearance-none">
                                    <option value="available">Tersedia (Boleh Ditempah)</option>
                                    <option value="maintenance">Sedang Diselenggara (Disekat)</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2">
                            <label class="block text-[11px] font-black text-slate-800 uppercase tracking-wider mb-2">Gambar Fasiliti</label>
                            <input type="file" name="gambar" id="gambar" accept="image/*" class="w-full text-xs font-bold text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-wider file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 file:transition cursor-pointer bg-white/80 rounded-xl border border-slate-200 shadow-sm">
                            <p class="text-[10px] text-slate-500 font-semibold mt-2 px-1">Format: JPG, PNG, WEBP (Max: 5MB)</p>
                        </div>

                        <div class="pt-4 border-t border-slate-900/10">
                            <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-md transition duration-150 flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                Simpan Rekod
                            </button>
                        </div>
                    </form>
                </div>

                {{-- KAWASAN KANAN: SENARAI JADUAL FASILITI --}}
                <div class="lg:col-span-2 bg-[#fbf9f4]/95 backdrop-blur-md shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] border border-white/40 rounded-3xl overflow-hidden">
                    
                    <div class="p-6 border-b border-slate-900/10">
                        <h3 class="text-base font-black text-slate-800 tracking-wide flex items-center gap-2 uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                            Senarai Direktori Semasa
                        </h3>
                    </div>

                    <div class="overflow-x-auto bg-white/40">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-900/5 text-[11px] font-black text-slate-800 uppercase tracking-wider border-b border-slate-900/10">
                                    <th class="p-4 pl-6">Imej</th>
                                    <th class="p-4">Maklumat Fasiliti</th>
                                    <th class="p-4">Kategori & Status</th>
                                    <th class="p-4 text-center pr-6">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-900/10 text-sm text-slate-800">
                                @forelse($fasiliti as $item)
                                    <tr class="hover:bg-white/60 transition duration-150 group">
                                        
                                        {{-- GAMBAR --}}
                                        <td class="p-4 pl-6">
                                            @if($item->gambar)
                                                <img src="{{ asset('images/fasiliti/' . $item->gambar) }}" alt="{{ $item->nama_kab }}" class="w-16 h-16 object-cover rounded-xl border-2 border-white shadow-sm">
                                            @else
                                                <div class="w-16 h-16 bg-slate-100 border border-slate-200 rounded-xl flex flex-col items-center justify-center text-[9px] text-slate-400 font-bold shadow-inner">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mb-0.5 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                                    Tiada
                                                </div>
                                            @endif
                                        </td>
                                        
                                        {{-- MAKLUMAT --}}
                                        <td class="p-4">
                                            <div class="font-black text-slate-900 group-hover:text-blue-600 transition-colors">{{ $item->nama_kab }}</div>
                                            <div class="text-[10px] font-bold text-slate-500 mt-1 uppercase tracking-wider">
                                                Kod: {{ $item->no_kab ?: 'Tiada' }}
                                            </div>
                                        </td>
                                        
                                        {{-- KATEGORI & STATUS --}}
                                        <td class="p-4">
                                            <div class="flex flex-col gap-2 items-start">
                                                @if($item->kategori === "tempat")
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-blue-100 text-blue-700 rounded-lg text-[10px] font-black uppercase tracking-wider border border-blue-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                                        Tempat
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-100 text-amber-700 rounded-lg text-[10px] font-black uppercase tracking-wider border border-amber-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                                                        Peralatan
                                                    </span>
                                                @endif
                                                
                                                @if($item->status === 'available')
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-[10px] font-black uppercase tracking-wider border border-emerald-200 shadow-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                                        Tersedia
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-rose-100 text-rose-700 rounded-lg text-[10px] font-black uppercase tracking-wider border border-rose-200 shadow-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
                                                        Disekat
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        
                                        {{-- BUTANG TINDAKAN KELULUSAN (IKON + TEXT) --}}
                                        <td class="p-4 pr-6 text-center">
                                            <div class="flex flex-col items-center justify-center gap-2">
                                                
                                                {{-- BUTTON EDIT --}}
                                                <a href="{{ route('admin.fasiliti.edit', $item->id) }}" class="w-full inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-blue-50 hover:bg-blue-600 hover:text-white text-blue-700 rounded-xl text-[10px] font-black uppercase tracking-wider transition shadow-sm border border-blue-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                                    Edit
                                                </a>
                                                
                                                {{-- BUTTON PADAM --}}
                                                <form action="{{ route('admin.fasiliti.delete', $item->id) }}" method="POST" onsubmit="return confirm('AMARAN: Adakah anda pasti mahu memadam fasiliti ini secara kekal? Fail gambar juga akan dibuang dari pelayan (server).');" class="w-full inline-block m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-full inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-rose-50 hover:bg-rose-600 hover:text-white text-rose-700 rounded-xl text-[10px] font-black uppercase tracking-wider transition shadow-sm border border-rose-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                        Padam
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-16 text-center text-slate-500 font-bold tracking-wide">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-slate-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                            Tiada sebarang data fasiliti direkodkan.<br>Sila tambah menggunakan borang di sebelah.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>