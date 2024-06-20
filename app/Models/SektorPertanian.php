<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorPertanian extends Model
{
    use HasFactory;

    protected $table = 'sektor_pertanian';
    protected $fillable = ['komoditas','periode_id','jumlah'];
    public $timestamps = true;

}
