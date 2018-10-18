@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
{!! Form::open([ 'route' => 'moviment.getback.store', 'method' => 'post', 'class' => 'form-pattern']) !!}

@if(Session::has('success'))
   <h3>{!! Session::get('success')['messages'] !!}</h3>
@endif
@include('templates.form.select', ['label' => 'Grupo', 'select' => 'group_id', 'data' => $group_list])
@include('templates.form.select', ['label' => 'Produto', 'select' => 'product_id', 'data' => $product_list])
@include('templates.form.input', ['label' => 'Valor', 'input' => 'value'])

@include('templates.form.submit', ['input' => 'Cadastrar'])

{!! Form::close() !!}

@endsection

@section('script-content')
 
@endsection