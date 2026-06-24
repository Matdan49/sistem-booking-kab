<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Tempahan Fasiliti Kolej KAB') }}
        </h2>
    </x-slot>

    {{-- Mesej Berjaya / Ralat --}}
    @if(session('success'))
        <div class="max-w-6xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-6xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- ====================================================================== --}}
            {{-- KUMPULAN PEMOHON (student ATAU non-student)                           --}}
            {{-- ====================================================================== --}}
            @if(Auth::user()->role === 'student' || Auth::user()->role === 'non-student')
                
                {{-- 💡 DI SINI BUTANG SEMAK STATUS DIWUKUDKAN --}}
                <div class="max-w-4xl mx-auto bg-blue-50 border border-blue-200 p-5 rounded-2xl flex flex-col sm:flex-row justify-between items-center gap-4 shadow-sm mb-6">
                    <div class="text-sm text-blue-800 text-center sm:text-left font-medium">
                        📌 Mahu melihat senarai keputusan atau status kelulusan borang terdahulu?
                    </div>
                    <a href="{{ route('bookings.status') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl transition shadow-md whitespace-nowrap">
                        📋 Semak Status Permohonan
                    </a>
                </div>

                {{-- Borang Tempahan --}}
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 sm:p-8 text-white">
                        <h3 class="text-2xl font-bold">Borang Tempahan Baru (Sesi {{ Auth::user()->role === 'student' ? 'Pelajar' : 'Bukan Pelajar/Staf' }})</h3>
                        <p class="text-blue-100 text-sm mt-1">Sila isi maklumat di bawah dengan lengkap untuk kelulusan kolej.</p>
                    </div>

                    <form action="{{ route('bookings.store') }}" method="POST" class="p-6 sm:p-8 space-y-6">
                        @csrf

                        <div>
                            <label for="kab_id" class="block text-sm font-semibold text-gray-700 mb-2">Pilih Fasiliti</label>
                            <select id="kab_id" name="kab_id" class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required>
                                <option value="">-- Sila Pilih Fasiliti --</option>
                                <option value="1">Dewan Besar KAB (ID: 1)</option>
                                <option value="2">Bilik Seminar Utama (ID: 2)</option>
                                <option value="3">Gelanggang Futsal (ID: 3)</option>
                            </select>
                        </div>

                        <div>
                            <label_for="tarikh_guna" class="block text-sm font-semibold text-gray-700 mb-2">Tarikh Guna</label>
                            <input type="date" id="tarikh_guna" name="tarikh_guna" class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label_for="masa_mula" class="block text-sm font-semibold text-gray-700 mb-2">Masa Mula</label>
                                <input type="time" id="masa_mula" name="masa_mula" class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required>
                            </div>

                            <div>
                                <label_for="masa_tamat" class="block text-sm font-semibold text-gray-700 mb-2">Masa Tamat</label>
                                <input type="time" id="masa_tamat" name="masa_tamat" class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required>
                            </div>
                        </div>

                        <div>
                            <label_for="tujuan_tempahan" class="block text-sm font-semibold text-gray-700 mb-2">Tujuan Tempahan / Nama Program</label>
                            <textarea id="tujuan_tempahan" name="tujuan_tempahan" rows="4" placeholder="Contoh: Mesyuarat Ahli Jawatankuasa MEP / Aktiviti Staf..." class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200" required></textarea>
                        </div>

                        <div class="flex justify-end pt-4 border-t border-gray-100">
                            <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md transition duration-200">
                                Hantar Tempahan
                            </button>
                        </div>
                    </form>
                </div>

            {{-- ====================================================================== --}}
            {{-- KUMPULAN PENTADBIR / ADMIN (pejabat ATAU pengetua)                     --}}
            {{-- ====================================================================== --}}
            @else
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-6 sm:p-8">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-800">🔒 Panel Kelulusan Tempahan (Sesi {{ ucfirst(Auth::user()->role) }})</h3>
                        <p class="text-gray-500 text-sm mt-1">Senarai permohonan aktif yang memerlukan tindakan kelulusan anda.</p>
                    </div>

                    <div class="space-y-6">
                        @forelse($bookings as $booking)
                            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                                <div class="space-y-2">
                                    <div class="flex items-center gap-3">
                                        <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-lg text-xs font-bold">
                                            {{ $booking->nama_kab ?? 'Fasiliti ID: '.$booking->kab_id }}
                                        </span>
                                        <span class="text-sm text-gray-500">Pemohon: <strong>{{ $booking->nama_pemohon ?? 'Pengguna KAB' }}</strong> ({{ ucfirst($booking->role_pemohon ?? 'User') }})</span>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800">{{ $booking->tujuan_tempahan }}</h4>
                                    <p class="text-sm text-gray-600">
                                        📅 Tarikh: <strong>{{ $booking->tarikh_guna }}</strong> | ⏰ Masa: <strong>{{ $booking->masa_mula }} - {{ $booking->masa_tamat }}</strong>
                                    </p>
                                    @if(isset($booking->catatan_pejabat) && $booking->catatan_pejabat)
                                        <p class="text-xs text-blue-700 bg-blue-50 p-2 rounded-lg"><strong>Ulasan Pejabat:</strong> {{ $booking->catatan_pejabat }}</p>
                                    @endif
                                </div>

                                <div class="w-full md:w-auto">
                                    <form method="POST" class="space-y-3">
                                        @csrf
                                        <input type="text" name="catatan" placeholder="Tulis catatan/ulasan di sini..." class="w-full md:w-64 px-3 py-2 text-sm rounded-xl border-gray-200 bg-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                                        
                                        <div class="flex gap-2 justify-end">
                                            <button type="submit" formaction="{{ route('bookings.tolak', $booking->id) }}" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-xl transition duration-200">
                                                ❌ Tolak
                                            </button>

                                            @if(Auth::user()->role === 'pejabat')
                                                <button type="submit" formaction="{{ route('bookings.sahkan.pejabat', $booking->id) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl transition duration-200">
                                                    ✔ Sokong & Hantar ke Pengetua
                                                </button>
                                            @elseif(Auth::user()->role === 'pengetua')
                                                <button type="submit" formaction="{{ route('bookings.lulus.pengetua', $booking->id) }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-xs font-semibold rounded-xl transition duration-200">
                                                    ✔ Lulus Muktamad
                                                </button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="p-12 text-center text-gray-400 border-2 border-dashed border-gray-200 rounded-2xl">
                                🥳 Tiada permohonan baharu yang memerlukan tindakan kelulusan anda buat masa ini.
                            </div>
                        @endforelse
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>