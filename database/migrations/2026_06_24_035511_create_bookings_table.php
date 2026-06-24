public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        // Hubungkan dengan table users (Siapa yang memohon)
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
        
        // Maklumat Borang Permohonan
        $table->string('nama_fasiliti'); // Cth: Dewan, Bilik Seminar, Gelanggang
        $table->date('tarikh_guna');
        $table->time('masa_mula');
        $table->time('masa_tamat');
        $table->text('tujuan');
        
        /* Logik Status 2 Tahap:
          'pending'          = Baru dihantar (Menunggu Pejabat)
          'lulus_pejabat'   = Pejabat sokong (Menunggu Pengetua)
          'lulus_muktamad'   = Pengetua lulus (Tempahan Berjaya)
          'tolak_pejabat'   = Ditolak oleh Pejabat
          'tolak_pengetua'  = Ditolak oleh Pengetua
        */
        $table->string('status')->default('pending');
        
        // Ruangan catatan jika lulus/tolak
        $table->text('catatan_pejabat')->nullable();
        $table->text('catatan_pengetua')->nullable();
        
        $table->timestamps();
    });
}