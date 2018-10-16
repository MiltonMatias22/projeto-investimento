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
            @foreach ($user_list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->Formatted_cpf }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->Formatted_phone }}</td>
                <td>{{ $item->Formatted_barth }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->permission }}</td>
                <td>
                    {!! Form::open(['route' => ['user.destroy',$item->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('remover');!!}
                    {!! Form::close()!!}
                    
                <a href="{{ route('user.edit', $item->id)}}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>