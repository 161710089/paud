@extends('layouts.admin')
@section('content')

	@foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Sekolah | Create </title>
    @endforeach


   <style type="text/css">
        .container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
  overflow: hidden;
  margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
      </style>

    
<link href="{{ asset('cesese/test.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
{{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
<!------ Include the above in your HEAD tag ---------->

    

                           <script type="text/javascript">
                             $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
                           </script>    


	<div class="row">
		<div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tambah Sekolah</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('sekolah.index') }}">Sekolah</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah Sekolah</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
@if(count($tb_s_sekolah)>=1)
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
					<div class="panel-title pull-right">
			<a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('sekolah.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
					</div>
					<div class="panel-body">

			<form action="{{route('sekolah.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
				<div class="row md-3">
					
  				<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('nama_sekolah') ? 'has-error' : ''}}">
								<label class="control-label">Nama Sekolah </label>
								<input type="text"  class="form-control" name="nama_sekolah" disabled>
								@if ($errors->has('nama_sekolah'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_sekolah')}}</strong>
									</span>
								@endif
							</div>
						</div>

<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('waktu_buka') ? 'has-error' : ''}}">
								<label class="control-label">Waktu Buka  </label>
								<input type="text"  class="form-control" name="waktu_buka" disabled>
								@if ($errors->has('waktu_buka'))
									<span class="help-blocks">
										<strong>{{$errors->first('waktu_buka')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('hari_buka') ? 'has-error' : ''}}">
								<label class="control-label">Hari Buka </label>
								<input type="text"  class="form-control" name="hari_buka" disabled>
								@if ($errors->has('hari_buka'))
									<span class="help-blocks">
										<strong>{{$errors->first('hari_buka')}}</strong>
									</span>
								@endif
							</div>
						</div>
				</div>
			<div class="row md-3">
	
			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
								<label class="control-label">Alamat </label>
								<input type="text"  class="form-control" name="alamat" disabled>
								@if ($errors->has('alamat'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat')}}</strong>
									</span>
								@endif
							</div>
						</div>
						

				   		<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('no_telepon') ? 'has-error' : ''}}">
								<label class="control-label">No Telepon </label>
								<input type="text"  class="form-control" name="no_telepon" disabled>
								@if ($errors->has('no_telepon'))
									<span class="help-blocks">
										<strong>{{$errors->first('no_telepon')}}</strong>
									</span>
								@endif
							</div>
						</div>


<div class="col-md-6 col-lg-4 col-xlg-2">					
  						<div class=" {{ $errors->has('logo') ? ' has-error' : '' }}">
              				<label>logo</label>
              				
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" 
                        value="" class="form-control" name="logo" disabled /> <!-- rename it -->
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
			@if ($errors->has('logo'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('logo') }}</strong>
                           	 </span>
                       	 @endif
            			</div>
        		</div>
		
						
			</div>
			
			
 <ul class="nav nav-tabs" role="tablist">
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Sosmed">Sosmed</a></li> &nbsp; &nbsp;
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Maps">Maps</a></li> 
</ul>

<div class="tab-content">
  <div id="Maps" class="tab-pane fade in ">

  				<div class="panel-body">
					<div class="row md-3">
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('garis_bujur') ? 'has-error' : ''}}">
								<label class="control-label">Garis Bujur</label>
								<input type="text"  class="form-control" name="garis_bujur" disabled >
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
								<input type="text"  class="form-control" name="garis_lintang" disabled >
								@if ($errors->has('garis_lintang'))
									<span class="help-blocks">
										<strong>{{$errors->first('garis_lintang')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>		

  							
			<div class="col-md-6 col-lg-4 col-xlg-2">
					<div class=" {{$errors->has('id_map') ? 'has-error' : ''}}">
								<input type="hidden" class="form-control"  name="id_map" disabled >
								@if ($errors->has('id_map'))
									<span class="help-blocks">
										<strong>{{$errors->first('id_map')}}</strong>
									</span>
								@endif
							</div>
						</div>
	</div>			
				</div>
 <div id="Sosmed" class="tab-pane fade">
 
		<div class="row md-3">
							<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('Instagram') ? 'has-error' : ''}}">
								<label class="control-label">Link Instagram</label>
								<input type="text"  class="form-control" name="Instagram" disabled >
								@if ($errors->has('Instagram'))
									<span class="help-blocks">
										<strong>{{$errors->first('Instagram')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('Twitter') ? 'has-error' : ''}}">
								<label class="control-label">Link Twitter</label>
								<input type="text"  class="form-control" name="Twitter" disabled >
								@if ($errors->has('Twitter'))
									<span class="help-blocks">
										<strong>{{$errors->first('Twitter')}}</strong>
									</span>
								@endif
							</div>
						</div>				
	
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('Facebook') ? 'has-error' : ''}}">
								<label class="control-label">Link Facebook</label>
								<input type="text"  class="form-control" name="Facebook" disabled >
								@if ($errors->has('Facebook'))
									<span class="help-blocks">
										<strong>{{$errors->first('Facebook')}}</strong>
									</span>
								@endif
							</div>
						</div>	
				</div>		

				<div class="row md-3">
							<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('Email') ? 'has-error' : ''}}">
								<label class="control-label">Email</label>
								<input type="text"  class="form-control" name="Email" disabled >
								@if ($errors->has('Email'))
									<span class="help-blocks">
										<strong>{{$errors->first('Email')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('Pinterest') ? 'has-error' : ''}}">
								<label class="control-label">Pinterest</label>
								<input type="text"  class="form-control" name="Pinterest" disabled >
								@if ($errors->has('Pinterest'))
									<span class="help-blocks">
										<strong>{{$errors->first('Pinterest')}}</strong>
									</span>
								@endif
							</div>
						</div>
				</div>
		 <div class="col-md-6 col-lg-4 col-xlg-2">
					<div class=" {{$errors->has('id_sosmed') ? 'has-error' : ''}}">
								<input type="hidden" class="form-control"  name="id_sosmed" disabled >
								@if ($errors->has('id_sosmed'))
									<span class="help-blocks">
										<strong>{{$errors->first('id_sosmed')}}</strong>
									</span>
								@endif
							</div>
						</div>
				</div>
 				 </div>
			
			
					
							<div class="form-group">
								<button type="submit" class="btn btn-primary" disabled>Tambah</button>
							</div>
							</div>
						</form>
					</div>
@else
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
					<div class="panel-title pull-right">
			<a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('sekolah.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
					</div>
					<div class="panel-body">

			<form action="{{route('sekolah.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
				<div class="row md-3">
					
  				<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('nama_sekolah') ? 'has-error' : ''}}">
								<label class="control-label">Nama Sekolah </label>
								<input type="text"  class="form-control" name="nama_sekolah" >
								@if ($errors->has('nama_sekolah'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_sekolah')}}</strong>
									</span>
								@endif
							</div>
						</div>

<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('waktu_buka') ? 'has-error' : ''}}">
								<label class="control-label">Waktu Buka  </label>
								<input type="text"  class="form-control" name="waktu_buka" >
								@if ($errors->has('waktu_buka'))
									<span class="help-blocks">
										<strong>{{$errors->first('waktu_buka')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('hari_buka') ? 'has-error' : ''}}">
								<label class="control-label">Hari Buka </label>
								<input type="text"  class="form-control" name="hari_buka" >
								@if ($errors->has('hari_buka'))
									<span class="help-blocks">
										<strong>{{$errors->first('hari_buka')}}</strong>
									</span>
								@endif
							</div>
						</div>
				</div>
			<div class="row md-3">
	
			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
								<label class="control-label">Alamat </label>
								<input type="text"  class="form-control" name="alamat" >
								@if ($errors->has('alamat'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat')}}</strong>
									</span>
								@endif
							</div>
						</div>
						

				   		<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('no_telepon') ? 'has-error' : ''}}">
								<label class="control-label">No Telepon </label>
								<input type="text"  class="form-control" name="no_telepon" >
								@if ($errors->has('no_telepon'))
									<span class="help-blocks">
										<strong>{{$errors->first('no_telepon')}}</strong>
									</span>
								@endif
							</div>
						</div>


<div class="col-md-6 col-lg-4 col-xlg-2">					
  						<div class=" {{ $errors->has('logo') ? ' has-error' : '' }}">
              				<label  >logo</label>
              				
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" 
                        value="" class="form-control" name="logo"  /> <!-- rename it -->
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
			@if ($errors->has('logo'))
                            	<span class="help-block">
                                	<strong>{{ $errors->first('logo') }}</strong>
                           	 </span>
                       	 @endif
            			</div>
        		</div>
		
						
			</div>
			
			
 <ul class="nav nav-tabs" role="tablist">
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Sosmed">Sosmed</a></li> &nbsp; &nbsp;
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Maps">Maps</a></li> 
</ul>

<div class="tab-content">
  <div id="Maps" class="tab-pane fade in ">

  				<div class="panel-body">
					<div class="row md-3">
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('garis_bujur') ? 'has-error' : ''}}">
								<label class="control-label">Garis Bujur</label>
								<input type="text"  class="form-control" name="garis_bujur"  >
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
								<input type="text"  class="form-control" name="garis_lintang"  >
								@if ($errors->has('garis_lintang'))
									<span class="help-blocks">
										<strong>{{$errors->first('garis_lintang')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>		

  							
			<div class="col-md-6 col-lg-4 col-xlg-2">
					<div class=" {{$errors->has('id_map') ? 'has-error' : ''}}">
								<input type="hidden" class="form-control"  name="id_map"  >
								@if ($errors->has('id_map'))
									<span class="help-blocks">
										<strong>{{$errors->first('id_map')}}</strong>
									</span>
								@endif
							</div>
						</div>
	</div>			
				</div>
 <div id="Sosmed" class="tab-pane fade">
 
		<div class="row md-3">
							<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('Instagram') ? 'has-error' : ''}}">
								<label class="control-label">Instagram</label>
								<input type="text"  class="form-control" name="Instagram"  >
								@if ($errors->has('Instagram'))
									<span class="help-blocks">
										<strong>{{$errors->first('Instagram')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('Twitter') ? 'has-error' : ''}}">
								<label class="control-label">Twitter</label>
								<input type="text"  class="form-control" name="Twitter"  >
								@if ($errors->has('Twitter'))
									<span class="help-blocks">
										<strong>{{$errors->first('Twitter')}}</strong>
									</span>
								@endif
							</div>
						</div>				
	
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('Facebook') ? 'has-error' : ''}}">
								<label class="control-label">Facebook</label>
								<input type="text"  class="form-control" name="Facebook"  >
								@if ($errors->has('Facebook'))
									<span class="help-blocks">
										<strong>{{$errors->first('Facebook')}}</strong>
									</span>
								@endif
							</div>
						</div>	
				</div>		

				<div class="row md-3">
							<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="form-group {{$errors->has('Email') ? 'has-error' : ''}}">
								<label class="control-label">Email</label>
								<input type="Email"  class="form-control" name="Email"  >
								@if ($errors->has('Email'))
									<span class="help-blocks">
										<strong>{{$errors->first('Email')}}</strong>
									</span>
								@endif
							</div>
						</div>
				</div>
		 <div class="col-md-6 col-lg-4 col-xlg-2">
					<div class=" {{$errors->has('id_sosmed') ? 'has-error' : ''}}">
								<input type="hidden" class="form-control"  name="id_sosmed"  >
								@if ($errors->has('id_sosmed'))
									<span class="help-blocks">
										<strong>{{$errors->first('id_sosmed')}}</strong>
									</span>
								@endif
							</div>
						</div>
				</div>
 				 </div>
			
			
					
							<div class="form-group">
								<button type="submit" class="btn btn-primary" >Tambah</button>
							</div>
							</div>
						</form>
					</div>
					@endif

				</div>
			</div>
		</div>
	
@endsection
