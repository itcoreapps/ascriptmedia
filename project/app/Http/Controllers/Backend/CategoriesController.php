<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Requests\Backend\CategoriesController\Store;
use Illuminate\Http\Request;

class CategoriesController extends BackEndController
{
    public function __construct(Category $model){
        parent::__construct($model);
    }

    public function index(){
        // $rows = Category::get();
        $rows = Category::orderBy('c_id','desc')->paginate(5);
        // dd($rows);
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
        $row =  Category::findOrFail($id);
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

    public function store(Store $request){
        // dd($request->all());
        $this->model->create($request->all());

        return redirect('dashboard/categories');

    }

    public function update($id, Store $request){
        $row = Category::findOrFail($id);
    
        $row->update($request->all());
        return redirect('dashboard/categories');
    }

    public function delete($id){
        // dd($id);
        $row = Category::findOrFail($id)->delete();
        return redirect('/dashboard/'.$this->plureModelName());
        
    }
}
