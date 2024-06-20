<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    public function add()
    {
        return view('category-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:30',
        ]);

        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Category Added Succesfully');
    }
    
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category-edit', ['category' => $category]);
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:30',
        ]);

        $category = Category::where('slug',$slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category Updated Succesfully');
    }

    public function delete($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('category-delete',  ['category' => $category] );
    }

    public function trash($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Succesfully');
    }

    public function deletedCategory()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('category-deleted-list', ['deletedCategories' => $deletedCategories]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug',$slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category Restored Succesfully');
    }
}
