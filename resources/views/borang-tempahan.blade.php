<x-app-layout>
    <x-slot name="header">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permohonan Tempahan Baru') }}
        </h2>
        
        {{-- BUTTONS NAVIGASI PANTAS PELAJAR --}}
        <div class="flex items-center gap-2 w-full sm:w-auto">
            <a href="{{ route('bookings.status') }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold rounded-xl shadow transition flex items-center gap-1">
                📋 Semak Status Permohonan
            </a>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-xs font-bold rounded-xl shadow transition">
                ⬅️ Dashboard
            </a>
        </div>
    </div>
</x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Borang Tempahan --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 sm:p-8 text-white">
                    <h3 class="text-2xl font-bold">Borang Tempahan Baru (Sesi {{ Auth::user()->role === 'student' ? 'Pelajar' : 'Bukan Pelajar/Staf' }})</h3>
                    <p class="text-blue-100 text-sm mt-1">Sila isi maklumat di bawah dengan lengkap untuk kelulusan kolej.</p>
                </div>

                <form action="{{ route('bookings.store') }}" method="POST" class="p-6 sm:p-8 space-y-6">
                    @csrf

                    {{-- SELECTIONS FASILITI DINAMIK --}}
                    <div>
                        <label for="kab_id" class="block text-sm font-semibold text-gray-700 mb-2">Pilih Fasiliti / Peralatan</label>
                        <select id="kab_id" name="kab_id" class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required>
                            <option value="">-- Sila Pilih Fasiliti Semasa --</option>
                            @foreach($kabs as $fasiliti)
                                {{-- Mengesan 'kab_id' dari URL dan 'auto-select' item tersebut --}}
                                <option value="{{ $fasiliti->id }}" {{ request('kab_id') == $fasiliti->id ? 'selected' : '' }}>
                                    [{{ strtoupper($fasiliti->kategori) }}] {{ $fasiliti->nama_kab }} {{ $fasiliti->no_kab ? '('.$fasiliti->no_kab.')' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- GRID INPUT TARIKH & MASA --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="tarikh_guna" class="block text-sm font-semibold text-gray-700 mb-2">Tarikh Guna</label>
                            <input type="date" id="tarikh_guna" name="tarikh_guna" class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required>
                        </div>
                        <div>
                            <label for="masa_mula" class="block text-sm font-semibold text-gray-700 mb-2">Masa Mula</label>
                            <input type="time" id="masa_mula" name="masa_mula" class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required>
                        </div>
                        <div>
                            <label for="masa_tamat" class="block text-sm font-semibold text-gray-700 mb-2">Masa Tamat</label>
                            <input type="time" id="masa_tamat" name="masa_tamat" class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required>
                        </div>
                    </div>

                    {{-- TUJUAN TEMPAHAN --}}
                    <div>
                        <label for="tujuan_tempahan" class="block text-sm font-semibold text-gray-700 mb-2">Tujuan Tempahan / Nama Program</label>
                        <textarea id="tujuan_tempahan" name="tujuan_tempahan" rows="4" placeholder="Contoh: Mesyuarat Ahli Jawatankuasa MEP / Aktiviti Staf..." class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required></textarea>
                    </div>

                    {{-- AMARAN PERTINDIHAN --}}
                    @error('booking_conflict')
                        <div class="mt-4 p-4 text-sm text-red-800 rounded-xl bg-red-50 border border-red-200 flex items-center gap-2 animate-pulse" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <div>
                                <span class="font-bold">Slot Bertindih!</span> {{ $message }}
                            </div>
                        </div>
                    @enderror

                    <div class="flex justify-end pt-4 border-t border-gray-100 mt-4">
                        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md transition duration-200">
                            Hantar Tempahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>