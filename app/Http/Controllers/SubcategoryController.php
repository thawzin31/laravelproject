<?php

namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$subcategories=Category::all()->subcategories();
        $subcategories=Subcategory::all();
        $categories=Category::all();
        return view('subcategory.index',compact('subcategories','categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        //validation
         $request->validate([
            "name"=>"required",
            "category_id"=>"sometimes|nullable|numeric",
            
            

        ]);

        $subcategory=new Subcategory;
        $subcategory->name=$request->name;
        $subcategory->category_id=$request->catagoryid;

        $subcategory->save();

         //redirect
        return redirect()->route('subcategory.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {   
        
        return view('subcategory.show',compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
         $categories=Category::all();
        return view('subcategory.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //dd($request);

        //validation
         $request->validate([
            "name"=>"required",
            "category_id"=>"sometimes|nullable|numeric",
            
            

        ]);

        //$subcategory=new Subcategory;
        $subcategory->name=$request->name;
        $subcategory->category_id=$request->catagoryid;

        $subcategory->save();

         //redirect
        return redirect()->route('subcategory.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategory.index');
    }
}
