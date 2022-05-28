<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $movies=[];
        return view('pages.home',compact('movies'));
    }
}
