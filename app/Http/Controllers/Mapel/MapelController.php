<?php

namespace App\Http\Controllers\Mapel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(MapelServiceController $mapel){
        return view('mapel/index', [
            'mapels' => $mapel->getMapel()
        ]);
    }

    public function create(){
        return view('mapel/create', [
            'kelass' => Kelas::all()
        ]);
    }

    public function show(MapelServiceController $mapel, $id){
        return view('mapel/show', [
            'mapel' => $mapel->getMapelById($id)
        ]);
    }
}
