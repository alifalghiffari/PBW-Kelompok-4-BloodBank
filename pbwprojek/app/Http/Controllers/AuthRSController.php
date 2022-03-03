<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;


class AuthRSController extends Controller
{
    public function showFormLoginRS()
    {
        // if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
        //     //Login Success
        //     //return redirect()->route('home');
        // }
        return view('loginRS');
    }

    public function loginRS(Request $request)
    {
        //DB::table('usersrs')
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            if (auth()->user()->hak_akses == "rs") {
                // untuk redirect ke halaman rumah sakit
                return redirect()->route('homeRs');
            } else if (auth()->user()->hak_akses == "user") {
                //pada form login RS si user ga bisa masuk melalui form RS
                return redirect()->back();
            }
        } else { // false

            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('loginRS');
        }
    }

    public function showFormRegisterRS()
    {
        return view('registerRS');
    }

    public function registerRS(Request $request)
    {
        //DB::table('usersrs');
        // DB::table('usersrs')->insert([
        //     'name' => $request->name,
        //     'kota' => $request->kota,
        //     'nohp' => $request->nohp,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'email_verified_at' => \Carbon\Carbon::now()
        // ]);

        $rules = [
            'name'                  => 'required|min:3|max:35',
            'kota'                  => 'required|min:3|max:35',
            'nohp'                  => 'required|min:9|max:15',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'name.required'         => 'Nama Rumah Sakit wajib diisi',
            'name.min'              => 'Nama Rumah Sakit minimal 3 karakter',
            'name.max'              => 'Nama Rumah Sakit maksimal 35 karakter',
            'kota.required'         => 'Kota wajib diisi',
            'kota.min'              => 'Kota minimal 3 karakter',
            'kota.max'              => 'Kota maksimal 35 karakter',
            'nohp.required'         => 'No Hp wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        //$this->validate($request, $rules, $messages);
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->kota = ucwords(strtolower($request->kota));
        $user->nohp = ucwords(strtolower($request->nohp));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->hak_akses = $request->hak_akses;
        $simpan = $user->save();

        if ($simpan) {
            //Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('loginRS');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('registerRS');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('loginRS');
    }
}
