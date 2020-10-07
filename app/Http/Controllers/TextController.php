<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TextController extends Controller
    {
          public function getword(Request $request)
            {
                $text = $request->get('myword');
                $arr = explode(" ", $text);
                $DBarr = [];
                $final='';
//                $dbwords = DB::select('select word from words');
                $dbwords = Word::all();
                foreach ($dbwords as $word)
                    {
                        $DBarr[]=$word->word;
                    }
                for ($i = 0; $i < count($arr); $i++)
                    {
                        $myword = $arr[$i];
                        $input = $DBarr;
                        $similartext=[];
                        foreach($input as $word)
                            {
                                similar_text($word, $myword,  $percent);

                                if ($percent > 80 && $percent < 100 )
                                    {
                                        $similartext[] = $word;
                                    }
                                else if($percent == 100)
                                    {
                                        $similartext[] = $myword;
                                    }
                            }
                    if (!in_array($myword, $similartext))
                        {
                            $final.= "<span class='wrong' id ='id$i'>";
                            $final.= " $myword </span>";
                            $final.= '<div id="select" class="select" style="display: none;">
                                                <select class="options">';
                            if(count($similartext) > 0):
                                foreach ($similartext as $word) :
                                    $final.= '<option value = "' .$word. '" > ' .$word. ' </option>';
                                endforeach;
                            endif;
                            $final.= " </select></div>"." ";
                        }
                    else
                        {
                            $final.= "<span id = 'id$i'>";
                            $final.= " $myword </span>";
                        }
                }
                return response()->json(['trueWord' => $final]);
            }
    }
