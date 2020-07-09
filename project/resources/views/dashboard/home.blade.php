@extends('dashboard.layout.app')

@section('title')
    Dashboard    
@endsection

@section('content')

    @component('dashboard.layout.navbar', ['navbar_title' => 'Home Page'])
        @slot('$navbat_title')
            Home Page    
        @endslot 

        
    @endcomponent
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Users</p>
              <h3 class="card-title">{{ \App\Models\User::count() }}

              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i>
                <a href="{{ route('users.index') }}" class="warning-link" style="font-size: 15px">Get All Users...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Categories</p>
              <h3 class="card-title">{{ \App\Models\Category::count() }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i>
                <a href="{{ route('categories.index') }}" style="font-size: 15px">Get All Categories...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Products</p>
              <h3 class="card-title">{{ \App\Models\Product::count() }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> 
                <a href="{{ route('products.index') }}" style="font-size: 15px">Get All Products...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-cart-plus"></i>
              </div>
              <p class="card-category">Orders</p>
              <h3 class="card-title">{{ \App\Models\Order::count() }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> 
                <a href="{{ route('orders.index') }}" style="font-size: 15px">Get All Orders...</a>
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection