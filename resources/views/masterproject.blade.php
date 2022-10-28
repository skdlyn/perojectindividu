{{-- @section('master.title', 'Master Siswa') --}}
@extends('master.admin')
@section('title', 'Data Project')
@section('content-title', 'Data Project')
@section('content')
    <!--Projects-->
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
                                <tr>
                                    <th>{{ $item->nisn }}</th>
                                    <th>{{ $item->nama }}</th>

                                    <td class="text-center">
                                        <a class="btn-warning" onclick="show({{ $item->id }})"><i class="btn-sm info fas fa-folder-open"></i></a>
                                        @if(auth()->user()->role == "admin")
                                        <a class="btn-success" href="{{ route('masterproject.tambah', $item->id) }}"><i class="btn-sm success fas fa-plus"></i></a>
                                        @endif
                                    </td>
                                </tr>
                        @endforeach
                    </table>

                    <div class="card-footer d-flex justify-content-center">
                        {{ $data->links()}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-mb-4">
                <div class="card-header bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Project Siswa</h6>
                </div>
                <div class="card-body " id="project">
                    <div class="text-center">
                        <h6>Pilih Siswa Terlebih Dahulu</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function show(id){
            $.get('masterproject/' + id, function(data) {
                $('#project').html(data);
            })

        }
    </script>
@endsection
