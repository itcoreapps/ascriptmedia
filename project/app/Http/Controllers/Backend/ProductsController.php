<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductsController\Store;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends BackEndController
{
    public function __construct(Product $model){
        parent::__construct($model);
    }

    protected function with(){
        return['cat'];
    }

    protected function append(){

        
        $array = [
            'cats' => Category::get(),   // relation 1 to m
            'imags' => Image::get(),
        ];

        return $array;
    }
    protected function syncImage($row, $requestArray){

        if(isset($requestArray['img_path']) && !empty($requestArray['img_path'])){ // to save skills with new row
            $row->image()->sync($requestArray['img_path']);
        }

    }
  
    public function store(Store $request){

        // dd($request->all());
        $input = $request->all();
        $image = array();

        if($files = $request->File('img_path')){

            foreach($files as $image){
                $fileName = time().str_random(10).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $fileName);
                $image[] = $fileName;

            }
        }
        $this->model->create($request->all());
        $requestArray = [
            // 'user_id' => auth()->user()->id,    //this relation for user -> video
            // 'image' => $fileName
            Image::create([
                'img_path' => implode("|",$image),
                'p_id' => $request->id
            ])
        ] + $request->all(); 
        
        // dd(Image::all());
        
        // dd($request->all());
        
        // $this->syncImage($row, $request->all());
        return redirect('dashboard/products');

    }

    public function update($id, Store $request){
        $row = $this->model->findOrFail($id);
    
        $row->update($request->all());
        return redirect('dashboard/products');
    }
}
