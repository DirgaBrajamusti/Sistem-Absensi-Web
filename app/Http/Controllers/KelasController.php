<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Jurusan;

class KelasController extends Controller
{
    //Nampilin data
    public function index(){
        $asd = Kelas::all();
        $jurusan = Jurusan::all();
        return view('kelas.index', ['kelas' => $asd, 'jurusan' => $jurusan]);
    }

    //Tambah data
    public function tambah(){
        $jurusan = Jurusan::all();
        return view('kelas.tambah', ['jurusan' => $jurusan]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'jurusan_id' => 'required'
        ]);
        
        $kelas = new Kelas([
            'nama_kelas' => $request->nama_kelas
            ]);

        $jurusan = Jurusan::find($request->jurusan_id);

        $jurusan->kelas()->save($kelas);

        return redirect('/kelas');
    }

    //Edit Data
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $jurusan = Jurusan::all();
        return view('kelas.edit', ['kelas' => $kelas, 'jurusan' => $jurusan]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'jurusan_id' => 'required'
        ]);

        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jurusan_id = $request->jurusan_id;
        $kelas->save();
        return redirect('/kelas');
    }
    
    //Hapus
    public function delete($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas');
    }
}
