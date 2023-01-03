<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check() == true ) {
            return redirect('dashboard');
        } else {
            return view('auth.login');
        }

    }

    public function loginProses(Request $request)
    {

        $response_data = [
            'responCode' => 0,
            'respon'    => ''
        ];

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            $role = Auth::user()->role;

            $response = Auth::user()->role;

            $response_data = [
                'responCode' => 1,
                'respon'    => $response
            ];

        } else { 

            $response_data['respon'] = 'Username atau password salah!';

        }

        return response()->json($response_data);

    }
}
