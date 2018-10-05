@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
    
    {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-pattern']) !!}

         @if(Session::has('success'))
            <h3>{!! Session::get('success')['messages'] !!}</h3>
        @endif

        @include('templates.form.input', ['label' => 'CPF', 'input' => 'cpf',   'attributes' => ['placeholder' =>'CPF']])   
        @include('templates.form.input', ['label' => 'Nome', 'input' => 'name',  'attributes' => ['placeholder' =>'Nome']])
        @include('templates.form.input', ['label' => 'Phone', 'input' => 'phone', 'attributes' => ['placeholder' =>'Phone']])
        @include('templates.form.input', ['label' => 'Email', 'input' => 'email', 'attributes' => ['placeholder' =>'Email']])
        
        @include('templates.form.password', ['label' => 'Password', 'input' => 'password', 'attributes' => ['placeholder' => 'password']])
        @include('templates.form.submit', ['input' => 'Cadastrar'])

    {!! Form::close() !!}
    <div class="table-around">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Barth</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Permission</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->barth }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->permission }}</td>
                    <td>
                        {!! Form::open(['route' => ['user.destroy',$item->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('remover');!!}
                        {!! Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script-content')
 
@endsection