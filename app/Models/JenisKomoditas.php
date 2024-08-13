<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisKomoditas extends Model
{
    use HasFactory;
    
    protected $table = 'jenis_komoditas';
    protected $fillable = ['nama_komoditas','sektor_id'];
    public $timestamps = true;

    public function komoditas(): HasMany
    {
        return $this->hasMany(JenisKomoditas::class,'jenis_id');
    }
    
}
