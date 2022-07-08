<?php

namespace App\Http\Controllers;

use App\Http\Requests\ElectronicRequest;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

use App\Models\Models\Electronic;

class ElectronicController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select("SELECT e.*, c.name as category FROM electronics e JOIN category c ON e.category_id = c.id WHERE e.deleted_at IS NULL order by e.name asc");
        
        //return var_dump($items);
        return view('pages.electronics.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $items = DB::select("SELECT e.*, c.name as category FROM electronics e JOIN category c ON e.category_id = c.id WHERE e.stock > 0 AND e.deleted_at IS NULL order by e.name asc");
        
        //return var_dump($items);
        return view('pages.electronics.list')->with([
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
        $categories = DB::select("SELECT * FROM category ORDER BY name ASC");
        return view('pages.electronics.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreElectronicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ElectronicRequest $request)
    {
        $data = $request->all();

        $name = $data['name'];
        $category = $data['category_id'];
        $price = $data['price'];
        $description = $data['description'];
        $stock = $data['stock'];

       $slug = $data['slug'] = str::slug($request->name);
        $filename = "";
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $data['image_name'] = $filename;
            $file-> move(public_path('public/images/electronic'), $filename);
            $data['image']= $filename;
        }



        $insert = DB::insert("INSERT INTO electronics (name, slug, category_id,description,price,stock,image_name,
         created_at, updated_at) 
        VALUES ('$name', '$slug', $category, '$description', 
        $price, $stock, '$filename', NOW(), NOW())");

        return redirect()->route('electronic.index');


    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function show()
        {
            
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electronic  $electronic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::selectOne("SELECT * FROM electronics WHERE id = $id");

        $categories = DB::select("SELECT * FROM category ORDER BY name ASC");

        return view('pages.electronics.edit')->with([
            'item' => $item,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateElectronicRequest  $request
     * @param  \App\Models\Electronic  $electronic
     * @return \Illuminate\Http\Response
     */
    public function update(ElectronicRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = str::slug($request->name);

        $item = DB::selectOne("SELECT * FROM electronics WHERE id = $id"); $item = Electronic::findOrFail($id);

        var_dump($item);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $data['image_name'] = $filename;

            if($item->image_name != $filename) {
                unlink(public_path('public/images/electronic/'.$item->image_name));
            }

            $file-> move(public_path('public/images/electronic'), $filename);
            $data['image']= $filename;
        }

        

        $item->update($data);

        return redirect()->route('electronic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electronic  $electronic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DB::selectOne("SELECT * FROM electronics WHERE id = $id");

        unlink(public_path('public/images/electronic/'.$item->image_name));

        $item->delete();

        return redirect()->route('electronic.index');
    }
}
