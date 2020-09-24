<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;

class HomeController extends Controller
{
    public function index()
    {
//        dd(Word::all());
        return view('home');
    }

}
