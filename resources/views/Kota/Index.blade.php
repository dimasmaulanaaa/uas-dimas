@extends('layouts.app')

@section('title', 'Data Kota')

@section('content')
    <div class="container">
        <h1>Data Kota</h1>

        <a href="{{ route('kota.create') }}" class="btn btn-primary mb-3">Tambah Kota</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kota</th>
                    <th>Propinsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kota as $key => $k)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $k->name }}</td>
                        <td>{{ $k->propinsi->name }}</td>
                        <td>
                            <a href="{{ route('kota.edit', $k->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('kota.destroy', $k->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
