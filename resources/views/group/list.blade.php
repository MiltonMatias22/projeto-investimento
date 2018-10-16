<div class="table-around">
    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Grupo</th>
                <th>User</th>
                <th>Instituição</th>
                <th>Menu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($group_list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->institution->name }}</td>
                <td>
                    {!! Form::open(['route' => ['group.destroy',$item->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('remover');!!}
                    {!! Form::close()!!}
                <a href="{{ route('group.show', $item->id ) }}">Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>