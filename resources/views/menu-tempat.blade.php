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
                <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1544698310-74ea9d1c8258?q=80&w=600">
                    <div class="p-5">
                        <h4 class="text-lg font-bold text-gray-900">Gelanggang Serbaguna KAB</h4>
                        <p class="text-xs text-gray-500 mt-1">Futsal, badminton, dan bola tampar.</p>
                        <a href="{{ route('dashboard') }}" class="mt-4 block text-center px-4 py-2 bg-blue-600 text-white text-xs font-bold rounded-xl">Pilih & Tempah</a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1597935258735-e254c1839512?q=80&w=600">
                    <div class="p-5">
                        <h4 class="text-lg font-bold text-gray-900">Surau Al-Iman KAB</h4>
                        <p class="text-xs text-gray-500 mt-1">Ruang solat dan program kerohanian.</p>
                        <a href="{{ route('dashboard') }}" class="mt-4 block text-center px-4 py-2 bg-blue-600 text-white text-xs font-bold rounded-xl">Pilih & Tempah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>