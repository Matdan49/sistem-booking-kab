<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Sistem e-Booking Kolej KAB') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white text-xs font-semibold rounded-xl shadow transition duration-150">
                ➕ Terus ke Borang Tempahan
            </a>
        </div>
    </x-slot>

    <div class="py-16 bg-gray-50 min-h-screen flex flex-col justify-center">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 w-full">
            
            <div class="text-center mb-12">
                <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">🏢 Apa Yang Anda Ingin Tempah?</h3>
                <p class="text-sm text-gray-500 mt-2">Sila pilih kategori permohonan di bawah untuk melihat direktori penuh.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <a href="{{ route('fasiliti.tempat') }}" class="group bg-white p-8 rounded-3xl shadow-md border border-gray-100 hover:shadow-2xl hover:border-blue-500 transition duration-300 transform hover:-translate-y-1 text-center">
                    <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto text-4xl group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                        🏛️
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mt-6 group-hover:text-blue-600 transition">Tempahan Tempat & Ruang</h4>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Dewan, Gelanggang Sukan, Surau Al-Iman, Pusat Aktiviti Pelajar, Bilik Mesyuarat Utama, dan Dataran Kolej.</p>
                    <div class="mt-6 inline-flex items-center text-xs font-bold text-blue-600 group-hover:translate-x-1 transition duration-150">
                        Lihat Senarai Tempat ➡️
                    </div>
                </a>

                <a href="{{ route('fasiliti.peralatan') }}" class="group bg-white p-8 rounded-3xl shadow-md border border-gray-100 hover:shadow-2xl hover:border-amber-500 transition duration-300 transform hover:-translate-y-1 text-center">
                    <div class="w-20 h-20 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mx-auto text-4xl group-hover:bg-amber-600 group-hover:text-white transition duration-300">
                        📦
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mt-6 group-hover:text-amber-600 transition">Tempahan Peralatan Logistik</h4>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Sistem Pembesar Suara (PA), Portable Speaker, Khemah Kanopi, Kerusi Plastik, Meja Jamuan, dan Papan Putih.</p>
                    <div class="mt-6 inline-flex items-center text-xs font-bold text-amber-600 group-hover:translate-x-1 transition duration-150">
                        Lihat Senarai Peralatan ➡️
                    </div>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>