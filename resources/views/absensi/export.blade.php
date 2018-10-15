@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
	 <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/home') }}">Home</a> </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/admin/books') }}">Buku</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Export</li>
           
     </ol>
      
			<div class="panel panel-default">
		<div class="panel-heading">
		<h2 class="panel-title">Export Buku</h2>
		</div>
		<div class="panel-body">
	{!! Form::open(['url' => route('export.books.post'),
'method' => 'post', 
'class'=>'form-horizontal']) !!}
		<div class="form-group 
	{!! $errors->has('id_siswa') ? 'has-error' : '' !!}">
	{!! Form::label('id_siswa', 
	'Penulis', [
	'class'=>'col-md-2 control-label']) !!}
			<div class="col-md-4">
	{!! Form::select('id_siswa[]', [''=>'']+App\tb_m_siswa::pluck('nama_lengkap','id')->all(),\
null, [
'class'=>'js-selectize',
'multiple',
'placeholder' => 'Pilih Penulis']) !!}
	{!! $errors->first('id_siswa', '<p class="help-block">:message</p>') !!}
			</div>	
		</div>
<div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}">
{!! Form::label('type', 'Pilih Output', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4 checkbox">
{{ Form::radio('type', 'xls', true) }} Excel &nbsp; &nbsp;&nbsp;
{{ Form::radio('type', 'pdf') }} PDF
{!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
</div>


	<div class="form-group">
		<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Download', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>
{!! Form::close() !!}
		</div>
			</div>
		</div>
	</div>
</div>
@endsection