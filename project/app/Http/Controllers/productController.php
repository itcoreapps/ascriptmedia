<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\image;
use App\Models\Category;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
       $pro=Product::with('cat','images')->get();
       $categories =Category::get();
        return view('index')->with('prod',$pro)->with('categories',$categories);
         //dd($categories);
      
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro=Product::with('cat','images')->find($id);
        
       //$pro=Image::with('product')->find($id);
        return view('product')->with('product',$pro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    ////////////// show Products of specific category /////////////
    public function productsCat($id)
    {
   
        $objects=array();
       
         $category=Category::with('products')->find($id);
         foreach($category->products as $cat)
         {
             $pro=Image::with('product')->find($cat->p_id);
             $objects[]=$pro;
         }
        
          
         $products= (object)$objects;
       
           return view('productsPage')->with('products',$products)->with('category',$category);
      
       
    }
///////////// show All Products without all checkbox of categories notChecked //////
    public function productsCatDel()
    {
        $pro=Product::with('cat','images')->get();
        
         return view('productsPage2')->with('prod',$pro)->with('categories',Category::get());
    }
}
