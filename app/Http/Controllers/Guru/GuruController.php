<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        return view('guru/index');
    }

    public function create(MapelServiceController $mapel){
        return view('guru/create', [
            'mapels' => $mapel->getMapel()
        ]);
    }
}
