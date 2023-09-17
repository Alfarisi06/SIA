<?php

namespace App\Http\Controllers\Guru\Service;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruServiceController extends Controller
{
    public function getGuru(){
        return Guru::all();
    }
}
