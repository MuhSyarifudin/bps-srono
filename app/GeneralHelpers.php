<?php

use App\Models\Komoditas;

function komoditas_pertanian($periode_id,$jenis_id){

$komoditas = Komoditas::whereNot('jenis_id','4')
->where('periode_id',$periode_id)
->where('jenis_id',$jenis_id)
->where('sektor_id','1')
->get();

return $komoditas; 
};

function komoditas_perkebunan($periode_id,$jenis_id){

$komoditas = Komoditas::where('periode_id',$periode_id)
->where('jenis_id',$jenis_id)
->where('sektor_id','2')
->get();

return $komoditas; 
};

function komoditas_perikanan($periode_id,$jenis_id){

$komoditas = Komoditas::where('periode_id',$periode_id)
->where('jenis_id',$jenis_id)
->where('sektor_id','2')
->get();

return $komoditas; 
};

function komoditas_peternakan($periode_id,$jenis_id){

$komoditas = Komoditas::where('periode_id',$periode_id)
->where('jenis_id',$jenis_id)
->where('sektor_id','2')
->get();

return $komoditas; 
};