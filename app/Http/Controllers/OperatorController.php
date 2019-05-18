<?php

namespace App\Http\Controllers;

use App\User;
use App\Inventaris;
use App\Ruang;
use App\Jenis;
use App\Peminjaman;
use App\Pegawai;
use App\Detail_pinjam;
use Carbon;
use DB;
use App\Http\Requests\PeminjamanRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login-operator')){
            return redirect()->route('login-operator')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            $data['row1'] = Inventaris::count();
            $data['row2'] = Peminjaman::count();
            $data['row3'] = Pegawai::count();
            $data['row4'] = User::count();

            $data ['inventaris'] = Inventaris::orderBy('id_ruang','ASC')->with('jenisJOIN','RuangJOIN','PetugasJOIN')->get();
            return view('operator/index')->with($data);
        }
    }
        public function logout_operator(){

            Session::flush('login-operator');
            return redirect()->route('login-operator')->with('alert','Kamu sudah keluar, Terima kasih !!');
    
             }
        public function operator_inventaris()
    {
        if(!Session::get('login-operator')){
            return redirect()->route('login-operator')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            $data ['inventaris'] = Inventaris::orderBy('id_ruang','ASC')->with('JenisJOIN','RuangJOIN','PetugasJOIN')->get();

            
            return view('operator/data-inventaris')->with($data);
        }
    }
        public function detail_inventaris_operator(Inventaris $inventaris, $id){
            if(!Session::get('login-operator')){
                return redirect()->route('login-operator')->with('alert','Kamu harus login Terlebih dahulu');
            }
            else{
        $data ['inventaris'] = Inventaris::where('id_inventaris', $id)->with('RuangJOIN','JenisJOIN','PetugasJOIN')->first();
        return view('operator/detail-data-inventaris')->with($data);
    }
}
    public function tambah_pinjam_operator(Inventaris $inventaris, $id){
        $items = array(
            'listruang' =>  DB::table('Ruang')->get(),
            'listjenis' =>  DB::table('Jenis')->get(),
            'listpetugas' =>  DB::table('Petugas')->get(),
            'listpegawai' =>  DB::table('Pegawai')->get()
          );
          if(!Session::get('login-operator')){
            return redirect()->route('login-operator')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            $data ['time'] = Carbon\Carbon::now()->toDateString('d-m-Y');
          $data['inventaris'] = Inventaris::where('id_inventaris', $id)->with('RuangJOIN','JenisJOIN','PetugasJOIN')->first();
          $data['inventars'] = Detail_pinjam::with('InventarisJOIN')->first();
        
    
        return view('operator/pinjam-barang',$items)->with($data);
        }
    }
    public function create_pinjam_operator(PeminjamanRequest $request){
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

        
        $inventaris = inventaris::find($request->id_inventaris);
        $inventaris->jumlah = $inventaris->jumlah - $request->jumlah;
        $inventaris->save();
        $detail->save();


        session()->flash('success-add' ,'Berhasil Meminjam Barang, Terima Kasih Sudah Menggunakan Aplikasi ini');
        return redirect()->route('operator-inventaris');
    
    }
    public function peminjaman_operator(){
        $data['row1'] = Peminjaman::where('status_peminjaman','Belum Kembali')->count();
        $data ['row'] = DB::table('peminjaman')
                        ->select('detail_pinjam.*','peminjaman.*','pegawai.*','inventaris.*')
                        ->join('detail_pinjam','peminjaman.id_peminjaman','=','detail_pinjam.id_peminjaman')
                        ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
                        ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id_inventaris')
                        ->orderBy('status_peminjaman','ASC')                
                        ->get();
        
                        if(!Session::get('login-operator')){
                            return redirect()->route('login-operator')->with('alert','Kamu harus login Terlebih dahulu');
                        }
                        else{
        return view('operator/data-peminjaman')->with($data);
    }
}
    public function detail_peminjaman_operator(Inventaris $inventaris, $id){
        //             $data ['row'] = DB::table('peminjaman')
        //                             ->select('detail_pinjam.*','peminjaman.*','pegawai.*','inventaris.*')
        //                             ->join('detail_pinjam','peminjaman.id_peminjaman','=','detail_pinjam.id_peminjaman')
        //                             ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
        //                             ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id_inventaris')
            
        //     ->get();
    
        $data ['row'] = Peminjaman::with('PegawaiJOIN')->where('id_peminjaman', $id)->first();
        $data ['row1'] = Detail_pinjam::with('DetailJOIN','InventarisJOIN')->where('id_peminjaman', $id)->first();
            
        if(!Session::get('login-operator')){
            return redirect()->route('login-operator')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{   
            return view('operator/detail-data-peminjaman')->with($data);
    }
}

    public function edit_peminjaman_operator(Inventaris $inventaris, $id){
        $items = array(
            
            'listpegawai' =>  DB::table('Pegawai')->get()
          );
          $data['detail_pinjam'] = detail_pinjam::with('InventarisJOIN')->where('id_detail_pinjam', $id)->first();
          $data['peminjaman'] = peminjaman::all();
          $data['pegawai'] = pegawai::all();
          
          $data['peminjam'] = DB::table('peminjaman')
                    ->join('detail_pinjam', 'detail_pinjam.id_peminjaman', '=', 'peminjaman.id_peminjaman')
                    ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id_inventaris')
                    ->select('peminjaman.*', 'detail_pinjam.*','inventaris.*')
                    ->first();
                    $data['inventaris'] = DB::table('inventaris')
                    ->join('detail_pinjam','detail_pinjam.id_inventaris','=','inventaris.id_inventaris')
                    ->select('detail_pinjam.*','inventaris.*')
                    ->first();
        // dd($data);    
        if(!Session::get('login-operator')){
            return redirect()->route('login-operator')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            return view('operator/edit-data-peminjaman',$items)->with($data);
        }
    }
        public function edit_peminjaman_proses(Request $request, $id){
            
            $detail = detail_pinjam::find($id);
            $detail->jumlah_pinjam = $request->jumlah;
            $detail->id_inventaris = $request->id_inventaris;
            $detail->save();
            
            $peminjaman = peminjaman::find($detail->id_peminjaman);
              $peminjaman->status_peminjaman = $request->status;
              $peminjaman->save();
    
              $inventaris = inventaris::find($request->id_inventaris);
              $inventaris->jumlah = $inventaris->jumlah + $request->jumlah;
              $inventaris->save();
                
                session()->flash('success-status' ,'Status Peminjaman Berhasil Diperbarui, Terima Kasih');
                return redirect()->route('operator-peminjaman');
                
        
            
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
