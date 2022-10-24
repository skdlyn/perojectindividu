@extends('master.admin')
@section('title', 'Show Siswa')
@section('content-title', 'Informasi Lebih Lengkap')
@section('content')
    <div class="row">

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header bg-gradient-primary"></div>
                <div class="card-body text-center">
                    <img src="{{ asset('/template/img/' . $siswa->foto) }}" width="200"
                        class="rounded-circle mt-3 mx-auto img-thumbnail">
                    <h4 class="">{{ $siswa->nama }}</h4>
                    <div class="card-body text-left">
                        <h6><i class="fas fa-id-card "></i> {{ $siswa->nisn }}</h6>
                        <h6><i class="fas fa-venus-mars "></i> {{ $siswa->jk }}</h6>
                        <h6><i class="fas fa-location-arrow"></i> {{ $siswa->alamat }}</h6>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-user-plus"></i> Kontak Siswa</h6>
                </div>
                <div class="card-body text-center">
                    @foreach ($kontaks as $kontak)
                        <li>{{ $kontak->jenis_kontak }} : {{ $kontak->pivot->deskripsi }}</li>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4 ">
                <div class="card-header bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-quote-left"></i> About Siswa</h6>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">{{ $siswa->about }}</p>
                        <footer class="blockquote-footer">Ditulis Oleh <cite title="Source Title">{{ $siswa->nama }}</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header bg-gradient-primary">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-tasks"></i> Project Siswa</h6>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection
