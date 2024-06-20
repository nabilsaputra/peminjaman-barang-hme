<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::all();
        return view('items', ['items' => $items]);
        
    }

    public function add()
    {
        $categories = Category::all();
        return view('item-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_code' => 'required|unique:items|max:30',
            'item_name' => 'required|unique:items|max:30',
            'category_id' => 'required|max:10',
        ]);

        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->item_name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $item = Item::create($request->all());
        return redirect('items')->with('status', 'Item Added Succesfully');
    }

    public function showCategory()
    {
        $items = Item::with('category')->get();
        return view('items', compact('items'));
    }

    public function edit($slug)
    {
        $item = Item::where('slug', $slug)->first();
        $categories = Category::all();
        return view('item-edit', ['categories' => $categories, 'item' => $item]);
    }

    public function update(Request $request, $slug)
    {
        $item = Item::where('slug', $slug)->firstOrFail();
        $validated = $request->validate([
            'item_code' => [
                'required',
                'max:30',
                Rule::unique('items')->ignore($item->id),
            ],
            'item_name' => [
                'required',
                'max:30',
                Rule::unique('items')->ignore($item->id),
            ],
            'category_id' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->has('item_code')) {
            $item->item_code = $request->item_code;
        }
    
        if ($request->has('item_name')) {
            $item->item_name = $request->item_name;
        }
    
        if ($request->has('category_id')) {
            $item->category_id = $request->category_id;
        }

        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->item_name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }
    $item = Item::where('slug', $slug)->first();
    $item->update($request->all());
    return redirect('items')->with('status', 'Item Updated Succesfully');
    }


    public function delete($slug)
    {
        $item = Item::where('slug',$slug)->first();
        return view('item-delete',  ['item' => $item] );

    }

    public function trash($slug)
    {
        $item = Item::where('slug',$slug)->first();
        $item->delete();
        return redirect('items')->with('status', 'Category Deleted Succesfully');
    }

    public function deletedItem()
    {
        $deletedItems = Item::onlyTrashed()->get();
        return view('item-deleted-list', ['deletedItems' => $deletedItems]);
    }

    public function restore($slug)
    {
        $item = Item::withTrashed()->where('slug',$slug)->first();
        $item->restore();
        return redirect('items')->with('status', 'Item Restored Succesfully');
    }

    // public function destroy($slug)
    // {
    //     $item = Item::withTrashed()->where('slug', $slug)->firstOrFail();
    //     $item->forceDelete();
    //     return redirect('item-deleted')->with('success', 'Item deleted permanently.');
    // }
}
