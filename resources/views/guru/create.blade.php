@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="asal" class="form-label">Kabupaten / Kota</label>
                        <select class="form-select" name="asal" aria-label="Default select example">
                            <option selected disabled>-- Pilih --</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="asal" class="form-label">Alamat</label>
                        <textarea class="form-control" id="asal" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mapel_id" class="form-label">Mata Pelajaran Yang diampu</label>
                        <select class="form-select" name="mapel_id" id="mapel_id" aria-label="Default select example">
                            <option selected disabled>-- Pilih --</option>
                            @foreach ($mapels as $mapel)
                            <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection