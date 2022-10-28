<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Contracts\Service\Attribute\Required;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }
    public function index()
    {
        $data = siswa::paginate(7);
        return view('masterproject', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function tambah($id)

    {
        $siswa = siswa::find($id);
        return view('CreateProject', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => 'attribute makasimal :max karakter gaess',
            'numeric' => ':attribute kudu diisi angka cak!!',
            'mimes' => 'file :attribute harus bertipe :mimes'
        ];
        $validateData = $request->validate([
            'id_siswa' => '',
            'nama_project' => 'required',
            'deskripsi' => 'required|max:225',
            'tanggal' => 'required',
        ], $message);

        project::create($validateData);
        Session::flash('benar', 'Selamat!!! Project Anda Berhasil Ditambahkan');
        return redirect('/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = siswa::find($id)->project()->get();
        return view('ShowProject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::find($id);
        $siswa = siswa::find($id);
        return view('EditProject', compact('project', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            // 'required' => ':attribute isi woi',
            // 'min' => ':attribute minimal :min karakter woi',
            // 'max' => ':attribute maksimal :max karakter woi'
        ];
        $validateData = $request->validate([
            // 'nama_project' => 'required',
            // 'tanggal' => 'required'
        ], $message);

        $project = project::find($id);
        $project->nama_project = $request->nama_project;
        $project->deskripsi = $request->deskripsi;
        $project->tanggal = $request->tanggal;
        $project->save();
        project::find($id)->update($validateData);
        Session::flash('update', 'Selamat!!! Project Anda Berhasil Diupdate');
        return redirect('/masterproject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function hapus($id)
    {
        $project = project::find($id)->delete();
        Session::flash('danger', 'Data Berhasil Dihapus');
        return redirect('/masterproject');
    }
}
