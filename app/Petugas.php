<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use Notifiable;
    
    protected $guarded = [];
    protected $hidden = [
        'password'
    ];
    protected $table = 'petugas';
    public $timestamps = false;
}