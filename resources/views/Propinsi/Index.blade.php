@extends('layouts.app')

@section('title', 'Data Provinsi')

@section('content')
    <div class="container">
        <h1>Data Provinsi</h1>

        <a href="{{ route('propinsi.create') }}" class="btn btn-primary mb-3">Tambah Provinsi</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Provinsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($propinsi as $index => $provinsi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $provinsi->name }}</td>
                        <td>
                            <a href="{{ route('propinsi.edit', $provinsi->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('propinsi.destroy', $provinsi->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus propinsi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
