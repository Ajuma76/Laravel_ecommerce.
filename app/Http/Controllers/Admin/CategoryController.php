<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
            $category = new Category();

            $image = $request->file('image');
            if ($image)
            {
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move('assets/uploads/category', $imagename);
                $category->image = $imagename;
            }

            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->description = $request->input('description');
            $category->status = $request->input('status') == TRUE?'1':'0';
            $category->popular = $request->input('popular') == TRUE?'1':'0';
            $category->meta_title = $request->input('meta_title');
            $category->meta_keywords = $request->input('meta_keywords');
            $category->meta_descript = $request->input('meta_description');

            $category->save();

            return redirect('/categories')->with('status', 'category Added Successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $image = $request->file('image');
        if ($image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if (File::exists($path))
            {
                File::delete($path);
            }

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/uploads/category', $imagename);
            $category->image = $imagename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE?'1':'0';
        $category->popular = $request->input('popular') == TRUE?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descript = $request->input('meta_description');

        $category->update();


        return redirect('/categories')->with('message', 'Category updated Successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);

        if ($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if (File::exists($path))
            {
                File::delete($path);
            }
        }

        $category->delete();

        return redirect()->back()->with('message', 'Item deleted successfully');
    }
}
