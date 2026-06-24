<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Urus Direktori Fasiliti Kolej (Admin)') }}
            </h2>
            <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-bold uppercase">
                Role: {{ Auth::user()->role }}
            </span>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-xl shadow-sm text-sm">
                    🎉 {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 h-fit">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">➕ Tambah Fasiliti / Alatan</h3>
                    
                    @if ($errors->any())
                        <div class="p-3 mb-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-xs rounded-xl">
                            <strong class="block mb-1">Alamak! Ada masalah input:</strong>
                            <ul class="list-disc pl-4 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.fasiliti.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nama Fasiliti / Barang</label>
                            <input type="text" name="nama_kab" required placeholder="Cth: Gelanggang Futsal, PA Sistem" class="w-full text-sm px-4 py-2.5 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">No. Kod / Identifikasi (Opsional)</label>
                            <input type="text" name="no_kab" placeholder="Cth: GLG01, PAS02" class="w-full text-sm px-4 py-2.5 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Kategori</label>
                            <select name="kategori" required class="w-full text-sm px-4 py-2.5 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                                <option value="tempat">📍 Tempat / Ruang</option>
                                <option value="peralatan">📦 Peralatan Logistik</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Muat Naik Gambar Fasiliti</label>
                            <input type="file" name="gambar" id="gambar" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-[10px] text-gray-400 mt-1">Format: JPG, PNG, WEBP (Max: 5MB)</p>
                        </div>

                        <button type="submit" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow transition duration-150">
                            Simpan Rekod
                        </button>
                    </form>
                </div>

                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-bold text-gray-900">🏛️ Senarai Direktori Semasa</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase border-b border-gray-100">
                                    <th class="p-4">Gambar</th>
                                    <th class="p-4">Maklumat Fasiliti</th>
                                    <th class="p-4">Kategori</th>
                                    <th class="p-4 text-center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                                @forelse($fasiliti as $item)
                                    <tr>
                                        <td class="p-4">
                                            @if($item->gambar)
                                                <img src="{{ asset('images/fasiliti/' . $item->gambar) }}" alt="{{ $item->nama_kab }}" class="w-20 h-20 object-cover rounded-xl">
                                            @else
                                                <div class="w-16 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-xs text-gray-400 font-medium">Tiada</div>
                                            @endif
                                        </td>
                                        <td class="p-4">
                                            <div class="font-bold text-gray-900">{{ $item->nama_kab }}</div>
                                            <div class="text-xs text-gray-400">Kod: {{ $item->no_kab ?? 'N/A' }}</div>
                                        </td>
                                        <td class="p-4">
                                            @if($item->kategori === 'tempat')
                                                <span class="px-2.5 py-1 bg-blue-50 text-blue-700 rounded-md text-xs font-semibold">📍 Tempat</span>
                                            @else
                                                <span class="px-2.5 py-1 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold">📦 Peralatan</span>
                                            @endif
                                        </td>
                                        <td class="p-4 text-center">
                                            <form action="{{ route('admin.fasiliti.delete', $item->id) }}" method="POST" onsubmit="return confirm('Adakah anda pasti mahu memadam fasiliti ini? Gambar juga akan dibuang.');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl text-xs font-bold transition">
                                                    🗑️ Padam
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-8 text-center text-gray-400 text-xs">
                                            Tiada sebarang data fasiliti ditemui. Sila tambah menggunakan borang di sebelah.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>