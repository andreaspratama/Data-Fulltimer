<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Datadiri;
use App\Imports\UserImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::orderBy('id', 'desc')->get();

        return view('pages.admin.ft.user.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "User Create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // Insert ke User
        // $user = new User;
        // $user->name = $request->nama;
        // $user->email = $request->email;
        // $user->password = bcrypt('user123**');
        // $user->role = 'user';
        // $user->save();        

        // // Insert ke Datadiri
        // $request->request->add(['user_id' => $user->id]);
        // $data = $request->all();
        // Datadiri::create($data);

        // return redirect()->route('login')->with('success', 'Pendaftaran Berhasil');
    }

    public function tambahUser(Request $request)
    {
        // Insert ke User
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('user123**');
        $user->role = 'user';
        $user->save();        

        // Insert ke Datadiri
        $request->request->add(['user_id' => $user->id]);
        $data = $request->all();
        Datadiri::create($data);

        return redirect()->route('login')->with('success', 'Pendaftaran Berhasil');
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
        //
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

    public function importExcelUser(Request $request)
    {
        // Excel::import(new SiswaImport, $request->file('DataSiswa'));
        $file = $request->file('file');
        // dd($file);
        $namaFile = $file->getClientOriginalName();
        $file->move('DataUser', $namaFile);

        Excel::import(new UserImport, public_path('/DataUser/'.$namaFile));

        return redirect()->route('user.index')->with('success', 'Data Berhasil Ditambahkan');
    }
}
