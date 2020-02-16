<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Absensi;
use Validator;
use App\Http\Resources\Absensi as AbsensiResource;
   
class AbsensiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::all();
    
        return $this->sendResponse(AbsensiResource::collection($absensi), 'Data absensi telah diambil.');
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
            'npm' => 'required',
            'kelas_id' => 'required',
            'mata_kuliah_id' => 'required',
            'minggu' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $absensi = Absensi::create($input);
   
        return $this->sendResponse(new AbsensiResource($absensi), 'Absensi telah dibuat.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absensi = Absensi::find($id);
  
        if (is_null($absensi)) {
            return $this->sendError('Absensi tidak ditemukan.');
        }
   
        return $this->sendResponse(new AbsensiResource($absensi), 'Data absensi telah diambil.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'npm' => 'required',
            'kelas_id' => 'required',
            'mata_kuliah_id' => 'required',
            'minggu' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $absensi->npm = $input['npm'];
        $absensi->kelas_id = $input['kelas_id'];
        $absensi->mata_kuliah_id = $input['mata_kuliah_id'];
        $absensi->minggu = $input['minggu'];
        $absensi->save();
   
        return $this->sendResponse(new AbsensiResource($absensi), 'Data absensi telah diupdate.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
   
        return $this->sendResponse([], 'Data absensi telah dihapus.');
    }
}
