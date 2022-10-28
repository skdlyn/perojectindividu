<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\jenis_kontak;
use App\Models\kontak;
use App\Models\siswa;

class JenisKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('admin')->except('index', 'show');
    // }
    public function index()
    {
        $jenis_kontak = jenis_kontak::paginate(5);
        return view('mastercontact', compact('jenis_kontak'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CreateJK');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masage = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $this->validate($request, [
        ], $masage);


        jenis_kontak::create([
            'jenis_kontak' => $request->jenis_kontak
        ]);

        Session::flash('yesjadi', "Selamat !!! Data jenis kontak berhasil ditambahkan!!");
        return redirect('/mastercontact');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $contact = siswa::find($id)->kontak()->get();
        // $contact = siswa::find($id)->jenis_kontak()->get();
        // $kontak = kontak::find($id);
        // $jenis_kontak = jenis_kontak::find($id);
        // $kontak = kontak::get();
        // return($j_kontak);
        // return view('edit_jkontak', compact('jenis_kontak'));
        //
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
        // $masage = [
        //     'required' => ':attribute harus diisi',
        //     'min' => ':attribute minimal :min karakter',
        //     'max' => ':attribute maximal :max karakter',
        //     'numeric' => ':attribute harus diisi angka',
        //     'mimes' => ':attribute harus bertipe foto'
        // ];

        // $this->validate($request, [
        //     'jenis_kontak' => 'required'
        // ], $masage);

        //     $jenis_kontak = jenis_kontak::find($id);
        //     $jenis_kontak->jenis_kontak = $request->jenis_kontak;

        //     $jenis_kontak->save();
        //     Session::flash('', "data berhasil diupdate!!");
        //     return redirect('mastercontact');
        // //
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
        $siswa = jenis_kontak::find($id)->delete();
        Session::flash('hapus', "Data berhasil dihapus :(");
        return redirect('/mastercontact');
        //
    }
}