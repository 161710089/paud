@extends('layouts.admin')
@section('content')

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

    
<link href="/cesese/test.css" rel="stylesheet" id="bootstrap-css">
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
                        <h4 class="page-title">Tambah Artikel</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('artikel.index') }}">Artikel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah Artikel</li>
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
			<a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('artikel.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
					</div>
					<div class="panel-body">

			<form action="{{route('artikel.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
				<div class="row md-3">
					
  				<div class="col-md-6 col-lg-6 col-xlg-6">
					<div class="form-group {{$errors->has('judul') ? 'has-error' : ''}}">
								<label class="control-label">Judul </label>
								<input type="text"  class="form-control" name="judul" required>
								@if ($errors->has('judul'))
									<span class="help-blocks">
										<strong>{{$errors->first('judul')}}</strong>
									</span>
								@endif
							</div>
						</div>

<div class="col-md-6 col-lg-6 col-xlg-6">         
              <div class=" {{ $errors->has('id_kategori_artikel') ? ' has-error' : '' }}">
              <label class="control-label">Kategori artikel</label> 
   <div class="input-group">

              <select name="id_kategori_artikel" class="form-control" >
                
                @foreach($tb_m_kategori_artikel as $data)
                <option value="{{ $data->id }}"   >{{ $data->kategori }}</option>
                @endforeach
              </select>
          
    </div>
    
              @if ($errors->has('id_kategori_artikel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_kategori_artikel') }}</strong>
                            </span>
                        @endif
            </div>

            </div>

				</div>
			<div class="row md-3">  
<div class="col-md-12 col-lg-12 col-xlg-12">					
  						<div class=" {{ $errors->has('foto') ? ' has-error' : '' }}">
              				<label >foto</label>
              				
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

<div class="form-group {{ $errors->has('deskripsi') ? 'has error' : ''}} ">
			  			<label class="control-label">Deskripsi</label>
			  			<textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
			  			@if ($errors->has('deskripsi'))
			  			<span class="help-block">
			  				<strong>{{ $errors->first('deskripsi') }}</strong>
			  			</span>
			  			@endif
			  		</div>

        		
		<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('id_user') ? 'has-error' : ''}}">
								<input type="hidden" value="{{Auth::user()->id }}"  class="form-control" name="id_user" required>
								@if ($errors->has('id_user'))
									<span class="help-blocks">
										<strong>{{$errors->first('id_user')}}</strong>
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
