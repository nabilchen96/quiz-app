<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use DB;
use App\Models\Pertanyaan;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PertanyaanController extends Controller
{
    public function index($id){

        $data = DB::table('pertanyaans')
                ->join('soals', 'soals.id', '=', 'pertanyaans.soal_id')
                ->where('soal_id', $id)
                ->select(
                    'pertanyaans.*'
                )
                ->orderBy('id', 'DESC')
                ->get();

        return view('pertanyaan.index', [
            'data'      => $data,
            'soal_id'   => $id
        ]);
    }

    public function store(Request $request){

        $data = Pertanyaan::insert($request->all());

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Diupdate'
        ];

        return response()->json($data);
    }

    public function update(Request $request){

        $soal = Pertanyaan::find($request->id);
        $data = $soal->update($request->all());

        return response()->json($data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Diupdate'
        ]);
    }

    public function delete(Request $request){

        $data = Pertanyaan::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

}
