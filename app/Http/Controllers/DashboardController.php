<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $allProducts = Product::where('status', 'all_products')->get();
        $totalAllProducts = $allProducts->count();
    
        $offeredProducts = Product::where('status', 'offer_products')->get();
        $totalofferedProducts = $offeredProducts->count();
    
        return view("admin.dashboard", compact("allProducts", "totalAllProducts", "offeredProducts", "totalofferedProducts"));
    }
    
    public function all_products(Request $request){
 
        $all_products = Product::where("status", "all_products")->paginate(20);

        return view("admin.all_products", compact("all_products"));
    }

    public function offered_products(Request $request){
        $all_products = Product::where("status", "offer_products")->paginate(20);

        return view("admin.offered_products", compact("all_products"));
    }
}
