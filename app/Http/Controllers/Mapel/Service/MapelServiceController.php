<?php

namespace App\Http\Controllers\Mapel\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mapel\StoreMapelRequest;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MapelServiceController extends Controller
{
    public function store(StoreMapelRequest $request){
        if($request->validated()){
            Mapel::create([
                'nama' => $request->nama,
                'kelas_id' => $request->kelas_id,
                'waktu' => $request->waktu,
                'schedule_start_at' => $request->waktu_mulai,
                'schedule_end_at' => $request->waktu_selesai
            ]);

            return redirect()->route('mapel.index');
        }
    }

    public function getMapel(){
        return Mapel::latest()->get();
    }

    public function destroy($id){
        Mapel::destroy($id);

        return redirect()->route('mapel.index');
    }

    public function getMapelById($id){
        return Mapel::find($id);
    }

    public function update(StoreMapelRequest $request, $id){
        if($request->validated()){
            $mapel = Mapel::find($id);
        
            $mapel->nama = $request->nama;
            $mapel->kelas_id = $request->kelas_id;
            $mapel->schedule_start_at = $request->waktu_mulai;
            $mapel->schedule_end_at = $request->waktu_selesai;
            
            $mapel->save();
        }

        return redirect()->route('mapel.index');
        
    }
}
