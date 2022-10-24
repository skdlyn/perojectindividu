@extends('master.admin')
@section('title', 'contact')
@section('content-title', 'Master Kontak')
@section('content')
    @if ($message = Session::get('benar'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('update'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <!--Modal Tambah Data-->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="modaltambah"
                data-whatever>Tambah Jenis Kontak</button>
            {{-- <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modaltambah"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Kontak</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="form-grup">
                            <form method="post" enctype="multipart/form-data" action="{{ route('mastercontact.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="Nama">Nama Aplikasi</label>
                                    <input type="text" class="form-control" id="nama" name='nama'>
                                </div>
                                <div class="modal-footer">
                                    <a href="/mastercontact"type="button" class="btn btn-danger">Batal</a>
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!--Jenis Kontak-->
        {{-- <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-gradient-primary text-white">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">JENIS KONTAK</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis_kontak as $i => $item)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{ $jenis_kontak->jenis_kontak_siswa  }}</td>
                                        <td>
                                            <a href="{{ route('mastercontact.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('mastercontact.hapus', $item->id) }}"
                                                class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div> --}}

        <!--Data Siswa-->
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-mb-4">
                    <div class="card-header bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Data Siswa</h6>
                    </div>
                    <div class="card-body ">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NISN</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            @foreach ($data as $item)
                                <tbody>
                                    <tr>
                                        <th>{{ $item->nisn }}</th>
                                        <th>{{ $item->nama }}</th>

                                        <td class="text-center">
                                            <a class="btn-warning" onclick="show({{ $item->id }})"><i
                                                    class="btn-sm warning fas fa-phone"></i></a>
                                            <a class="btn-success"
                                                    href="{{ route('mastercontact.tambah', $item->id) }}"><i
                                                    class="btn-sm success fas fa-plus"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div class="card-footer d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-mb-4">
                    <div class="card-header bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Kontak Pribadi Siswa</h6>
                    </div>
                    <div class="card-body " id="kontak">
                        <div class="text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function show(id) {
                $.get('mastercontact/' + id, function(data) {
                    $('#kontak').html(data);
                })

            }
        </script>
    </div>
@endsection
