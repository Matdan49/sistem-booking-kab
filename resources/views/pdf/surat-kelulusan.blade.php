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
        .info-table { w-full; border-collapse: collapse; margin-bottom: 25px; width: 100%; }
        .info-table td { padding: 8px 4px; vertical-align: top; }
        .info-table td.label { width: 25%; font-weight: bold; }
        .info-table td.pembahagi { width: 3%; }
        .status-box { background-color: #d1e7dd; color: #0f5132; padding: 10px; border: 1px solid #badbcc; border-radius: 5px; font-weight: bold; text-align: center; margin-bottom: 25px; }
        .footer { margin-top: 50px; }
        .sign-space { margin-top: 60px; font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <h2>Pejabat Pengurusan Kolej Aminuddin Baki (KAB)</h2>
        <p>Universiti Kebangsaan Malaysia, 43600 UKM Bangi, Selangor Darul Ehsan</p>
        <p>E-mel: kab@ukm.edu.my | Tel: 03-8921XXXX</p>
    </div>

    <div class="tajuk-surat">
        SURAT KELULUSAN RESMI TEMPAHAN FASILITI KOLEJ
    </div>

    <p>Kepada Sesiapa Yang Berkenaan,</p>
    <p>Adalah dimaklumkan bahawa permohonan tempahan fasiliti di bawah sistem e-Booking KAB telah **DILULUSKAN MUKTAMAD** seperti butiran berikut:</p>

    <table class="info-table">
        <tr>
            <td class="label">No. Rujukan Tempahan</td>
            <td class="pembahagi">:</td>
            <td><strong>KAB-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</strong></td>
        </tr>
        <tr>
            <td class="label">Nama Pemohon</td>
            <td class="pembahagi">:</td>
            <td>{{ $booking->nama_pemohon }} ({{ ucfirst($booking->role_pemohon) }})</td>
        </tr>
        <tr>
            <td class="label">Fasiliti Dipohon</td>
            <td class="pembahagi">:</td>
            <td>{{ $booking->nama_kab ?? 'Fasiliti ID: '.$booking->kab_id }}</td>
        </tr>
        <tr>
            <td class="label">Tarikh Penggunaan</td>
            <td class="pembahagi">:</td>
            <td>{{ $booking->tarikh_guna }}</td>
        </tr>
        <tr>
            <td class="label">Sesi Masa</td>
            <td class="pembahagi">:</td>
            <td>{{ $booking->masa_mula }} hingga {{ $booking->masa_tamat }}</td>
        </tr>
        <tr>
            <td class="label">Tujuan / Program</td>
            <td class="pembahagi">:</td>
            <td>{{ $booking->tujuan_tempahan }}</td>
        </tr>
        <tr>
            <td class="label">Ulasan Pengetua</td>
            <td class="pembahagi">:</td>
            <td><em>"{{ $booking->catatan_pengetua ?? 'Tiada ulasan tambahan.' }}"</em></td>
        </tr>
    </table>

    <div class="status-box">
        ✓ STATUS: PERMOHONAN INI TELAH DILULUSKAN SECARA RASMI
    </div>

    <p>Sila bawa salinan surat kelulusan digital/bercetak ini semasa hari kejadian untuk diserahkan kepada petugas kaunter blok bangunan bagi tuntutan kunci atau akses fasiliti.</p>

    <div class="footer">
        <p>Yang benar,</p>
        <div class="sign-space">
            PENGURUSAN KOLEJ AMINUDDIN BAKI<br>
            Universiti Kebangsaan Malaysia
        </div>
        <p style="font-size: 10px; color: #777; margin-top: 40px;">*Surat ini dijana secara digital melalui Sistem Booking KAB dan tidak memerlukan tandatangan basah.*</p>
    </div>

</body>
</html>