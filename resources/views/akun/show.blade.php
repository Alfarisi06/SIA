@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('akun.update', ['id' => $akun->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $akun->nama }}" id="nama" required>
                        
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $akun->email }}" id="email" required>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Hak Akses</label>
                        <select onchange="setUsernamePassword()" class="form-select @error('role') is-invalid @enderror" name="role" id="role" required>
                            <option selected>Open this select menu</option>
                            @if ($akun->role == 1)
                            <option selected value="1">Admin</option>
                            <option value="2">Guru</option>
                            <option value="3">Siswa</option>
                            @elseif ($akun->role == 2)
                            <option value="1">Admin</option>
                            <option selected value="2">Guru</option>
                            <option value="3">Siswa</option>
                            @elseif ($akun->role == 3)
                            <option value="1">Admin</option>
                            <option value="2">Guru</option>
                            <option selected value="3">Siswa</option>
                            @endif
                        </select>

                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $akun->username }}" required>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const setUsernamePassword = () => {
        const username = document.getElementById('username')
        const password = document.getElementById('password')

        const set = setRole()

        username.value = Math.floor(1000 + Math.random() * 9000) + set
        password.value = Math.floor(1000 + Math.random() * 9000)
    }

    const setRole = () => {
        const role = document.getElementById('role')
        let setValRole = ''
        if(role.value == 1){
            setValRole = '@admin'
        }
        else if(role.value == 2){
            setValRole = '@guru'
        }
        else if(role.value == 3){
            setValRole = '@siswa'
        }

        return setValRole
    }
</script>
@endsection