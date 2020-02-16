<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mata_kuliah;
use App\Dosen;

class Mata_kuliahController extends Controller
{
    //Nampilin data
    public function index(){
        $mata_kuliah = Mata_kuliah::all();
        $dosen = Dosen::all();
        return view('mata_kuliah.index', ['mata_kuliah' => $mata_kuliah, 'dosen' => $dosen]);
    }

    //Tambah data
    public function tambah(){
        $dosen = Dosen::all();
    	return view('mata_kuliah.tambah', ['dosen' => $dosen]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_mata_kuliah' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'dosen_id' => 'required'
        ]);
        
        $mata_kuliah = new Mata_kuliah([
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai
            ]);

        $dosen = Dosen::find($request->dosen_id);

        $dosen->mata_kuliah()->save($mata_kuliah);

        return redirect('/mata_kuliah');
    }

    //Edit Data
    public function edit($id)
    {
        $mata_kuliah = Mata_kuliah::find($id);
        $dosen = Dosen::all();
        return view('mata_kuliah.edit', ['mata_kuliah' => $mata_kuliah, 'dosen' => $dosen]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_mata_kuliah' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'dosen_id' => 'required'
        ]);

        $mata_kuliah = Mata_kuliah::find($id);
        $mata_kuliah->nama_mata_kuliah = $request->nama_mata_kuliah;
        $mata_kuliah->jam_mulai = $request->jam_mulai;
        $mata_kuliah->jam_selesai = $request->jam_selesai;
        $mata_kuliah->dosen_id = $request->dosen_id;
        $mata_kuliah->save();
        return redirect('/mata_kuliah');
    }

        
    //Hapus
    public function delete($id)
    {
        $mata_kuliah = Mata_kuliah::find($id);
        $mata_kuliah->delete();
        return redirect('/mata_kuliah');
    }
}
