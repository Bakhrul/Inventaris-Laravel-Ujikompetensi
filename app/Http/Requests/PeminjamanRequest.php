<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeminjamanRequest extends FormRequest
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
            'nama_barang' => 'required',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status' => 'required',
            'nama_pegawai' => 'required',
            'jumlah' => 'required',
        ];
    }
    public function messages(){
        return[
            'required' => 'Data :attribute harus diisi',
        ];
    }
}
