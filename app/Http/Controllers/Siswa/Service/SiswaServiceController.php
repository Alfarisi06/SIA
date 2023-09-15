<?php

namespace App\Http\Controllers\Siswa\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Siswa\StoreSiswaRequest;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaServiceController extends Controller
{
    public function getSiswa(){
        return Siswa::all();
    }

    public function store(StoreSiswaRequest $request){
        Siswa::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect()->route('siswa.index');
    }

    public function destroy($id){
        Siswa::destroy($id);

        return redirect()->route('siswa.index');
    }

    public function getSiswaById($id){
        return Siswa::find($id);
    }

    public function update(StoreSiswaRequest $request, $id){
        $siswa = Siswa::find($id);

        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->kelas_id = $request->kelas_id;

        $siswa->save();

        return redirect()->route('siswa.index');
    }
}
