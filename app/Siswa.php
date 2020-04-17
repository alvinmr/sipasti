<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    public $timestamps = false;

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function spp()
    {
        return $this->belongsTo(SPP::class);
        
    }
}