<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $orders->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $orders->name !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $orders->user()->username !!}</p>
</div>

<!-- Duty Id Field -->
<div class="form-group">
    {!! Form::label('duty_id', 'Ночная смена?') !!}
    <p>{!! $orders->is_night !!}</p>
</div>
