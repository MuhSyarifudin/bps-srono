<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SektorPertanian extends Model
{
    use HasFactory;

    protected $table = 'sektor_pertanian';
    protected $fillable = ['komoditas','periode_id','jenis_id','jumlah','warna'];
    public $timestamps = true;

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(JenisKomoditas::class);
    }
}
