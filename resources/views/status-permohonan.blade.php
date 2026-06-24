<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Status Rekod Permohonan Anda') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white text-xs font-semibold rounded-xl shadow transition duration-150">
                ⬅ Kembali ke Borang Tempahan
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-6 sm:p-8">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-gray-800">📋 Sejarah Tempahan Fasiliti</h3>
                    <p class="text-xs text-gray-500 mt-1">Senarai di bawah memaparkan semua status terkini bagi permohonan yang telah anda hantar.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 text-sm font-semibold">
                                <th class="p-4 rounded-l-xl">Fasiliti</th>
                                <th class="p-4">Tarikh Guna</th>
                                <th class="p-4">Masa Sesi</th>
                                <th class="p-4">Tujuan Program</th>
                                <th class="p-4">Status Kelulusan</th>
                                <th class="p-4 rounded-r-xl">Catatan / Ulasan</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm divide-y divide-gray-100">
                            @forelse($bookings as $booking)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="p-4 font-semibold text-gray-800">
                                        {{ $booking->nama_kab ?? 'Fasiliti ID: '.$booking->kab_id }}
                                    </td>
                                    <td class="p-4 whitespace-nowrap">{{ $booking->tarikh_guna }}</td>
                                    <td class="p-4 whitespace-nowrap">{{ $booking->masa_mula }} - {{ $booking->masa_tamat }}</td>
                                    <td class="p-4 max-w-xs truncate" title="{{ $booking->tujuan_tempahan }}">{{ $booking->tujuan_tempahan }}</td>
                                    <td class="p-4 whitespace-nowrap">
                                        @if($booking->status_kelulusan === 'pending')
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Menunggu Pejabat</span>
                                        @elseif($booking->status_kelulusan === 'disokong_pejabat')
                                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">Disokong Pejabat</span>
                                        @elseif($booking->status_kelulusan === 'lulus_muktamad')
                                            <div class="flex flex-col items-start gap-2">
                                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Lulus Muktamad</span>
                                                
                                                {{-- 🖨️ BUTANG CETAK SURAT PDF --}}
                                                <a href="{{ route('bookings.pdf', $booking->id) }}" class="inline-flex items-center gap-1 px-2.5 py-1 bg-red-600 hover:bg-red-700 text-white text-[11px] font-bold rounded-lg shadow-sm transition duration-150">
                                                    📄 Cetak Surat PDF
                                                </a>
                                            </div>
                                        @elseif($booking->status_kelulusan === 'ditolak_pejabat')
                                            <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">Ditolak Pejabat</span>
                                        @elseif($booking->status_kelulusan === 'ditolak_pengetua')
                                            <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">Ditolak Pengetua</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-xs text-gray-500">
                                        @if(isset($booking->catatan_pejabat) && $booking->catatan_pejabat) <div><strong>Pejabat:</strong> {{ $booking->catatan_pejabat }}</div> @endif
                                        @if(isset($booking->catatan_pengetua) && $booking->catatan_pengetua) <div class="mt-1"><strong>Pengetua:</strong> {{ $booking->catatan_pengetua }}</div> @endif
                                        @if(empty($booking->catatan_pejabat) && empty($booking->catatan_pengetua)) <span class="text-gray-400">-</span> @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-12 text-center text-gray-400">
                                        ℹ Tiada sebarang rekod permohonan tempahan ditemui.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>