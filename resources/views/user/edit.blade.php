@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
    <h2>Edit</h2>
    {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-pattern']) !!}

         @if(Session::has('success'))
            <h3>{!! Session::get('success')['messages'] !!}</h3>
        @endif

        @include('templates.form.input', ['label' => 'CPF', 'input' => 'cpf',   'attributes' => ['placeholder' =>'CPF']])   
        @include('templates.form.input', ['label' => 'Nome', 'input' => 'name',  'attributes' => ['placeholder' =>'Nome']])
        @include('templates.form.input', ['label' => 'Phone', 'input' => 'phone', 'attributes' => ['placeholder' =>'Phone']])
        @include('templates.form.input', ['label' => 'Email', 'input' => 'email', 'attributes' => ['placeholder' =>'Email']])
        <!-- password field update problem -->
        @include('templates.form.password', ['label' => 'Password', 'input' => 'password', 'attributes' => ['placeholder' => 'password']])
        @include('templates.form.submit', ['input' => 'atualizar'])

    {!! Form::close() !!}

@endsection

@section('script-content')
 
@endsection