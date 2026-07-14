<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;


#[Fillable(['nama_kelas', 'deskripsi', 'harga', 'kapasitas', 'tanggal_mulai', 'tanggal_selesai', 'status'])]
class Course extends Model
{
    use HasFactory;

    public function pendaftarans(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'id_kelas');
    }
}
