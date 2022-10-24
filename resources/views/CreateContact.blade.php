@extends('master.admin')
@section('title', 'Tambah Kontak')
@section('content-title', 'Tambah Kontak')
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
            <form action="{{ route('mastercontact.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="jenis_kontak" value="{{ $siswa->id }}">
                        <label for="sosmed">Pilih Jenis Sosial Media</label>
                        <select class="form-select form-control" id="sosmed" name='sosmed'>
                            @foreach ($jenis_kontak as $item)
                            <option value="{{ $item->id }}">{{ $item->jenis_kontak }}</option>
                        @endforeach
                        </select>
                    </div>

                <div class="form-group">
                    <label for="nama">DESKRIPSI KONTAK</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                    <a href="{{ route('mastercontact.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
