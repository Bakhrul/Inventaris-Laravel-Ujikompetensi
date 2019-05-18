<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'img' => 'mimes:jpeg,png,bmp,tiff' ,
            'img' => ' max:1096',
            'jumlah' => 'required',
            'jenis_barang' => 'required',
            'tanggal' => 'required',
            'nama_ruang' => 'required',
            'kode' => 'required',
            'nama_petugas' => 'required',
        ];
    }
    public function messages(){
        return[
            'required' => 'Data :attribute harus diisi',
            'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
        ];
    }
}
