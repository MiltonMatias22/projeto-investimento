@extends('templates.master')

@section('css-content')
    
@endsection

@section('content-view')
<h2>Extrato</h2>

<div class="table-around">
    <table class="user-table">
        <thead>
            <th>Data</th>
            <th>Tipo</th>
            <th>Produto</th>
            <th>Groupo</th>
            <th>Valor</th>
            <th></th>
        </thead>
        <tbody>
            @forelse ($moviment_list as $item)           
            <tr>
                <td>{{ $item->created_at->format('d/m/y H:s' ) }}</td>
                <td>{{ $item->type == 1 ? "aplicação" : "Resgate" }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->group->name }}</td>
                <td>{{ $item->value }}</td>
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