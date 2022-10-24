@extends('master.admin')
@section('title', 'Edit Siswa')
@section('content-title', 'Edit Siswa')
@section('content')
    <div class="row">
        <div class="col-lg-12">
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
                    <form method="post" enctype="multipart/form-data" form
                        action="{{ route('mastersiswa.update', $siswa->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name='nama'
                                value="{{ $siswa->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn" name='nisn'
                                value="{{ $siswa->nisn }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">ALAMAT</label>
                            <input type="text" class="form-control" id="alamat" name='alamat'
                                value="{{ $siswa->alamat }}">
                        </div>
                        <div class="form-group">
                            <label for="jk">JENIS KELAMIN</label>
                            <select class="form-select form-control" id="jk" name='jk'>
                                <option value="Laki - Laki"@if ($siswa->jk == 'Laki - Laki') selected @endif>Laki - Laki
                                </option>
                                <option value="Perempuan"@if ($siswa->jk == 'Perempuan') selected @endif>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Siswa</label><br>
                            <img src="{{ asset('/template/img/' . $siswa->foto) }}" width="300" class="img-thumbnail">
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>

                        <div class="form-group">
                            <label for="about">ABOUT</label>
                            <textarea type="text" class="form-control" id="about" name='about'>{{ $siswa->about }}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Update">
                            <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
