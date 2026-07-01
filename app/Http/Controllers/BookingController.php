<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    /**
     * 📊 HALAMAN UTAMA DASHBOARD / MENU
     */
    public function index()
    {
        // Jika user ialah student/non-student, terus hantar mereka ke halaman menu-fasiliti yang kacak ini!
        if (Auth::user()->role === 'student' || Auth::user()->role === 'non-student') {
            return redirect()->route('fasiliti.menu'); 
        }

        // Jika pejabat/pengetua, kekalkan mereka di dashboard asal untuk luluskan borang
        $bookings = DB::table('bookings')
            ->leftJoin('users', 'bookings.user_id', '=', 'users.id')
            ->leftJoin('kabs', 'bookings.kab_id', '=', 'kabs.id')
            ->select('bookings.*', 'users.name as nama_pemohon', 'users.role as role_pemohon', 'kabs.nama_kab')
            ->get();

        return view('dashboard', compact('bookings'));
    }

    public function create()
    {
        // Ambil senarai semua fasiliti/peralatan dari pangkalan data
        $kabs = DB::table('kabs')->get(); 
        
        // Buka fail paparan borang tempahan yang baharu
        return view('borang-tempahan', compact('kabs'));
    }

    /**
     * 🚀 FUNGSI BAHARU: Memaparkan halaman status permohonan terasing (Khas untuk Student/Non-Student).
     */
    public function status()
    {
        $role = Auth::user()->role;
        $userId = Auth::id();

        // Sekat akses jika pentadbir cuba menceroboh halaman ini
        if ($role !== 'student' && $role !== 'non-student') {
            return redirect()->route('dashboard')->with('error', 'Halaman status hanya untuk peranan pemohon sahaja.');
        }

        // Tarik data tempahan milik pengguna yang sedang log masuk
        $bookings = DB::table('bookings')
            ->leftJoin('kabs', 'bookings.kab_id', '=', 'kabs.id')
            ->select('bookings.*', 'kabs.nama_kab', 'kabs.no_kab')
            ->where('bookings.user_id', $userId)
            ->orderBy('bookings.id', 'desc')
            ->get();

        return view('status-permohonan', compact('bookings'));
    }

    /**
     * Memproses simpanan borang tempahan baru daripada pemohon.
     */
    /**
     * Memproses simpanan borang tempahan baru daripada pemohon (VERSI FLATPICKR RANGE).
     */
/**
     * Memproses simpanan borang tempahan baru daripada pemohon (TERMASUK KIRAAN RM5).
     */
    public function store(Request $request)
    {
        // Hadkan fungsi ini hanya untuk kumpulan pemohon sahaja
        if (Auth::user()->role !== 'student' && Auth::user()->role !== 'non-student') {
            return redirect()->route('dashboard')->with('error', 'Hanya pemohon sahaja dibenarkan membuat tempahan.');
        }

        // 1. Validasi Input Baharu
        $request->validate([
            'kab_id' => 'required',
            'tarikh_mula' => 'required|date',
            'tarikh_tamat' => 'required|date|after_or_equal:tarikh_mula',
            'masa_mula' => 'required',
            'masa_tamat' => 'required',
            'tujuan_tempahan' => 'required|string|max:500',
        ]);

        $kabId = intval($request->kab_id) > 0 ? intval($request->kab_id) : 1;

        // 2. Sediakan Format 'DateTime' untuk Semakan Pertindihan Pintar
        $newStart = $request->tarikh_mula . ' ' . $request->masa_mula . ':00';
        $newEnd = $request->tarikh_tamat . ' ' . $request->masa_tamat . ':00';

        // 3. Logik Pertindihan (Advanced Range Overlap Checker)
        $isOverlap = DB::table('bookings')
            ->where('kab_id', $kabId)
            ->whereIn('status_kelulusan', ['pending', 'disokong_pejabat', 'lulus_muktamad'])
            ->whereRaw("CONCAT(tarikh_mula, ' ', masa_mula) < ?", [$newEnd])
            ->whereRaw("CONCAT(tarikh_tamat, ' ', masa_tamat) > ?", [$newStart])
            ->exists();

        // 4. Jika bertindih, sekat kemasukan
        if ($isOverlap) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['booking_conflict' => 'Maaf, slot tarikh dan masa ini bertindih dengan tempahan lain. Sila pilih slot yang berbeza.']);
        }

       // 🚀 5. PENGIRAAN HARGA RM5/HARI (Berdasarkan Lingkungan 24 Jam)
        $jumlahBayaran = 0.00;
        
        if (Auth::user()->role === 'non-student') {
            // Gabungkan tarikh dan masa untuk pengiraan tempoh yang sangat tepat
            $mula = \Carbon\Carbon::parse($request->tarikh_mula . ' ' . $request->masa_mula);
            $tamat = \Carbon\Carbon::parse($request->tarikh_tamat . ' ' . $request->masa_tamat);
            
            // Kira perbezaan dalam bentuk minit (paling tepat)
            $jumlahMinit = $mula->diffInMinutes($tamat);
            
            // Bahagikan dengan 1440 minit (bersamaan 24 Jam) dan bundarkan ke atas (ceil)
            // Contoh 1: 10 Jam (600 minit) / 1440 = 0.41 -> ceil(0.41) = 1 Hari
            // Contoh 2: 26 Jam (1560 minit) / 1440 = 1.08 -> ceil(1.08) = 2 Hari
            $bilHari = ceil($jumlahMinit / 1440);
            
            // Keselamatan: Tetapkan sekurang-kurangnya 1 hari (RM5) walaupun tempah cuma 30 minit
            if ($bilHari < 1) {
                $bilHari = 1;
            }
            
            // Darab dengan kadar RM 5.00
            $jumlahBayaran = $bilHari * 5.00;
        }

        // 6. Simpan ke database
        DB::table('bookings')->insert([
            'user_id' => Auth::id(),
            'kab_id' => $kabId,
            'tarikh_mula' => $request->tarikh_mula,
            'tarikh_tamat' => $request->tarikh_tamat,
            'masa_mula' => $request->masa_mula,
            'masa_tamat' => $request->masa_tamat,
            'tujuan_tempahan' => $request->tujuan_tempahan,
            'jumlah_bayaran' => $jumlahBayaran, // <--- MASUKKAN KE DALAM DATABASE
            'status_kelulusan' => 'pending', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('bookings.status')->with('success', 'Tahniah! Permohonan tempahan fasiliti kolej anda telah berjaya dihantar.');
    }
    
    /**
     * Tindakan Sokongan oleh Pentadbir Pejabat.
     */
    public function sahkanPejabat(Request $request, $id)
    {
        if (Auth::user()->role !== 'pejabat') {
            return redirect()->route('dashboard')->with('error', 'Akses dinafikan.');
        }

        DB::table('bookings')->where('id', $id)->update([
            'status_kelulusan' => 'disokong_pejabat',
            'catatan_pejabat' => $request->catatan,
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Permohonan berjaya disokong dan dihantar kepada Pengetua.');
    }

    /**
     * Tindakan Kelulusan Muktamad oleh Pengetua.
     */
    public function lulusPengetua(Request $request, $id)
    {
        if (Auth::user()->role !== 'pengetua') {
            return redirect()->route('dashboard')->with('error', 'Akses dinafikan.');
        }

        DB::table('bookings')->where('id', $id)->update([
            'status_kelulusan' => 'lulus_muktamad',
            'catatan_pengetua' => $request->catatan,
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Permohonan telah diluluskan secara muktamad.');
    }

    /**
     * Tindakan Tolak oleh Pejabat atau Pengetua.
     */
    public function tolak(Request $request, $id)
    {
        $role = Auth::user()->role;
        $status = ($role === 'pejabat') ? 'ditolak_pejabat' : 'ditolak_pengetua';
        $kolumCatatan = ($role === 'pejabat') ? 'catatan_pejabat' : 'catatan_pengetua';

        if ($role !== 'pejabat' && $role !== 'pengetua') {
            return redirect()->route('dashboard')->with('error', 'Akses dinafikan.');
        }

        DB::table('bookings')->where('id', $id)->update([
            'status_kelulusan' => $status,
            $kolumCatatan => $request->catatan,
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Permohonan tempahan telah ditolak.');
    }

    /**
     * 🚀 FUNGSI CETAK PDF (VERSI DIKEMASKINI): Menjana Surat Kelulusan Rasmi Kolej.
     */
    public function downloadPDF($id)
    {
        // 1. Tarik data terus dari table bookings berdasarkan ID
        $booking = DB::table('bookings')->where('id', $id)->first();

        // 2. Keselamatan: Pastikan data wujud
        if (!$booking) {
            return redirect()->route('dashboard')->with('error', 'Rekod tempahan tidak ditemui.');
        }

        // 3. Tarik nama pemohon secara manual untuk elakkan ralat Join
        $user = DB::table('users')->where('id', $booking->user_id)->first();
        $booking->nama_pemohon = $user ? $user->name : 'Nama Tidak Diketahui';
        $booking->role_pemohon = $user ? $user->role : 'student';

        // 4. Tarik nama fasiliti secara manual dari table kabs
        $kab = DB::table('kabs')->where('id', $booking->kab_id)->first();
        $booking->nama_kab = $kab ? $kab->nama_kab : 'Fasiliti ID: ' . $booking->kab_id;

        // 5. SEMAKAN KESELAMATAN: Pastikan data dihantar (Jika masih kosong, ia akan sekat di sini)
        if (empty($booking->tarikh_mula)) {
            return "Ralat: Data tempahan didapati kosong atau menggunakan format lama di dalam pangkalan data.";
        }

        // 6. Jana PDF berpandukan fail reka bentuk surat
        $pdf = Pdf::loadView('pdf.surat-kelulusan', compact('booking'));
        
        // 7. Set nama fail muat turun
        $namaFail = 'Surat_Kelulusan_KAB_' . $booking->id . '.pdf';

        return $pdf->download($namaFail);
    }

    /**
     * 🔐 FUNGSI LOG MASUK SEGERA (TRIAL MODE WBL)
     */
    public function quickLogin($role)
    {
        // Cari pengguna pertama yang mempunyai 'role' yang diminta (cth: pejabat)
        $user = \App\Models\User::where('role', $role)->first();

        if ($user) {
            // Log masuk pengguna tersebut secara paksa tanpa kata laluan
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Berjaya log masuk sebagai ' . ucfirst($role));
        }

        return redirect()->back()->with('error', 'Akaun untuk peranan ' . $role . ' tidak ditemui dalam pangkalan data.');
    }

    // ======================================================================
    // 🏛️ KHAS ADMIN: FUNGSI PENGURUSAN FASILITI (CRUD & UPLOAD GAMBAR)
    // ======================================================================

    /**
     * 1. Papar Halaman Senarai Fasiliti untuk Admin
     */
    public function adminFasilitiIndex()
    {
        if (Auth::user()->role !== 'pejabat' && Auth::user()->role !== 'pengetua') {
            return redirect()->route('dashboard')->with('error', 'Akses disekat.');
        }

        $fasiliti = DB::table('kabs')->get();
        return view('admin.fasiliti-index', compact('fasiliti'));
    }

    /**
     * 2. Proses Simpan Fasiliti Baharu + Muat Naik Gambar (VERSI BERSIH)
     */
    public function adminFasilitiStore(Request $request)
    {
        $request->validate([
            'nama_kab' => 'required|string|max:255',
            'no_kab' => 'nullable|string|max:50',
            'kategori' => 'required|in:tempat,peralatan',
            'status' => 'nullable|in:available,maintenance', // ✅ TAMBAHAN BARU
        ]);

        $namaGambar = null;

        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            
            $failAsal = $_FILES['gambar']['name'];
            $ext = pathinfo($failAsal, PATHINFO_EXTENSION);
            
            $namaGambar = time() . '_fasiliti.' . $ext;
            $laluanFolder = public_path('images/fasiliti');

            if (!file_exists($laluanFolder)) {
                mkdir($laluanFolder, 0777, true);
            }

            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $laluanFolder . '/' . $namaGambar)) {
                // Berjaya pindah fail fizikal
            } else {
                $namaGambar = null; 
            }
        }

        DB::table('kabs')->insert([
            'nama_kab'        => $request->nama_kab,
            'no_kab'          => $request->no_kab ?? 'KAB-' . uniqid(),
            'kategori'        => $request->kategori,
            'gambar'          => $namaGambar, 
            'kapasiti'        => 0,          
            'harga_per_malam' => 0.00,       
            'status'          => $request->status ?? 'available', // ✅ TAMBAHAN BARU (TERIMA DARI BORANG)
            'deskripsi'       => null,       
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        return redirect()->back()->with('success', 'Fasiliti baharu berjaya didaftarkan!');
    }

    /**
     * 3. Proses Kemas Kini (Update) Fasiliti
     */
    public function adminFasilitiUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_kab' => 'required|string|max:255',
            'no_kab' => 'nullable|string|max:50',
            'kategori' => 'required|in:tempat,peralatan',
            'status' => 'nullable|in:available,maintenance', // ✅ TAMBAHAN BARU
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // Had saiz fail 5MB
        ]);

        $fasiliti = DB::table('kabs')->where('id', $id)->first();
        $namaGambar = $fasiliti->gambar; 

        if ($request->hasFile('gambar')) {
            $laluanFolder = public_path('images/fasiliti');

            if (!file_exists($laluanFolder)) {
                mkdir($laluanFolder, 0777, true);
            }

            if ($namaGambar && file_exists($laluanFolder . '/' . $namaGambar)) {
                unlink($laluanFolder . '/' . $namaGambar);
            }

            $fail = $request->file('gambar');
            $namaGambar = time() . '_' . $fail->getClientOriginalName();
            $fail->move($laluanFolder, $namaGambar);
        }

        DB::table('kabs')->where('id', $id)->update([
            'nama_kab'        => $request->nama_kab,
            'no_kab'          => $request->no_kab ?? 'KAB-' . uniqid(),
            'kategori'        => $request->kategori,
            'status'          => $request->status ?? 'available', // ✅ TAMBAHAN BARU
            'gambar'          => $namaGambar, 
            'updated_at'      => now(),
        ]);

        return redirect()->route('admin.fasiliti.index')->with('success', 'Fasiliti "' . $request->nama_kab . '" telah berjaya dikemaskini!');
    }

    /**
     * 4. Proses Padam (Delete) Fasiliti & Fail Gambar
     */
    public function adminFasilitiDelete($id)
    {
        $fasiliti = DB::table('kabs')->where('id', $id)->first();

        if ($fasiliti) {
            $laluanGambar = public_path('images/fasiliti/' . $fasiliti->gambar);
            if ($fasiliti->gambar && file_exists($laluanGambar)) {
                unlink($laluanGambar);
            }

            DB::table('kabs')->where('id', $id)->delete();
        }

        return redirect()->back()->with('success', 'Fasiliti telah berjaya dipadamkan sepenuhnya.');
    }
        /**
         * Membuka borang untuk mengedit data fasiliti
         */
        /**
 * Membuka borang untuk mengedit data fasiliti
 */
        public function adminFasilitiEdit($id)
        {
            $fasiliti = DB::table('kabs')->where('id', $id)->first();
            
            if (!$fasiliti) {
                return redirect()->route('admin.fasiliti.index')->with('error', 'Fasiliti tidak ditemui.');
            }
            
            // Cukup satu return sahaja: buka paparan borang edit
            return view('admin.fasiliti-edit', compact('fasiliti'));
            
        }
        /**
     * FUNGSI AJAX: Ambil senarai tarikh yang telah ditempah untuk fasiliti tertentu.
     */
        public function getBookedDates($kab_id)
        {
            // Cari semua tempahan untuk fasiliti ini yang belum ditolak
            $bookings = DB::table('bookings')
                ->where('kab_id', $kab_id)
                ->whereIn('status_kelulusan', ['pending', 'disokong_pejabat', 'lulus_muktamad'])
                ->get(['tarikh_mula', 'tarikh_tamat']);

            $disabledDates = [];
            
            foreach ($bookings as $booking) {
                $disabledDates[] = [
                    'from' => $booking->tarikh_mula,
                    // Jika tarikh_tamat null/kosong, kita anggap ia sama dengan tarikh mula
                    'to' => $booking->tarikh_tamat ?? $booking->tarikh_mula 
                ];
            }

            // Hantar balik data dalam format JSON supaya boleh dibaca oleh JavaScript (Flatpickr)
            return response()->json($disabledDates);
        }
        /**
     * 🗑️ FUNGSI KLIEN: Bersihkan Sejarah Tempahan
     */
    public function clearHistory()
    {
        // Padam semua rekod tempahan milik pengguna yang sedang log masuk
        DB::table('bookings')->where('user_id', Auth::id())->delete();
        
        return redirect()->back()->with('success', 'Semua sejarah tempahan anda telah berjaya dipadam.');
    }
    }