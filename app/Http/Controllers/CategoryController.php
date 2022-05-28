<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::with('movies')->get();
        return view('pages.categories',compact('categories'));
    }
}
