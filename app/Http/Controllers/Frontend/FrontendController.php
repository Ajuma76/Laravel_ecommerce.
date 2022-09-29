<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();

        return view('frontend.index', compact('featured_products','trending_category'));
    }

    public function category()
    {
        $categories = Category::where('status', '0')->get();


        return view('frontend.category', compact('categories'));
    }

    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $product = Product::where('cate_id', $category->id)->where('status','0')->get();

            return view('frontend.products.index', compact('product','category'));
        }
    else
        {
            return redirect('/')->with('message', 'Category does not exist');
        }

    }

    public function productview($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists())
        {
            if (Product::where('slug', $prod_slug)->exists())
            {
                $product = Product::where('slug', $prod_slug)->first();
                $ratings = Rating::where('prod_id', $product->id)->get();
                $ratings_sum = Rating::where('prod_id', $product->id)->sum('ratings');
                $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
                $review = Review::where('prod_id', $product->id)->get();

                if ($ratings->count() > 0)
                {
                    $rating_value = $ratings_sum/$ratings->count();
                }
                else
                {
                    $rating_value = 0;
                }

                return view('frontend.products.view',
                    compact('product', 'ratings', 'rating_value', 'user_rating', 'review'));
            }
            else
            {
                return redirect('/')->with('message','link broken :(');
            }
        }
        else
        {
            return redirect('/')->with('message','link broken :(');
        }
    }



    public function productlistAjax()
    {
        $product = Product::select('name')->where('status', '0')->get();

        $data = [];

        foreach ($product as $item) {

            $data[] = $item['name'];
        }

        return $data;

    }


    public function searchproduct(Request $request)
    {
        $searchproduct = $request->input('product_name');

        if ($searchproduct != null)
        {
            $product = Product::where("name", "LIKE", "%$searchproduct%")->first();

            if ($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else
            {
                return redirect()->back()->with('status', "Your search did not match any produc/t");
            }
        }
        else
        {
            return redirect()->back();
        }
    }
//$searchproduct = $request->input('product_name');
//
//if ($searchproduct != "")
//{
//$product = Product::where("name", "LIKE", "%$searchproduct%")->first();
//if ($product)
//{
//return redirect('category/'.$product->category->slug.'/'.$product->slug);
//}
//else
//{
//    return redirect()->back()->with('status', "No Product matched your search");
//}
//}
//else
//{
//    return redirect()->back();
//}

}
