<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //query to get user
        $user = User::all();

        //redirect
        return view('admin.homeadmin',compact('user'));
    }

    public function allmahasiswa()
    {
        //query to all mahasiswa
        $user =  DB::table('users')->where('level', 'mahasiswa')->get();

        //redirect
        return view('admin.pageuser.pagemahasiswa',compact('user'));
    }

    public function alldosen()
    {
        //query to all dosen
        $user =  DB::table('users')->where('level', 'dosen')->get();

        //redirect
        return view('admin.pageuser.pagedosen',compact('user'));
    }

    public function alladmin()
    {
        //query to all admin
        $user =  DB::table('users')->where('level', 'admin')->get();

        //redirect
        return view('admin.pageuser.pageadmin',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //array for defining level
        $level = array("admin", "mahasiswa", "dosen", "kajur");

        return view('admin.crud_user.admincreateuser', compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        //validate
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'level' => 'required',
            'kontak' => 'required',
            'nama' => 'required',
            'id_identitas' => 'required|numeric',
        ]);

        User::create($request->all());

        return redirect('admin')->with('status','Data user Di Tambah');
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
        //array for defining level
        $level = array("admin", "mahasiswa", "dosen", "kajur");

        //get 1 user
        $user =  DB::table('users')->where('id', $request->id)->get();

        return view('admin.crud_user.adminupdateuser', compact('user'),compact('level'));
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
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'level' => 'required',
            'kontak' => 'required',
            'nama' => 'required',
            'id_identitas' => 'required|numeric',
        ]);

        // dd($request);

        //i update the data bcz couldn't get the id :(
        User::where('username', $request->username)
        ->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
            'kontak' => $request->kontak,
            'nama' => $request->nama,
            'id_identitas' => $request->id_identitas,
            'id_skripsi' => $request->id_skripsi,
        ]);

        return redirect('admin')->with('status','Data user Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::where('username', $request->username)->delete();

        return redirect('admin')->with('status','Data user Di Hapus');
    }
}
