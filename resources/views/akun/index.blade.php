@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row-reverse">
        <div><a href="{{ route('akun.create') }}" class="btn btn-primary mb-3">Tambah Akun</a></div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Hak Akses</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($akuns as $akun)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $akun->name }}</td>
                        <td>{{ $akun->username }}</td>
                        @if ($akun->role == 1)
                        <td>Admin</td>
                        @elseif ($akun->role == 2)
                        <td>Guru</td>
                        @elseif ($akun->role == 3)
                        <td>Siswa</td>
                        @endif
                        <td>
                            <a onclick="event.preventDefault(); document.getElementById('delete-akun').submit();" href="{{ route('akun.destroy', ['id' => $akun->id]) }}" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: white"></i></a>
                            <a href="{{ route('akun.show', ['id' => $akun->id]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: white"></i></a>
                        </td>
                        <form id="delete-akun" action="{{ route('akun.destroy', ['id' => $akun->id]) }}" method="POST" class="d-none">
                            @method('DELETE')
                            @csrf
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
