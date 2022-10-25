<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\siswa;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
        
        // $this->middleware('admin')->only('index');
        $this->middleware('admin')->except('index','show');
   
    
        // $this->middleware('subscribed')->except('store');
    }
    public function index()
    {
        $data = siswa::all();
        return view('layout.masterSiswa', compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.crud.addSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // this->validate($request,[]);
        // validate adalah built in function dari laravel
        // $request adalah value dari form yang dikirim ke controller
        // validasi

        $message = [
            'required' => ":attribute Tidak Boleh Kosong",
            'min' => ':attribute Minimal :min Karakter',
            'max' => ':attribute Maksimal :max Karakter',
            'numeric' => ':attribute Wajib di isi Angka',
            'mimes' => 'file :attribute Harus Bertipe JPG,JPEG,PNG'
        ];
        $this->validate($request, [
            'nama'=>'required|max:30|min:7',
            'nisn'=>'required|numeric',
            'alamat'=>'required|',
            'jk'=>'required|',
            'foto'=>'required|mimes: jpg,jpeg,png',
            'about'=>'required|min:10'
        ], $message);

        // ambil informasi file yang diupload
        $file = $request->file('foto');
        // rename file foto
        $nama_file = time()."_".$file->getClientOriginalName();
        // proses upload ke direktori
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // Insert Data
        siswa::create([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'jk'=>$request->jk,
            'foto'=>$nama_file,
            'about'=>$request->about
        ]);
        Session::flash('success', 'Data Berhasil ditambahkan');
        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=siswa::find($id)->project()->get();
        $siswa=Siswa::find($id);   
        $kontak = $siswa->kontak()->get();
        // return($kontak); 
        // menampilkan data JSON
        return view('layout.crud.showSiswa', compact('siswa', 'kontak','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $siswa = Siswa::find($id);
        return view('layout.crud.editSiswa', compact('siswa'));
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
        $message = [
            'required' => ":attribute Tidak Boleh Kosong",
            'min' => ':attribute Minimal :min Karakter',
            'max' => ':attribute Maksimal :max Karakter',
            'numeric' => ':attribute Wajib di isi Angka',
            'mimes' => 'file :attribute Harus Bertipe JPG,JPEG,PNG'
        ];
        $this->validate($request, [
            'nama'=>'required|max:30|min:7',
            'nisn'=>'required|numeric',
            'alamat'=>'required',
            'foto'=>'mimes: jpg,jpeg,png',
            'jk'=>'required|',
            'about'=>'required|min:10'
        ], $message);

        if($request->foto != ''){
        // 1.  menghapus file foto
            $siswa=Siswa::find($id);
            File::delete('./template/img/'.$siswa->foto);

        // 2.  ambil informasi dari file yang diupload
        $file = $request->file('foto');
        //  rename file foto
        $nama_file = time()."_".$file->getClientOriginalName();
        // 3.  proses upload ke direktori
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // 4. menyimpan ke database
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->jk = $request->jk;
            $siswa->foto = $nama_file;
            $siswa->about = $request->about;
            $siswa->save();
            Session::flash('success', 'Data Berhasil di Edit!!');

            return redirect('/mastersiswa');
            
        }

        else{
            $siswa=Siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->jk = $request->jk;
            $siswa->about = $request->about;
            $siswa->save();
             Session::flash('success', 'Data Berhasil di Edit!!');
       
            return redirect('/mastersiswa');
        }
     
     
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
    public function hapus($id)
    {
        $siswa=Siswa::find($id)->delete();
        Session::flash('success', 'Data Berhasil di Hapus');
        return redirect('/mastersiswa');
    }
}
