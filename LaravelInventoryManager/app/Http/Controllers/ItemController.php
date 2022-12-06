<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        //display table of all categories

    }
   
    public function create()
    {
        //shows form to create new item
    }
 
    public function store(Request $request)
    {
        //checks the form submission for errors, insert into database or show errors
    }

    public function show($id)
    {
        //show the company that corresponds to the $id
    }

    public function edit($id)
    {
        //show a web form to edit the item with values pre-filled that corresponds to the $id
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
