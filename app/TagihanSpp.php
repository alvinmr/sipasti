<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagihanSpp extends Model
{
    protected $guarded = [];
    protected $table = 'tagihan_spp';
    public $timestamps = false;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
