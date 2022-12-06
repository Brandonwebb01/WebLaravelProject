<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        //display table of all categories

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
            'categories' => 'required|max:255|unique:categories, category_name'
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
        //show the company that corresponds to the $id
    }

    public function edit($id)
    {
        //show a web form to edit the category with values pre-filled that corresponds to the $id
    }

    public function update(Request $request, $id)
    {
        //checks the form submission for errors, updates database or show errors
    }

    public function destroy($id)
    {
        //delete the entry that corresponds to the $id
    }
}
