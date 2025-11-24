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

    public function categoryView()
    {
        // Use 'parent' not 'parents'
        $categories = Category::with('parent')->get();
        // dd($categories);
        return view('backend.category.viewCategory', compact('categories'));
    }


    //* categoryEdit

    public function categoryEdit($slug)
    {
        $edit_category = Category::where('slug', $slug)->first();
        $categories = Category::select('id', 'title')->get();
        return view('backend.category.edit', compact('edit_category', 'categories'));
    }

    //*categoryUpdate

    public function categoryUpdate(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $update_category = Category::where('slug', $slug)->first();

        $update_category->title = $request->title;
        $update_category->slug = Str::slug($request->title) . uniqid();
        $update_category->category_id = $request->category_id;
        $update_category->meta_title = $request->meta_title;
        $update_category->description = $request->meta_descriptions;
        $update_category->keywords = $request->meta_keywords;
        $update_category->save();

        toastr()->success('Category updated successfully.');

        // Redirect to category view/list page
        return redirect()->route('dashboard.category.view');
    }
}
