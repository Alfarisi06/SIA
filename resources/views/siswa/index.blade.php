@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row-reverse">
        <div><a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a></div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswass as $siswa)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>{{ $siswa->kelas->nama }}</td>
                        <td>
                            <a onclick="event.preventDefault(); document.getElementById('delete-siswa').submit();" href="#" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: white"></i></a>
                            <a href="{{ route('siswa.show', ['id' => $siswa->id]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: white"></i></a>
                        </td>
                        <form id="delete-siswa" action="{{ route('siswa.destroy', ['id' => $siswa->id]) }}" method="POST" class="d-none">
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