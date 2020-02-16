<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Jurusan;
use Validator;
use App\Http\Resources\Jurusan as JurusanResource;
   
class JurusanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
    
        return $this->sendResponse(JurusanResource::collection($jurusan), 'Data jurusan telah diambil.');
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
            'nama_jurusan' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $jurusan = Jurusan::create($input);
   
        return $this->sendResponse(new JurusanResource($jurusan), 'Jurusan telah dibuat.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusan = Jurusan::find($id);
  
        if (is_null($jurusan)) {
            return $this->sendError('Jurusan tidak ditemukan.');
        }
   
        return $this->sendResponse(new JurusanResource($jurusan), 'Data jurusan telah diambil.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nama_jurusan' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $jurusan->name = $input['nama_jurusan'];
        $jurusan->save();
   
        return $this->sendResponse(new JurusanResource($jurusan), 'Data jurusan telah diupdate.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
   
        return $this->sendResponse([], 'Data jurusan telah dihapus.');
    }
}
