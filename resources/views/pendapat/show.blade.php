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

    @foreach($sekolahs as $data)
    <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | pendapat </title>
    @endforeach


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
                        <h4 class="page-title">Tambah pendapat</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('pendapat.index') }}">pendapat</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah pendapat</li>
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
      		<div class="row mb-3">
						<a class="btn btn-primary" href="{{route('pendapat.edit',$tb_m_pendapat->id)}}"><i class="mdi mdi-pencil"></i></a>&nbsp;
						         <button onclick="deletependapat('{{$tb_m_pendapat->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                  									&nbsp;
						<a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('pendapat.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
					    </div>
          </div>
          <div class="panel-body">

        <div class="row md-3">
          
          <div class="col-md-12 col-lg-12 col-xlg-12">
          <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                <label class="control-label">Nama </label>
                <input type="text" value="{{ $tb_m_pendapat->nama }}" class="form-control" name="nama" disabled>
                @if ($errors->has('nama'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('nama')}}</strong>
                  </span>
                @endif
              </div>
            </div>
        </div>

      <div class="row md-3">  
<div class="col-md-12 col-lg-12 col-xlg-12">          
              <div class=" {{ $errors->has('foto') ? ' has-error' : '' }}">
                      <label >Foto</label>
                      
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
                        value="" class="form-control" name="foto" disabled /> <!-- rename it -->
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
      <br>
<label>Pendapat</label>
<p>{!! $tb_m_pendapat->pendapat !!}</p>
            
    <ul class="nav nav-tabs">
    <a data-toggle="collapse" href="#collapse1">Tambahkan Sosial Media</a>
      </ul>
       
      <div id="collapse1" class="panel-collapse collapse">
       <br>
        <ul class="list-group">
       
            <div class="row">
              
          <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class=" {{$errors->has('Facebook') ? 'has-error' : ''}}">
                <label >Link Facebook</label>
                <input type="text" value="{{ $tb_m_pendapat->tb_s_sosmed->Facebook }}" class="form-control" name="Facebook" disabled>
                @if ($errors->has('Facebook'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('Facebook')}}</strong>
                  </span>
                @endif
              </div>
        </div>
          
          <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class=" {{$errors->has('Instagram') ? 'has-error' : ''}}">
                <label >Link Instagram</label>
                <input type="text" value="{{ $tb_m_pendapat->tb_s_sosmed->Instagram }}" class="form-control" name="Instagram" disabled>
                @if ($errors->has('Instagram'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('Instagram')}}</strong>
                  </span>
                @endif
              </div>
        </div>
            </div>
<div class="row">
  
        <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class=" {{$errors->has('Twitter') ? 'has-error' : ''}}">
                <label >Link Twitter</label>
                <input type="text" value="{{ $tb_m_pendapat->tb_s_sosmed->Twitter }}" class="form-control" name="Twitter" disabled>
                @if ($errors->has('Twitter'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('Twitter')}}</strong>
                  </span>
                @endif
              </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class=" {{$errors->has('p') ? 'has-error' : ''}}">
                <label >Link p</label>
                <input type="text" value="{{ $tb_m_pendapat->tb_s_sosmed->p }}" class="form-control" name="p" disabled>
                @if ($errors->has('p'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('p')}}</strong>
                  </span>
                @endif
              </div>
        </div>
</div>
        

        </ul>
      </div>
        </div>
  
            
      

      
          <br>
               </div>
          </div>
        </div>
      </div>
  <script type="text/javascript">
function deletependapat(id){
  swal({
  title: 'Pastikan untuk melakukan tindakan ini?',
  text: 'Tindakan ini tidak bisa dibatalkan',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#DD6B55',
  confirmButtonText: 'Hapus!',
  cancelButtonText: 'Cancel',
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
    if (isConfirm) {
       $.ajax({
               type:'get',
               url:'<?php echo url("delete-pendapat"); ?>/'+id,
               success:function(data){
                  location.href ='{{url('admin/pendapat') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "pendapat ini tidak jadi di hapus.", "error");
    }
});
}
</script>


@endsection
