<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){


        return view('user.index');
    }

    public function data(){


        $data = DB::table('users')->get();

        return response()->json([
            'data'  => $data
        ]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'password'   => 'required|min:8',
            'email'      => 'unique:users'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = User::insert([
                'name'          => $request->name,
                'role'          => $request->role,
                'email'         => $request->email,
                'password'      => Hash::make($request->password)
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Diupdate'
            ];
        }

        return response()->json($data);
    }

    public function update(Request $request){

        $user = User::find($request->id);
        $data = $user->update([
            'name'      => $request->name,
            'role'      => $request->role,
            'email'     => $request->email,
            'password'  => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return response()->json($data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Diupdate'
        ]);
    }

    public function delete(Request $request){

        $data = User::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
