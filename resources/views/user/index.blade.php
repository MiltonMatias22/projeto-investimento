@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
    
    {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-pattern']) !!}

         @if(Session::has('success'))
            <h3>{!! Session::get('success')['messages'] !!}</h3>
            @else
            <h3>Falha ao cadastrar usuário</h3>
        @endif
        
        @include('templates.form.input', ['label' => 'CPF', 'input' => 'cpf',   'attributes' => ['placeholder' =>'CPF']])   
        @include('templates.form.input', ['label' => 'Nome', 'input' => 'name',  'attributes' => ['placeholder' =>'Nome']])
        @include('templates.form.input', ['label' => 'Phone', 'input' => 'phone', 'attributes' => ['placeholder' =>'Phone']])
        @include('templates.form.input', ['label' => 'Email', 'input' => 'email', 'attributes' => ['placeholder' =>'Email']])
        
        @include('templates.form.password', ['label' => 'Password', 'input' => 'password', 'attributes' => ['placeholder' => 'password']])
        @include('templates.form.submit', ['input' => 'Cadastrar'])

    {!! Form::close() !!}

@endsection

@section('script-content')
 
@endsection