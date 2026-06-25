<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Pengurusan Tempahan') }}
            </h2>
            
            {{-- BUTANG URUS FASILITI KHAS UNTUK ADMIN (PEJABAT / PENGETUA) --}}
            @if(Auth::user()->role === 'pejabat' || Auth::user()->role === 'pengetua')
                <a href="{{ route('admin.fasiliti.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold rounded-xl shadow transition duration-150 transform hover:-translate-y-0.5">
                    🏛️ Urus Fasiliti & Gambar
                </a>
            @endif
        </div>
    </x-slot>

    {{-- Mesej Berjaya / Ralat --}}
    @if(session('success'))
        <div class="max-w-6xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">🎉 {{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-6xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">🚨 {{ session('error') }}</span>
            </div>
        </div>
    @endif

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- ====================================================================== --}}
            {{-- PANEL KELULUSAN UNTUK PENTADBIR / ADMIN (pejabat ATAU pengetua)        --}}
            {{-- ====================================================================== --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-6 sm:p-8">
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">🔒 Panel Kelulusan Tempahan (Sesi {{ ucfirst(Auth::user()->role) }})</h3>
                    <p class="text-gray-500 text-sm mt-1">Senarai permohonan aktif yang memerlukan tindakan kelulusan anda.</p>
                </div>

                <div class="space-y-6">
                    @php $hasActiveBooking = false; @endphp
                    @foreach($bookings as $booking)
                        {{-- PENAPISAN LOGIK BLADE: Hanya papar borang yang memerlukan tindakan mengikut role --}}
                        @if(
                            (Auth::user()->role === 'pejabat' && $booking->status_kelulusan === 'pending') || 
                            (Auth::user()->role === 'pengetua' && $booking->status_kelulusan === 'disokong_pejabat')
                        )
                        @php $hasActiveBooking = true; @endphp
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
                        @endif
                    @endforeach

                    @if(!$hasActiveBooking)
                        <div class="p-12 text-center text-gray-400 border-2 border-dashed border-gray-200 rounded-2xl">
                            🥳 Tiada permohonan baharu yang memerlukan tindakan kelulusan anda buat masa ini.
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>