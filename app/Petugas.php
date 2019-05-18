<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $fillable = ['*'];

    public function Inventaris(){
        return $this->hasMany('App\Inventaris','id_petugas','id_petugas');
    }
}
