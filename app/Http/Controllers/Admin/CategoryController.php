<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
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
    // public function insert(Request $request){

    //     $category = new Category();
    //     if($request->hasFile('image')){
    //         $file =$request->file('image')
    //         $ext = $file->getClientOriginalExtension();
    //         $filename =  time().'.'.$ext;
    //         $file->move('assets/uploads/category'.$filename);
    //         $category->image = $filename;

    //     }
    //     $category->name = $request->input('name');
    //     $category->slug = $request->input('slug');
    //     $category->description = $request->input('description');
    //     $category->status = $request->input('status') ==TRUE?'1':'0';
    //     $category->popular = $request->input('popular')==TRUE?'1':'0';
    //     $category->meta_titel = $request->input('meta_titel');
    //     $category->meta_descrip = $request->input('meta_descrip');
    //     $category->meta_keywords = $request->input('meta_keywords');
    //     $category->save();
    //     return redirect('/dashboard')->with('status', 'Category added successfully.');

    //     // return redirect('/dashboard')->with('status');
    // }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories|max:255',
            'description' => 'required',
            'popular' => 'required|in:0,1',
            'meta_titel' => 'required|max:255',
            'meta_descrip' => 'required',
            'meta_keywords' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') === '1' ? '1' : '0';
        $category->popular = $request->input('popular') === '1' ? '1' : '0';
        $category->meta_titel = $request->input('meta_titel');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/categories')->with('status', 'Category added successfully.');
    }

    public function edit($id)
    {

        $category = Category::find($id);

        // Pass the product data to the view for editing
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {

            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') === '1' ? '1' : '0';
        $category->popular = $request->input('popular') === '1' ? '1' : '0';
        $category->meta_titel = $request->input('meta_titel');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();
        return redirect('/categories')->with('status', 'Category update successfully.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/categories')->with('status', 'Category deleted successfully.');
    }
}
