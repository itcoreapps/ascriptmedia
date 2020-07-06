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
        
    protected function filter($rows){
        if(request()->has('name') && request()->get('name') != ''){
            $rows = $rows->where('name', request()->get('name'));
        }
        return $rows;
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
