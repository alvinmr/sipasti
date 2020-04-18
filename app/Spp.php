<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $guarded = [];
    protected $table = 'spp';
    public $timestamps = false;

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function pembayaranSiswa()
    {
        return $this->hasOneThrough('App\Siswa', 'App\Pembayaran');
    }
}