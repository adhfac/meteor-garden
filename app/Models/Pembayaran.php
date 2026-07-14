<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'id_pendaftaran',
    'tanggal_bayar',
    'jumlah',
    'metode_pembayaran',
    'bukti_pembayaran',
    'status_verifikasi',
    'catatan_admin',
])]
class Pembayaran extends Model
{
    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}
