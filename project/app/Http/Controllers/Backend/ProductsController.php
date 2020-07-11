<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductsController\Store;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends BackEndController
{
    public function __construct(Product $model){
        parent::__construct($model);
    }

    protected function with(){
        // return['cat','image'];
        return['cat'];
    }

    protected function append(){

        
        $array = [
            'cats' => Category::get(),   // relation 1 to m
            'imags' => Image::get(),
        ];

        return $array;
    }
    
    public function index(){
        // $rows = Category::get();
        $rows = Product::orderBy('p_id','desc')->paginate(5);

        $pageTitle = strtoupper($this->getNameFromModel()).' CONTROLLER';   
        $pageDes = 'Here you can add / edit / delete '.$this->getNameFromModel();
        $routename = $this->plureModelName();
        // dd($this->getNameFromModel()); 
        return view('dashboard.'.$this->plureModelName().'.index', compact(
            'rows',
            'pageTitle',
            'pageDes',
            'routename'
        ));
    }

    public function edit($id){
        $row =  Product::findOrFail($id);
        // dd($row);

        $pageTitle = 'EDITE '.strtoupper($this->plureModelName());   
        $pageDes = "Here you can edit ".$this->plureModelName(); 
        $routename = $this->plureModelName();
        $append = $this->append();

        return view('dashboard.'.$routename.'.edit', compact(
            'row',
            'pageTitle',
            'pageDes',
            'routename'))->with($append);
    }

    public function store(Request $request){

        // dd($request->img_path);
        $item = Product::create($request->all());
        // dd($item->p_id);

        // dd($request->all());
        // $row = Product::create($request->all());


        $images = array();
        if($files = $request->file('img_path')){
            foreach($files as $image){
                $name =time().str_random(10).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $name);
                $images[] = $name;

                Image::create([
                    'p_id' => $item->p_id,
                    'img_path' => $name
                ]);
            }
        }
        
    
        return redirect('dashboard/products');

    }

    public function update($id, Store $request){
        // dd($request->all());
        $requestArray = $request->all();

        // $images = array();
        $pro_id = $id;

        if($request->hasFile('img_path')){
            $files = $request->file('img_path');
            foreach($files as $image){
                $name =time().str_random(10).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $name);
                $images[] = $name;

               Image::create([
                    'p_id' => $pro_id,
                    'img_path' => $name
                ]);
            }
        }      
        $row = $this->model->findOrFail($id);
        
        $row->update($requestArray);
        return redirect('dashboard/products');
    }

    public function delete($id){

        // $images = Product::findOrFail($id)->image;
        // foreach($images as $image){
        //     dd($image->img_id);
        // }
        // dd( Product::findOrFail($id)->image);
        $product = Product::findOrFail($id)->images()->delete();
        $delete = Product::findOrFail($id)->delete();
        // $image = Image::findOrFail($id)->delete();
        return redirect('/dashboard/'.$this->plureModelName());
        
    }
    public function deleteImage($id){

        // $img_id = $request->id;
        $row = Image::findOrFail($id)->delete();
    //  dd(Image::findOrFail($img_id)->delete());
        return redirect('/dashboard/products');
        // $images = DB::table('images')->where('p_id',$request->id)->get();

        // // $row = $this->model->findOrFail($id)->delete();
        // // return redirect('/dashboard/'.$this->plureModelName());

        // dd($request->id);
    }
}
