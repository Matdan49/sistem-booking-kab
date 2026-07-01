<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-xl font-bold mb-6">✏️ Kemaskini Fasiliti: {{ $fasiliti->nama_kab }}</h2>
            
            <form action="{{ route('admin.fasiliti.update', $fasiliti->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                
                {{-- INPUT HIDDEN UNTUK MENGELAKKAN RALAT VALIDASI --}}
                <input type="hidden" name="kategori" value="{{ $fasiliti->kategori }}">
                <input type="hidden" name="no_kab" value="{{ $fasiliti->no_kab }}">
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold uppercase">Nama Fasiliti</label>
                        <input type="text" name="nama_kab" value="{{ $fasiliti->nama_kab }}" required class="w-full mt-1 p-2 border rounded-xl">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold uppercase">Status</label>
                        <select name="status" class="w-full mt-1 p-2 border rounded-xl">
                            <option value="available" {{ $fasiliti->status == 'available' ? 'selected' : '' }}>✅ Tersedia</option>
                            <option value="maintenance" {{ $fasiliti->status == 'maintenance' ? 'selected' : '' }}>⛔ Sedang Diselenggara</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-xl font-bold">Simpan Perubahan</button>
                    <a href="{{ route('admin.fasiliti.index') }}" class="block text-center text-sm text-gray-500 mt-4 underline">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>