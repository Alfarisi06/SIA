@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row-reverse">
        <div><a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a></div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection