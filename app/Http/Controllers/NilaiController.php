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

class NilaiController extends Controller
{
    public function index(){


        session()->forget('sesi');

        $data = $data = DB::table('pertanyaans')
                ->leftjoin('soals', 'soals.id', '=', 'pertanyaans.soal_id')
                ->leftjoin('jawabans', 'jawabans.pertanyaan_id', '=', 'pertanyaans.id')
                ->where('jawabans.user_id', Auth::id())
                ->select(
                    'soals.nama_soal',
                    DB::raw('sum(pertanyaans.poin) as total_poin'),

                    DB::raw('sum(CASE WHEN pertanyaans.jawaban_benar = jawabans.jawaban THEN pertanyaans.poin END) AS jawaban_benar'),

                    DB::raw('count(soals.id) total_soal'),

                    'soals.id',
                    'jawabans.sesi'
                )
                ->groupBy('jawabans.sesi')
                ->get();


        return view('nilai.index', [
            'data'  => $data
        ]);
    }

    public function detail($id){

        $data = DB::table('pertanyaans')
                ->leftjoin('soals', 'soals.id', '=', 'pertanyaans.soal_id')
                ->leftjoin('jawabans', 'jawabans.pertanyaan_id', '=', 'pertanyaans.id')
                ->where('jawabans.sesi', $id)
                ->select(
                    'pertanyaans.*',
                    'jawabans.jawaban'
                    
                )
                ->orderBy('id', 'DESC')
                ->get();

        return view('nilai.detail', [
            'data'      => $data,
        ]);
    }
}
