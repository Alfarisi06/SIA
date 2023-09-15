<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Siswa\Service\SiswaServiceController;
use App\Models\Kelas;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index(SiswaServiceController $siswa){
        return view('siswa/index', [
            'siswass' => $siswa->getSiswa()
        ]);
    }

    public function create(){
        return view('siswa/create', [
            'kelass' => Kelas::all()
        ]);
    }

    public function show(SiswaServiceController $siswa, KelasServiceController $kelas, $id){
        return view('siswa/show', [
            'siswa' => $siswa->getSiswaById($id),
            'kelass' => $kelas->getKelas()
        ]);
    }
}
