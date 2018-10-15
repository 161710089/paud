@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tambah maps</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('maps.index') }}">maps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah maps</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
					<div class="panel-title pull-right">
			<a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('maps.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
					</div>
					<div class="panel-body">

			<form action="{{route('maps.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
				
			<div class="row md-3">
							<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('garis_bujur') ? 'has-error' : ''}}">
								<label class="control-label">Garis Bujur</label>
								<input type="text"  class="form-control" name="garis_bujur" >
								@if ($errors->has('garis_bujur'))
									<span class="help-blocks">
										<strong>{{$errors->first('garis_bujur')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('garis_lintang') ? 'has-error' : ''}}">
								<label class="control-label">Garis Lintang</label>
								<input type="text"  class="form-control" name="garis_lintang" >
								@if ($errors->has('garis_lintang'))
									<span class="help-blocks">
										<strong>{{$errors->first('garis_lintang')}}</strong>
									</span>
								@endif
							</div>
						</div>				
				</div>

			{{-- <div class="row md-3">
							<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('garis_lintang') ? 'has-error' : ''}}">
								<label class="control-label">Garis Lintang</label>
								<input type="text"  class="form-control" name="garis_lintang" >
								@if ($errors->has('garis_lintang'))
									<span class="help-blocks">
										<strong>{{$errors->first('garis_lintang')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('garis_bujur') ? 'has-error' : ''}}">
								<label class="control-label">Garis Bujur</label>
								<input type="text"  class="form-control" name="garis_bujur" >
								@if ($errors->has('garis_bujur'))
									<span class="help-blocks">
										<strong>{{$errors->first('garis_bujur')}}</strong>
									</span>
								@endif
							</div>
						</div>
				</div>
 --}}
			
					
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	
@endsection
