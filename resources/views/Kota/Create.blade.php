@extends('layouts.app')

@section('title', 'Tambah Kota')

@section('content')
    <div class="container">
        <h1>Tambah Kota</h1>

        <form action="{{ route('kota.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="province_id" class="form-label">Propinsi</label>
                <select class="form-select" id="province_id" name="province_id" required>
                    <option value="" disabled selected>Pilih Propinsi</option>
                    @foreach($propinsi as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kota</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
