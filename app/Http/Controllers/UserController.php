<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Market;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLogIn() 
    {
        return view('user-login');
    }

    public function showRegister()
    {
        return view('user-register');
    }

    public function userCreate(Request $request)
    {    
        $credentials = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'email|unique:users|required',
            'password' => 'required|confirmed|min:8',
            'plz' => 'required'
        ]);

        User::create($credentials);
        return redirect('/');
    }

    public function LogIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)) {
            return redirect()->intended('user-dashboard');
        }
        return redirect('/')->withErrors(['message' => 'The provided credentials do not match our records.']);        
    }

    public function showDashboard()
    {   
        $user = Auth::user();
        
        $market = Market::GetMarketByPLZ($user->plz)->get();
        if (!count($market) > 0) {
            return view('user-dashboard')->with('bool', false);
        } else {
            $market_products = Stock::GetStockByMarketId($market[0]->id)->get();
            $categories = Category::all();
            $products_info = [];
            foreach($market_products as $p) {
                $products_info[] = Product::GetProductById($p->product_id)->get();
            }
            return view('user-dashboard')->with('market_products', $market_products)->with('products_info', $products_info)->with('categories', $categories)->with('bool', true);
        }
    }

    public function showCart() {

        return view('cart');
    }

    public function showCategory($id) {
        $products_filtered = Product::where('category_id', $id)->get();
        $categories = Category::all();
        $currentCategory = Category::where('id', $id)->get();
        $stock_filtered = [];
        $products_info = [];
        foreach($products_filtered as $p) {
            if (Stock::where('product_id', $p->id)->exists()) {
                $stock_filtered[] = Stock::where('product_id', $p->id)->get();
                $products_info[] = Product::GetProductById($p->id)->get();
            }   
        }

        return view('user-category')->with('stock_filtered', $stock_filtered)->with('products_info', $products_info)->with('categories', $categories)->with('current_category', $currentCategory);
    }
}
