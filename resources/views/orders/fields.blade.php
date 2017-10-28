<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::select('name', ['ЧШ' => 'ЧШ', 'ПД' => 'ПД', 'ОТСГ' => 'ОТСГ', 'НН' => 'НН', 'ОУ' => 'ОУ', 'ОКСБ' => 'ОКСБ', 'ДК' => 'ДК'], null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Рядовой:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<!-- Is Night Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_night', 'Ночная смена?') !!}
    {!! Form::checkbox('is_night', 1, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('duties.orders.index', $duty->id) !!}" class="btn btn-default">Cancel</a>
</div>
