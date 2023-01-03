<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Soal;
use App\Models\Jawaban;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class JawabanController extends Controller
{
    public function index($id){

        //jika belum ada session
        if(!session()->get('sesi')){

            //make session
            session()->put('sesi', strtotime(now()));


            $pertanyaan = DB::table('pertanyaans')->where('soal_id', $id)->get();

            //insert into tabel jawaban
            foreach ($pertanyaan as $key => $value) {
    
                Jawaban::updateOrCreate(
                    [
                        'pertanyaan_id' => $value->id,
                        'user_id'       => Auth::id(),
                        'sesi'          => session()->get('sesi')
                    ],
                    [
                        'pertanyaan_id' => $value->id,
                        'user_id'       => Auth::id(),
                        'sesi'          => session()->get('sesi')
                    ]
                );
                
            }
        }
        

        $data = DB::table('pertanyaans')
                ->leftjoin('soals', 'soals.id', '=', 'pertanyaans.soal_id')
                ->leftjoin('jawabans', 'jawabans.pertanyaan_id', '=', 'pertanyaans.id')
                ->where('jawabans.sesi', session()->get('sesi'))
                ->where('pertanyaans.soal_id', $id)
                ->where('jawabans.user_id', Auth::id())
                ->select(
                    'pertanyaans.*',
                    'jawabans.jawaban',
                    'jawabans.sesi'
                )
                ->paginate(1);

        $num = DB::table('pertanyaans')
                ->where('soal_id', $id)
                ->leftjoin('jawabans', 'jawabans.pertanyaan_id', '=', 'pertanyaans.id')
                ->where('jawabans.sesi', session()->get('sesi'))
                ->where('jawabans.user_id', Auth::id())
                ->get();

        return view('kerjakan_soal.index', [
            'data'      => $data,
            'soal_id'   => $id,
            'num'       => $num
        ]);
    }

    public function store(Request $request){

        //jika belum ada session
        if(!session()->get('sesi')){

            //make session
            session()->put('sesi', strtotime(now()));

        }
        
        //insert into tabel jawaban
        Jawaban::updateOrCreate(
        [
            'pertanyaan_id' => $request->pertanyaan_id,
            'user_id'       => Auth::id(),
            'sesi'          => session()->get('sesi')
        ],
        [
            'pertanyaan_id' => $request->pertanyaan_id,
            'user_id'       => Auth::id(),
            'jawaban'       => $request->jawaban,
            'sesi'          => session()->get('sesi')
        ]);

        return back();
    }
}
