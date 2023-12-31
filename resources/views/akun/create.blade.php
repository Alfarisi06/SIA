@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('akun.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="name" required>
                        
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Hak Akses</label>
                        <select class="form-select @error('role') is-invalid @enderror" name="role" id="role" required>
                            <option selected>Open this select menu</option>
                            <option value="1">Admin</option>
                            <option value="2">Guru</option>
                            <option value="3">Siswa</option>
                        </select>

                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div id="is_siswa" class="mb-3 visually-hidden">
                        <label for="siswa_id" class="form-label">Hubungkan Data Siswa</label><br>
                        <select style="width: 100%;" class="@error('siswa_id') is-invalid @enderror" name="siswa_id" id="siswa_id">
                            <option selected>Open this select menu</option>
                            @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                            @endforeach
                        </select>

                        @error('siswa_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div id="is_guru" class="mb-3 visually-hidden">
                        <label for="guru_id" class="form-label">Hubungkan Data Guru</label>
                        <select style="width: 100%;" class="@error('guru_id') is-invalid @enderror" name="guru_id" id="guru_id">
                            <option selected>Open this select menu</option>
                            @foreach ($gurus as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                            @endforeach
                        </select>

                        @error('siswa_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>

                        @error('password')
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
<script type="module">
    $(document).ready(function() {
        $('#siswa_id').select2();
        $('#guru_id').select2();

        const setRole = () => {
            var setValRole = $('#role').val()
            if(setValRole == 1){
                setValRole = '@admin'
            }
            else if(setValRole == 2){
                setValRole = '@guru'
            }
            else{
                setValRole = '@siswa'
            }

            return setValRole
        }

        const setClassUnHidden = () => {
            var role = $('#role').val()
            if(role == 2){
                $("#is_siswa").addClass("visually-hidden");
                $('#is_guru').removeClass("visually-hidden");
            }
            else if(role == 3){
                $('#is_siswa').removeClass("visually-hidden");
                $('#is_guru').addClass("visually-hidden");
            }
            else{
                $('#is_siswa').addClass("visually-hidden");
                $('#is_guru').addClass("visually-hidden");
            }
        }

        const setUsernamePassword = (role) => {
            $('#username').val(Math.floor(1000 + Math.random() * 9000) + role)
            $('#password').val(Math.floor(1000 + Math.random() * 9000))
        }

        $('#role').change(function(){
            var role = setRole()
            setClassUnHidden()
            setUsernamePassword(role)
            
        })
    });
</script>
@endsection