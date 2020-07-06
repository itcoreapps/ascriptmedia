<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    protected $model;

    protected function getNameFromModel(){   // this function to return name of model small

        // class_basename($this->model)  ==> return Model name ==> [User]
        // strtolower(class_basename($this->model))  ==> return [user]

        return strtolower(class_basename($this->model));
    }

    protected function plureModelName(){  // this function to return name plural

        // str_plural($this->getNameFromModel())  ==> return [users]

        return str_plural($this->getNameFromModel());
    }
    protected function append(){
        return [];
    }
    protected function with(){    
        return [];
    }
    
    public function __construct(Model $model){
        $this->model = $model;
    }

    public function index(){
        $rows = $this->model;
        
        $rows = $rows->orderBy('id','desc')->paginate(5);

        // make this to dynamic page
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

    public function create(){
        $pageTitle = 'CREATE '.strtoupper($this->plureModelName());   
        $pageDes = 'Here you can add '.$this->plureModelName();
        $routename = $this->plureModelName();
        $append = $this->append();

        return view('dashboard.'.$routename.'.create',compact(
            'pageTitle',
            'pageDes',
            'routename'))->with($append);
    }

    public function edit($id){
        $row =  $this->model->findOrFail($id);

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

    public function delete($id){
        $row = $this->model->findOrFail($id)->delete();
        return redirect('/dashboard/'.$this->plureModelName());
        
    }
}
