<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    
    public function index()
    {
        //display table of all categories
        $categories = \App\Models\categories::all()->sortBy("category_name");
        return view('categories.index')->with('categories', $categories);

    }
   
    public function create()
    {
        //shows form to create new category
        return view('categories.create');
    }
 
    public function store(Request $request)
    {
        //checks the form submission for errors, insert into database or show errors
        $rules = [
            'category' => 'required|max:255|unique:categories,category_name'
        ];
        $validator = $this->validate($request, $rules);

        $category = new \App\Models\categories();
        $category->category_name = $request->category;
        $category->save();

        Session::flash('success', 'Category added successfully!');
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //show the category that corresponds to the $id
    }

    public function edit($id)
    {
        //show a web form to edit the category with values pre-filled that corresponds to the $id
        $category = \App\Models\categories::find($id);
        return view('categories.edit')->with('category', $category);

    }

    public function update(Request $request, $id)
    {
        //checks the form submission for errors, updates database or show errors
        $rules = [
            'category' => 'required|max:255|unique:categories,category_name,'.$id
        ];
        $validator = $this->validate($request, $rules);

        $category = \App\Models\categories::find($id);
        $category->category_name = $request->category;
        $category->save();

        Session::flash('success', 'Category has been updated!');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        //delete the entry that corresponds to the $id
        $category = \App\Models\categories::find($id);
        if ($category != null) {
            $category->delete();
            Session::flash('success', 'Category has been deleted!');
        } else {
            Session::flash('error', 'Category not found!');
        }
        return redirect()->route('categories.index');
    }
}
