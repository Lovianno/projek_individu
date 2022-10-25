<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenis_kontak;
use Illuminate\Support\Facades\Session;

class jenisKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.crud.addJK');
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
            'jenis_kontak'=>'required|min:1'
            
        ], $message);

        jenis_kontak::create($validateData);
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
        $jk = jenis_kontak::find($id);
        return view('layout.crud.editJK', compact('jk'));
        
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
            'jenis_kontak'=>'required|min:1'
            
        ], $message);

        jenis_kontak::find($id)->update($validateData);
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
    public function hapus($id)
    {
        jenis_kontak::find($id)->delete();
        Session::flash('success', 'Data Berhasil di Hapus!!');

        return redirect('/mastercontact');
    }
}
