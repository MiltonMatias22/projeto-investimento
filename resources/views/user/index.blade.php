@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')

    {!! Form::open(['method' => 'post', 'class' => 'form-pattern']) !!}
        
        @include('templates.form.input', ['label' => 'CPF', 'input' => 'Cpf',   'attributes' => ['placeholder' =>'CPF']])   
        @include('templates.form.input', ['label' => 'Nome', 'input' => 'Nome',  'attributes' => ['placeholder' =>'Nome']])
        @include('templates.form.input', ['label' => 'Phone', 'input' => 'Phone', 'attributes' => ['placeholder' =>'Phone']])
        @include('templates.form.input', ['label' => 'Email', 'input' => 'Email', 'attributes' => ['placeholder' =>'Email']])
        
        @include('templates.form.password', ['label' => 'Password', 'input' => 'password', 'attributes' => ['placeholder' => 'password']])
        @include('templates.form.submit', ['input' => 'Cadastrar'])

    {!! Form::close() !!}

@endsection

@section('script-content')
 
@endsection