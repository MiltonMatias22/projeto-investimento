@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
<h2>{{$institution->name}}</h2>
{!! Form::open(['route' => ['institution.product.store', $institution->id], 'method' => 'post', 'class' => 'form-pattern']) !!}

@if(Session::has('success'))
   <h3>{!! Session::get('success')['messages'] !!}</h3>
@endif
   
@include('templates.form.input', ['label' => 'Nome', 'input' => 'name'])
@include('templates.form.input', ['label' => 'Descrição', 'input' => 'description'])
@include('templates.form.input', ['label' => 'Indexer', 'input' => 'indexer'])
@include('templates.form.input', ['label' => 'Interest Rate', 'input' => 'interest_rate'])

@include('templates.form.submit', ['input' => 'Cadastrar'])

{!! Form::close() !!}
<div class="table-around">
    <table class="user-table">
        <thead>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Indexer</th>
            <th>Interest Rate</th>
            <th>Institutição</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @forelse ($institution->products as $item)
                
            
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->indexer }}</td>
                <td>{{ $item->interest_rate }}</td>
                <td>
                    {!! Form::open(['route' => ['institution.product.destroy', $institution->id, $item->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('remover');!!}
                    {!! Form::close()!!}
                    
                </td>
            </tr>
            @empty
            <tr>
                <td>Sem registros cadastrados!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@section('script-content')
 
@endsection