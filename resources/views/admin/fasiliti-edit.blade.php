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

@section('title', 'Kemaskini Fasiliti')
<x-app-layout>
    
    <x-slot name="header">
        {{-- BANNER HEADER: SLATE CORPORATE BLUE CAP --}}
        <div class="bg-[#1e293b] p-5 rounded-2xl shadow-md flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative z-40 border border-slate-700/50">
            <h2 class="font-black text-xl text-white leading-tight flex items-center gap-3 tracking-wide">
                <div class="p-2 bg-slate-800 text-amber-400 rounded-xl border border-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <span class="uppercase font-extrabold text-base tracking-wider text-slate-100">
                    {{ __('Kemaskini Fasiliti / Peralatan') }}
                </span>
            </h2>
            
            <div class="flex items-center w-full sm:w-auto">
                <a href="{{ route('admin.fasiliti.index') }}" class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white text-xs font-black uppercase tracking-wider rounded-xl border border-slate-700 shadow transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Senarai
                </a>
            </div>
        </div>
    </x-slot>

    {{-- INTERFACE BASE: Latar Belakang --}}
    <div class="py-12 min-h-screen relative z-10 antialiased bg-cover bg-center bg-no-repeat bg-fixed" 
         style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd99615a0f?q=80&w=1920'); mt-[-1rem]">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 relative z-20 mt-2">
            
            <div class="bg-[#fbf9f4]/95 backdrop-blur-md border border-white/40 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] rounded-3xl p-6 sm:p-10">
                
                <h2 class="text-lg font-black mb-8 text-slate-800 flex items-center gap-2 uppercase tracking-wide border-b border-slate-900/10 pb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                    Fasiliti Semasa: <span class="text-blue-700">{{ $fasiliti->nama_kab }}</span>
                </h2>
                
                <form action="{{ route('admin.fasiliti.update', $fasiliti->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    
                    <input type="hidden" name="kategori" value="{{ $fasiliti->kategori }}">
                    <input type="hidden" name="no_kab" value="{{ $fasiliti->no_kab }}">
                    
                    <div class="space-y-6">
                        
                        {{-- NAMA FASILITI --}}
                        <div>
                            <label class="block text-xs font-black text-slate-800 uppercase tracking-wider mb-2">Nama Fasiliti / Ruang</label>
                            <input type="text" name="nama_kab" value="{{ $fasiliti->nama_kab }}" required class="w-full p-3.5 border border-slate-200 rounded-xl bg-white/80 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 font-semibold shadow-sm transition">
                        </div>
                        
                        {{-- STATUS FASILITI --}}
                        <div>
                            <label class="block text-xs font-black text-slate-800 uppercase tracking-wider mb-2">Status Operasi</label>
                            <div class="relative">
                                <select name="status" class="w-full p-3.5 pl-10 border border-slate-200 rounded-xl bg-white/80 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 font-bold shadow-sm transition appearance-none">
                                    <option value="available" {{ $fasiliti->status == 'available' ? 'selected' : '' }}>Tersedia (Boleh Ditempah Klien)</option>
                                    <option value="maintenance" {{ $fasiliti->status == 'maintenance' ? 'selected' : '' }}>Sedang Diselenggara (Ditutup sementara)</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                            </div>
                        </div>

                        {{-- PREVIEW & MUAT NAIK GAMBAR BAHARU --}}
                        <div class="p-6 bg-white/60 border border-slate-200 rounded-2xl shadow-sm relative">
                            <div class="absolute -top-3 left-4 px-3 py-0.5 bg-[#fbf9f4] text-[10px] font-black uppercase tracking-widest text-slate-500 rounded-full border border-slate-200">
                                Gambar Fasiliti
                            </div>
                            
                            <div class="flex flex-col sm:flex-row items-start gap-6 mt-3">
                                {{-- Kotak Preview Gambar Lama --}}
                                <div class="flex-shrink-0">
                                    @if($fasiliti->gambar)
                                        <div class="relative w-32 h-32 rounded-xl overflow-hidden border-2 border-white shadow-md">
                                            <img src="{{ asset('images/fasiliti/' . $fasiliti->gambar) }}" alt="Gambar {{ $fasiliti->nama_kab }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="w-32 h-32 rounded-xl border-2 border-dashed border-slate-300 flex flex-col items-center justify-center bg-slate-50 text-slate-400 p-2 shadow-inner">
                                            <svg class="w-8 h-8 mb-1 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            <span class="text-[10px] font-bold">Tiada Gambar</span>
                                        </div>
                                    @endif
                                </div>
                                
                                {{-- Input Fail Baharu --}}
                                <div class="flex-1 w-full mt-2 sm:mt-0">
                                    <input type="file" name="gambar" accept="image/jpeg,image/png,image/jpg,image/webp" 
                                        class="w-full p-2 border border-slate-300 rounded-xl bg-white text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 file:transition cursor-pointer shadow-sm">
                                    
                                    <div class="mt-4 text-[11px] text-slate-500 space-y-1.5 p-3 bg-amber-50 rounded-xl border border-amber-100">
                                        <p class="font-bold text-amber-700 flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            Biarkan kosong jika tidak mahu menukar gambar sedia ada.
                                        </p>
                                        <p class="font-semibold text-slate-600 pl-5">Format dibenarkan: JPG, PNG, WEBP (Maks 5MB).</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- BUTANG TINDAKAN --}}
                        <div class="pt-6 border-t border-slate-900/10 flex flex-col sm:flex-row gap-3">
                            <button type="submit" class="flex-1 py-3.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-black uppercase tracking-widest shadow-md transition flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.fasiliti.index') }}" class="py-3.5 px-6 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl font-black uppercase tracking-widest text-xs text-center shadow-sm transition">
                                Batal
                            </a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>