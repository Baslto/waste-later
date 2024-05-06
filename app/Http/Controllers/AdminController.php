<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLogIn() 
    {
        return view('admin-login');
    }

    public function showRegister()
    {
        return view('admin-create');
    }

    public function adminCreate(Request $request)
    {
        $credentials = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'email|unique:admins|required',
            'password' => 'required|confirmed|min:8'
        ]);

        Admin::create($credentials);

        return redirect('/admin');
    }

    public function LogIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin-dashboard');
        }
        return redirect('/admin')->withErrors(['message' => 'The provided credentials do not match our records.']);        
    }

    public function showDashboard()
    {   
        $products = Product::get();
        $admin = Auth::guard('admin')->user();
        $market_products = Stock::GetStockByMarketId($admin->markt_id)->get();

        $products_info = [];
        foreach($market_products as $p) {
            $products_info[] = Product::GetProductById($p->product_id)->get();
        }
        return view('admin-dashboard')->with('products', $products)->with('market_products', $market_products)->with('products_info', $products_info);
    }
}
