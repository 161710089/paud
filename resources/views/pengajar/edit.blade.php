@extends('layouts.admin')
@section('content')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Pendapat | Edit </title>
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
                        <h4 class="page-title">Edit Pengajar</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('pengajar.index') }}">Pengajar</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Pengajar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-12">
						

					<div class="row mb-3">
							<a class="btn btn-secondary" data-toggle="confirmation"  href="{{url()->previous()}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
						<div class="panel-body">
			<form action="{{ route('pengajar.update',$tb_m_pengajar->id) }}" method="post" enctype="multipart/form-data" >
			  		<input name="_method" type="hidden" value="PATCH">
			  		{{ csrf_field() }}
					<div class="row mb-3">

			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('nama') ? 'has-error' : ''}}">
								<label >Nama</label>
								<input type="text" value="{{ $tb_m_pengajar->nama }}" class="form-control"  name="nama" required>
								@if ($errors->has('nama'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama')}}</strong>
									</span>
								@endif
							</div>
				</div>				
					
 	
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class=" {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                                <label >Tempat Lahir</label>
                                <input type="text" value="{{ $tb_m_pengajar->tempat_lahir }}" class="form-control" name="tempat_lahir" required>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-blocks">
                                        <strong>{{$errors->first('tempat_lahir')}}</strong>
                                    </span>
                                @endif
                            </div>
                </div>


			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
								<label >Tanggal Lahir</label>
								<input type="text" value="{{ $tb_m_pengajar->tanggal_lahir }}" class="form-control date" name="tanggal_lahir" required>
								@if ($errors->has('tanggal_lahir'))
									<span class="help-blocks">
										<strong>{{$errors->first('tanggal_lahir')}}</strong>
									</span>
								@endif
							</div>
				</div>
</div>
			<div class="row mb-3">
				<div class="col-md-6 col-lg-4 col-xlg-3">
			<div class=" {{$errors->has('agama') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" value="{{ $tb_m_pengajar->agama }}" class="form-control" name="agama" required>
								@if ($errors->has('agama'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama')}}</strong>
									</span>
								@endif
							</div>
							</div>
			 	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('kewarganegaraan') ? 'has-error' : ''}}">
								<label >kewarganegaraan</label>
								<input type="text" value="{{ $tb_m_pengajar->kewarganegaraan }}" class="form-control" name="kewarganegaraan" required>
								@if ($errors->has('kewarganegaraan'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan')}}</strong>
									</span>
								@endif
							</div>
				</div>
				

<div class="col-md-6 col-lg-4 col-xlg-3">
						<div class=" {{$errors->has('pendidikan') ? 'has-error' : ''}}">
								<label >Pendidikan</label>
								<input type="text" value="{{ $tb_m_pengajar->pendidikan }}" class="form-control"  name="pendidikan" required>
								@if ($errors->has('pendidikan'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan')}}</strong>
									</span>
								@endif
							</div>
</div>
</div>
<div class="row mb-3">		
<div class="col-md-6 col-lg-4 col-xlg-3">

					<div class=" {{$errors->has('alamat_no_telepon') ? 'has-error' : ''}}">
								<label >Alamat dan No Telepon</label>
								<input type="text" value="{{ $tb_m_pengajar->alamat_no_telepon }}" class="form-control"  name="alamat_no_telepon" required>
								@if ($errors->has('alamat_no_telepon'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon')}}</strong>
									</span>
								@endif
							</div>
                        </div>

                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="form-group {{ $errors->has('id_mapel') ? ' has-error' : '' }}">
                        <label class="control-label">Nama Mapel</label> 
                        <select  name="id_mapel" class="form-select" required>  
                        @foreach($tb_m_mata_pelajaran as $data)
                        <option value="{{ $data->id}}"{{$selectmapel == $data->id ? 'selected="selected"':'' }} required>{{ 
                            $data->nama_mata_pelajaran }}</option>
                        @endforeach
                    
                        </select>
                        @if ($errors->has('id_mapel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_mapel') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
        

                <div class="col-md-6 col-lg-4 col-xlg-2">                   
                        <div class=" {{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label >Foto</label>
                            
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="mdi mdi-close-outline"></span> Hapus
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" 
                        value="" class="form-control" name="foto"/> <!-- rename it -->
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
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class=" {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                        <label >Jenis Kelamin</label><br>   
                                <input type="radio" class="radio-control" name="jenis_kelamin" 
                                value="Laki-laki" {{ $tb_m_pengajar->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }} required>Laki laki&nbsp&nbsp
                                <input type="radio" class="radio-control" name="jenis_kelamin"  
                                value="Perempuan" {{ $tb_m_pengajar->jenis_kelamin == 'Perempuan' ? 'checked' : '' }} required>Perempuan&nbsp&nbsp
                                
                    @if ($errors->has('jenis_kelamin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
              </div>

<br>
            

    						<div>
								<button type="submit" class="btn btn-primary">Edit</button>
							</div>



							</div>
						</form>

  </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {        
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });   
    });
</script>

<script type="text/javascript">

    $('.date').datepicker({  


       format: 'yyyy/mm/dd'

     });  

</script> 

@endsection

