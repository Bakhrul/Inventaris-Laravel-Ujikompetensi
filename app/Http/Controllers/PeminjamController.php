<?php

namespace App\Http\Controllers;

use App\User;
use App\Inventaris;
use App\Ruang;
use Carbon;
use App\Jenis;
use App\Peminjaman;
use App\Pegawai;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Detail_pinjam;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\PeminjamanRequest;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login-user')){
            return redirect()->route('login-user')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            $data['row1'] = Inventaris::count();
            $data['row2'] = Peminjaman::count();
            $data['row3'] = Pegawai::count();
            $data['row4'] = User::count();

            $data ['inventaris'] = Inventaris::orderBy('id_ruang','ASC')->with('jenisJOIN','RuangJOIN','PetugasJOIN')->get();

            return view('peminjam/index')->with($data);
        }
    }
    public function riwayat($id){
        $data ['riwayat'] = Peminjaman::where(!Session::get('nama_peminjam'),$id);
            return view('peminjam/riwayat')->with($data);
    }

        public function user_inventaris()
    {
        if(!Session::get('login-user')){
            return redirect()->route('login-user')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            $data ['inventaris'] = Inventaris::orderBy('id_ruang','ASC')->get();
            return view('peminjam/data-inventaris')->with($data);
        }
    }
        public function detail_inventaris_user(Inventaris $inventaris, $id){
            if(!Session::get('login-user')){
                return redirect()->route('login-user')->with('alert','Kamu harus login Terlebih dahulu');
            }
            else{
        $data ['inventaris'] = Inventaris::where('id_inventaris', $id)->with('RuangJOIN','JenisJOIN','PetugasJOIN')->first();
        return view('peminjam/detail-data-inventaris')->with($data);
    }
}
    public function tambah_pinjam_peminjam(Inventaris $inventaris, $id){
        $items = array(
            'listruang' =>  DB::table('Ruang')->get(),
            'listjenis' =>  DB::table('Jenis')->get(),
            'listpetugas' =>  DB::table('Petugas')->get(),
            'listpegawai' =>  DB::table('Pegawai')->get()
          );
          if(!Session::get('login-user')){
            return redirect()->route('login-user')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            $data ['time'] = Carbon\Carbon::now()->toDateString('d-m-Y');
          $data['inventaris'] = Inventaris::where('id_inventaris', $id)->with('RuangJOIN','JenisJOIN','PetugasJOIN')->first();
          $data['inventars'] = Detail_pinjam::with('InventarisJOIN')->first();
        
        return view('peminjam/pinjam-barang',$items)->with($data);
        }    }
    public function create_pinjam_user(PeminjamanRequest $request){
        $id = str_random(4);

        $data = new Peminjaman();
        $data->id_peminjaman = $id;
        $data->nama_barang = $request->nama_barang;
        $data->nama_peminjam = $request->nama_peminjam; 
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->tanggal_kembali = $request->tanggal_kembali;
        $data->status_peminjaman = $request->status;
        $data->id_pegawai = $request->nama_pegawai;

        $data->save();

        $detail = new Detail_pinjam();
        $detail->id_peminjaman = $id;
        $detail->id_inventaris = $request->id_inventaris;
        $detail->jumlah_pinjam = $request->jumlah;

        $detail->save();

        $inventaris = inventaris::find($request->id_inventaris);
        $inventaris->jumlah = $inventaris->jumlah - $request->jumlah;
        $inventaris->save();


        
        session()->flash('success-add' ,'Berhasil Meminjam Barang, Terima Kasih Sudah Menggunakan Aplikasi ini');
        return redirect()->route('user-inventaris');
        

    }
    public function logout_user(){

        Session::flush('login-user');
        return redirect()->route('login-user')->with('alert','Kamu sudah keluar, Terima kasih !!');

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
