<?php

namespace App\Http\Controllers\Akun\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Akun\StoreAkunRequest;
use App\Http\Requests\Akun\UpdateAkunRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AkunServiceController extends Controller
{
    public function getAkun(){
        return User::latest()->get();
    }

    public function store(StoreAkunRequest $request){
        if($request->validated()){
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                'role' => $request->role
            ]);

            return redirect()->route('akun.index');
        }
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('akun.index');
    }

    public function getAkunById($id){
        return User::find($id);
    }

    public function update(UpdateAkunRequest $request, $id){
        if($request->validated()){
            $akun = User::find($id);
        
            $akun->nama = $request->nama;
            $akun->email = $request->email;
            $akun->role = $request->role;
            $akun->username = $request->username;

            $akun->save();

            return redirect()->route('akun.index');
        }
    }
}
