<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $products = Product::orderBy("id","desc")->paginate(10);
         return view("products.list", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'name'=> 'required',
            'price'=> 'required',
            'quantity'=> 'required',
        ]);
            if($validator->passes()){

            Product::create([
            'name'=> $request->name,
            'quantity'=> $request->quantity,
            'price'=> $request->price
         ]);
            return redirect()->route('products.index')->with('success','Product Created Succesfully!');

        }
            else{
                return redirect()->route('products.create')->withInput()->withErrors($validator);
         }



    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
