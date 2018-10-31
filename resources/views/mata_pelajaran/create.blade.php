@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="container">

	@foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Mata Pelajaran | Create </title>
    @endforeach


<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tambah Mata Pelajaran</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('mata_pelajaran.index') }}">Mata Pelajaran</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah Mata Pelajaran</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br>
			<div class="col-md-12">
				<div class="panel panel-primary">
						<a class="btn btn-primary" href="{{url()->previous()}}"><i class="mdi mdi-keyboard-backspace"></i></a>
				<div class="panel-body">

			<form action="{{route('mata_pelajaran.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('nama_mata_pelajaran') ? 'has-error' : ''}}">
								<label class="control-label">Nama Mapel </label>
								<input type="text"  class="form-control" name="nama_mata_pelajaran">
								@if ($errors->has('nama_mata_pelajaran'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_mata_pelajaran')}}</strong>
									</span>
								@endif
							</div>
						</div>		
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
