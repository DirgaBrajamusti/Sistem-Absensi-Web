<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Dosen;
use Validator;
use App\Http\Resources\Dosen as DosenResource;
   
class DosenController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();
    
        return $this->sendResponse(DosenResource::collection($dosen), 'Data dosen telah diambil.');
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
            'nama_dosen' => 'required',
            'jurusan_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $dosen = Dosen::create($input);
   
        return $this->sendResponse(new DosenResource($dosen), 'Dosen telah dibuat.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dosen = Dosen::find($id);
  
        if (is_null($kelas)) {
            return $this->sendError('Dosen tidak ditemukan.');
        }
   
        return $this->sendResponse(new DosenResource($dosen), 'Data dosen telah diambil.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nama_dosen' => 'required',
            'jurusan_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $dosen->nama_kelas = $input['nama_dosen'];
        $dosen->save();
   
        return $this->sendResponse(new DosenResource($dosen), 'Data dosen telah diupdate.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
   
        return $this->sendResponse([], 'Data dosen telah dihapus.');
    }
}
