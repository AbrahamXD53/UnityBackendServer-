<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show(){
        return Score::where("id",">",0)->orderBy("id")->get();
    }
    public function store(Request $request)
    {
        $newScore= new Score();
        $newScore->value=$request->input("value");
        $newScore->save();
        return $newScore;
    }
    public function update(Request $request,$id){
        $score= Score::find($id);
        if($score){
            $score->value=$request->input("value");
            $score->save();
            return $score;
        }else{
            return "error";
        }
    }
}
