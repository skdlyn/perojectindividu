@extends('master.admin')
@section('title' , 'Tambah Siswa')
@section('content-title', 'Tambah Siswa')
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
        <form action="{{ route('masterjeniskontak.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">NAMA SOSIAL MEDIA / KONTAK</label>
                <input type="text" class="form-control" id="jenis_kontak" name="jenis_kontak">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('mastercontact.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
