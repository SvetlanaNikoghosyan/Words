<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class TextController extends Controller
{
    public function getword($arr)
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
                $count = 0;
                $word = $arr[$i];
                $newarr = [];
                $dbwords = DB::select('select word from words');
              //  dd($dbwords);
                for ($j = 0; $j < count($dbwords); $j++)
                {
                    foreach ($dbwords[$j] as $key => $value)
                    {

                        $textword = $word;
                        $test = similar_text($textword, $value, $percent);

                        if ($percent > 80)
                            {
                                $newarr[]= $value;
                            }
                    }

                }
            }
        }
        return $newarr;
    }

    public function text(Request $request)
    {
//        $info = Textarea::get('description');
        $text = $request->get('myword');
        $arr = explode(" ", $text);
        $trueWord = $this->getword($arr);
        return $trueWord;
    }
}
