@extends('dashboard.layout.app')

{{-- @php
   $pageTitle = 'Users Controller';   
   $pageDes = "Here you can add / edit / delete users"; 
@endphp --}}

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
                Control
              </th>
            </thead>
            <tbody>
              @foreach ($rows as $row)
              <tr>
                  <td>{{$row->c_id}}</td>
                  <td>{{$row->c_name}}</td>
                  <td class="text-primary" class="td-actions">

                    <!-- To make edit and delete buttoms is shared-->
                    <a href="{{'/dashboard/'.$routename.'/'.$row->c_id.'/edit'}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit">
                      <i class="material-icons">edit</i>
                  </a>

                      <form action="{{route('dashboard/'.$routename.'.delete',['id' => $row->c_id])}}" method="POST">
                        @csrf
                        {{ method_field('delete')}}
                        <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                            <i class="material-icons">close</i>
                        </button>
                    </form>
                                       
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