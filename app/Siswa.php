<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    use Notifiable;
    
    protected $guarded = [];
    protected $table = 'siswa';
    public $timestamps = false;

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class);
        
    }

    public function pembayaran()
    {
        return $this->hasOne(PembayaranSpp::class);
    }

    

}