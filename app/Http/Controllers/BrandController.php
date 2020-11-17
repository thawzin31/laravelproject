<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $brands = Brand::all();
        return view('brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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

        //validation//use validation rule-required
        $request->validate([
            "name"=>"required|min:5",
            "photo"=>"required|mimes:jepg,bmp,png",//a.jpg
        ]);

        //if include file,upload
        if ($request->file()) {
            //2334455666_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            //brandimg/2334455666_a.jpg
            $filePath=$request->file('photo')->storeAs('brandimg',$fileName,'public');

            //public/stroage/brandimg
            $path='/storage/'.$filePath;
        }
        ////if data put into created form automatically created brandimg folder
        //// for file,storage\app\public\brandimg -> public\stroage(readonly)
        ////cmd=>php artisan storage:link

        //store to brandimg folder
        $brand=new Brand;
        $brand->name=$request->name;
        $brand->photo=$path;
        $brand->save();

        ////$brand->name=table col name
        ////$brand->photo=table col photo
        ////$request->name=input tag name attribute


         //redirect
        return redirect()->route('brand.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand=Brand::find($id);
        return view('brand.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $brand=Brand::find($id);
        return view('brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);

        //validation//use validation rule-required
        $request->validate([
            "name"=>"required|min:5",
            "photo"=>"sometimes|required|mimes:jepg,bmp,png",//a.jpg
            "oldphoto"=>"required",
        ]);

        //if include file,upload
        if ($request->file()) {
            //2334455666_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            //brandimg/2334455666_a.jpg
            $filePath=$request->file('photo')->storeAs('brandimg',$fileName,'public');

            //public/stroage/brandimg
            $path='/storage/'.$filePath;
        }else{
            $path=$request->oldphoto;
        }

        //store to brandimg folder
        $brand= Brand::find($id);
        $brand->name=$request->name;
        $brand->photo=$path;
        $brand->save();

         //redirect
        return redirect()->route('brand.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.index');

    }
}
