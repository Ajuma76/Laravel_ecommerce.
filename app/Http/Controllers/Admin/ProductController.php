<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('admin.product.add', compact('categories', 'products'));
    }

    public function insert(Request $request)
    {
                $products = new Product();

                $image = $request->file('image');
                if ($image)
                {
                    $imagename = time().'.'.$image->getClientOriginalExtension();
                    $image->move('assets/uploads/product', $imagename);
                    $products->image = $imagename;
                }
                $products->cate_id = $request->input('cate_id');
                $products->name = $request->input('name');
                $products->slug = $request->input('slug');
                $products->small_description = $request->input('small_description');
                $products->description = $request->input('description');
                $products->original_price = $request->input('original_price');
                $products->selling_price = $request->input('selling_price');
                $products->qty = $request->input('qty');
                $products->tax = $request->input('tax');
                $products->status = $request->input('status') == TRUE?'1':'0';;
                $products->trending = $request->input('trending') == TRUE?'1':'0';;
                $products->meta_title = $request->input('meta_title');
                $products->meta_keywords = $request->input('meta_keywords');
                $products->meta_description = $request->input('meta_description');

                $products->save();

                return redirect('products')->with('message', 'Product Added Successfully');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Category::all();

        return view('admin/product/edit', compact('products', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        $image = $request->file('image');
        if ($image)
        {
            $path = 'assets/uploads/product/'.$products->image;
            if (File::exists($path))
            {
                File::delete($path);
            }

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/uploads/product', $imagename);
            $products->image = $imagename;
        }


        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->tax = $request->input('tax');
        $products->status = $request->input('status') == TRUE?'1':'0';;
        $products->trending = $request->input('trending') == TRUE?'1':'0';;
        $products->meta_title = $request->input('meta_title');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');

        $products->update();

        return redirect('/products')->with('message', 'Product Updated Successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product->image)
        {
            $path = 'assets/uploads/product/'.$product->image;
            if (File::exists($path))
            {
                File::delete($path);
            }
        }

        $product->delete();

        return redirect()->back()->with('message', 'Item deleted successfully');
    }
}



