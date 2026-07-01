<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Kelulusan Tempahan Fasiliti KAB</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; color: #333; line-height: 1.5; margin: 20px; }
        .header { text-align: center; border-bottom: 3px double #000; padding-bottom: 15px; margin-bottom: 30px; }
        .header h2 { margin: 0; text-transform: uppercase; font-size: 18px; color: #1a365d; }
        .header p { margin: 5px 0 0 0; font-size: 12px; color: #555; }
        .tajuk-surat { text-align: center; font-weight: bold; text-decoration: underline; font-size: 16px; margin-bottom: 25px; }
        .info-table { border-collapse: collapse; margin-bottom: 25px; width: 100%; }
        .info-table td { padding: 8px 4px; vertical-align: top; }
        .info-table td.label { width: 25%; font-weight: bold; }
        .info-table td.pembahagi { width: 3%; }
        .status-box { background-color: #d1e7dd; color: #0f5132; padding: 10px; border: 1px solid #badbcc; border-radius: 5px; font-weight: bold; text-align: center; margin-bottom: 25px; }
        
        /* 🚀 TAMBAHAN CSS: Kotak Arahan Pembayaran */
        .payment-box { background-color: #fff3cd; color: #856404; padding: 10px; border-left: 5px solid #ffc107; font-size: 13px; margin-bottom: 25px; }
        
        .footer { margin-top: 40px; page-break-inside: avoid; }
        .sign-space { margin-top: 50px; }
    </style>
</head>
<body>

    {{-- 🚀 BLOK PINTAR: Terjemahan, Base64 & Harga --}}
    @php
        // 1. Logik Terjemahan Peranan (Role)
        $role_ms = [
            'student' => 'Pelajar',
            'non-student' => 'Bukan Pelajar / Staf',
            'pejabat' => 'Pejabat KAB',
            'pengetua' => 'Pengetua'
        ];
        $peranan_pemohon = $role_ms[$booking->role_pemohon] ?? ucfirst($booking->role_pemohon);

        // 2. Logik Tukar Logo ke Base64
        $logoPath = public_path('images/logo-kab.png');
        $logoSrc = '';
        if(file_exists($logoPath)) {
            $logoData = base64_encode(file_get_contents($logoPath));
            $logoSrc = 'data:image/png;base64,' . $logoData;
        }

        // 3. Logik Bacaan Harga (Jika tiada rekod, anggap RM0.00)
        $caj = isset($booking->jumlah_bayaran) ? (float) $booking->jumlah_bayaran : 0.00;
    @endphp

    {{-- BAHAGIAN HEADER (LETTERHEAD) --}}
    <div class="header">
        @if($logoSrc)
            <img src="{{ $logoSrc }}" alt="Logo KAB" style="height: 90px; margin-bottom: 10px;">
        @endif
        
        <h2>Pejabat Pengurusan Kolej Aminuddin Baki (KAB)</h2>
        <p>Universiti Pendidikan Sultan Idris, 35900, Tanjong Malim, Perak Darul Ridzuan</p>
        <p>E-mel: kab@upsi.edu.my | Tel: 05-450 6000</p>
    </div>

    <div class="tajuk-surat">
        SURAT KELULUSAN RASMI TEMPAHAN FASILITI KOLEJ
    </div>

    <p>Kepada Sesiapa Yang Berkenaan,</p>
    <p>Adalah dimaklumkan bahawa permohonan tempahan fasiliti di bawah sistem e-Booking KAB telah <strong>DILULUSKAN MUKTAMAD</strong> seperti butiran berikut:</p>

    <table class="info-table">
        <tr>
            <td class="label">No. Rujukan Tempahan</td>
            <td class="pembahagi">:</td>
            <td><strong>KAB-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</strong></td>
        </tr>
        <tr>
            <td class="label">Nama Pemohon</td>
            <td class="pembahagi">:</td>
            <td>{{ $booking->nama_pemohon }} ({{ $peranan_pemohon }})</td> 
        </tr>
        <tr>
            <td class="label">Fasiliti Dipohon</td>
            <td class="pembahagi">:</td>
            <td>{{ $booking->nama_kab ?? 'Fasiliti ID: '.$booking->kab_id }}</td>
        </tr>
        <tr>
            <td class="label">Tarikh Penggunaan</td>
            <td class="pembahagi">:</td>
            <td>
                {{ \Carbon\Carbon::parse($booking->tarikh_mula)->format('d/m/Y') }}
                @if($booking->tarikh_mula != $booking->tarikh_tamat)
                    <span style="color: #555;"> hingga </span> 
                    {{ \Carbon\Carbon::parse($booking->tarikh_tamat)->format('d/m/Y') }}
                @endif
            </td>
        </tr>
        <tr>
            <td class="label">Sesi Masa</td>
            <td class="pembahagi">:</td>
            <td>
                {{ \Carbon\Carbon::parse($booking->masa_mula)->format('h:i A') }} hingga {{ \Carbon\Carbon::parse($booking->masa_tamat)->format('h:i A') }}
            </td>
        </tr>
        <tr>
            <td class="label">Tujuan / Program</td>
            <td class="pembahagi">:</td>
            <td>{{ $booking->tujuan_tempahan }}</td>
        </tr>
        
        {{-- 🚀 TAMBAHAN BARIS: JUMLAH BAYARAN --}}
        <tr>
            <td class="label">Jumlah Bayaran</td>
            <td class="pembahagi">:</td>
            <td>
                @if($caj > 0)
                    <strong>RM {{ number_format($caj, 2) }}</strong>
                @else
                    <strong>RM 0.00</strong> <span style="color: #0f5132; font-size: 12px;">(Pengecualian Caj - Kategori Pelajar)</span>
                @endif
            </td>
        </tr>

        <tr>
            <td class="label">Ulasan Pengetua</td>
            <td class="pembahagi">:</td>
            <td><em>"{{ $booking->catatan_pengetua ?? 'Tiada ulasan tambahan.' }}"</em></td>
        </tr>
    </table>

    <div class="status-box">
        STATUS: PERMOHONAN INI TELAH DILULUSKAN SECARA RASMI
    </div>

    {{-- 🚀 TAMBAHAN KOTAK: MESEJ AMARAN PEMBAYARAN KE PEJABAT --}}
    @if($caj > 0)
    <div class="payment-box">>
        Sila hadir ke <strong>Kaunter Pejabat Pengurusan KAB</strong> untuk menjelaskan bayaran tempahan sebanyak <strong>RM {{ number_format($caj, 2) }}</strong> secara tunai. Sila simpan resit rasmi yang dikeluarkan sebagai bukti pembayaran sebelum menggunakan fasiliti.
    </div>
    @endif

    <p>Sila bawa salinan surat kelulusan digital/bercetak ini semasa hari kejadian untuk diserahkan kepada petugas kaunter blok bangunan bagi tuntutan kunci/peralatan yang telah ditempah.</p>

    <div class="footer">
        <p>Yang benar,</p>
        
        <div class="sign-space">
            <strong>PENGURUSAN KOLEJ AMINUDDIN BAKI</strong><br>
            <span style="font-weight: normal; line-height: 1.5; display: block; margin-top: 5px;">
                Universiti Pendidikan Sultan Idris,<br>
                35900 Tanjong Malim,<br>
                Perak Darul Ridzuan.
            </span>
        </div>

        <p style="font-size: 10px; color: #777; margin-top: 40px;">
            *Surat ini dijana secara digital melalui Sistem Booking myKAB dan tidak memerlukan tandatangan fizikal.*
        </p>
    </div>

</body>
</html>