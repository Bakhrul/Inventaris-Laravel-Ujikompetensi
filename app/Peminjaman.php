<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = ['*'];
    public $incrementing = false;
    public function PegawaiJOIN(){
        return $this->belongsTo('App\Pegawai','id_pegawai');
    }
    public function Detail_pinjam(){
        return $this->hasMany('App\Detail_pinjam','id_peminjaman','id_peminjaman');
    }
}

