@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row-reverse">
        <div><a href="{{ route('mapel.create') }}" class="btn btn-primary mb-3">Tambah Mata Pelajaran</a></div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapels as $mapel)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $mapel->nama }}</td>
                        <td>{{ $mapel->kelas }}</td>
                        <td>{{ Carbon\Carbon::parse($mapel->waktu)->format('H:i') }}</td>
                        <td>
                            <a onclick="event.preventDefault(); document.getElementById('delete-mapel').submit();" href="#" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: white"></i></a>
                            <a href="{{ route('mapel.show', ['id' => $mapel->id]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: white"></i></a>
                        </td>
                        <form id="delete-mapel" action="{{ route('mapel.destroy', ['id' => $mapel->id]) }}" method="POST" class="d-none">
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