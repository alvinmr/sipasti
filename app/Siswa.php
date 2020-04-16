<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];
    protected $table = 'siswa';
    public $timestamps = false;

    public function kelas(){
        return $this->belongsTo('Kelas::class', 'kelas_id', 'id');
    }
}