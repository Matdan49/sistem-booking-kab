<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">📦 Senarai Peralatan Logistik</h2>
            <a href="{{ route('fasiliti.menu') }}" class="px-3 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs font-semibold rounded-lg transition">⬅ Balik Ke Menu</a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                {{-- KAD 1: PA SYSTEM --}}
                <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100 flex flex-col justify-between">
                    <div>
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1484755560693-a4074577af3a?q=80&w=600">
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-900">Set PA System & Mikrofon</h4>
                            <p class="text-xs text-gray-500 mt-1">Set pembesar suara mudah alih untuk acara kolej.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        {{-- Gantikan 'kab_id' => 4 dengan ID sebenar PA System dalam DB anda --}}
                        <a href="{{ route('bookings.create', ['kab_id' => 4]) }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl transition shadow">
                            ⚡ Pilih & Tempah
                        </a>
                    </div>
                </div>

                {{-- KAD 2: KANOPI --}}
                <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100 flex flex-col justify-between">
                    <div>
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1561489413-985b06da5bee?q=80&w=600">
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-900">Kanopi / Khemah Piramid</h4>
                            <p class="text-xs text-gray-500 mt-1">Kanopi saiz 20x20 untuk jualan atau pameran luar.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        {{-- Gantikan 'kab_id' => 5 dengan ID sebenar Kanopi dalam DB anda --}}
                        <a href="{{ route('bookings.create', ['kab_id' => 5]) }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl transition shadow">
                            ⚡ Pilih & Tempah
                        </a>
                    </div>
                </div>

                {{-- KAD 3: MEJA & KERUSI --}}
                <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100 flex flex-col justify-between">
                    <div>
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1517502884422-41eaaced0168?q=80&w=600">
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-900">Set Meja Lipat & Kerusi Plastik</h4>
                            <p class="text-xs text-gray-500 mt-1">Logistik tambahan untuk keperluan pendaftaran program.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        {{-- Gantikan 'kab_id' => 6 dengan ID sebenar Meja/Kerusi dalam DB anda --}}
                        <a href="{{ route('bookings.create', ['kab_id' => 6]) }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl transition shadow">
                            ⚡ Pilih & Tempah
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>