@extends('layouts.app')

@section('title', 'Tambah Propinsi')

@section('content')
    <div class="container">
        <h1>Tambah Provinsi</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('propinsi.store') }}" method="POST">
            @csrf
            <!-- <div class="form-group">
                <label for="id">ID Propinsi</label>
                <input type="text" name="id" id="id" class="form-control" required>
            </div> -->
            <div class="form-group">
                <label for="name">Nama Propinsi</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
