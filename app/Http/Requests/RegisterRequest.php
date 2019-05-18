<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'img' => 'required' ,
            'img' => ' max:1096',
            'nama' => 'required|alpha',
            'email' => 'required|email|unique:peminjam,email',
            'nip_nis' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:peminjam,username',
            'password' => 'required',
        ];
    }
    public function messages(){
        return[
            'required' => 'Data :attribute harus diisi',
            'mimes' => 'Only jpeg, png, bmp,tiff are allowed.',
            'alpha' => 'Nama Lengkap tidak boleh berisi angka',
            'unique' => '::attribute sudah terpakai',
        ];
    }
}
