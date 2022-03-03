<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;


class AuthController extends Controller
{
    public function showFormLogin()
    {
        // if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
        //     //Login Success
        //     //return redirect()->route('home');
        // }
        return view('loginUser');
    }

    public function loginUser(Request $request)
    {
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
            if (auth()->user()->hak_akses == "user") {
                //dd("user");
                //redirect user ke halaman user
                return redirect()->route('home');
            } elseif (auth()->user()->hak_akses == "rs") {
                //dd("rs");
                //pada form user , Rs tidak bisa login melalui form user
                return redirect()->back();
            }/*else{
                return redirect()->back();
            }*/
        } else { // false

            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('loginUser');
        }
    }

    public function showFormRegister()
    {
        return view('registerUser');
    }

    public function registerUser(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'kota'                  => 'required|min:3|max:35',
            'nohp'                  => 'required|min:9|max:15',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'kota.required'         => 'Kota ajib diisi',
            'kota.min'              => 'Kota minimal 3 karakter',
            'kota.max'              => 'Kota maksimal 35 karakter',
            'nohp.required'         => 'No Hp wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

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
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('loginUser');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('registerUser');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('loginUser');
    }
}
