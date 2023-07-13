@extends('layouts.app')

@section('content')
    <h1>Daftar Penduduk</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('penduduk.create') }}" class="btn btn-primary mb-3">Tambah Penduduk</a>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penduduk as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->jenis_kelamin }}</td>
                    <td>{{ $p->tgl_lahir }}</td>
                    <td>{{ $p->propinsi ? $p->propinsi->name : '-' }}</td>
                    <td>{{ $p->kota ? $p->kota->name : '-' }}</td>
                    <td>
                        <a href="{{ route('penduduk.edit', $p->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('penduduk.destroy', $p->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
