<?php

namespace App\Http\Controllers\Backend\Product;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Category\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Images\ProductImages;

class ProductController extends Controller
{
    //* INDEX 
    public function index()
    {
        $categories = Category::select('id', 'title')->get();
        return view('backend.product.index', compact('categories'));
    }

    //* STORE 
    public function store(Request $request)
    {
        $request->validate([
            'product_title' => 'required'
        ]);

        DB::beginTransaction();

        try {
            //* 01 product data insertion
            $product = new Product();
            $product->title = $request->product_title;
            $product->slug = Str::slug($request->product_title);
            $product->category_id  = $request->category_id;
            $product->price  = $request->product_price;
            $product->discount_price  = $request->discount_product_price;
            $product->descriptions  = $request->product_details;
            $product->is_stock  = $request->stock_id;
            $product->status  = $request->status_id;
            $product->save();


            //* 02 product images data insertion 
            if (isset($request->images) && count($request->images) > 0) {
                foreach ($request->file('images') as $img) {

                    $imgName = time() . '-' . $img->getClientOriginalName();
                    $img->storeAs('product_images/', $imgName, 'public');

                    $productImages = new ProductImages();
                    $productImages->image_name = $imgName;
                    $productImages->product_id  = $product->id;
                    $productImages->save();
                }
            }


            DB::commit();
            return back();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    //* SHOW 
    public function show()
    {
        $products = Product::with('category', 'productImages')
            ->get();

        // dd($products);
        return view('backend.product.show', compact('products'));
    }


    //* EDIT PRODUCT 
    public function edit($slug)
    {
        $categories = Category::select('id', 'title')->get();
        $productEdit = Product::with('productImages')->where('slug', $slug)->first();
        // dd($productEdit);
        return view('backend.product.edit', compact('productEdit', 'categories'));
    }

    // * UPDATE 
    public function update(Request $request,  $id)
    {
        $request->validate([
            'product_title' => 'required'
        ]);

        DB::beginTransaction();

        try {
            //* 01 product data insertion
            $product = Product::find($id);
            // dd($product);
            $product->title = $request->product_title;
            $product->slug = Str::slug($request->product_title);
            $product->category_id  = $request->category_id;
            $product->price  = $request->product_price;
            $product->discount_price  = $request->discount_product_price;
            $product->descriptions  = $request->product_details;
            $product->is_stock  = $request->stock_id;
            $product->status  = $request->status_id;
            $product->save();


            //* 02 product images data insertion 
            if (isset($request->images) && count($request->images) > 0) {
                foreach ($request->file('images') as $img) {

                    $imgName = time() . '-' . $img->getClientOriginalName();
                    $img->storeAs('product_images/', $imgName, 'public');

                    $productImages = new ProductImages();
                    $productImages->image_name = $imgName;
                    $productImages->product_id  = $product->id;
                    $productImages->save();
                }
            }


            DB::commit();
            return redirect()->route('dashboard.product.show');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }


    //* IMAGE DELETE 
    public function imageDelete($id){
        ProductImages::find($id)->delete();
        return back();
    }
}
