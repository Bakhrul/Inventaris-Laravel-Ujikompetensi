<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisRequest;
use App\Http\Requests\RuangRequest;
use App\Http\Requests\InventarisRequest;
use App\Http\Requests\OperatorRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PetugasRequest;
use App\Http\Requests\PeminjamanRequest;
use App\User;
use App\Inventaris;
use App\Ruang;
use App\Jenis;
use App\Peminjaman;
use App\Petugas;
use App\Pegawai;
use App\Detail_pinjam;
use Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            $data['row1'] = Inventaris::count();
            $data['row2'] = Peminjaman::count();
            $data['row3'] = Pegawai::count();
            $data['row4'] = User::count();

            $data ['inventaris'] = Inventaris::orderBy('id_ruang','ASC')->with('jenisJOIN','RuangJOIN','PetugasJOIN')->get();
        return view('administrator/index')->with($data);
        }
    }
    public function logout_admin(){

        Session::flush('login-admin');
        return redirect()->route('login-admin')->with('alert','Kamu sudah keluar, Terima kasih !!');

         }
    public function admin_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data['admin'] = Petugas::get();
        return view('administrator/data-admin')->with($data);
    }
}
    public function detail_admin_admin(User $user, $id){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['petugas'] = Petugas::where('id_petugas', $id)->first();
        return view('administrator/detail-data-admin')->with($data);
    }
}
    public function edit_admin_admin(User $user, $id){
        $items = array(
            'listlevel' =>  DB::table('Level')->get(),
            
          );
          $itemsdefault = collect([ 'id_level' => 1 ]);
        $data ['petugas'] = Petugas::where('id_petugas', $id)->first();
        return view('administrator/edit-data-admin',compact('items','itemsdefault'),$items)->with($data);
    }
    public function edit_admin_proses(Request $request, $id){
        $data = Petugas::find($id);
        if($request->hasFile("img")) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data->gambar_petugas = $name;
        }
        $data->nama_petugas = $request->nama;
        $data->nip = $request->nip;
        $data->alamat = $request->alamat;
        $data->username = $request->username;
        $password = !empty($request->password) ? bcrypt($request->password):$data->password;
        $data->password = $password;
        $data->save();

        session()->flash('success-edit' ,'Data Berhasil Update');
        return redirect()->route('admin-admin');
    }
    public function user_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['user'] = User::get();
        return view('administrator/data-user')->with($data);
    }
}
    public function tambah_admin_admin(){
        $items = array(
            'listlevel' =>  DB::table('Level')->get(),
            
          );
          if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        return view('administrator/tambah-data-admin',$items);
    }
}
    public function delete_admin_admin($id){
        Petugas::destroy($id);

        session()->flash('success-delete' ,'Data Berhasil Dihapus');
        return redirect()->route('admin-admin');
    }
    public function tambah_admin_proses(PetugasRequest $request){
        $data = new Petugas();
        if($request->hasFile("img")) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data->gambar_petugas = $name;
        }
        $data->nama_petugas = $request->nama;
        $data->nip = $request->nip;
        $data->alamat = $request->alamat;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->id_level = $request->level;
        $data->save();

        session()->flash('success-add' ,'Data Berhasil Ditambahkan');
        return redirect()->route('admin-admin');
    }
    public function tambah_user_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        return view('administrator/tambah-data-user');
    }
}
    public function tambah_user_proses(UserRequest $request){
        $data = new User();
        if($request->hasFile("img")) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data->gambar_peminjam = $name;
        }
        $data->nama_peminjam = $request->nama;
        $data->nip_nis = $request->nip_nis;
        $data->alamat = $request->alamat;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        session()->flash('success-add' ,'Data Berhasil Ditambahkan');
        return redirect()->route('admin-user');
    }
    public function detail_user_admin(User $user, $id){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['user'] = User::where('id_peminjam', $id)->first();
        return view('administrator/detail-data-user')->with($data);
    }
}
    public function edit_user_admin(User $user, $id){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['user'] = User::where('id_peminjam', $id)->first();
        return view('administrator/edit-data-user')->with($data);
    }
}
    public function edit_user_proses(Request $request, $id){
        $data = User::find($id);
        if($request->hasFile("img")) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data->gambar_peminjam = $name;
        }
        $data->nama_peminjam = $request->nama;
        $data->nip_nis = $request->nip_nis;
        $data->alamat = $request->alamat;
        $data->username = $request->username;
        $password = !empty($request->password) ? bcrypt($request->password):$data->password;
        $data->password = $password;
        $data->email = $request->email;
        $data->save();

        session()->flash('success-edit' ,'Data Berhasil Update');
        return redirect()->route('admin-user');
    }
    public function delete_user_admin($id){
        User::destroy($id);

        session()->flash('success-delete' ,'Data Berhasil Dihapus');
        return redirect()->route('admin-user');
    }
    public function tambah_operator_proses(OperatorRequest $request){
        $data = new Pegawai();
        if($request->hasFile("img")) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data->gambar_pegawai = $name;
        }
        $data->nama_pegawai = $request->nama;
        $data->nip = $request->nip;
        $data->alamat = $request->alamat;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->save();

        session()->flash('success-add' ,'Data Berhasil Ditambahkan');
        return redirect()->route('admin-operator');
    }
    public function detail_operator_admin(User $user, $id){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['operator'] = Pegawai::where('id_pegawai', $id)->first();
        return view('administrator/detail-data-operator')->with($data);
    }
}
    public function edit_operator_admin(User $user, $id){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['operator'] = Pegawai::where('id_pegawai', $id)->first();
        return view('administrator/edit-data-operator')->with($data);
    }
}
    public function edit_operator_proses(Request $request, $id){
        $data = Pegawai::find($id);
        if($request->hasFile("img")) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data->gambar_pegawai = $name;
        }
        $data->nama_pegawai = $request->nama;
        $data->nip = $request->nip;
        $data->alamat = $request->alamat;
        $data->username = $request->username;
        $password = !empty($request->password) ? bcrypt($request->password):$data->password;
        $data->password = $password;
        $data->save();

        session()->flash('success-edit' ,'Data Berhasil Update');
        return redirect()->route('admin-operator');
    }


    public function operator_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['operator'] = Pegawai::get();
        return view('administrator/data-operator')->with($data);
    }
}
    public function tambah_operator_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        return view('administrator/tambah-data-operator');
    }
}
    
    public function delete_operator_admin($id){
        Pegawai::destroy($id);

        session()->flash('success-delete' ,'Data Berhasil Dihapus');
        return redirect()->route('admin-operator');
    }
    public function ruang_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['ruang'] = Ruang::orderBy('nama_ruang','ASC')->get();
        return view('administrator/data-ruang')->with($data);
    }
}
    public function detail_ruang_admin(Ruang $ruang, $id){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['ruang'] = Ruang::where('id_ruang', $id)->first();
        return view('administrator/detail-data-ruang')->with($data);
    }
}
    public function edit_ruang_admin(Ruang $ruang, $id){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['ruang'] = Ruang::where('id_ruang', $id)->first();
        return view('administrator/edit-data-ruang')->with($data);
    }
}
    public function edit_ruang_proses(Request $request, RuangRequest $Ruang, $id){
        $data = Ruang::find($id);
        $data->nama_ruang = $request->nama;
        $data->kode_ruang = $request->kode;
        $data->keterangan = $request->keterangan;      
        $data->save();

        session()->flash('success-edit' ,'Data Berhasil Update');
        return redirect()->route('admin-ruang');
    }
    public function tambah_ruang_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        return view('administrator/tambah-data-ruang');
    }
}
    public function tambah_ruang_proses(RuangRequest $request){
        $data = new Ruang();
        $data->nama_ruang = $request->nama;
        $data->kode_ruang = $request->kode;
        $data->keterangan = $request->keterangan;
        $data->save();

        session()->flash('success-add' ,'Data Berhasil Ditambahkan');
        return redirect()->route('admin-ruang');

    }
    public function delete_ruang_admin($id){
        Ruang::destroy($id);

        session()->flash('success-delete' ,'Data Berhasil Dihapus');
        return redirect()->route('admin-ruang');
    }
    public function jenis_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['jenis'] = Jenis::orderBy('nama_jenis','ASC')->get();
        return view('administrator/data-jenis')->with($data);
    }
}
    public function detail_jenis_admin(Jenis $jenis, $id){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['jenis'] = Jenis::where('id_jenis', $id)->first();
        return view('administrator/detail-data-jenis')->with($data);
    }
}
    public function tambah_jenis_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        return view('administrator/tambah-data-jenis');
    }
}

    public function tambah_jenis_proses(JenisRequest $request){
        $data = new Jenis();
        $data->nama_jenis = $request->nama;
        $data->kode_jenis = $request->kode;
        $data->keterangan = $request->keterangan;
        $data->save();

        session()->flash('success-add' ,'Data Berhasil Ditambahkan');

        return redirect()->route('admin-jenis');
    }
    public function edit_jenis_admin(Jenis $jenis, $id){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['jenis'] = Jenis::where('id_jenis', $id)->first();
        return view('administrator/edit-data-jenis')->with($data);
    }
}
    public function edit_jenis_proses(JenisRequest $request, $id){
        $data = Jenis::find($id);
        $data->nama_jenis = $request->nama;
        $data->kode_jenis = $request->kode;
        $data->keterangan = $request->keterangan;      
        $data->save();

        session()->flash('success-edit' ,'Data Berhasil Update');
        return redirect()->route('admin-jenis');
    }
    public function delete_jenis_admin($id){
        Jenis::destroy($id);

        session()->flash('success-delete' ,'Data Berhasil Dihapus');
        return redirect()->route('admin-jenis');
    }

    public function inventaris_admin(){
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['inventaris'] = Inventaris::orderBy('id_ruang','ASC')->with('jenisJOIN','RuangJOIN','PetugasJOIN')->get();
        return view('administrator/data-inventaris')->with($data);
    }
}
    public function detail_inventaris_admin(Inventaris $inventaris, $id){
        $items = array(
            'listruang' =>  DB::table('Ruang')->get(),
            'listjenis' =>  DB::table('Jenis')->get(),
            'listpetugas' =>  DB::table('Petugas')->get()
          );
          if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['inventaris'] = Inventaris::where('id_inventaris', $id)->with('RuangJOIN','JenisJOIN','PetugasJOIN')->first();
        return view('administrator/detail-data-inventaris',$items)->with($data);
    }
}
    public function tambah_inventaris_admin(){
        $items = array(
            'listruang' =>  DB::table('Ruang')->get(),
            'listjenis' =>  DB::table('Jenis')->get(),
            'listpetugas' =>  DB::table('Petugas')->get()
          );
          if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            $data['random'] = str_random(5);
            $data ['time'] = Carbon\Carbon::now()->toDateString('d-m-Y');
        return view('administrator/tambah-data-inventaris', $items)->with($data);
    }
}
    public function edit_inventaris_proses(InventarisRequest $request, $id){
        $data = Inventaris::find($id);
        if($request->hasFile("img")) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data->image = $name;
        }
        $data->nama = $request->nama;
        $data->kondisi = $request->kondisi;
        $data->keterangan = $request->keterangan;
        $data->jumlah = $request->jumlah;
        $data->id_jenis = $request->jenis_barang;
        $data->tanggal_register = $request->tanggal;
        $data->id_ruang = $request->nama_ruang;
        $data->kode_inventaris = $request->kode;
        $data->id_petugas = $request->nama_petugas;
        $data->save();

        session()->flash('success-edit' ,'Data Berhasil Update');
        return redirect()->route('admin-inventaris');
    }
    public function edit_inventaris_admin(Inventaris $inventaris, $id){
        $items = array(
            'listruang' =>  DB::table('Ruang')->get(),
            'listjenis' =>  DB::table('Jenis')->get(),
            'listpetugas' =>  DB::table('Petugas')->get()
          );
          if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        $data ['inventaris'] = Inventaris::where('id_inventaris', $id)->with('RuangJOIN','JenisJOIN','PetugasJOIN')->first();
        return view('administrator/edit-data-inventaris',$items)->with($data);
    }
}
    public function tambah_inventaris_proses(InventarisRequest $request){
        $data = new Inventaris();
        if($request->hasFile("img")) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data->image = $name;
        }
        
        $data->nama = $request->nama;
        $data->kondisi = $request->kondisi;
        $data->keterangan = $request->keterangan;
        $data->jumlah = $request->jumlah;
        $data->id_jenis = $request->jenis_barang;
        $data->tanggal_register = $request->tanggal;
        $data->id_ruang = $request->nama_ruang;
        $data->kode_inventaris = $request->kode;
        $data->id_petugas = $request->nama_petugas;
        $data->save();

        session()->flash('success-add' ,'Data Berhasil Ditambahkan');
        return redirect()->route('admin-inventaris');
    }
    public function delete_inventaris_admin($id){
        Inventaris::destroy($id);
        session()->flash('success-delete' ,'Data Berhasil Dihapus');
        return redirect()->route('admin-inventaris');
    }

    public function peminjaman_admin(){
        
        
        $data ['row'] = DB::table('peminjaman')
                        ->select('detail_pinjam.*','peminjaman.*','pegawai.*','inventaris.*')
                        ->join('detail_pinjam','peminjaman.id_peminjaman','=','detail_pinjam.id_peminjaman')
                        ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
                        ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id_inventaris')
                        ->orderBy('status_peminjaman','ASC')                
                        ->get();
        $data['row1'] = Peminjaman::where('status_peminjaman','Belum Kembali')->count();
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
        return view('administrator/data-peminjaman')->with($data);
    }
}
    public function detail_peminjaman_admin(Inventaris $inventaris, $id){
    //             $data ['row'] = DB::table('peminjaman')
    //                             ->select('detail_pinjam.*','peminjaman.*','pegawai.*','inventaris.*')
    //                             ->join('detail_pinjam','peminjaman.id_peminjaman','=','detail_pinjam.id_peminjaman')
    //                             ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
    //                             ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id_inventaris')
        
    //     ->get();

    $data ['row'] = Peminjaman::with('PegawaiJOIN')->where('id_peminjaman', $id)->first();
    $data ['row1'] = Detail_pinjam::with('DetailJOIN','InventarisJOIN')->where('id_peminjaman', $id)->first();
    if(!Session::get('login-admin')){
        return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
    }
    else{

        return view('administrator/detail-data-peminjaman')->with($data);
    }
}
    public function edit_peminjaman_admin(Inventaris $inventaris, $id){
        //             $data ['row'] = DB::table('peminjaman')
        //                             ->select('detail_pinjam.*','peminjaman.*','pegawai.*','inventaris.*')
        //                             ->join('detail_pinjam','peminjaman.id_peminjaman','=','detail_pinjam.id_peminjaman')
        //                             ->join('pegawai','peminjaman.id_pegawai','=','pegawai.id_pegawai')
        //                             ->join('inventaris','detail_pinjam.id_inventaris','=','inventaris.id_inventaris')
            
        //     ->get();
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
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            return view('administrator/edit-data-peminjaman',$items)->with($data);
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

            

                
                session()->flash('success-status' ,'Berhasil Memperbarui Status Peminjaman, Terima Kasih');
                return redirect()->route('admin-peminjaman');
                
        
            
        }
    public function tambah_pinjam_admin(Inventaris $inventaris, $id){
        $items = array(
            'listruang' =>  DB::table('Ruang')->get(),
            'listjenis' =>  DB::table('Jenis')->get(),
            'listpetugas' =>  DB::table('Petugas')->get(),
            'listpegawai' =>  DB::table('Pegawai')->get()
          );
        
        if(!Session::get('login-admin')){
            return redirect()->route('login-admin')->with('alert','Kamu harus login Terlebih dahulu');
        }
        else{
            $data ['time'] = Carbon\Carbon::now()->toDateString('d-m-Y');
            $data['inventaris'] = Inventaris::where('id_inventaris', $id)->with('RuangJOIN','JenisJOIN','PetugasJOIN')->first();
        $data['inventars'] = Detail_pinjam::with('InventarisJOIN')->first();
        return view('administrator/pinjam-barang',$items)->with($data);
    }
}
    public function create_pinjam_admin(PeminjamanRequest $request){
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
        
        session()->flash('success-pinjam' ,'Berhasil Meminjam Barang, Terima Kasih Sudah Menggunakan Aplikasi ini');
        return redirect()->route('admin-inventaris');
        
    }
    public function delete_peminjaman_admin($id){
        Peminjaman::destroy($id);

        session()->flash('success-delete' ,'Data Peminjaman Berhasil Dihapus');
        return redirect()->route('admin-peminjaman');
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