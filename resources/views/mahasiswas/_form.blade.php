<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    {!! Form::label('nama', 'Nama', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('nama', null, ['class'=>'form-control']) !!}
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('kode_prodi') ? 'has-error' : '' !!}">
    {!! Form::label('kode_prodi', 'Prodi', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-4">
    {!! Form::select('kode_prodi', [''=>'']+App\Prodi::pluck('prodi','kode_prodi')->all(), null) !!}
    {!! $errors->first('kode_prodi', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
    