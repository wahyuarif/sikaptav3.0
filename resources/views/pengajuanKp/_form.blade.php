
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'No Pengajuan', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class'=>'form-control', 'disabled']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('judul_pengajuan') ? ' has-error' : '' }}">
    {!! Form::label('judul_pengajuan', 'Judul', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('judul_pengajuan', null, ['class'=>'form-control']) !!}
        {!! $errors->first('judul_pengajuan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('kerangka_pikir') ? ' has-error' : '' }}">
    {!! Form::label('kerangka_pikir', 'Kerangka Pikir', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('kerangka_pikir', null, ['class'=>'form-control']) !!}
        {!! $errors->first('kerangka_pikir', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('nm_instansi') ? ' has-error' : '' }}">
    {!! Form::label('nm_instansi', 'Nama Instansi', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nm_instansi', null, ['class'=>'form-control']) !!}
        {!! $errors->first('nm_instansi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('telphone') ? ' has-error' : '' }}">
    {!! Form::label('telphone', 'No Telp.', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('telphone', null, ['class'=>'form-control']) !!}
        {!! $errors->first('telphone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
    {!! Form::label('lokasi', 'Lokasi', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('lokasi', null, ['class'=>'form-control']) !!}
        {!! $errors->first('lokasi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('jumlah_pegawai') ? ' has-error' : '' }}">
    {!! Form::label('jumlah_pegawai', 'Jumlah Pegawai', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('jumlah_pegawai', null, ['class'=>'form-control']) !!}
        {!! $errors->first('jumlah_pegawai', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('desc_pekerjaan') ? ' has-error' : '' }}">
    {!! Form::label('desc_pekerjaan', 'Deskripsi Pekerjaan', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('desc_pekerjaan', null, ['class'=>'form-control']) !!}
        {!! $errors->first('desc_pekerjaan', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-paper-plane-o"></i> Ajukan
        </button>
    </div>
</div>
