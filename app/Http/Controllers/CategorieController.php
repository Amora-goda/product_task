<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{

    public function index()
    {
        $categories = Categorie::all();
        return view('categories.categories',compact('categories')) ;
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>"required|string|min:3|max:255|unique:categories,category_name",
            'description' =>'nullable|string',
        ],[
            'required' => 'This field (:attribute) is required',
            'name.unique' => 'This name is already exists!'
        ]);
        Categorie::create([
            'category_name'=> $request->name,
            'description'=>$request->description,
            'created_by'=>(Auth::user()->name)
        ]);
        session()->flash('Add','The category added succssefully ');
        return redirect('/categories');
    }


    public function show(Categorie $categorie)
    {
        //
    }

    public function edit(Categorie $categorie)
    {
        //
    }
    public function update(Request $request, Categorie $categorie)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|max:255|unique:categories,category_name,'.$id,
            'description' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم القسم',
            'name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',

        ]);

        $categories = Categorie::find($id);
        $categories->update([
            'category_name' => $request->name,
            'description' => $request->description,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/categories');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        Categorie::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/categories');
    }
}
