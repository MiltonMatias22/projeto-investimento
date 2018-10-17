@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
<h2>Minhas Aplicações</h2>

<div class="table-around">
    <table class="user-table">
        <thead>
            <th>Produto</th>
            <th>Instituição</th>
            <th>Investimento</th>
        </thead>
        <tbody>
            @forelse ($product_list as $item)           
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->institution->name }}</td>
                <td>{{ $item->valueFromUser(Auth::user()) }}</td>

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