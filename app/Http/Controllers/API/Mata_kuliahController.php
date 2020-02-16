<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Mata_kuliah;
use Validator;
use App\Http\Resources\Mata_kuliah as Mata_kuliahResource;
   
class Mata_kuliahController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mata_kuliah = Mata_kuliah::all();
    
        return $this->sendResponse(Mata_kuliahResource::collection($mata_kuliah), 'Data mata kuliah telah diambil.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nama_mata_kuliah' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'dosen_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $mata_kuliah = Mata_kuliah::create($input);
   
        return $this->sendResponse(new Mata_kuliahResource($mata_kuliah), 'Mata Kuliah telah dibuat.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mata_kuliah = Mata_kuliah::find($id);
  
        if (is_null($mata_kuliah)) {
            return $this->sendError('Mata Kuliah tidak ditemukan.');
        }
   
        return $this->sendResponse(new Mata_kuliahResource($mata_kuliah), 'Data mata kuliah telah diambil.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mata_kuliah $mata_kuliah)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nama_mata_kuliah' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'dosen_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $kelas->nama_mata_kuliah = $input['nama_mata_kuliah'];
        $kelas->jam_mulai = $input['jam_mulai'];
        $kelas->jam_selesai = $input['jam_selesai'];
        $kelas->dosen_id = $input['dosen_id'];
        $kelas->save();
   
        return $this->sendResponse(new Mata_kuliahResource($kelas), 'Data mata kuliah telah diupdate.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mata_kuliah $mata_kuliah)
    {
        $mata_kuliah->delete();
   
        return $this->sendResponse([], 'Data mata kuliah telah dihapus.');
    }
}
