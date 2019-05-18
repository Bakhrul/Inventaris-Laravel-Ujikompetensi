<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'peminjam';
    protected $primaryKey = 'id_peminjam';
    protected $fillable = ['*'];
}
