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

    public function store(Store $request){
        dd($request->all());
        $this->model->create($request->all());

        return redirect('dashboard/categories');

    }

    public function update($id, Store $request){
        $row = $this->model->findOrFail($id);
    
        $row->update($request->all());
        return redirect('dashboard/categories');
    }
}
