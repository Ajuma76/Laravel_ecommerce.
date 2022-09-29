<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Oder;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();

        if ($product)
        {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();


            if ($review)
            {
                return view('frontend.reviews.edit', compact('review'));
            }
            else
            {
                $verified_purchase = Oder::where('oders.user_id', Auth::id())
                    ->join('order__items', 'oders.id', 'order__items.oder_id')
                    ->where('order__items.prod_id', $product_id)->get();

                return view('frontend.reviews.index', compact('product', 'verified_purchase'));
            }
        }
        else
        {
            return redirect()->back()->with('status', "Link Broken :(");
        }
    }

    public function create(Request $request)
    {
        $product_id = $request->input('product_id');

        $product = Product::where('id', $product_id)->where('status', '0')->first();

        if ($product)
        {
            $product_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
               'review' => $product_review
            ]);

            $category_slug = $product->category->slug;
            $product_slug = $product->slug;

            if ($new_review)
            {
                return redirect('category/'.$category_slug.'/'.$product_slug)->with('status', "Thank you for your review!");
            }
         }
        else
        {
            return redirect()->back()->with('status', "Link Broken :(");
        }


    }

    public function edit($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();

        if ($product)
        {
            $product_id = $product->id;

            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();

            if ($review)
            {
                return view('frontend.reviews.edit', compact('review'));
            }
            else
            {
                return redirect()->back()->with('status', "Link Broken :(");
            }
        }
        else
        {
            return redirect()->back()->with('status', "Link Broken :(");
        }
    }

    public function update(Request $request)
    {
        $user_review = $request->input('user_review_edit');

        if ($user_review != '')
        {
            $review_id = $request->input('review_id');

            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();

            if ($review)
            {
                $review->review = $request->input('user_review_edit');
                $review->update();

                return redirect('category/'.$review->product->category->slug.'/'. $review->product->slug)
                    ->with('status', "Review Updated Successfully");
            }
            else
            {
                return redirect()->back()->with('status', "Link Broken :(");
            }
        }
        else
        {
            return redirect()->back()->with('status', "You Cannot submit an empty review :(");
        }
    }
}
