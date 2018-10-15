@extends('layouts.admin')
@section('content')

	<div class="row">
		<div class="container">
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Edit Mata Pelajaran</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('mata_pelajaran.index') }}">Mata Pelajaran</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Mata Pelajaran</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<br>
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
					<div class="panel-title pull-right">
						<a class="btn btn-primary" href="{{url()->previous()}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
					</div>
				<div class="panel-body">
			<form action="{{ route('mata_pelajaran.update',$tb_m_mata_pelajaran->id) }}" method="post" enctype="multipart/form-data" >
			  		<input name="_method" type="hidden" value="PATCH">
			  		{{ csrf_field() }}

			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('nama_mata_pelajaran') ? 'has-error' : ''}}">
								<label class="control-label">Nama Mapel</label>
								<input type="text" value="{{ $tb_m_mata_pelajaran->nama_mata_pelajaran }}" class="form-control" name="nama_mata_pelajaran" required>
								@if ($errors->has('nama_mata_pelajaran'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_mata_pelajaran')}}</strong>
									</span>
								@endif
							</div>
						</div>

			
				<div class="form-group">
								<button type="submit" class="btn btn-primary">Edit</button>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	
@endsection
