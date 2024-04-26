<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
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
        return view('admin.product.add', compact('categories'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'cate_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories|max:255',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'qty' => 'required',
            'tax' => 'required',
            'trending' => 'required|in:0,1',
            'meta_titel' => 'required|max:255',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $products = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product/', $filename);
            $products->image = $filename;
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
        $products->status = $request->input('status') === '1' ? '1' : '0';
        $products->trending = $request->input('trending') === '1' ? '1' : '0';
        $products->meta_titel = $request->input('meta_titel');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->save();
        return redirect('/products')->with('status', 'Products added successfully.');
    }

    public function edit($id)
    {

        $products = Product::find($id);

        // Pass the product data to the view for editing
        return view('admin.product.edit', compact('products'));
    }


    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasFile('image')) {

            $path = 'assets/uploads/product/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product/', $filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->tax = $request->input('tax');
        $products->status = $request->input('status') === '1' ? '1' : '0';
        $products->trending = $request->input('trending') === '1' ? '1' : '0';
        $products->meta_titel = $request->input('meta_titel');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->update();
        return redirect('/products')->with('status', 'Products update successfully.');
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        if ($products->image) {
            $path = 'assets/uploads/product/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('/products')->with('status', 'Products deleted successfully.');
    }
}
