<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TextController extends Controller
{
    public function getword($arr)
    {
        $testword = 'Error';
        $newarr = [];
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] == '' || $arr[$i] == ',' || $arr[$i] == ':' || $arr[$i] == '.') {
                unset($arr[$i]);
            } else {
                $word = $arr[$i];
                $dbwords = DB::select('select word from words');
                //  dd($dbwords);
                for ($j = 0; $j < count($dbwords); $j++) {
                    foreach ($dbwords[$j] as $key => $value) {

                        $textword = $word;
                        $test = similar_text($textword, $value, $percent);

                        if ($percent == 100) {
                            return "";
                        }
                        else if ($percent >= 80 && $percent < 100) {

                            $newarr[] = $value;
                        }
                    }

                }
            }
        }
//        dd($newarr);
//        return view('home', compact('newarr'));

//        print_r($newarr);

//        return response($newarr);
        return $newarr;
    }

    public function text(Request $request)
    {
        $text = $request->get('myword');
        $arr = explode(" ", $text);
        $trueWord = $this->getword($arr);
       // dd($trueWord);
        return response()->json(['trueWord'=>$trueWord]);
    }
}
