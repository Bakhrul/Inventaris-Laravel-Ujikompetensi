<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_pinjam extends Model
{
    protected $table = 'detail_pinjam';
    protected $primaryKey = 'id_detail_pinjam';
    protected $fillable = ['*'];
    
    public function InventarisJOIN(){
        return $this->belongsTo('App\Inventaris','id_inventaris');
    }

    public function PegawaiJOIN(){
        return $this->belongsTo('App\Pegawai','id_pegawai');
    }
    public function DetailJOIN(){
        return $this->belongsTo('App\Peminjaman','id_peminjaman');
    }
}
