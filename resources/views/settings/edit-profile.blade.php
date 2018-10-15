@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title">Ubah Profile</h2>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ubah Profil</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
			<div class="panel panel-default">
				
				<div class="panel-body">
					<div class="col-md-6 col-lg-4">
						
					{!! Form::model(auth()->user(), ['url' => url('/settings/profile'),
					'method' => 'post', 'class'=>'form-horizontal']) !!}
						<div class="{{ $errors->has('name') ? ' has-error' : '' }}">
							{!! Form::label('name', 'Nama') !!}
							{!! Form::text('name', null, ['class'=>'form-control']) !!}
							{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
						</div>
					</div>
					<div>
					<div class="col-md-6 col-lg-4">
						
					<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
						{!! Form::label('email', 'Email') !!}
						{!! Form::email('email', null, ['class'=>'form-control']) !!}
						{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
					</div>
					</div><br>
					<div class="">
						<div class="col-md-6 col-md-offset-4">
						{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection