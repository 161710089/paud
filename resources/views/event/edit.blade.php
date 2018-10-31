@extends('layouts.admin')
@section('content')
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">
    <link href="/dist/css/style.min.css" rel="stylesheet">
   
    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Event | Edit </title>
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
  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
     --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  

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
                        <h4 class="page-title">Edit Event</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('event.index') }}">Event</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Event</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
      <div class="col-md-12">
            <a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('event.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
          <div class="panel-body">

      <form action="{{ route('event.update',$tb_m_event->id) }}" method="post" enctype="multipart/form-data" >
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
  <div class="row md-3">
          
          <div class="col-md-6 col-lg-4 col-xlg-3">
          <div class="form-group {{$errors->has('judul') ? 'has-error' : ''}}">
                <label class="control-label">Judul </label>
                <input type="text"  class="form-control" value="{{ $tb_m_event->judul }}" name="judul" required>
                @if ($errors->has('judul'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('judul')}}</strong>
                  </span>
                @endif
              </div>
            </div>

      <div class="col-md-3 col-lg-4">
        <div class=" {{ $errors->has('id_pengajar') ? ' has-error' : '' }}">
            <label class="control-label">Nama Pengajar</label> 
            <div class="input-group">
            <select name="id_pengajar" class="jss-selectize" >                
              @foreach($tb_m_pengajar as $data)
              <option value="{{ $data->id }}"   >{{ $data->nama }}</option>
              @endforeach
            </select>
                <span class="input-group-btn">
                  <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default-sm">
                    <i class="mdi mdi-plus"></i>
                  </button>
                </span>
            </div>
                  @if ($errors->has('id_pengajar'))
                    <span class="help-block">
                      <strong>{{ $errors->first('id_pengajar') }}</strong>
                    </span>
                  @endif
        </div>
      </div>

      <div class="col-md-6 col-lg-4 col-xlg-3">
        <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
      <label class="control-label">alamat  </label>
      <input type="text" class="form-select" value="{{ $tb_m_event->alamat }}" name="alamat" required>
      @if ($errors->has('alamat'))
        <span class="help-blocks">
          <strong>{{$errors->first('alamat')}}</strong>
        </span>
      @endif
    </div>
  </div>
  


        </div>
      <div class="row md-3">  
<div class="col-md-6 col-lg-4 col-xlg-3">
          <div class="form-group {{$errors->has('waktu') ? 'has-error' : ''}}">
                <label class="control-label">Waktu  </label>
                <input type="text"  class="form-select" id="time" value="{{ $tb_m_event->waktu }}" name="waktu" required>
                @if ($errors->has('waktu'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('waktu')}}</strong>
                  </span>
                @endif
              </div>
            </div>

      <div class="col-md-6 col-lg-4 col-xlg-3">
          <div class="form-group {{$errors->has('waktu_selesai') ? 'has-error' : ''}}">
                <label class="control-label">Waktu selesai  </label>
                <input type="text" value="{{$tb_m_event->waktu_selesai }}"  
                class="form-select" id="time2" name="waktu_selesai" required>
                @if ($errors->has('waktu_selesai'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('waktu_selesai')}}</strong>
                  </span>
                @endif
              </div>
            </div>

<div class="col-md-6 col-lg-4 col-xlg-3">
          <div class="form-group {{$errors->has('ruangan') ? 'has-error' : ''}}">
                <label class="control-label">Nama ruangan </label>
                <input type="text"  class="form-control" value="{{ $tb_m_event->ruangan }}" name="ruangan" required>
                @if ($errors->has('ruangan'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('ruangan')}}</strong>
                  </span>
                @endif
              </div>
            </div>

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
              <textarea name="deskripsi" id="deskripsi" class="form-control">{!! $tb_m_event->deskripsi !!} </textarea>
              @if ($errors->has('deskripsi'))
              <span class="help-block">
                <strong>{{ $errors->first('deskripsi') }}</strong>
              </span>
              @endif
            </div>

            <br>
      

      
          
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  


  <script type="text/javascript">
  $(document).ready(function(){

  $('.jss-selectize').selectize({
    sortField: 'text'
  });
});</script>


<script>
    $('#time').datetimepicker({
        format: 'YYYY/MM/DD HH:mm:ss'
    });
    $('#time2').datetimepicker({
        format: 'YYYY/MM/DD HH:mm:ss'
    });
</script>

@endsection
