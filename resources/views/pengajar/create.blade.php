@extends('layouts.admin')
@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Pengajar | Create </title>
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
                        <h4 class="page-title">Tambah Pengajar</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('pengajar.index') }}">Pengajar</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah Pengajar</li>
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
						<form action="{{route('pengajar.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}

<div class="row mb-3">

			  	<div class="col-md-6 col-lg-4 col-xlg-2">
					<div class=" {{$errors->has('nama') ? 'has-error' : ''}}">
								<label >Nama</label>
								<input type="text" class="form-control" name="nama" required>
								@if ($errors->has('nama'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama')}}</strong>
									</span>
								@endif
							</div>
				</div>				
				
			  	<div class="col-md-6 col-lg-4 col-xlg-2">
          <div class=" {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                <label >Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" required>
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
								<input type="text" class="form-control date" name="tanggal_lahir" required>
								@if ($errors->has('tanggal_lahir'))
									<span class="help-blocks">
										<strong>{{$errors->first('tanggal_lahir')}}</strong>
									</span>
								@endif
							</div>
				</div>
			</div>
				<div class="row mb-3">
			 	<div class="col-md-6 col-lg-4 col-xlg-2">
					<div class=" {{$errors->has('agama') ? 'has-error' : ''}}">
								<label >agama</label>
								<input type="text" class="form-control" name="agama" required>
								@if ($errors->has('agama'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama')}}</strong>
									</span>
								@endif
							</div>
				</div>
			<div class="col-md-6 col-lg-4 col-xlg-2">
					<div class=" {{$errors->has('kewarganegaraan') ? 'has-error' : ''}}">
								<label >Kewarganegaraan </label>
								<input type="text"  class="form-control" name="kewarganegaraan" >
								@if ($errors->has('kewarganegaraan'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan')}}</strong>
									</span>
								@endif
							</div>
						</div>
			<div class="col-md-6 col-lg-4 col-xlg-2">
					<div class=" {{$errors->has('pendidikan') ? 'has-error' : ''}}">
								<label >Pendidikan</label>
								<input type="text" class="form-control"  name="pendidikan" >
								@if ($errors->has('pendidikan'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan')}}</strong>
									</span>
								@endif
							</div>
						</div>
						</div>
						<div class="row mb-3">
			
			<div class="col-md-6 col-lg-4 col-xlg-2">
					<div class=" {{$errors->has('alamat_no_telepon') ? 'has-error' : ''}}">
								<label >Alamat dan No telepon</label>
								<input type="text" class="form-control"  name="alamat_no_telepon" >
								@if ($errors->has('alamat_no_telepon'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
<div class="col-md-3 col-lg-4">

<div class=" {{ $errors->has('id_mapel') ? ' has-error' : '' }}">
              <label class="control-label">Mata Pelajaran</label> 
   <div class="input-group">

              <select name="id_mapel" class="form-control" >
                
                @foreach($tb_m_mata_pelajaran as $data)
                <option value="{{ $data->id }}"   >{{ $data->nama_mata_pelajaran }}</option>
                @endforeach
              </select>
                <span class="input-group-btn">
          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default-sm">
            <i class="mdi mdi-plus"></i>
          </button>
        </span>

    </div>
    
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
      
      
					
							<div >
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>



							</div>
						</form>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
      <br>
        <button type="button" class="close" data-dismiss="modal">&times;<br> </button>
        <br>
       </div>
      <div class="modal-body">
      <form action="{{route('PengajarMapel.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
  	<div class="col-md-12 col-lg-12 col-xlg-12">
					<div class="form-group {{$errors->has('nama_mata_pelajaran') ? 'has-error' : ''}}">
								<label class="control-label">Nama Mapel </label>
								<input type="text"  class="form-control" name="nama_mata_pelajaran" required>
								@if ($errors->has('nama_mata_pelajaran'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_mata_pelajaran')}}</strong>
									</span>
								@endif
							</div>
						</div>		


      <div class="form-group">
                <button type="submit" class="btn btn-danger">Submit</button>

                <button type="submit" class="btn btn-warning">Reset</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
 
						</form>
    </div>
    </div>  
          </div>
          </div>
      </div>
  </div>
</div>

<script type="text/javascript">

    $('.date').datepicker({  


       format: 'yyyy/mm/dd'

     });  

</script> 

@endsection


 	