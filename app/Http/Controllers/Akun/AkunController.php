<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Akun\Service\AkunServiceController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Guru\Service\GuruServiceController;
use App\Http\Controllers\Siswa\Service\SiswaServiceController;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index(AkunServiceController $akunService){
        return view('akun/index', [
            'akuns' => $akunService->getAkun()
        ]);
    }

    public function create(SiswaServiceController $siswa, GuruServiceController $guru){
        return view('akun/create', [
            'siswas' => $siswa->getSiswa(),
            'gurus' => $guru->getGuru()
        ]);
    }

    public function show(AkunServiceController $akunService, $id){
        return view('akun/show', [
            'akun' => $akunService->getAkunById($id)
        ]);
    }
}
