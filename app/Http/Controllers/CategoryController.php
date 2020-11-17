<?php

namespace App\Http\Controllers;

use App\Category;//Category.php
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
        //compact is to show data in category list form
        //compact(categories)=>categories is variable name
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //$request carry  data from category form
        //dd($request);

        //validation==required

        $request->validate([
            "name"=>"required|min:5",
            "photo"=>"required",
        ]);

        //if include file
        if ($request->file()) {
            //2334455666_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            //file upload
            //brandimg/2334455666_a.jpg
            $filePath=$request->file('photo')->storeAs('categoryimg',$fileName,'public');

            //public/stroage/brandimg
            $path='/storage/'.$filePath;
        }

        //store to brandimg folder
        $category=new Category;
        $category->name=$request->name;
        $category->photo=$path;
        $category->save();

         //redirect
        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
        return view('category.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name"=>"required|min:5",
            "photo"=>"sometimes|required|mimes:jepg,bmp,png",//a.jpg
            "oldphoto"=>"required",
        ]);

        if ($request->file()) {
            //2334455666_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            //brandimg/2334455666_a.jpg
            $filePath=$request->file('photo')->storeAs('categoryimg',$fileName,'public');

            //public/stroage/brandimg
            $path='/storage/'.$filePath;
        }else{
            $path=$request->oldphoto;
        }

        //store to brandimg folder
        //$category= Category::find($id);
        $category->name=$request->name;
        $category->photo=$path;
        $category->save();

         //redirect
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        
        $category->delete();
        return redirect()->route('category.index');
    }
}
