<?php
namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {
        $productId = $request->input('product_id');

        // تأكد أن الـ Wishlist موجودة في الجلسة
        $wishlist = Session::get('wishlist', []);

        // إضافة المنتج للـ Wishlist إذا لم يكن موجودًا
        if (!in_array($productId, $wishlist)) {
            $wishlist[] = $productId;
            Session::put('wishlist', $wishlist);
            return response()->json(['success' => true, 'message' => 'Product added to wishlist!']);
        }

        return response()->json(['success' => false, 'message' => 'Product is already in the wishlist!']);
    }

}

