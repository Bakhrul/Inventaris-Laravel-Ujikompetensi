<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruang';
    protected $primaryKey = 'id_ruang';
    protected $fillable = ['*'];

    public function Inventaris(){
        return $this->hasMany('App\Inventaris','id_ruang','id_ruang');
    }
}
