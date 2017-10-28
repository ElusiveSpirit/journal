<table class="table table-responsive" id="orders-table">
    <thead>
        <tr>
            <th>Название</th>
        <th>Заступающий</th>
        <th>Ночная смена?</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $orders)
        <tr>
            <td>{!! $orders->name !!}</td>
            <td>{!! $orders->user->username !!}</td>
            <td>{!! $orders->is_night ? 'Да' : 'Нет' !!}</td>
            <td>
                {!! Form::open(['route' => ['duties.orders.destroy', $duty->id, $orders->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('duties.orders.show', [$duty->id, $orders->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('duties.orders.edit', [$duty->id, $orders->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>