<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['id_admin', 'judul', 'isi'])]
class Pengumuman extends Model
{
    /** @use HasFactory<\Database\Factories\PengumumanFactory> */
    use HasFactory;
    protected $table = 'pengumumans';

    /**
     * Admin pembuat pengumuman.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}