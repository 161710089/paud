@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title">Ubah Password</h2>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
			<div class="panel panel-default">
				
				<div class="panel-body">
					{!! Form::open(['url' => url('/settings/password'),'method' => 'post', 'class'=>'form-horizontal']) !!}
						
<div class="col-md-6 col-lg-4">
	
						<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
							{!! Form::label('password', 'Password lama') !!}
							{!! Form::password('password', ['class'=>'form-control']) !!}
							{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
						</div>
</div>
<div class="col-md-6 col-lg-4">

						<div class="{{ $errors->has('new_password') ? ' has-error' : '' }}">
							{!! Form::label('new_password', 'Password baru') !!}
							{!! Form::password('new_password', ['class'=>'form-control']) !!}
							{!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
							
						</div>
</div>
<div class="col-md-6 col-lg-4">

						<div class="{{ $errors->has('new_password_confirmation') ? ' has-error': '' }}">
							{!! Form::label('new_password_confirmation', 'Konfirmasi password baru') !!}		
							{!! Form::password('new_password_confirmation', ['class'=>'form-control']) !!}
							{!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
							
						</div>
</div>
<br>
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