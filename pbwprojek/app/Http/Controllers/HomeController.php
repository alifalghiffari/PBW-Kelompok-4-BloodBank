<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('receiver.home');
    }

    public function indexRs()
    {
        return view('hospitals.homeRs');
    }

    public function aboutUs()
    {
        return view('aboutUs');
    }

    public function edit($id)
    {
        $users = DB::table('users')->where('id', $id)->get();
        return view('receiver.akun', ['users' => $users]);
    }

    public function editRs($id)
    {
        $users = DB::table('users')->where('id', $id)->get();
        return view('hospitals.akunRs', ['users' => $users]);
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
        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'kota' => $request->kota,
            'nohp' => $request->nohp,
            'email' => $request->email
        ]);

        return redirect()->back()->with('message', 'IT WORKS!');
    }

    public function updateRs(Request $request)
    {
        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'kota' => $request->kota,
            'nohp' => $request->nohp,
            'email' => $request->email
        ]);

        return redirect()->back()->with('message', 'IT WORKS!');
    }
}
