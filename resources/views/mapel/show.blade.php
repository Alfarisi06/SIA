@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('mapel.update', ['id' => $mapel->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mata Pelajaran</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="name" value="{{ $mapel->nama }}" required>
                        
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kelas_id" class="form-label">Kelas</label>
                        <select class="form-select @error('kelas_id') is-invalid @enderror" name="kelas_id" aria-label="Default select example">
                            <option>Open this select menu</option>
                            @foreach ($kelass as $kelas)
                            <option @if ($kelas->id == $mapel->kelas->id) selected @endif value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                            @endforeach
                        </select>

                        @error('kelas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                        <input id="waktu_mulai" class="form-control @error('waktu_mulai') is-invalid @enderror" type="time" name="waktu_mulai" value="{{ Carbon\Carbon::parse($mapel->schedule_start_at)->format('H:i') }}" required/>

                        @error('waktu_mulai')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                        <input id="waktu_selesai" class="form-control @error('waktu_selesai') is-invalid @enderror" type="time" name="waktu_selesai" value="{{ Carbon\Carbon::parse($mapel->schedule_end_at)->format('H:i') }}" required/>

                        @error('waktu_selesai')
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
@endsection