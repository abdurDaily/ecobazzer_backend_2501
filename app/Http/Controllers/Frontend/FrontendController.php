<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

use function Pest\Laravel\session;

class FrontendController extends Controller
{
    //* index
    public function index()
    {
        $products = Product::with('productImages')->where('status', 1)->get();
        return view('welcome', compact('products'));
    }

    //* addToCart
    public function addToCart($id)
    {
        $productCart = Product::with('productImages')->find($id);

        // Get existing cart from session
        $cart = request()->session()->get('cart', []);

        // Check if product already exists in cart
        if (isset($cart[$id])) {
            // Increment quantity if product exists
            $cart[$id]['qty'] += 1;
        } else {
            // Add new product to cart
            $cart[$id] = [
                'title' => $productCart->title,
                'qty' => 1,
                'price' => $productCart->price,
                'image' => $productCart->productImages[0]->image_name ?? null,
                'descriptions' => $productCart->descriptions,
            ];
        }

        // Save cart back to session
        request()->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    //* REMOVE CART 
    public function removeCart($id)
    {
        $cart = request()->session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            request()->session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product cart unset!');
        }
    }

    //* checkout
    public function checkout(){
        return view('frontend.checkout');
    }
}
