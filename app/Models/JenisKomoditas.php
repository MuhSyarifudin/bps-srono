<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisKomoditas extends Model
{
    use HasFactory;
    
    protected $table = 'jenis_komoditas';
    protected $fillable = ['jenis'];
    public $timestamps = true;

    public function sektor_pertanian(): HasMany
    {
        return $this->hasMany(SektorPertanian::class);
    }
    
}
