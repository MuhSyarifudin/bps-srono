<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komoditas extends Model
{
    use HasFactory;

    protected $table = "komoditas";
    protected $fillable = ["komoditas","sektor_id","jenis_id","warna","jenis_komoditas","jumlah","periode_id",];
    public $timestamps = true;

    public function jenis() : BelongsTo
    {
        return $this->belongsTo(Komoditas::class,'jenis_id');
    }
}
