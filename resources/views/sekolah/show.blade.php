@extends('layouts.admin')
@section('content')

    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Sekolah | Show </title>
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
                        <h4 class="page-title">Show Sekolah</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('sekolah.index') }}">Sekolah</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Show Sekolah</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

					<a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('sekolah.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
			
<div class="row md-3">
					
  				<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('nama_sekolah') ? 'has-error' : ''}}">
								<label class="control-label">Nama Sekolah </label>
							<input type="text"  class="form-control" value="{{ $tb_s_sekolah->nama_sekolah }}" name="nama_sekolah" readonly>
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
							<input type="text"  class="form-control" value="{{ $tb_s_sekolah->waktu_buka }}" name="waktu_buka" readonly>
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
							<input type="text"  class="form-control" value="{{ $tb_s_sekolah->hari_buka }}" name="hari_buka" readonly>
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
							<input type="text"  class="form-control" value="{{ $tb_s_sekolah->alamat }}" name="alamat" readonly>
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
							<input type="text"  class="form-control" value="{{ $tb_s_sekolah->no_telepon }}" name="no_telepon" readonly>
								@if ($errors->has('no_telepon'))
									<span class="help-blocks">
										<strong>{{$errors->first('no_telepon')}}</strong>
									</span>
								@endif
							</div>
						</div>

			<div class="col-md-6 col-lg-4 col-xlg-2">					
  						<div class=" {{ $errors->has('logo') ? ' has-error' : '' }}">
              			
                    <img src="{{ asset('img/FotoSekolah/'.$tb_s_sekolah->logo) }}" style="max-height:100px; max-width: 100px; margin-top:7px;">
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
                            <input type="text" value="{{ $tb_s_sekolah->tb_s_map->garis_bujur }}"  class="form-control" name="garis_bujur" readonly>
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
                            <input type="text" value="{{ $tb_s_sekolah->tb_s_map->garis_lintang }}" class="form-control" name="garis_lintang" readonly>
                                @if ($errors->has('garis_lintang'))
                                    <span class="help-blocks">
                                        <strong>{{$errors->first('garis_lintang')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>      

                            
            
    </div>          
                </div>
 <div id="Sosmed" class="tab-pane fade">
 
        <div class="row md-3">
                            <div class="col-md-6 col-lg-4 col-xlg-3">
                            <div class="form-group {{$errors->has('Instagram') ? 'has-error' : ''}}">
                                <label class="control-label">Instagram</label>
                            <input type="text" value="{{ $tb_s_sekolah->tb_s_sosmed->Instagram }}" class="form-control" name="Instagram" readonly>
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
                            <input type="text" value="{{ $tb_s_sekolah->tb_s_sosmed->Twitter }}"  class="form-control" name="Twitter" readonly>
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
                            <input type="text" value="{{ $tb_s_sekolah->tb_s_sosmed->Facebook }}"  class="form-control" name="Facebook" readonly>
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
                            <input type="text" value="{{ $tb_s_sekolah->tb_s_sosmed->Email }}"  class="form-control" name="Email" readonly>
                                @if ($errors->has('Email'))
                                    <span class="help-blocks">
                                        <strong>{{$errors->first('Email')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                </div>
                 </div>
                 </div>
        		<br>

							
						</form>
							</div>
								
			</div>
	
@endsection
