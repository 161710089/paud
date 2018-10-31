@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="container">

    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Kategori Gallery | Create </title>
    @endforeach


<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tambah Kategori Gallery</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('kategori_gallery.index') }}">Kategori Gallery</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah Kategori Gallery</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br>
			<div class="col-md-12">
						<a class="btn btn-primary" href="{{url()->previous()}}"><i class="mdi mdi-keyboard-backspace"></i></a>
				<div class="panel-body">

			<form action="{{route('kategori_gallery.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
  	<div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="form-group {{$errors->has('kategori') ? 'has-error' : ''}}">
                                <label class="control-label">Nama Kategori </label>
                                <input type="text"  class="form-control" name="kategori">
                                @if ($errors->has('kategori'))
                                    <span class="help-blocks">
                                        <strong>{{$errors->first('kategori')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>      
    
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
@endsection
