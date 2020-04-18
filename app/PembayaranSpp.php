<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranSpp extends Model
{
    protected $guarded = [];
    protected $table = 'pembayaran_spp';
    public $timestamps = false;

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Petugas');
    }
    
}