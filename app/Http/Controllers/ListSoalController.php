<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Soal;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ListSoalController extends Controller
{
    public function index(){

        $data = DB::table('soals')
                ->leftjoin('pertanyaans', 'pertanyaans.soal_id', '=', 'soals.id')
                ->select(
                    'soals.*',
                    db::raw('count(pertanyaans.id) as total')
                )
                ->groupBy('soals.id')
                ->orderBy('id', 'DESC')
                ->get();

        return view('list_soal.index', [
            'data'      => $data,
        ]);
    }
}
