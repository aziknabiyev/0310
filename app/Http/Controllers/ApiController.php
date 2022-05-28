<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class ApiController extends Controller
{

    public function index(Request $request)
    {
        $query=Movie::query();
        if($q=$request->input('q'))
        {
            $query
                ->where(function($query) use ($q) {
                    $query->where('title', 'like', '%'.$q.'%');
                    $query->orWhere('description', 'like', '%'.$q.'%');
                    $query->orWhereHas('categories', function ($query) use ($q){
                        $query->where('categories.name', 'like', '%'.$q.'%');
                    });
                });
        }
        if($sort=$request->input('sort'))
        {
             $query->orderBy('created_at',$sort);
        }

        return response()->json($query->with('categories')->get());

    }

    public function show(Movie $movie)
    {
        return response()->json($movie::with('categories')->get());
    }

    public function getToken(Faker $faker)
    {
        $user = User::create([
            'name' => $faker->name,
            'email' =>  $faker->unique()->safeEmail,
            'password' => Hash::make(Str::random(6)),
            'api_token' => Str::random(60)
        ]);
        return response()->json(['token'=>$user->api_token]);
    }

}
