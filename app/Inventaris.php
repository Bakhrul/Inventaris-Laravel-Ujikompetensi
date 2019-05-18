<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'id_inventaris';
    protected $fillable = ['*'];

    public function jenisJOIN(){
        return $this->belongsTo('App\Jenis','id_jenis');
    }
    public function RuangJOIN(){
        return $this->belongsTo('App\Ruang','id_ruang');
    }
    public function PetugasJOIN(){
        return $this->belongsTo('App\Petugas','id_petugas');
    }

    public function Detail_pinjam(){
        return $this->hasMany('App\Detail_pinjam','id_inventaris','id_inventaris');
    }
}
