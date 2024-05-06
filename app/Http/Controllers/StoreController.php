<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Market;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function createStoreProduct(Request $request) 
    {
        $discount = number_format(floatval($request->price)*(intval($request->discount)/100), 2);
        $price_reduced = $request->price - $discount;
        $admin = Auth::guard('admin')->user();

        if (Stock::where('product_id', $request->product)->where('mhd', $request->mhd)->exists()) {
            Stock::where('product_id', $request->product)->where('mhd', $request->mhd)->increment('stock', intval($request->amount));
        } else {
            $product = Stock::create([
                'market_id' => $admin->markt_id,
                'product_id' => $request->product,
                'price' => $request->price,
                'price_reduced' => $price_reduced,
                'mhd' => $request->mhd,
                'stock' => $request->amount,
            ]);
        }

        return back();
    }

    public function addToCart($id) 
    {
        $user = Auth::user();
        $product = Stock::findOrFail($id);
        $product_info = Product::findOrFail($product->product_id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product_info->name,
                "quantity" => 1,
                "price" => $product->price,
                "price_reduced" => $product->price_reduced,
                "image" => $product_info->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function removeFromCart($id)
    {   
        $cart = session()->get('cart');
        if($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
       return back(); 
    }
}
