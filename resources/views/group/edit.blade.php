@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
    <h2>Edit</h2>
    {!! Form::model($group, ['route' => ['group.update', $group->id], 'method' => 'put', 'class' => 'form-pattern']) !!}

         @if(Session::has('success'))
            <h3>{!! Session::get('success')['messages'] !!}</h3>
        @endif

        @include('templates.form.input', ['label' => 'Nome', 'input' => 'name',  'attributes' => ['placeholder' =>'Nome do gropo']])
        @include('templates.form.select', ['label' => 'Dono do grupo', 'select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' =>'Dono do grupo']])
        @include('templates.form.select', ['label' => 'Instituição', 'select' => 'institution_id', 'data' => $institution_list, 'attributes' => ['placeholder' =>'Instituição']])
        @include('templates.form.submit', ['input' => 'Atualizar'])

    {!! Form::close() !!}

@endsection

@section('script-content')
 
@endsection