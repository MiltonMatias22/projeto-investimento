@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
    
    <h2>{{ $group->name}}</h2>
    <h3>{{ $group->institution->name }}</h3>
    <h3>{{ $group->user->name }}</h3>

    {!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post', 'class' => 'form-pattern']) !!}

         @if(Session::has('success'))
            <h3>{!! Session::get('success')['messages'] !!}</h3>
        @endif

        @include('templates.form.select', ['label' => 'Usuários', 'select' => 'user_id',
            'data' => $user_list, 'attributes' => ['placeholder' =>'Users']])
        @include('templates.form.submit', ['input' => 'Adicionar ao grupo'])

    {!! Form::close() !!}

    @include('user.list', ['user_list' => $group->users])

@endsection

@section('script-content')
 
@endsection