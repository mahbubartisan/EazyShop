<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function WishlistProduct(Request $request, $product_id)
    {

        if (Auth::check()) {
            $exists = WishList::where('user_id', Auth::id())
                ->where('product_id', $product_id)->first();

            if (!$exists) {

                WishList::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => now()
                ]);

                return response()->json(['success' => 'Product added on your wishlist.']);

            } else {

                return response()->json(['error' => 'This product has already in your wishlist.']);
            }

        } else {

            return response()->json(['error' => 'Login first please.']);
        }


    }

    public function ShowWishlist()
    {

        return view('frontend.wishlist.index');
    }

    public function AllWishlistProduct()
    {

        $wishlist = WishList::with('products')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlist);
    }

    public function RemoveWishlistProduct($id)
    {

        WishList::where('user_id', Auth::id())->where('id', $id)->delete();

        return response()->json(['success' => 'You product has been removed from wishlist.']);
    }
}