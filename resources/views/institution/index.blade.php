@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
{!! Form::open(['route' => 'institution.store', 'method' => 'post', 'class' => 'form-pattern']) !!}

@if(Session::has('success'))
   <h3>{!! Session::get('success')['messages'] !!}</h3>
@endif
   
@include('templates.form.input', ['label' => 'Nome', 'input' => 'name',  'attributes' => ['placeholder' =>'Nome']])
@include('templates.form.submit', ['input' => 'Cadastrar'])

{!! Form::close() !!}
<div class="table-around">
<table class="user-table">
   <thead>
       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Menu</th>
       </tr>
   </thead>
   <tbody>
       @foreach ($institutions as $item)
       <tr>
           <td>{{ $item->id }}</td>
           <td>{{ $item->name }}</td>
           <td>
               {!! Form::open(['route' => ['institution.destroy',$item->id], 'method' => 'DELETE']) !!}
                   {!! Form::submit('remover');!!}
               {!! Form::close()!!}
               
               <a href="{{route('institution.show', $item->id)}}">Details</a>
               <a href="{{route('institution.edit', $item->id)}}">| Edit</a>
               <a href="{{route('institution.product.index', $item->id)}}"> |Product</a>
           </td>
       </tr>
       @endforeach
   </tbody>
</table>
</div>
@endsection

@section('script-content')
 
@endsection