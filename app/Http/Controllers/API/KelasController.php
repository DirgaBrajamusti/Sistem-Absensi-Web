<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Kelas;
use Validator;
use App\Http\Resources\Kelas as KelasResource;
   
class KelasController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
    
        return $this->sendResponse(KelasResource::collection($kelas), 'Data kelas telah diambil.');
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
            'nama_kelas' => 'required',
            'jurusan_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $kelas = Kelas::create($input);
   
        return $this->sendResponse(new KelasResource($kelas), 'Kelas telah dibuat.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);
  
        if (is_null($kelas)) {
            return $this->sendError('Kelas tidak ditemukan.');
        }
   
        return $this->sendResponse(new KelasResource($kelas), 'Data kelas telah diambil.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nama_kelas' => 'required',
            'jurusan_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $kelas->nama_kelas = $input['nama_kelas'];
        $kelas->save();
   
        return $this->sendResponse(new KelasResource($kelas), 'Data kelas telah diupdate.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
   
        return $this->sendResponse([], 'Data kelas telah dihapus.');
    }
}
