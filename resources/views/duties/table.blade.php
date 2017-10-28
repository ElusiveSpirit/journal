<table class="table table-responsive" id="duties-table">
    <thead>
        <tr>
        <th>Дата</th>
        <th>Старший смены</th>
            <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($duties as $duties)
        <tr>
            <td>{!! $duties->date !!}</td>
            <td>{!! $duties->user()->username !!}</td>
            <td>
                {!! Form::open(['route' => ['duties.destroy', $duties->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('duties.show', [$duties->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('duties.edit', [$duties->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    <a href="{!! route('duties.orders.index', [$duties->id]) !!}" class='btn btn-default'>Наряды</a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>