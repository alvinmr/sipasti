<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [];
    protected $table = 'kelas';
    public $timestamps = false;

    public function siswa(){
        return $this->hasOne('Siswa::class');
    }
}