@extends('layouts.app')

@section('title', 'Edit Provinsi')

@section('content')
    <div class="container">
        <h1>Edit Provinsi</h1>

        <form method="POST" action="{{ route('propinsi.update', $propinsi->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Provinsi</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $propinsi->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
