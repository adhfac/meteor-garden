<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pendaftaran')
                ->constrained('pendaftarans')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->dateTime('tanggal_bayar');
            $table->decimal('jumlah', 10, 2);
            $table->string('metode_pembayaran');
            $table->string('bukti_pembayaran');
            $table->enum('status_verifikasi', [
                'pending',
                'diterima',
                'ditolak'
            ])->default('pending');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
