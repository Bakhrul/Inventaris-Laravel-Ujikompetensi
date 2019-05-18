<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['*'];

    public function Inventaris(){
        return $this->hasMany('App\Inventaris','id_jenis','id_jenis');
    }
}

