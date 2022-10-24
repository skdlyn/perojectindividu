@extends('master.admin')
@section('title', 'Edit Project')
@section('content-title', 'Edit Project')
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{ route('masterproject.update', $project->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_project">NAMA PROJECT</label>
            <input type="text" class="form-control" id="nama_project" name='nama_project'
                value="{{ $project->nama_project }}">
        </div>
        <div class="form-group">
            <label for="deskripsi">DESKRIPSI PROJECT</label>
            <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{ $project->deskripsi }}">
        </div>
        <div class="form-group">
            <label for="tanggal">TANGGAL PEMBUATAN</label>
            <input type="date" class="form-control" id="tanggal" name='tanggal' value="{{ $project->tanggal }}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Save">
            <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
@endsection
