<?php

namespace App\Http\Controllers\Backend\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //* index
    public function index()
    {
        $categories = Category::select('id', 'title')->get();
        return view('backend.category.index', compact('categories'));
    }

    //* categoryStore
    public function categoryStore(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title) . uniqid(); // this-pc
        $category->category_id  = $request->category_id;
        $category->meta_title  = $request->meta_title;
        $category->description  = $request->meta_descriptions;
        $category->keywords  = $request->meta_keywords;
        $category->save();
        toastr()->success('category added successfully.');
        return back();
    }

    //* categoryView 
    public function categoryView(){
        $categories = Category::get();
        return view('backend.category.viewCategory', compact('categories'));
    }
}
