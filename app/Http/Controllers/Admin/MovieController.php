<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies=Movie::with('categories')->get();
        return view('admin.movie.index',compact('movies'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('admin.movie.create',compact('categories'));
    }

    public function store(MovieRequest $request)
    {
        $data=$request->validated();
        $categories=$data['categories'];
        $rates=$data['rates'];
        $saveCategories=[];

        foreach ($categories as $k=>$category){
            $saveCategories[$category]=['rate'=>$rates[$category]];
        }

        $movie=Movie::create([
            'title'=>$data['title'],
            'description'=>$data['description']
        ]);

        $movie->categories()->sync($saveCategories);

        return redirect()->route('admin.movies.index');
    }


    public function edit(Movie $movie)
    {
        $categories=Category::all();
        $postCategories=$movie->categories;
        return view('admin.movie.update',compact('movie','categories','postCategories'));
    }


    public function update(MovieRequest $request,Movie $movie)
    {
        $data=$request->validated();
        $categories=$data['categories'];
        $rates=$data['rates'];
        $saveCategories=[];

        foreach ($categories as $k=>$category){
            $saveCategories[$category]=['rate'=>$rates[$category]];
        }

        $movie->update([
            'title'=>$data['title'],
            'description'=>$data['description']
        ]);

        $movie->categories()->sync($saveCategories);

        return redirect()->route('admin.movies.index');
    }


    public function destroy(Movie $movie)
    {
        $movie->categories()->detach();
        $movie->delete();
        return redirect()->route('admin.movies.index');
    }
}
