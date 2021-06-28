@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li><a href="{{ url('/admin/mahasiswa') }}">Mahasiswa</a></li>
                    <li class="active">Ubah Mahasiswa</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Ubah Mahasiswa</h2>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($mahasiswa, ['url' => route('admin.mahasiswa.update', $mahasiswa->id),
                        'method'=>'put', 'class'=>'form-horizontal']) !!}
                        @include('mahasiswas._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection