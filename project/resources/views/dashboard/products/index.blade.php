@extends('dashboard.layout.app')
@section('title')
  {{$pageTitle}}
@endsection
@section('content')

@component('dashboard.layout.navbar', ['navbar_title' => $pageTitle])
@endcomponent

<div class="content">
    <div class="container-fluid">
      
      @component('dashboard.shared.table',['pageTitle' => $pageTitle, 'pageDes' => $pageDes])

        @slot('addButton')
          <div class="col-md-3 text-center">
            <a href="/dashboard/{{$routename}}/create" class="btn btn-dark btn-round">Add {{$routename}}</a>
          </div>
        @endslot 
        
        @slot('table')
          <table class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Name
              </th>
              <th>
                Price EGY
              </th>
              <th>
                Price Dollar
              </th>
              <th>
                Price Bitcoins
              </th>
              <th>
                Video
              </th>
              <th>
                Sales
              </th>
              <th>
                Description
              </th>
              <th>
                Images
              </th>
              <th>
                Category
              </th>
              <th>
                Control
              </th>
            </thead>
            <tbody>
              @foreach ($rows as $row)

              
              @php 
              $images = DB::table('images')->where('p_id',$row->id)->get();
              @endphp
              <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->p_name}}</td>
                  <td>{{$row->p_price_egp}}</td>
                  <td>{{$row->p_price_dollar}}</td>
                  <td>{{$row->p_price_bitcoins}}</td>
                  <td><a href="{{$row->p_video}}" target="_blank">{{$row->p_video}}</td>
                  <td>{{$row->num_of_sales}}</td>
                  <td>{{$row->p_description}}</td>
                  <td>
                  @foreach($images as $image)
                  
                  {{-- @php dd($images) ; @endphp --}}
                    <img height="150px" width="150px" style="padding:4px" src="{{ url('uploads/'.$image->img_path) }}" alt=""><br>

                  @endforeach
                  
                  </td>
                  <td class="text-primary">{{$row->cat->c_name}}</td>

                  <td class="text-primary" class="td-actions">

                    <!-- To make edit and delete buttoms is shared-->
                      @include('dashboard.shared.buttoms.edit')
                      @include('dashboard.shared.buttoms.delete')
                                       
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>   
          {{ $rows->links() }} 
        @endslot
         
      @endcomponent
    </div>
</div>
    
@endsection