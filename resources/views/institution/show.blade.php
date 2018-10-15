@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
<header>
    <h2>{{ $institution->name }}</h2>
</header>

@include('group.list', ['group_list' => $institution->groups])

@endsection

@section('script-content')
 
@endsection