<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<div class="form-group">
    {!! Form::label('username', 'ФИО:') !!}
    <p>{!! $user->username !!}</p>
</div>

<div class="form-group">
    {!! Form::label('rank', 'Звание:') !!}
    <p>{!! $user->rank !!}</p>
</div>
