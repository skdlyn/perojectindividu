@if ($project->isEmpty())
    <h6>Siswa Belum Memiliki Project</h6>
@else
    @foreach ($project as $item)
        <div class="card">
            <div class="card-header">
                <strong>{{ $item->nama_project }}</strong>
            </div>
            <div class="card-body">
                <strong>Tanggal Project :</strong>
                <p>{{ $item->tanggal }}</p>
                <strong>Deskripsi Project :</strong>
                <p>{{ $item->deskripsi }}</p>
            </div>
            @if(auth()->user()->role == "admin")
            <div class="card-footer">
                <a href="{{ route('masterproject.edit', $item -> id)}}" class="btn btn-sm btn-warning "><i class="fas fa-edit"></i></a>
                <a href="{{ route('masterproject.hapus', $item -> id)}}" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
            </div>
            @endif
        </div>
    @endforeach
@endif
