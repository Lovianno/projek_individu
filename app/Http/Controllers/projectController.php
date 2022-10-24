<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\projek;
use Illuminate\Support\Facades\Session;
class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::paginate(5);
        // mengambil 5 saja untuk ditampilkan seperti pagination
        return view('layout.masterProject', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.crud.addProject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah($id){
        $siswa = siswa::find($id);
        // return $siswa;
        return view('layout.crud.addProject', compact('siswa'));
        // $project=siswa::find($id)->project()->get();

        // return view('layout.crud.addProject', compact('project'));

    }
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
            'id_siswa'=>'',
            'nama_project'=>'required|max:20|min:1',
            'deskripsi'=>'required',
            'tanggal'=>'required'
        ], $message);

        projek::create($validateData);
        Session::flash('success', 'Data Berhasil di Tambah!!');

        return redirect('/masterproject');
        // return $request;
        // return view('layout.masterDashboard');

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
        // return ($project);
        return view('layout.crud.showProject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = projek::find($id);
        return view('layout.crud.editProject', [
            "project" => $project
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
            'id_siswa'=>'',
            'nama_project'=>'required|max:20|min:1',
            'deskripsi'=>'required',
            'tanggal'=>'required'
        ], $message);

        projek::find($id)->update($validateData);
        Session::flash('success', 'Data Berhasil di Edit!!');
        return redirect('/masterproject');
        // return $request;
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
        $project = projek::find($id)->delete();
        Session::flash('success', 'Data Berhasil di Hapus');
        return redirect('/masterproject');
    }
}
