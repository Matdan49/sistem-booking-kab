<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Status Tempahan Fasiliti Anda') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="max-w-4xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-6 sm:p-8">
                
                <div class="flex justify-between items-center mb-6">
                    <h4 class="text-xl font-bold text-gray-800">Sejarah Tempahan Kolej KAB</h4>
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white text-xs font-semibold rounded-lg shadow transition">
                        + Tambah Tempahan
                    </a>
                </div>
                
                @if($senarai_tempahan->isEmpty())
                    <p class="text-gray-500 text-sm bg-gray-50 p-4 rounded-xl border border-dashed border-gray-200">Anda belum membuat sebarang tempahan lagi.</p>
                @else
                    <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-3">Fasiliti</th>
                                    <th class="px-6 py-3">Tarikh Guna</th>
                                    <th class="px-6 py-3">Masa</th>
                                    <th class="px-6 py-3">Tujuan</th>
                                    <th class="px-6 py-3 text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @foreach($senarai_tempahan as $tempahan)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $tempahan->nama_kab }}</td>
                                        <td class="px-6 py-4">{{ date('d/m/Y', strtotime($tempahan->tarikh_guna)) }}</td>
                                        <td class="px-6 py-4 text-xs">{{ date('h:i A', strtotime($tempahan->masa_mula)) }} - {{ date('h:i A', strtotime($tempahan->masa_tamat)) }}</td>
                                        <td class="px-6 py-4 max-w-xs truncate">{{ $tempahan->tujuan_tempahan }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @if($tempahan->status_kelulusan == 'pending')
                                                <span class="px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">Pending</span>
                                            @elseif($tempahan->status_kelulusan == 'approved')
                                                <span class="px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Lulus</span>
                                            @else
                                                <span class="px-3 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Gagal</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>