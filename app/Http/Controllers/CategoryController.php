<?php

namespace App\Http\Controllers;

use App\Models\Models\Category;

use App\Http\Requests\CategoryRequest;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select("SELECT * FROM category WHERE deleted_at IS NULL order by name asc");
        return view('pages.category.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $name = $data['name'];
        $insert = DB::insert("INSERT INTO category (name, created_at, updated_at) 
            VALUES ('$name' , NOW(), NOW())");

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::select("SELECT * FROM category WHERE id = '".$id."'");

        return view('pages.category.edit')->with([
            'item' => $item[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $name = $data['name'];

        $item = DB::update("UPDATE category SET name = '".$name."' WHERE id = ".$id."");

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DB::delete("DELETE FROM category WHERE id = ".$id."");

        return redirect()->route('category.index');
    }
}
