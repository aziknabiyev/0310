<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies=Movie::with('categories')->get();
        return view('pages.movies',compact('movies'));
    }
}
