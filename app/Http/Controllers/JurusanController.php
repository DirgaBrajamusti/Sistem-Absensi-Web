<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use Redirect,Response,DB,Config;
use Datatables;

class JurusanController extends Controller
{
    //Nampilin data
    public function index(){
        $jurusan = Jurusan::all();
        return view('jurusan.index', ['jurusan' => $jurusan]);
    }
    public function jurusanlist()
    {
        $jurusan = DB::table('jurusan')->select('*');
        return datatables()->of($jurusan)
            ->make(true);
    }

    //Tambah data
    public function tambah(){
    	return view('jurusan.tambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama_jurusan' => 'required'
    	]);
 
        Jurusan::create([
    		'nama_jurusan' => $request->nama_jurusan
    	]);
 
    	return redirect('/jurusan');
    }

    //Edit Data
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return view('jurusan.edit', ['jurusan' => $jurusan]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_jurusan' => 'required'
        ]);

        $jurusan = Jurusan::find($id);
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();
        return redirect('/jurusan');
    }

    //Hapus
    public function delete($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect('/jurusan');
    }
}
