@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kelas.update', ['id' => $kelas->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" name="nama" value="{{ $kelas->nama }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection