<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['*'];

    public function Peminjaman(){
        return $this->hasMany('App\Peminjaman','id_pegawai','id_pegawai');
    }
}


