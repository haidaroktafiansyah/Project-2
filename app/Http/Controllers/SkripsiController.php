<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\skripsipersonal;

class SkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //join mahasiswa and skripsi personal
        $skripsi = DB::table('skripsi_personal')
        ->join('users as mahasiswa', 'skripsi_personal.id_skripsi', '=', 'mahasiswa.id_skripsi')
        ->join('users as admin', 'skripsi_personal.id_admin', '=', 'admin.id')
        ->select('skripsi_personal.id_skripsi as id','mahasiswa.nama as mahasiswa', 'skripsi_personal.judul as judul', 'skripsi_personal.tema as tema', 'admin.nama as admin')
        ->where('mahasiswa.level', 'mahasiswa')
        ->get();

        return view('admin.pageskripsi.allskripsi',compact('skripsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get mahasiswa all
        $mhs = DB::table('users')->where('level', 'mahasiswa')->where('id_skripsi', null)->get();

        //get admin all
        $admin = DB::table('users')->where('level', 'admin')->get();

        return view('admin.pageskripsi.admincreateskripsi',compact('mhs'),compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validationdd($request);
        $request->validate([
            'mahasiswa' => 'required',
            'judul' => 'required',
            'tema' => 'required',
            'admin' => 'required',
        ]);

        //insert skripsi to db
        DB::table('skripsi_personal')->insert(
            [
                'id_mahasiswa' => $request->mahasiswa,
                'judul' => $request->judul,
                'tema' => $request->tema,
                'id_admin' => $request->admin,
            ]
        );

        //get id for skripsi to write in user table
        $skripsi =  DB::table('skripsi_personal')->where('id_mahasiswa', $request->mahasiswa)->get();

        // push id skripsi to user table cz has no foreign key :)
        DB::table('users')
        ->where('id',$request->mahasiswa)
        ->update(
            [
                'id_skripsi' => $skripsi[0]->id_skripsi,
            ]
        );

        return redirect('allskripsi')->with('status','Data skripsi Di Tambah');
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
    public function edit(Request $request)
    {
        //get current skripsi
        $skripsi = DB::table('skripsi_personal')->where('skripsi_personal.id_skripsi', $request->id)->get();

        //get mahasiswa all
        $mhs = DB::table('users')->where('level', 'mahasiswa')->get();

        //get admin all
        $admin = DB::table('users')->where('level', 'admin')->get();

        return view('admin.pageskripsi.adminupdateskripsi',compact('skripsi','admin','mhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'mahasiswa' => 'required',
            'judul' => 'required',
            'tema' => 'required',
            'admin' => 'required',
        ]);

        // dd($rquest);
        //insert skripsi to db
        DB::table('skripsi_personal')
        ->where('id_skripsi', $request->id)
        ->update(
            [
                'id_mahasiswa' => $request->mahasiswa,
                'judul' => $request->judul,
                'tema' => $request->tema,
                'id_admin' => $request->admin,
            ]
        );
        return redirect('allskripsi')->with('status','Data skripsi Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        skripsipersonal::where('id_skripsi', $request->id)->delete();
        User::where('id_skripsi', $request->id)->update(
            [
                'id_skripsi' => NULL,
            ]
        );
        return redirect('allskripsi')->with('status','Data skripsi DI Hapus');
    }
}
