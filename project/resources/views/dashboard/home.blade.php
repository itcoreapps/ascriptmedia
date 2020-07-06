@extends('dashboard.layout.app')

@section('title')
    Dashboard    
@endsection

@section('content')

    @component('dashboard.layout.navbar', ['navbar_title' => 'Home Page'])
        {{-- @slot('$navbat_title')
            Home Page    
        @endslot  --}}

        
    @endcomponent

    <h1>asd</h1>    
@endsection