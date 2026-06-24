<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
     * 🚀 FUNGSI TAMBAHAN: Log Masuk Segera untuk Sesi Saringan / Trial.
     */
    public function quickLogin($role)
    {
        // Mencari akaun pengguna terawal berdasarkan peranan (role) dalam jadual users
        $user = DB::table('users')->where('role', $role)->first();

        if ($user) {
            // Memaksa sistem sesi Laravel log masuk menggunakan ID entiti tersebut
            Auth::loginUsingId($user->id);
            
            return redirect()->route('dashboard')->with('success', 'Berjaya log masuk sebagai ' . ucfirst($role) . ' (Mod Trial).');
        }

        // Peringatan sekiranya data mock / user peranan tersebut tiada dalam pangkalan data
        return redirect()->route('login')->withErrors([
            'email' => "Akaun bagi peranan '$role' belum wujud di dalam pangkalan data. Sila daftar akaun baru sebagai '$role' terlebih dahulu."
        ]);
    }
}