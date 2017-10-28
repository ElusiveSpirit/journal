<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $duties->id !!}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Дата:') !!}
    <p>{!! $duties->date !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Старший смены:') !!}
    <p>{!! $duties->user_id !!} {!! $duties->user()->username !!}</p>
</div>

