<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokDarahController extends Controller
{
    public function index()
    {
        // mengambil data dari table stok darah
        $stok_darah = DB::table('users')
            ->join('stok_darah', 'stok_darah.id_user', '=', 'users.id')
            ->get();

        // mengirim data stok darah ke view index
        return view('/receiver/stok_darah', ['stok_darah' => $stok_darah]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table stok darah sesuai pencarian data
        $stok_darah = DB::table('users')->join('stok_darah', 'stok_darah.id_user', '=', 'users.id')
            ->where('gol_darah', 'like', "%" . $cari . "%")
            ->paginate();

        // mengirim data stok darah ke view index
        return view('/receiver/Stok_darah', ['stok_darah' => $stok_darah]);
    }

    public function Minta($id)
    {
        $stok_darah = DB::table('stok_darah')->where('id', $id)->get();
        return view('receiver.mintaDarah', ['stok_darah' => $stok_darah]);
    }

    public function store(Request $request)
    {
        DB::table('permintaan_darah')->insert([
            'id_stokDarah' => $request->id,
            'id_user' => $request->id_user,
            'jumlah_darah' => $request->jumlah_darah
        ]);

        return redirect('/request');
    }
}
