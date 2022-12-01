<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        $products = Product::all();
        return view('products.products', compact('categories','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->hasFile('Product_image');
        if($file){
            $newFile = $request->file('Product_image');
            $file_path = $newFile->store('images');
         
        }
        //dd($request);
        Product::create([
            'product_name' => $request->Product_name,
            'image' => $file_path,
            'price' => $request->Product_price,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
              //dd($request);
        $id = Categorie::where('category_name', $request->category_name)->first()->id;

        $Products = Product::findOrFail($request->pro_id);

        $Products->update([
        'product_name' => $request->Product_name,
        'image' => $request->Product_image,
        'price' => $request->Product_price,
        'description' => $request->description,
        'category_id' => $id,
        ]);

        session()->flash('Edit', 'تم تعديل المنتج بنجاح');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $Products = Product::findOrFail($request->pro_id);
         $Products->delete();
         session()->flash('delete', 'تم حذف المنتج بنجاح');
         return back();
}
}
