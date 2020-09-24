<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextController extends Controller
{
    public function text(Request $request)
    {
//        $info = Textarea::get('description');
        $text = $request->input('inputtext');

        dd($text);
    }
}
