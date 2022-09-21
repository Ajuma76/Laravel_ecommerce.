<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        return view('frontend.wishlist.index', compact('wishlist'));
    }

    public function add(Request $request)
    {
        $prod_id = $request->input('product_id');

        if (Auth::check())
        {
            $prod_check = Product::where('id', $prod_id)->first();

            if ($prod_check)
            {
                if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name . " Already added to Wishlist"]);
                }
                else
                {
                    $wish = new Wishlist();
                    $wish->prod_id = $prod_id;
                    $wish->user_id = Auth::id();
                    $wish->save();

                    return response()->json(['status' => "Product Added to wishlist"]);
                }
            }
        }
        else
        {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function destroy(Request $request)
    {
        if (Auth::check())
        {
            $prod_id = $request->input('prod_id');

            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $wishlist = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();

                $wishlist->delete();

                return response()->json(['status' => "Product Removed From Wishlist"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function wishlistcount()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->count();

        return response()->json(['count' => $wishlist]);
    }

}

//public function add(Request $request)
//{
//    if (Auth::check())
//    {
//        $prod_id = $request->input('product_id');
//
//
//        if (Product::find($prod_id))
//        {
//            $wish = new Wishlist();
//            $wish->prod_id = $prod_id;
//            $wish->user_id = Auth::id();
//            $wish->save();
//
//            return response()->json(['status', "Product Added to wishlist"]);
//        }
//        else
//        {
//            return response()->json(['status', "Product does not exist"]);
//        }
//    }
//    else
//    {
//        return response()->json(['status', "Login to continue"]);
//    }
//}

