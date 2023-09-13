@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row-reverse">
        <div><a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a></div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelass as $kelas)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $kelas->nama }}</td>
                        <td>
                            <a onclick="event.preventDefault(); document.getElementById('delete-kelas').submit();" class="btn btn-danger">Hapus</a>
                            <a href="{{ route('kelas.show', ['id' => $kelas->id]) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <form id="delete-kelas" action="{{ route('kelas.destroy', ['id' => $kelas->id]) }}" method="POST" class="d-none">
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
