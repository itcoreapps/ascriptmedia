@extends('dashboard.layout.app')

@section('title')
  {{$pageTitle}}
@endsection
@section('content')

@component('dashboard.layout.navbar', ['navbar_title' => $pageTitle])
@endcomponent

<div class="content">
    <div class="container-fluid">
      
      @component('dashboard.shared.edit',['pageTitle' => $pageTitle, 'pageDes' => $pageDes])

      @slot('slot')
      <div class="card-body">
        <form action="{{route('products.update',$row->p_id)}}" method="POST" enctype="multipart/form-data">
            {{ method_field('put')}}
            @include('dashboard.'.$routename.'.form')
            
            <button type="submit" class="btn btn-primary pull-right">{{$pageTitle}}</button>
            <div class="clearfix"></div>
          </form>
        </div>
          
      @endslot

      @slot('md4')
          @php 
          $images = DB::table('images')->where('p_id',$row->p_id)->get();
          @endphp
          
            <div class="container">

             @foreach ($images as $item)
              {{-- @php dd($item->img_id); @endphp --}}
              <img style="margin: 10px" width="330" height="200" src="{{ url('uploads/'.$item->img_path) }}" >
            

            <form action="{{route('dashboard/image'.'.delete',['id' => $item->img_id])}}" method="POST">
              @csrf
              {{ method_field('delete')}}
              <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                  <i class="material-icons">close</i>
              </button>
            </form>
          @endforeach
        </div>
        @endslot
      @endcomponent
    </div>
</div>
@endsection