<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Mata_kuliah;
use App\Kelas;


class AbsensiController extends Controller
{
    //Nampilin data
    public function index(){
        $absensi = Absensi::all();
        $mata_kuliah = Mata_kuliah::all();
        $kelas = Kelas::all();
        return view('absensi.index', [
            'absensi' => $absensi,
            'kelas' => $kelas,
            'mata_kuliah' => $mata_kuliah
        ]);
    }
    
    //Tambah data
    public function tambah(){
        $mata_kuliah = Mata_kuliah::all();
        $kelas = Kelas::all();
        return view('absensi.tambah', [
            'kelas' => $kelas,
            'mata_kuliah' => $mata_kuliah
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'npm' => 'required',
            'kelas_id' => 'required',
            'mata_kuliah_id' => 'required',
            'minggu' => 'required'
        ]);
        
        $absensi = new Absensi([
            'npm' => $request->npm,
            'minggu' => $request->minggu   
            ]);

        $kelas = Kelas::find($request->kelas_id);
        $mata_kuliah = Mata_kuliah::find($request->mata_kuliah_id);
        
        $kelas->absensi()->save($absensi);
        $mata_kuliah->absensi()->save($absensi);

        return redirect('/absensi')->with('success','Absensi updated successfully');
    }

    //Edit Data
    public function edit($id)
    {
        $absensi = Absensi::find($id);
        $mata_kuliah = Mata_kuliah::all();
        $kelas = Kelas::all();
        return view('absensi.edit', [
            'absensi' => $absensi,
            'kelas' => $kelas, 
            'mata_kuliah' => $mata_kuliah
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'npm' => 'required',
            'kelas_id' => 'required',
            'mata_kuliah_id' => 'required',
            'minggu' => 'required'
        ]);

        $absensi = Absensi::find($id);
        $absensi->npm = $request->npm;
        $absensi->kelas_id = $request->kelas_id;
        $absensi->mata_kuliah_id = $request->mata_kuliah_id;
        $absensi->minggu = $request->minggu;
        $absensi->save();
        return redirect('/absensi')->with('success','Absensi updated successfully');
    }
    
    //Hapus
    public function delete($id)
    {
        $absensi = Absensi::find($id);
        $absensi->delete();
        return redirect('/absensi')->with('success','Absensi updated successfully');
    }
}
