@extends('layouts.admin')
@section('content')

<link href="{{ asset('cesese/test.css') }}" rel="stylesheet" id="bootstrap-css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	@foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Siswa | Create </title>
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
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    

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
            $(".image-preview-input-title").text("Ganti");
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
                    	<h4 class="page-title">Form Tambah Siswa</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('siswa.index') }}">Siswa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Siswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

			<div class="col-md-12">
				<a class="btn btn-default" href="{{url()->previous()}}"><i class="mdi mdi-keyboard-backspace"></i></a>
	
				<form action="{{route('siswa.store')}}" enctype="multipart/form-data" 
				method="post">
				{{csrf_field()}}

					<div class="row mb-3">
			  			<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('nama_lengkap') ? 'has-error' : ''}}">
								<label >Nama Lengkap</label>
								<input type="text" class="form-control" name="nama_lengkap" required>
								@if ($errors->has('nama_lengkap'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_lengkap')}}</strong>
									</span>
								@endif
							</div>
						</div>				
				
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('email') ? 'has-error' : ''}}">
								<label >Email</label>
								<input type="Email" class="form-control" name="email" required>
								@if ($errors->has('email'))
									<span class="help-blocks">
										<strong>{{$errors->first('email')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('nik') ? 'has-error' : ''}}">
								<label >Nik</label>
								<input type="number" class="form-control" name="nik" required>
								@if ($errors->has('nik'))
									<span class="help-blocks">
										<strong>{{$errors->first('nik')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
 						
					</div>
			
					<div class="row mb-3">
			 			<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
								<label >Tempat Lahir</label>
								<input type="text" class="form-control"  
									name="tempat_lahir" required>
								@if ($errors->has('tempat_lahir'))
									<span class="help-blocks">
										<strong>{{$errors->first('tempat_lahir')}}</strong>
									</span>
								@endif
							</div>
						</div>
			 	
			  			<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
								<label >Tanggal Lahir</label>
								<input type="text" class="form-control date" 
									name="tanggal_lahir" required>
								@if ($errors->has('tanggal_lahir'))
									<span class="help-blocks">
										<strong>{{$errors->first('tanggal_lahir')}}</strong>
									</span>
								@endif
							</div>
						</div>
			 			
			 			<div class="col-md-6 col-lg-4 col-xlg-2 float-right">					
  							<div class=" {{ $errors->has('foto') ? ' has-error' : '' }}">
              					<label >Foto</label>  				
            <!-- image-preview-filename input [CUT FROM HERE]-->
            					<div class="input-group image-preview">
                					<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                					<span class="input-group-btn">
                 				  	<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        				<span class="mdi mdi-close-outline"></span> Hapus
                    				</button>
                    <!-- image-preview-input -->
                    			<div class="btn btn-default image-preview-input">
    	                    		<span class="glyphicon glyphicon-folder-open"></span>
	                        		<span class="image-preview-input-title">Browse</span>
        	                		<input type="file" accept="image/png, image/jpeg, image/gif" 	class="form-control" name="foto"/> <!-- rename it -->
                    			</div>
                					</span>
            					</div><!-- /input-group image-preview [TO HERE]--> 
								@if ($errors->has('foto'))
                            		<span class="help-block">
                                		<strong>{{ $errors->first('foto') }}</strong>
                           	 		</span>
                       	 		@endif
            				</div>
        				</div>
					</div>
        			<div class="row md-3">	
        				<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
			  					<label >Jenis Kelamin</label><br>	
								<input type="radio" class="radio-control" name="jenis_kelamin" value="Laki-laki">Laki-Laki &nbsp;			  		
								<input type="radio" class="radio-control" name="jenis_kelamin" value="Perempuan">Perempuan			  		
			  					@if ($errors->has('jenis_kelamin'))
                            		<span class="help-block">
                                		<strong>{{ $errors->first('jenis_kelamin') }}</strong>
                            		</span>
                        		@endif
                    		</div>
                		</div>
        			</div>
					<br>
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Biografi">Biografi</a></li> &nbsp; &nbsp;
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Ortu">Identitas orangtua</a></li> 
</ul>

	<div class="tab-content">
  		<div id="Ortu" class="tab-pane fade in ">
 			<div class="panel-body">
 				<h3>Identitas Ayah</h3>
					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
						{{-- <div class=" {{$errors->has('nama_ayah') ? 'has-error' : ''}}">
						 --}}	<label >Nama </label>
								<input type="text"  class="form-control" name="nama_ayah" >
								{{-- @if ($errors->has('nama_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_ayah')}}</strong>
									</span>
								@endif --}}
							{{-- </div> --}}
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('tempat_lahir_ayah') ? 'has-error' : ''}}">
								<label >Tempat Lahir</label>
								<input type="text" class="form-control"  name="tempat_lahir_ayah" >
								@if ($errors->has('tempat_lahir_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('tempat_lahir_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('tanggal_lahir_ayah') ? 'has-error' : ''}}">
								<label >Tanggal Lahir</label>
								<input type="text" class="form-control"  name="tanggal_lahir_ayah" >
								@if ($errors->has('tanggal_lahir_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('tanggal_lahir_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>

					</div>

					<div class="row mb-3">		

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('agama_ayah') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" class="form-control"  name="agama_ayah" >
								@if ($errors->has('agama_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('kewarganegaraan_ayah') ? 'has-error' : ''}}">
								<label >Kewarganegaraan</label>
								<input type="text" class="form-control"  name="kewarganegaraan_ayah" >
								@if ($errors->has('kewarganegaraan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>			
			
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('pendidikan_ayah') ? 'has-error' : ''}}">
								<label >Pendidikan</label>
								<input type="text" class="form-control"  name="pendidikan_ayah" >
								@if ($errors->has('pendidikan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('pekerjaan_ayah') ? 'has-error' : ''}}">
								<label >Pekerjaan</label>
								<input type="text" class="form-control"  name="pekerjaan_ayah" >
								@if ($errors->has('pekerjaan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('pekerjaan_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('penghasilan_ayah') ? 'has-error' : ''}}">
								<label >Penghasilan/Bulan</label>
								<input type="text" class="form-control" name="penghasilan_ayah" >
								@if ($errors->has('penghasilan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('penghasilan_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('alamat_no_telepon_ayah') ? 'has-error' : ''}}">
								<label >Alamat dan No Telepon </label>
								<input type="text" class="form-control"  name="alamat_no_telepon_ayah" >
								@if ($errors->has('alamat_no_telepon_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
				<h3>Identitas Ibu</h3>
					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('nama_ibu') ? 'has-error' : ''}}">
								<label >Nama </label>
								<input type="text"  class="form-control" name="nama_ibu" >
								@if ($errors->has('nama_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('tempat_lahir_ibu') ? 'has-error' : ''}}">
								<label >Tempat Lahir</label>
								<input type="text" class="form-control"  name="tempat_lahir_ibu" >
								@if ($errors->has('tempat_lahir_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('tempat_lahir_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('tanggal_lahir_ibu') ? 'has-error' : ''}}">
								<label >Tanggal Lahir</label>
								<input type="text" class="form-control"  name="tanggal_lahir_ibu" >
								@if ($errors->has('tanggal_lahir_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('tanggal_lahir_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>			
					</div>
	
					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('agama_ibu') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" class="form-control"  name="agama_ibu" >
								@if ($errors->has('agama_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('kewarganegaraan_ibu') ? 'has-error' : ''}}">
								<label >Kewarganegaraan</label>
								<input type="text" class="form-control"  name="kewarganegaraan_ibu" >
								@if ($errors->has('kewarganegaraan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('pendidikan_ibu') ? 'has-error' : ''}}">
								<label >Pendidikan</label>
								<input type="text" class="form-control"  name="pendidikan_ibu" >
								@if ($errors->has('pendidikan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
	
					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('pekerjaan_ibu') ? 'has-error' : ''}}">
								<label >Pekerjaan</label>
								<input type="text" class="form-control"  name="pekerjaan_ibu" >
								@if ($errors->has('pekerjaan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('pekerjaan_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="col-md-6 col-lg-4 col-xlg-2">	
							<div class=" {{$errors->has('penghasilan_ibu') ? 'has-error' : ''}}">
								<label >Penghasilan/Bulan</label>
								<input type="text" class="form-control" ] name="penghasilan_ibu" >
								@if ($errors->has('penghasilan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('penghasilan_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('alamat_no_telepon_ibu') ? 'has-error' : ''}}">
								<label >Alamat dan No Telepon </label>
								<input type="text" class="form-control"  name="alamat_no_telepon_ibu" >
								@if ($errors->has('alamat_no_telepon_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
				<h3>Identitas wali</h3>
					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('nama_wali') ? 'has-error' : ''}}">
								<label >Nama </label>
								<input type="text"  class="form-control" name="nama_wali" >
								@if ($errors->has('nama_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('tempat_lahir_wali') ? 'has-error' : ''}}">
								<label >Tempat Lahir</label>
								<input type="text" class="form-control"  name="tempat_lahir_wali" >
								@if ($errors->has('tempat_lahir_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('tempat_lahir_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('tanggal_lahir_wali') ? 'has-error' : ''}}">
								<label >Tanggal Lahir</label>
								<input type="text" class="form-control"  name="tanggal_lahir_wali" >
								@if ($errors->has('tanggal_lahir_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('tanggal_lahir_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
	
					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('agama_wali') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" class="form-control"  name="agama_wali" >
								@if ($errors->has('agama_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('kewarganegaraan_wali') ? 'has-error' : ''}}">
								<label >Kewarganegaraan</label>
								<input type="text" class="form-control"  name="kewarganegaraan_wali" >
								@if ($errors->has('kewarganegaraan_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>			
						
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('pendidikan_wali') ? 'has-error' : ''}}">
								<label >Pendidikan</label>
								<input type="text" class="form-control"  name="pendidikan_wali" >
								@if ($errors->has('pendidikan_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
	
					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('pekerjaan_wali') ? 'has-error' : ''}}">
								<label >Pekerjaan</label>
								<input type="text" class="form-control"  name="pekerjaan_wali" >
								@if ($errors->has('pekerjaan_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('pekerjaan_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">	
							<div class=" {{$errors->has('penghasilan_wali') ? 'has-error' : ''}}">
								<label >Penghasilan/Bulan</label>
								<input type="text" class="form-control" ] name="penghasilan_wali" >
								@if ($errors->has('penghasilan_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('penghasilan_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('alamat_no_telepon_wali') ? 'has-error' : ''}}">
								<label >Alamat dan No Telepon </label>
								<input type="text" class="form-control"  name="alamat_no_telepon_wali" >
								@if ($errors->has('alamat_no_telepon_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('id_ortu') ? 'has-error' : ''}}">
								<input type="hidden" class="form-control"  name="id_ortu" >
								@if ($errors->has('id_ortu'))
									<span class="help-blocks">
										<strong>{{$errors->first('id_ortu')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>			
				</div>
			</div>

 				<div id="Biografi" class="tab-pane fade">
					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('nama_panggilan') ? 'has-error' : ''}}">
								<label >Nama Panggilan</label>
								<input type="text" class="form-control" name="nama_panggilan">
								@if ($errors->has('nama_panggilan'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_panggilan')}}</strong>
									</span>
								@endif
							</div>
						 </div>
				
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('nama_jalan') ? 'has-error' : ''}}">
								<label >Jalan</label>
								<input type="text" class="form-control" name="nama_jalan" >
								@if ($errors->has('nama_jalan'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_jalan')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('nama_desa') ? 'has-error' : ''}}">
								<label >Desa/Kelurahan</label>
								<input type="text" class="form-control" name="nama_desa" >
								@if ($errors->has('nama_desa'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_desa')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('kecamatan') ? 'has-error' : ''}}">
								<label >Kecamatan</label>
								<input type="text" class="form-control" name="kecamatan" >
								@if ($errors->has('kecamatan'))
									<span class="help-blocks">
										<strong>{{$errors->first('kecamatan')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('kabupaten') ? 'has-error' : ''}}">
								<label >kabupaten/kota</label>
								<input type="text" class="form-control" name="kabupaten" >
								@if ($errors->has('kabupaten'))
									<span class="help-blocks">
										<strong>{{$errors->first('kabupaten')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('provinsi') ? 'has-error' : ''}}">
								<label >Provinsi</label>
								<input type="text" class="form-control" name="provinsi" >
								@if ($errors->has('provinsi'))
									<span class="help-blocks">
										<strong>{{$errors->first('provinsi')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('agama') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" class="form-control" name="agama" >
								@if ($errors->has('agama'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('kewarganegaraan') ? 'has-error' : ''}}">
								<label >Kewarganegaraan</label>
								<input type="text" class="form-control" name="kewarganegaraan" >
								@if ($errors->has('kewarganegaraan'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('anak_ke') ? 'has-error' : ''}}">
								<label >Anak ke berapa</label>
								<input type="text" class="form-control" name="anak_ke" >
								@if ($errors->has('anak_ke'))
									<span class="help-blocks">
										<strong>{{$errors->first('anak_ke')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('jumlah_saudara_kandung') ? 'has-error' : ''}}">
								<label >Jumlah Saudara Kandung</label>
								<input type="text" class="form-control" name="jumlah_saudara_kandung" >
								@if ($errors->has('jumlah_saudara_kandung'))
									<span class="help-blocks">
										<strong>{{$errors->first('jumlah_saudara_kandung')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('jumlah_saudara_tiri') ? 'has-error' : ''}}">
								<label >Jumlah Saudara Tiri</label>
								<input type="text" class="form-control" name="jumlah_saudara_tiri" >
								@if ($errors->has('jumlah_saudara_tiri'))
									<span class="help-blocks">
										<strong>{{$errors->first('jumlah_saudara_tiri')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('jumlah_saudara_angkat') ? 'has-error' : ''}}">
								<label >Jumlah Saudara Angkat</label>
								<input type="text" class="form-control" name="jumlah_saudara_angkat" >
								@if ($errors->has('jumlah_saudara_angkat'))
									<span class="help-blocks">
										<strong>{{$errors->first('jumlah_saudara_angkat')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('status_yatim') ? 'has-error' : ''}}">
								<label >status_yatim</label><br>
								<input type="radio" class="radio-control" name="status_yatim" value="Yatim">Yatim&nbsp&nbsp
								<input type="radio" class="radio-control" name="status_yatim" value="Piatu">Piatu&nbsp&nbsp
								<input type="radio" class="radio-control" name="status_yatim"  value="Yatim Piatu">Yatim Piatu&nbsp&nbsp
								<input type="radio" class="radio-control" name="status_yatim"  value="-">-
								@if ($errors->has('status_yatim'))
									<span class="help-blocks">
										<strong>{{$errors->first('status_yatim')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
 							<div class=" {{$errors->has('bahasa') ? 'has-error' : ''}}">
								<label >Bahasa Sehari-hari</label>
								<input type="text" class="form-control" name="bahasa" >
								@if ($errors->has('bahasa'))
									<span class="help-blocks">
										<strong>{{$errors->first('bahasa')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('golongan_darah') ? 'has-error' : ''}}">
								<label >golongan_darah</label><br>
								<input type="radio" class="radio-control" name="golongan_darah" 
									   value="A">A&nbsp&nbsp
								<input type="radio" class="radio-control" name="golongan_darah" 
									   value="B">B&nbsp&nbsp
								<input type="radio" class="radio-control" name="golongan_darah"  
									   value="AB">AB&nbsp&nbsp
								<input type="radio" class="radio-control" name="golongan_darah" 
									   value="O">O
								@if ($errors->has('golongan_darah'))
									<span class="help-blocks">
										<strong>{{$errors->first('golongan_darah')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('penyakit') ? 'has-error' : ''}}">
								<label >Penyakit yang pernah diderita </label>
								<input type="text" class="form-control" name="penyakit" >
								@if ($errors->has('penyakit'))
									<span class="help-blocks">
										<strong>{{$errors->first('penyakit')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('imunisasi') ? 'has-error' : ''}}">
								<label >Imunisasi yang pernah diterima</label>
								<input type="text" class="form-control" name="imunisasi" >
								@if ($errors->has('imunisasi'))
									<span class="help-blocks">
										<strong>{{$errors->first('imunisasi')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('ciri_ciri') ? 'has-error' : ''}}">
								<label >Ciri-ciri</label>
								<input type="text" class="form-control" name="ciri_ciri" >
								@if ($errors->has('ciri_ciri'))
									<span class="help-blocks">
										<strong>{{$errors->first('ciri_ciri')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('tinggi_berat_badan') ? 'has-error' : ''}}">
								<label >Tinggi Badan/Berat Badan</label>
								<input type="text" class="form-control" name="tinggi_berat_badan" >
								@if ($errors->has('tinggi_berat_badan'))
									<span class="help-blocks">
										<strong>{{$errors->first('tinggi_berat_badan')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-2">
							<div class=" {{$errors->has('jarak_rumah') ? 'has-error' : ''}}">
								<label >Jarak Rumah ke Sekolah</label>
								<input type="text" class="form-control" name="jarak_rumah" >
								@if ($errors->has('jarak_rumah'))
									<span class="help-blocks">
										<strong>{{$errors->first('jarak_rumah')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
 				</div>
			</div>
							<br>
							<div>
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>



			</div>
		</form>
	</div>
</div>
	
<script type="text/javascript">

    $('.date').datepicker({  


       format: 'yyyy/mm/dd'

     });  

</script> 

@endsection


 	