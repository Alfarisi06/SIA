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
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select @error('kelas') is-invalid @enderror" name="kelas" aria-label="Default select example">
                            <option selected disabled>Open this select menu</option>
                            @if ($mapel->kelas == 1)
                            <option selected value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            @elseif ($mapel->kelas == 2)
                            <option value="1">One</option>
                            <option selected value="2">Two</option>
                            <option value="3">Three</option>
                            @elseif ($mapel->kelas == 3)
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option selected value="3">Three</option>
                            @endif
                        </select>

                        @error('kelas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="waktu" class="form-label">Waktu</label>
                        <input id="waktu" class="form-control @error('waktu') is-invalid @enderror" type="time" name="waktu" value="{{ Carbon\Carbon::parse($mapel->waktu)->format('H:i') }}" required/>

                        @error('waktu')
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