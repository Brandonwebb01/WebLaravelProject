<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function index()
    {
        //display table of all categories
        $items = \App\Models\items::all()->sortBy("item_title");
        return view('items.index')->with('items', $items);

    }
   
    public function create()
    {
        //shows form to create new item
        return view('items.create');
    }
 
    public function store(Request $request)
    {
        //checks the form submission for errors, insert into database or show errors
        $rules = [
            'item' => 'required|max:255|unique:items,item_title',
            'description' => 'required|min:255',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'sku' => 'required|max:10|unique:items,item_sku',
            'picture' => 'required|max:255',
        ];
        $validator = $this->validate($request, $rules);

        $item = new \App\Models\items();
        $item->item_title = $request->item;
        $item->item_description = $request->description;
        $item->item_price = $request->price;
        $item->item_quantity = $request->quantity;
        $item->item_sku = $request->sku;
        $item->item_picture = $request->picture;
        $item->categories_id = $request->categories_id;
        $item->save();

        Session::flash('success', 'item added successfully!');
        return redirect()->route('items.index');
    }

    public function show($id)
    {
        //show the item that corresponds to the $id
    }

    public function edit($id)
    {
        //show a web form to edit the item with values pre-filled that corresponds to the $id
        $item = \App\Models\categories::find($id);
        return view('categories.edit')->with('item', $item);

    }

    public function update(Request $request, $id)
    {
        //checks the form submission for errors, updates database or show errors
        $rules = [
            'item' => 'required|max:255|unique:items,item_title,'.$id
        ];
        $validator = $this->validate($request, $rules);

        $item = \App\Models\items::find($id);
        $item->item_title = $request->item;
        $item->save();

        Session::flash('success', 'Item has been updated!');
        return redirect()->route('items.index');
    }

    public function destroy($id)
    {
        //delete the entry that corresponds to the $id
        $item = \App\Models\items::find($id);
        if ($item != null) {
            $item->delete();
            Session::flash('success', 'Item has been deleted!');
        } else {
            Session::flash('error', 'Item not found!');
        }
        return redirect()->route('items.index');
    }
}
