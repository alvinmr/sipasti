<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPPModel extends Model
{
    protected $guarded = [];
    protected $table = 'spp';
    public $timestamps = false;
}