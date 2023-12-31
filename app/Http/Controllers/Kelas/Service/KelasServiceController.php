<?php

namespace App\Http\Controllers\Kelas\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kelas\StoreKelasRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasServiceController extends Controller
{
    public function getKelas(){
        return Kelas::latest()->get();
    }

    public function store(StoreKelasRequest $request){
        if($request->validated()){
            Kelas::create([
                'nama' => $request->nama
            ]);

            return redirect()->route('kelas.index');
        }
    }

    public function destroy($id){
        Kelas::destroy($id);

        return redirect()->route('kelas.index');
    }

    public function getKelasById($id){
        return Kelas::find($id);
    }

    public function update(StoreKelasRequest $request, $id){
        $kelas = Kelas::find($id);
        $kelas->nama = $request->nama;
        $kelas->save();

        return redirect()->route('kelas.index');
    }
}
