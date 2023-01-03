<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use DB;
use App\Models\Soal;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SoalController extends Controller
{
    public function index(){


        return view('soal.index');
    }

    public function data(){


        $data = DB::table('soals')
                ->leftjoin('pertanyaans', 'pertanyaans.soal_id', '=', 'soals.id')
                ->select(
                    'soals.*',
                    db::raw('count(pertanyaans.id) as total')
                )
                ->groupBy('soals.id')
                ->orderBy('id', 'DESC')
                ->get();

        return response()->json([
            'data'  => $data
        ]);
    }

    public function store(Request $request){

        $data = Soal::insert([
            'nama_soal'     => $request->nama_soal, 
            'kategori_soal' => $request->kategori_soal
        ]);

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Diupdate'
        ];

        return response()->json($data);
    }

    public function update(Request $request){

        $soal = Soal::find($request->id);
        $data = $soal->update([
            'nama_soal'     => $request->nama_soal, 
            'kategori_soal' => $request->kategori_soal
        ]);

        return response()->json($data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Diupdate'
        ]);
    }

    public function delete(Request $request){

        $data = Soal::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
