<?php

namespace App\Http\Controllers;
use App\Models\jenis_kontak;
use App\Models\kontak;
use App\Models\siswa;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::paginate(5);
        $jenis_kontak = jenis_kontak::get();
        return view('layout.masterContact', compact('data', 'jenis_kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       
    }
    public function tambah($id)
    {
        $siswa = siswa::find($id);
        $jenis_kontak = jenis_kontak::get();
        return view('layout.crud.addKontak',[
            'siswa' => $siswa,
            'jenis_kontak'=> $jenis_kontak
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ":attribute Tidak Boleh Kosong",
            'min' => ':attribute Minimal :min Karakter',
            'max' => ':attribute Maksimal :max Karakter',
            'numeric' => ':attribute Wajib di isi Angka',
            'mimes' => 'file :attribute Harus Bertipe JPG,JPEG,PNG'
        ];
        $validateData =  $request->validate([
            'siswa_id'=>'',
            'jenis_kontak_id'=>'required|max:20|min:1',
            'deskripsi'=>'required',
          
        ], $message);
        kontak::create($validateData);
        Session::flash('success', 'Data Berhasil di Tambah!!');

        return redirect('/mastercontact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak = siswa::find($id)->kontak()->get();
        
        // return $kontak;
        return view('layout.crud.showKontak', compact('kontak'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis_kontak = jenis_kontak::get();
        $kontak = kontak::find($id);
        return view('layout.crud.editKontak',[
            'kontak'=> $kontak,
            'jenis_kontak' => $jenis_kontak
        ]);
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
        $validateData =  $request->validate([
            'jenis_kontak_id'=>'required',
            'deskripsi'=>'required',
          
        ], $message);

        kontak::find($id)->update($validateData);
        Session::flash('success', 'Data Berhasil di Update!!');

        return redirect('/mastercontact');

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

    public function hapus($id){
        $kontak = kontak::find($id)->delete();
        Session::flash('success', 'Data Berhasil di Hapus');
        return redirect('/mastercontact');

    }
}
