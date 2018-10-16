@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
<h2>{{ $institution->name }}</h2>
{!! Form::model($institution, ['route' => ['institution.update', $institution->id], 'method' => 'put', 'class' => 'form-pattern']) !!}

@if(Session::has('success'))
   <h3>{!! Session::get('success')['messages'] !!}</h3>
@endif
   
@include('templates.form.input', ['label' => 'Nome', 'input' => 'name',  'attributes' => ['placeholder' =>'Nome']])
@include('templates.form.submit', ['input' => 'Atualizar'])

{!! Form::close() !!}

@endsection

@section('script-content')
 
@endsection