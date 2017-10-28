<table class="table table-responsive" id="arms-table">
    <thead>
        <tr>
            <th>Ip</th>
        <th>Mask</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($arms as $arms)
        <tr>
            <td>{!! $arms->ip !!}</td>
            <td>{!! $arms->mask !!}</td>
            <td>
                {!! Form::open(['route' => ['arms.destroy', $arms->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('arms.show', [$arms->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('arms.edit', [$arms->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>