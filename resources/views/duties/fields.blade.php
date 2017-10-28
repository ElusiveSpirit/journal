<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Night Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_night', 'Is Night:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_night', false) !!}
        {!! Form::checkbox('is_night', '1', null) !!} Да
    </label>
</div>

<!-- Is Holiday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_holiday', 'Is Holiday:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_holiday', false) !!}
        {!! Form::checkbox('is_holiday', '1', null) !!} Да
    </label>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('duties.index') !!}" class="btn btn-default">Cancel</a>
</div>
