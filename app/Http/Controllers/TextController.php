<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function getword($arr)
{
    $testword = 'hello';
    for ($i = 0; $i < count($arr); $i++)
    {
        if ($arr[$i] == '' || $arr[$i] == ',' || $arr[$i] == ':' || $arr[$i] == '.')
        {
            unset($arr[$i]);
        }
        else
        {
            $word = $arr[$i];
            $dbwords = DB::select('select word from words');
            for ($j = 0; $j < count($dbwords); $j++)
            {
                foreach ($dbwords[$j] as $key => $value)
                {
                    if ($word === $value)
                    {
                        $testword = $value;
//                        echo $testword;
                    }
                }

            }
        }
    }
return $testword;
}



class TextController extends Controller
{
    public function text(Request $request)
    {
//        $info = Textarea::get('description');
        $text = $request->input('inputtext');
        $arr = explode(" ", $text);

        $trueWord = getword($arr);
        echo $trueWord;
    }
}
