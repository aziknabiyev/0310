<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::with('movies')->get();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data=$request->validated();
        Category::create($data);
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.category.update',compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data=$request->validated();
        $category->update($data);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        if($category->movies()->count())
        {
            return back()->withErrors(['error'=>'Caregory has movies']);
        }
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
