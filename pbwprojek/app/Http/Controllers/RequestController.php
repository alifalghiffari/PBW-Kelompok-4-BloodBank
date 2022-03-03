<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PharIo\Manifest\Library;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function permohonan()
    {
        $stok_darah = DB::table('stok_darah')
            ->join('users', 'users.id', '=', 'stok_darah.id_user')
            ->join('permintaan_darah', 'stok_darah.id', '=', 'permintaan_darah.id_stokDarah')
            // ->where('stok_darah.id_user', '=', '{{ Auth::user()->id }}')
            ->paginate(5);

        return view('receiver.permohonan', ['stok_darah' => $stok_darah]);
        // return view('receiver.permohonan');
    }

    public function permohonanRs()
    {
        $stok_darah = DB::table('permintaan_darah')
            ->join('users', 'users.id', '=', 'permintaan_darah.id_user')
            ->join('stok_darah', 'stok_darah.id', '=', 'permintaan_darah.id_stokDarah')
            // ->where('stok_darah.id_user', '=', '{{ Auth::user()->id }}')
            ->paginate(5);

        return view('Hospitals.permohonanRs', ['stok_darah' => $stok_darah]);
    }

    public function TerimaRs(Request $request)
    {
        DB::table('permintaan_darah')->where('request_id', $request->id)->update(
            ['status' => 'Diterima']
        );

        return redirect('/requestRs');
    }

    public function TolakRs(Request $request)
    {
        DB::table('permintaan_darah')->where('request_id', $request->id)->update(
            ['status' => 'Ditolak']
        );

        return redirect('/requestRs');
    }

    public function Batal($id)
    {
        DB::table('permintaan_darah')->where('Request_id', $id)->delete();

        return redirect('/request');
    }

    public function cariR(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table stok darah sesuai pencarian data
        $stok_darah = DB::table('stok_darah')
            ->join('users', 'users.id', '=', 'stok_darah.id_user')
            ->join('permintaan_darah', 'stok_darah.id', '=', 'permintaan_darah.id_stokDarah')
            ->where('gol_darah', 'like', "%" . $cari . "%")
            ->paginate();

        // mengirim data stok darah ke view index
        return view('/receiver.permohonan', ['stok_darah' => $stok_darah]);
    }

    public function cariRs(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table stok darah sesuai pencarian data
        $stok_darah = DB::table('permintaan_darah')
            ->join('users', 'users.id', '=', 'permintaan_darah.id_user')
            ->join('stok_darah', 'stok_darah.id', '=', 'permintaan_darah.id_stokDarah')
            ->where('gol_darah', 'like', "%" . $cari . "%")
            ->paginate();

        // mengirim data stok darah ke view index
        return view('/hospitals.permohonanRs', ['stok_darah' => $stok_darah]);
    }
}
