<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Pegawai;
use App\Petugas;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peminjam/login');
    }
    public function login_operator(){
        return view('operator/login');
    }
    public function operator_proses(Request $request){
        $this->validate($request, [
            'username' => 'required',
            
            'password' => 'required',
            
        ]);
    
    
        
        $username = $request->username;
        $password = $request->password;
      
        
        $data = Pegawai::where('username',$username)->first();
        $user = Pegawai::where('username',$username)->where('password',$password)->first();
        
        
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password , $data->password)){
                Session::put('username',$data->username);
                Session::put('nama_pegawai',$data->nama_pegawai);
                Session::put('login-operator',TRUE);
                Session::put('gambar_pegawai',$data->gambar_pegawai);
                Session::put('id_pegawai',$data->id_pegawai);
                return redirect()->route('operator-dashboard');
            }
            session()->flash('login-gagal' ,'Username atau Password Salah !!');
            return redirect()->route('login-operator');
        }
            else{
                session()->flash('login-gagal' ,'Username atau Password Salah !!');
             return redirect()->route('login-operator');
            
            
        }
                }
    public function login_admin(){
        return view('administrator/login');
    }
    public function admin_proses(Request $request){
        
        $this->validate($request, [
            'username' => 'required',
            
            'password' => 'required',
            
        ]);
    
    
        
        $username = $request->username;
        $password = $request->password;
      
        
        $data = Petugas::where('username',$username)->first();
        $user = Petugas::where('username',$username)->where('password',$password)->first();
        
        
        
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password , $data->password)){
                Session::put('username',$data->username);
                Session::put('password',$data->password);
                Session::put('nama_petugas',$data->nama_petugas);
                Session::put('gambar_petugas',$data->gambar_petugas);
                Session::put('id_petugas',$data->id_petugas);
                Session::put('login-admin',TRUE);
                return redirect()->route('admin-dashboard');
            }
            session()->flash('login-gagal' ,'Username atau Password Salah !!');
            return redirect()->route('login-admin');
        }
            else{
                session()->flash('login-gagal' ,'Username atau Password Salah !!');
             return redirect()->route('login-admin');
         
        
            
                }
            }
    public function proses(Request $request){
    $this->validate($request, [
        'username' => 'required',
        
        'password' => 'required',
        
    ]);


    
    $username = $request->username;
    $password = $request->password;
  
    
    
    $data = User::where('username',$username)->first();
    $user = User::where('username',$username)->where('password',$password)->first();
    
    
    if($data){ //apakah email tersebut ada atau tidak
        if(Hash::check($password , $data->password)){
            Session::put('username',$data->username);
            Session::put('nama_peminjam',$data->nama_peminjam);
            Session::put('gambar_peminjam',$data->gambar_peminjam);
            Session::put('login-user',TRUE);
            return redirect()->route('user-dashboard');
        }else
        session()->flash('login-gagal' ,'Username atau Password Salah !!');
        return redirect()->route('login-user');
    }
        else{
            session()->flash('login-gagal' ,'Username atau Password Salah !!');
         return redirect()->route('login-user');
        }
    
        
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
