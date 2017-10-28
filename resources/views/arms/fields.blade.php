<!-- Ip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip', 'Ip:') !!}
    {!! Form::text('ip', null, ['class' => 'form-control']) !!}
</div>

<!-- Mask Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mask', 'Mask:') !!}
    {!! Form::text('mask', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('arms.index') !!}" class="btn btn-default">Cancel</a>
</div>
