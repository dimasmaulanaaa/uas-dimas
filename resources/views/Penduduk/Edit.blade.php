@extends('layouts.app')

@section('content')
    <h1>Edit Penduduk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ $penduduk->nik }}" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $penduduk->nama }}" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="Laki-Laki" @if($penduduk->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                <option value="Perempuan" @if($penduduk->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ $penduduk->tgl_lahir }}" required>
        </div>

        <div class="form-group">
            <label for="propinsi_id">Propinsi</label>
            <select name="propinsi_id" id="propinsi_id" class="form-control" required>
                @foreach($propinsi as $prov)
                    <option value="{{ $prov->id }}" @if($prov->id == $penduduk->propinsi_id) selected @endif>{{ $prov->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kota_id">Kota</label>
            <select name="kota_id" id="kota_id" class="form-control" required>
                @foreach($kota as $city)
                    <option value="{{ $city->id }}" @if($city->id == $penduduk->kota_id) selected @endif>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="alamat_pasien">Alamat</label>
            <textarea name="alamat_pasien" id="alamat_pasien" class="form-control" rows="3" required>{{ $penduduk->alamat_pasien }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
