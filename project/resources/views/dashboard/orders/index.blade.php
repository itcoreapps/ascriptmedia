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
@php 
$pageDec = 'Here Show All Orders';
@endphp
<div class="content">
    <div class="container-fluid">
      
      @component('dashboard.shared.table',['pageTitle' => $pageTitle, 'pageDes' => $pageDec])

        @slot('addButton')
          {{-- <div class="col-md-3 text-center">
            <a href="/dashboard/{{$routename}}/create" class="btn btn-dark btn-round">Add {{$routename}}</a>
          </div> --}}
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
                UserName
              </th>
              <th>
                Total Cost
              </th>
              <th>
                Payment Type
              </th>
              <th>
                Order Date
              </th>
              <th>
                Quantity
              </th>
              <th>
                Control
              </th>
            </thead>
            <tbody>
              @foreach ($rows as $row)
              <tr>
                  {{-- <td>{{$row->id}}</td>
                  <td>{{$row->c_name}}</td>
                  <td class="text-primary" class="td-actions">

                    <!-- To make edit and delete buttoms is shared-->
                      @include('dashboard.shared.buttoms.edit')

                      @include('dashboard.shared.buttoms.delete')
                                       
                  </td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>   
          {{-- {{ $rows->links() }}  --}}
        @endslot
         
      @endcomponent
    </div>
</div>
    
@endsection