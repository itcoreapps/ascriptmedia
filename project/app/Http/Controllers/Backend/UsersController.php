<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UsersController\Store;
use App\Http\Requests\Backend\UsersController\Update;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends BackEndController
{
    public function __construct(User $model){
        parent::__construct($model);
    }
        
    public function index(){
        // $rows = Category::get();
        $rows = User::orderBy('id','desc')->paginate(5);

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

    public function store(Store $request){
        $requestArray = $request->all();
        $requestArray['password'] = Hash::make($requestArray['password']);
        $this->model->create($requestArray);

        return redirect('dashboard/users');

    }

    public function update($id, Update $request){
        $row = $this->model->findOrFail($id);
        $requestArray = $request->all();
        
        if(isset( $requestArray['password'] ) && $requestArray['password'] != ''){
            $requestArray['password'] = Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }

        // dd($requestArray);
        $row->update($requestArray);
        return redirect('dashboard/users');
    }
}
