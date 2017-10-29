<div class="form-group col-sm-6">
    {!! Form::label('username', 'ФИО:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password', 'Пароль:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('rank', 'Звание:') !!}
    {!! Form::text('rank', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('role', 'Группа:') !!}
    {!! Form::select('role', $roles, isset($user) ? $user->getRoleNames() : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('arm_id', '№ АРМ:') !!}
    {!! Form::select('arm_id', $arms, isset($user) ? $user->arm : null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Назад</a>
</div>
