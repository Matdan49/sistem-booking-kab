<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    /**
     * Memaparkan halaman borang tempahan (Dashboard Utama).
     */
    public function index()
    {
        $role = Auth::user()->role;

        // Pentadbir (pejabat/pengetua) kekal melihat senarai tugasan mereka di dashboard
        if ($role === 'pejabat') {
            $bookings = DB::table('bookings')
                ->leftJoin('users', 'bookings.user_id', '=', 'users.id')
                ->leftJoin('kabs', 'bookings.kab_id', '=', 'kabs.id')
                ->select('bookings.*', 'users.name as nama_pemohon', 'users.role as role_pemohon', 'kabs.nama_kab', 'kabs.no_kab')
                ->where('bookings.status_kelulusan', 'pending')
                ->orderBy('bookings.id', 'asc')
                ->get();
        } elseif ($role === 'pengetua') {
            $bookings = DB::table('bookings')
                ->leftJoin('users', 'bookings.user_id', '=', 'users.id')
                ->leftJoin('kabs', 'bookings.kab_id', '=', 'kabs.id')
                ->select('bookings.*', 'users.name as nama_pemohon', 'users.role as role_pemohon', 'kabs.nama_kab', 'kabs.no_kab')
                ->where('bookings.status_kelulusan', 'disokong_pejabat')
                ->orderBy('bookings.id', 'asc')
                ->get();
        } else {
            // Untuk student / non-student, mereka hanya melihat borang kosong di dashboard utama
            $bookings = collect();
        }

        return view('dashboard', compact('bookings'));
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
    public function store(Request $request)
    {
        // Hadkan fungsi ini hanya untuk kumpulan pemohon sahaja
        if (Auth::user()->role !== 'student' && Auth::user()->role !== 'non-student') {
            return redirect()->route('dashboard')->with('error', 'Hanya pemohon (student/non-student) sahaja dibenarkan membuat tempahan.');
        }

        $request->validate([
            'kab_id' => 'required',
            'tarikh_guna' => 'required|date',
            'masa_mula' => 'required',
            'masa_tamat' => 'required',
            'tujuan_tempahan' => 'required|string|max:500',
        ]);

        // 💡 MOD TRIAL: Memastikan ID ditukar ke integer secara selamat (default ke 1 jika kosong)
        $kabId = intval($request->kab_id) > 0 ? intval($request->kab_id) : 1;

        DB::table('bookings')->insert([
            'user_id' => Auth::id(),
            'kab_id' => $kabId,
            'tarikh_guna' => $request->tarikh_guna,
            'masa_mula' => $request->masa_mula,
            'masa_tamat' => $request->masa_tamat,
            'tujuan_tempahan' => $request->tujuan_tempahan,
            'status_kelulusan' => 'pending', // Status awal wajib huruf kecil
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Tahniah! Permohonan tempahan fasiliti kolej anda telah berjaya dihantar.');
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
        if (empty($booking->tarikh_guna)) {
            return "Ralat: Data tempahan didapati kosong di dalam pangkalan data.";
        }

        // 6. Jana PDF berpandukan fail reka bentuk surat
        $pdf = Pdf::loadView('pdf.surat-kelulusan', compact('booking'));
        
        // 7. Set nama fail muat turun
        $namaFail = 'Surat_Kelulusan_KAB_' . $booking->id . '.pdf';

        return $pdf->download($namaFail);
    }
}