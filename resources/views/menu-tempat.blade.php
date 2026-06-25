<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">📍 Senarai Tempat / Fasiliti</h2>
            <a href="{{ route('fasiliti.menu') }}" class="px-3 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs font-semibold rounded-lg transition">⬅ Balik Ke Menu</a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                {{-- KAD 1: GELANGGANG SERBAGUNA --}}
                <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100 flex flex-col justify-between">
                    <div>
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1544698310-74ea9d1c8258?q=80&w=600">
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-900">Gelanggang Serbaguna KAB</h4>
                            <p class="text-xs text-gray-500 mt-1">Futsal, badminton, dan bola tampar.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        {{-- Gantikan 'kab_id' => 1 dengan ID sebenar Gelanggang dalam DB anda jika berbeza --}}
                        <a href="{{ route('bookings.create', ['kab_id' => 1]) }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl transition shadow">
                            ⚡ Pilih & Tempah
                        </a>
                    </div>
                </div>

                {{-- KAD 2: SURAU AL-IMAN --}}
                <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100 flex flex-col justify-between">
                    <div>
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1597935258735-e254c1839512?q=80&w=600">
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-900">Surau Al-Iman KAB</h4>
                            <p class="text-xs text-gray-500 mt-1">Ruang solat dan program kerohanian.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        {{-- Gantikan 'kab_id' => 2 dengan ID sebenar Surau dalam DB anda jika berbeza --}}
                        <a href="{{ route('bookings.create', ['kab_id' => 2]) }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl transition shadow">
                            ⚡ Pilih & Tempah
                        </a>
                    </div>
                </div>

                {{-- KAD EXTRA (CONTOH DEWAN): Boleh tambah jika mahu --}}
                <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100 flex flex-col justify-between">
                    <div>
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=600">
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-900">Dewan Utama KAB</h4>
                            <p class="text-xs text-gray-500 mt-1">Sesuai untuk majlis formal dan makan malam.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        {{-- Gantikan 'kab_id' => 3 dengan ID sebenar Dewan dalam DB anda jika berbeza --}}
                        <a href="{{ route('bookings.create', ['kab_id' => 3]) }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl transition shadow">
                            ⚡ Pilih & Tempah
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>