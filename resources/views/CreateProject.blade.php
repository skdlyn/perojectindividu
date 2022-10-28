@extends('master.admin')
@section('title', 'Tambah Project')
@section('content-title', 'Tambah Project - ' . $siswa->nama)
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(auth()->user()->role == "admin")
            <form action="{{ route('masterproject.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                    <label for="nama">NAMA PROJECT</label>
                    <input type="text" class="form-control" id="nama_project" name="nama_project">
                </div>

                <div class="form-group">
                    <label for="nama">DESKRIPSI PROJECT</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                </div>

                <div class="form-group">
                    <label for="nama">TANGGAL PEMBUATAN</label>
                    <input type="date" class="form-control" id="tanggal_project" name="tanggal">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                    <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
            @endif
        </div>
    </div>
@endsection
