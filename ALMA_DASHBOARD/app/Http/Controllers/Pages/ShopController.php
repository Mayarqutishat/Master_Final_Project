<?php
namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getProductsByCategory()
    {
        // Define the category names to filter by
        $categories = ['Bags', 'Embroidery','Frame', 'Embroidery ','Needles', 'Yarns'];

        // Fetch products based on category names
        $products = Product::whereHas('category', function($query) use ($categories) {
            $query->whereIn('name', $categories);
        })->get();

        // Pass the products to the view
        return view('shop', compact('products'));
    }






    
}
