<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        
        $all_products = Product::where('status', 'all_products')
        ->latest('created_at')
        ->take(6)
        ->get();

        $offer_products = Product::where('status', 'offer_products')
        ->latest('created_at')
        ->take(6)
        ->get();
    

        return view('index', ['lastSixProducts' => $all_products ,'offer_products'=> $offer_products]);
    }

    public function show($id){
 

        $product = Product::findOrFail($id);
        return view('show', ['product'=> $product]);

    }

    public function addProduct(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:120',
            'description' => 'required|max:1000',
            'price' => 'required|numeric',
            'url_image' => 'file|mimes:png,jpg,jpeg|file|max:2048',
        ]);
    
        // Initialize $imagePath
        $imagePath = null;
    
        // Handle image upload
        if ($request->hasFile('url_image')) {
            $imageName = time().'.'.$request->url_image->extension();  
            $imagePath = $request->url_image->move(public_path('images'), $imageName);
        } 
    
        // Extract file name from the full path
        $imagePath = $imagePath ? 'images/' . basename($imagePath) : null;
    
        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'status'=>'all_products',
            'url_image' => $imagePath, // Use $imagePath instead of $validated['image_url']
        ]);
    
        return redirect()->route('dashboard.all-products')->with('success', 'Product added successfully');
    }
    
    public function deleteProduct($id) {
        // Retrieve the product by ID
        $product = Product::find($id);
    
        // Check if the product exists
        if ($product) {
            // Delete the associated image file
            if ($product->url_image) {
                $imagePath = public_path($product->url_image);
    
                // Check if the file exists before attempting to delete
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image file
                }
            }
    
            // Delete the product from the database
            $product->delete();
    
            return redirect()->route('dashboard.all-products')->with('delete', 'Product deleted successfully');
        } else {
            return redirect()->route('dashboard.all-products')->with('error', 'Product not found');
        }
    }
    
    public function addOffer(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:120',
            'description' => 'required|max:1000',
            'price' => 'required|numeric',
            'url_image' => 'file|mimes:png,jpg,jpeg|file|max:2048',
            'price_after_discount'=> 'required|numeric',
        ]);
    
        // Initialize $imagePath
        $imagePath = null;
    
        // Handle image upload
        if ($request->hasFile('url_image')) {
            $imageName = time().'.'.$request->url_image->extension();  
            $imagePath = $request->url_image->move(public_path('images'), $imageName);
        } 
    
        // Extract file name from the full path
        $imagePath = $imagePath ? 'images/' . basename($imagePath) : null;
    
        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'status'=>'offer_products',
            'price_after_discount'=>$validated['price_after_discount'],
            'url_image' => $imagePath, // Use $imagePath instead of $validated['image_url']
        ]);
    
        return redirect()->route('dashboard.offered-products')->with('success', 'Product added successfully');
    }
    
    public function deleteProductOffer($id) {
        // Retrieve the product by ID
        $product = Product::find($id);
    
        // Check if the product exists
        if ($product) {
            // Delete the associated image file
            if ($product->url_image) {
                $imagePath = public_path($product->url_image);
    
                // Check if the file exists before attempting to delete
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image file
                }
            }
    
            // Delete the product from the database
            $product->delete();
    
            return redirect()->route('dashboard.offered-products')->with('delete', 'Product deleted successfully');
        } else {
            return redirect()->route('dashboard.offered-products')->with('error', 'Product not found');
        }
    }
}
