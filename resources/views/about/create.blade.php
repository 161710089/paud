@extends('layouts.admin')
@section('content')

   
<link href="{{ asset('cesese/test.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
{{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
<!------ Include the above in your HEAD tag ---------->


    @foreach($sekolahs as $data)
    <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | About </title>
    @endforeach




	<div class="row">
		<div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tambah About</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('about.index') }}">About</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah About</li>
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
			<a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('about.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
					</div>
					<div class="panel-body">

			<form action="{{route('about.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
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

            <div class="form-group {{ $errors->has('about') ? 'has error' : ''}} ">
			  			<label class="control-label">about</label>
			  			<textarea name="about" id="about" class="form-control"></textarea>
			  			@if ($errors->has('about'))
			  			<span class="help-block">
			  				<strong>{{ $errors->first('about') }}</strong>
			  			</span>
			  			@endif
			  		</div>
        
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

<script type="text/javascript">
    $(document).on('click', '#close-preview', function(){ 
    $('.image-preview1').popover('hide');
    // Hover befor close the preview
    $('.image-preview1').hover(
        function () {
    $('.image-preview1').popover('show');
        }, 
         function () {
    $('.image-preview1').popover('hide');
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
    $('.image-preview1').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview1').attr("data-content","").popover('hide');
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
      
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#History">History</a></li> &nbsp; &nbsp;
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Prestasi">Prestasi</a></li> 
</ul>

  <div class="tab-content">
      <div id="Prestasi" class="tab-pane fade in ">
      <div class="panel-body">
        <div class="row mb-3">
            <div class="col-md-6 col-lg-4 col-xlg-2">
              <div class=" {{$errors->has('judul') ? 'has-error' : ''}}">
                <label >Nama Prestasi</label>
                <input type="text" class="form-control" name="judul">
                @if ($errors->has('judul'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('judul')}}</strong>
                  </span>
                @endif
              </div>
             </div>
          </div>

        </div>
      </div>
<style type="text/css">
        .container{
    margin-top:20px;
}
.image-preview-input2 {
    position: relative;
  overflow: hidden;
  margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input2 input[type=file] {
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
.image-preview-input-title2 {
    margin-left:2px;
}

      </style>    
<script type="text/javascript">
                             $(document).on('click', '#close-preview2', function(){ 
    $('.image-preview2').popover('hide');
    // Hover befor close the preview
    $('.image-preview2').hover(
        function () {
           $('.image-preview2').popover('show');
        }, 
         function () {
           $('.image-preview2').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview2',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview2').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear2').click(function(){
        $('.image-preview2').attr("data-content","").popover('hide');
        $('.image-preview-filename2').val("");
        $('.image-preview-clear2').hide();
        $('.image-preview-input2 input:file').val("");
        $(".image-preview-input-title2").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input2 input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title2").text("Ganti");
            $(".image-preview-clear2").show();
            $(".image-preview-filename2").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview2").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
                           </script>
        <div id="History" class="tab-pane fade">
          <div class="row mb-3">
            <div class="col-md-12 col-lg-12 col-xlg-12">          
              <div class=" {{ $errors->has('fotohistory') ? ' has-error' : '' }}">
                      <label >fotohistory</label>
                      
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview2">
                <input type="text" class="form-control image-preview-filename2" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear2" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input2">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title2">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" 
                        value="" class="form-control" name="fotohistory"/> <!-- rename it -->
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
      @if ($errors->has('fotohistory'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fotohistory') }}</strong>
                             </span>
                         @endif
                  </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xlg-12">
              <div class="form-group {{ $errors->has('history') ? 'has error' : ''}} ">
              <label class="control-label">History</label>
              <textarea name="history" id="history" class="form-control"></textarea>
              @if ($errors->has('history'))
              <span class="help-block">
                <strong>{{ $errors->first('history') }}</strong>
              </span>
              @endif
              </div>
            </div>
          </div>
        </div>
      </div>
              <br>
              @if(count($tb_m_about)>0) 
                <div class="form-group">
                <button type="submit" class="btn btn-primary" disabled>Tambah</button>
              </div>
        @else
                <div class="form-group">
                <button type="submit" class="btn btn-primary" >Tambah</button>
              </div>
        
        @endif
              </div>
            </form>
          </div>
        </div>

		</div>
	

@endsection

