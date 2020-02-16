<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Jurusan;

class DosenController extends Controller
{
    //Nampilin data
    public function index(){
        $dosen = Dosen::all();
        $jurusan = Jurusan::all();
        return view('dosen.index', ['dosen' => $dosen, 'jurusan' => $jurusan]);
    }
    
    //Tambah data
    public function tambah(){
        $jurusan = Jurusan::all();
        return view('dosen.tambah', ['jurusan' => $jurusan]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_dosen' => 'required',
            'jurusan_id' => 'required'
        ]);
        
        $dosen = new Dosen([
            'nama_dosen' => $request->nama_dosen
            ]);

        $jurusan = Jurusan::find($request->jurusan_id);

        $jurusan->dosen()->save($dosen);

        return redirect('/dosen');
    }

    //Edit Data
    public function edit($id)
    {
        $jurusan = Jurusan::all();
        $dosen = Dosen::find($id);
        return view('dosen.edit', [
            'jurusan' => $jurusan, 
            'dosen' => $dosen
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_dosen' => 'required',
            'jurusan_id' => 'required'
        ]);

        $dosen = Dosen::find($id);
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->jurusan_id = $request->jurusan_id;
        $dosen->save();
        return redirect('/dosen');
    }
    
    //Hapus
    public function delete($id)
    {
        $dosen = Dosen::find($id);
        $dosen->delete();
        return redirect('/dosen');
    }
}
