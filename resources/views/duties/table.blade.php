<table class="table table-responsive" id="duties-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Date</th>
        <th>Is Night</th>
        <th>Is Holiday</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($duties as $duties)
        <tr>
            <td>{!! $duties->name !!}</td>
            <td>{!! $duties->date !!}</td>
            <td>{!! $duties->is_night !!}</td>
            <td>{!! $duties->is_holiday !!}</td>
            <td>{!! $duties->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['duties.destroy', $duties->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('duties.show', [$duties->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('duties.edit', [$duties->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>