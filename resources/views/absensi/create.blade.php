

@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
      
    </script>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>


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
{{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> --}}
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


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
      {{-- <script src="//code.jquery.com/jquery-1.10.1.min.js"></script> --}}

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
{{-- <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clocklet - An opinionated clock-style vanilla-js timepicker</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.15.0/themes/prism.css">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata|Frank+Ruhl+Libre|Playball|Source+Sans+Pro:400,600">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/clocklet@0.2.3/css/clocklet.css">
  
</head><body><script async src="https://www.googletagmanager.com/gtag/js?id=UA-64398169-1"></script><script>window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments)} gtag('js', new Date()); gtag('config', 'UA-64398169-1');</script><script src="https://cdn.jsdelivr.net/npm/clocklet@0.2.3/umd/clocklet.js">
  
</script><section class="examples">
  <div class="example"><style>
  .clocklet-color-example { background-color: #dce1e4; border: none; }
  .clocklet-color-example .clocklet-dial--minute { background-color: #fcf0e8; }
  .clocklet-color-example .clocklet-hand--minute { background-color: #f5bb95; }
  .clocklet-color-example .clocklet-tick--minute.clocklet-tick--selected { background-color: #f2a470; }
  .clocklet-color-example.clocklet--hoverable:not(.clocklet--dragging) .clocklet-tick--minute:hover { background-color: #f5bb95; }
  .clocklet-color-example .clocklet-dial--hour { background-color: #e9fdf1; }
  .clocklet-color-example .clocklet-hand--hour { background-color: #98f5bd; }
  .clocklet-color-example .clocklet-tick--hour.clocklet-tick--selected { background-color: #44ee88; }
  .clocklet-color-example.clocklet--hoverable:not(.clocklet--dragging) .clocklet-tick--hour:hover { background-color: #98f5bd; }
  .clocklet-color-example .clocklet-hand-origin { background-color: #f1e369; }
  .clocklet-color-example .clocklet-ampm::before { background-color: #44eedd; }
  .clocklet-color-example .clocklet-ampm:hover::before { background-color: #97f5ec; }
  .clocklet-color-example .clocklet-ampm[data-clocklet-ampm="pm"]::before { background-color: #dd44ee; }
  .clocklet-color-example .clocklet-ampm[data-clocklet-ampm="pm"]:hover::before { background-color: #eda1f6; }
</style>

<input data-clocklet="class-name: clocklet-color-example;  format: hh:mm a" class="form-control" value="02:55 am">
</div>
</body></html>
 --}}

 <body class="custom">
   
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tambah Absensi</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('absensi.index') }}">Absensi</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah Absensi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<br>


    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <div class="form-group {{ $errors->has('id_mapel') ? ' has-error' : '' }}">
                                <label class="control-label">Nama Kelas </label>    
                                <select name="id_mapel" class="form-select" id="kelas">
                                <option>Pilih Kelas</option>
                                @foreach($tb_m_mata_pelajaran as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_mata_pelajaran }}</option>
                                @endforeach
                        </select>
                        @if ($errors->has('id_mapel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_mapel') }}</strong>
                            </span>
                        @endif
                    </div>
    
                    <div class="form-group {{ $errors->has('id_pengajar') ? ' has-error' : '' }}">
                                <label class="control-label">Nama Siswa </label>    
                                <select name="id_pengajar" class="form-select" id="namasis">
                                <option>Pilih Siswa</option>
                                @foreach($tb_m_pengajar as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('id_pengajars'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_pengajars') }}</strong>
                            </span>
                        @endif
                    </div>
                    

  <script type="text/javascript">
    $(document).ready(function(){
        $('#kelas').change(function() {
            $('#namasis').html('');
            $.ajax({
                method : 'GET',
                dataType: 'html',
                url : 'filter/kelas/' + $(this).val(),
                success : function(data){
                    $('#namasis').append(data);

                },
                error : function() {
                    $('#namasis').html('Tidak Ada Hasil');
                }

            });         
        });
    });
</script>
 --}}

<form action="{{route('absensi.store')}}" enctype="multipart/form-data" id="myform" method="post">
              {{csrf_field()}}


                                        
                                    

{{-- <form method="GET" action="{{ route('absensi.create') }}" class="" role="search" >
    <label>Nik:</label>
  <div class="input-group custom-search-form">
                                        
        <input type="text" name="search" class="form-control" placeholder="Search ....">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>

    </div>
    
  
</form>
 --}}

            


 <div class="row">
<div class="col-md-3 col-lg-4" >
  <label>Cari Nik</label>
  <input type="text"  class="form-control" placeholder="Cari Nik......" id="searchNik"> 
              
</div>
</div>
      
          

              
            <div class="row md-3">
        {{-- <div class="col-md-3 col-lg-4">
           <div class="form-group {{ $errors->has('id_siswa') ? ' has-error' : '' }}">
              <label class="control-label">Nama Siswa</label> 
              <select  name="id_siswa" id="nama" class="form-select" readonly>
              <option>Pilih Siswa</option>
              
              @foreach($tb_m_siswa as $data)
              <option value="{{ $data->id}}" readonly>{{ $data->nama_lengkap}}</option>
              @endforeach
            
              </select>
              @if ($errors->has('id_siswa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_siswa') }}</strong>
                            </span>
                        @endif
            </div>
        </div>
         --}}
<div class="col-lg-4 col-md-3">
          <div class=" {{$errors->has('') ? 'has-error' : ''}}">
                <label >Nama Siswa</label>
        <input class="form-control" type="text" id="nama" name="" readonly />
                  @if ($errors->has(''))
                  <span class="help-blocks">
                    <strong>{{$errors->first('')}}</strong>
                  </span>
                @endif
              </div>
        </div>

          <div class=" {{$errors->has('id_siswa') ? 'has-error' : ''}}">
        <input class="" type="hidden" id="id" name="id_siswa" readonly />
                  @if ($errors->has('id_siswa'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('id_siswa')}}</strong>
                  </span>
                @endif
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

<script type="text/javascript">
  $(document).ready(function(){

  $('.jss-selectize').selectize({
    sortField: 'text'
  });
});</script>


{{-- <div class="col-md-3 col-lg-4">
          <div class=" {{$errors->has('id') ? 'has-error' : ''}}">
                <label >ID</label>
                <input type="text"  class="form-control" id="id" 
                 name="id" required>
                @if ($errors->has('id'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('id')}}</strong>
                  </span>
                @endif
              </div>
        </div>
 --}}        

        



        {{-- <div class="col-md-3 col-lg-4" >   
          <div class=" {{$errors->has('id_pengajar') ? 'has-error' : ''}}">
                <label >Nama id_pengajar</label>
              <select class="itemName" style="width:500px;" name="id_pengajar"></select>  
              @if ($errors->has('id_pengajar'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('id_pengajar')}}</strong>
                  </span>
                @endif
              </div>
            </div>
 --}}

<div class="col-lg-4 col-md-3">
          <div class=" {{$errors->has('tanggal') ? 'has-error' : ''}}">
                <label >Tanggal</label>
                       <input class="form-control date" type="text" id="dateInput" 
                       onchange="whatsTheDay()" value="{{ carbon\carbon::today()->toDateString() }}" name="tanggal" required>
                       <p id="err"></p>
                  @if ($errors->has('tanggal'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('tanggal')}}</strong>
                  </span>
                @endif
              </div>
        </div>
      </div>          
<div class="row md-3">
<div class="col-lg-4 col-md-3">
          <div class=" {{$errors->has('jam_mulai') ? 'has-error' : ''}}">
                <label >Jam Masuk</label>
        <input class="form-control timepicker" type="time" name="jam_mulai" value="{{ carbon\carbon::now()->format('H:i:s') }}"  id="timeOfCall" required />
                  @if ($errors->has('jam_mulai'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('jam_mulai')}}</strong>
                  </span>
                @endif
              </div>
        </div>


          

<div class="col-lg-4 col-md-3">
          <div class=" {{$errors->has('jam_akhir') ? 'has-error' : ''}}">
                <label >Jam Keluar</label>
        <input class="form-control timepicker" type="time" value="{{ carbon\carbon::now()->format('H:i:s') }}" id="timeOfResponse"  name="jam_akhir" />
                  @if ($errors->has('jam_akhir'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('jam_akhir')}}</strong>
                  </span>
                @endif
              </div>
        </div>

<div class="col-lg-4 col-md-3">
          <div class=" {{$errors->has('selisih_jam') ? 'has-error' : ''}}">
                <label >Selisih Jam</label>
        <input class="form-control timepicker" type="text"  id="delay" name="selisih_jam" readonly />
                  @if ($errors->has('selisih_jam'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('selisih_jam')}}</strong>
                  </span>
                @endif
              </div>
        </div>
</div>
<br>
<div class="row md-3">
           <div class="col-lg-4 col-md-3">
                <button id="submit" onclick="sumitable" type="submit" class="btn btn-primary">Tambah</button>
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
                     <form action="{{route('AbsensiPengajar.store')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Biografi">Biografi</a></li> &nbsp; &nbsp;
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Foto">Foto</a></li> 
</ul>

<div class="tab-content">
  <div id="Biografi" class="tab-pane fade in active">

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
          <div class="col-md-6 col-lg-4 col-xlg-2">
          <div class=" {{$errors->has('ttl') ? 'has-error' : ''}}">
                <label >Tempat Tanggal Lahir</label>
                <input type="text" class="form-control" name="ttl" required>
                @if ($errors->has('ttl'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('ttl')}}</strong>
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
                <label >Alamat/No telepon</label>
                <input type="text" class="form-control"  name="alamat_no_telepon" >
                @if ($errors->has('alamat_no_telepon'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('alamat_no_telepon')}}</strong>
                  </span>
                @endif
              </div>
            </div>
      
<div class="col-md-6 col-lg-4 col-xlg-2">         
          
<div class="form-group {{ $errors->has('id_mapel') ? ' has-error' : '' }}">
              <label class="control-label">Nama Mapel</label> 
              <select  name="id_mapel" class="form-select" >
              <option>Pilih Mapel</option>
              
              @foreach($tb_m_mata_pelajaran as $data)
              <option value="{{ $data->id}}">{{ $data->nama_mata_pelajaran}}</option>
              @endforeach
            
              </select>
              @if ($errors->has('id_mapel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_mapel') }}</strong>
                            </span>
                        @endif
            </div>
            
        </div>  
      </div>
    </div>
<div id="Foto" class="tab-pane fade">
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
      </div>
     
     </div>    
      
      <br>
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
 </body>

{{-- <script >
  $(document).ready(function(){

    function fetch_siswa_data(query = '')
    {
      $.ajax({
        url:"{{ route('searchController.action') }}",
        method:'GET',
        data{query:query},
        dataType:'json'
        success:function(data)
        {
          $('tbody').html(data.tabel_data);
          $('#total_records').text(data.total_data);
        }
      })
    }
  })

</script> --}}


        

</script>  

<script>
    $('.timepicker').datetimepicker({
      
        format: 'HH:mm'


    });
   
    $('.timepicker').datetimepicker({
      
        format: 'HH:mm'
    });

</script>

<script>
   

</script>

<script type="text/javascript">



    $('.date').datepicker({  


       format: 'yyyy/mm/dd'

     });  

</script> 
              
          


 {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 --}}
<script type="text/javascript">
    $('#searchNik').autocomplete({
      source :'{!!URL::route('searchSiswa')!!}',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        $('#nama').val(ui.item.nama);
        $('#id').val(ui.item.id);          
            }
    });
</script>

<script type="text/javascript">
    $('#searchname').autocomplete({
      source :'{!!URL::route('searchPengajar')!!}',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        $('#id').val(ui.item.id).change(ui.item.nama);
    
      }

    });
</script>
{{-- bootstrap-datetimepicker-widget dropdown-menu usetwentyfour bottom --}}
<script>
$(document).ready(function(){
 
 $('.custom').on('change blur mouseover mouseout mouseleave keydown keypress scroll focus resize click keyup mouseenter', function() {
     var timeOfCall = ($('#timeOfCall').val()),
       
        timeOfResponse = ($('#timeOfResponse').val()),
        hours = timeOfResponse.split(':')[0] - timeOfCall.split(':')[0],
        minutes = timeOfResponse.split(':')[1] - timeOfCall.split(':')[1];
        second = timeOfResponse.split(':')[2] - timeOfCall.split(':')[2];
        jam = ' jam ';
        menit = ' menit ';
    
    
    second = second.toString().length<2?'0'+second:second;
    if(second<0){ 
        minutes--;
        second = 60 + second;        
    }
    minutes = minutes.toString().length<2?'0'+minutes:minutes;
    if(minutes<0){ 
        hours--;
        minutes = 60 + minutes;        
    }
    hours = hours.toString().length<2?'0'+hours:hours;
    $('#delay').val(hours + jam+  ':'  + minutes +  menit);

});
});
</script> 










{{-- <script src="includes/jmesa/jquery.min.js">// for OC versions before 3.1.4, use jquery-1.3.2.min.js !</script> --}}


<script type="text/javascript">
  
function calcDiff(){
  var time1= new time ($("#time").val());
  var time1= new time ($("#time").val());

  var timeDIfference = time2.getTime() - time1.getTime();

  var miliSecondInOneSecond =1000;
  var secondInOneMinute =60
  var minuteInOneHour =60;

  var hour= timeDIfference/(miliSecondInOneSecond * secondInOneMinute * minuteInOneHour);
  alert(hour);
}

</script>

<script lang="Javascript">
$.noConflict();
jQuery(document).ready(function($){
  //find out who's who
  var fieldTimeField1 = ($("#TimeField1").parent().parent().find('input'));
  var fieldTimeField2 = ($("#TimeField2").parent().parent().find("input"));
  var fieldDifference = $("#Difference").parent().parent().find("input");

  function calculateMinutes(fieldTimeField){
    // retrieve values
    var TimeAsText = fieldTimeField.val();
    // check if field is filled
    if (TimeAsText!=""){
      // split and determine hours and minutes
      var splitString = TimeAsText.split(":");
      var hours = splitString[0];
      var minutes = splitString[1];
      return (60*hours) + (1*minutes);
    }
  }

  function calculateDifference(){
    var Diff = calculateMinutes(fieldTimeField2) - calculateMinutes(fieldTimeField1);
    if (fieldDifference.val() != Diff){
      fieldDifference.val(Diff);
      fieldDifference.change();
    }
  }
  // fire when anything is entered 
  fieldTimeField1.keyup(function(){
    calculateDifference();
  });
  fieldTimeField2.keyup(function(){
    calculateDifference();
   });
});
</script>













{{-- <script type="text/javascript">


      $('.itemName').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '/dataAjax',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.nama,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });


</script>
 --}}

<script type="text/javascript">
  function whatsTheDay() {
var inDat = document.getElementById('dateInput').value;
var inDate = new Date(inDat)
    if(inDate.getDay() == 0){ 
// 0 = sunday , 1 = monday ..etc
//alert('sunday');
// do any thing
document.getElementById('submit').disabled = true;
document.getElementById('submit').value = 'disabled';
document.getElementById('err').innerHTML ='Hari Minggu Libur'
}else{
//alert('not sunday');
document.getElementById('submit').value = 'submit';
document.getElementById('err').innerHTML = 'Hari ini ada Absensi';
document.getElementById('submit').disabled = false;
}
}

 function sumitable(){
var inDate = document.getElementById('dateInput').valueAsDate;
if(inDate.getDay() != 0){
document.forms["myform"].submit();
}
}
</script>

<style type="text/css">
  input{
display:block;
margin:10px;
width:200px;
border-radius:15px 0 15px 0;
border:none;
padding:5px;
border:solid 2px green;
font-size:18px;
color:green;
}
input#submit{
background:gold;
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   
<script src="{{ asset('filter/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#namasis').change(function() {
            $('#user').html('');
            $.ajax({
                method : 'GET',
                dataType: 'html',
                url : 'filter/user/' + $(this).val(),
                success : function(data){
                    $('#user').append(data);
                },
                error : function() {
                    $('#user').html('Tidak Ada Hasil');
                }

            });         
        });
        $('#class').change(function() {
            $('#name').html('');
            $.ajax({
                method : 'GET',
                dataType: 'html',
                url : 'filter/user/' + $(this).val(),
                success : function(data){
                    $('#name').append(data);
                },
                error : function() {
                    $('#name').html('Tidak Ada Hasil');
                }

            });         
        })
    });
</script>

{{-- Start time: <input type="text" id="diff_time1" value=""><br>
End time: <input type="text" id="diff_time2" value=""><br>
<div id="diff_output"></div>

<script type="text/javascript" src="js/ng_all.js"></script>
<script type="text/javascript" src="js/ng_ui.js"></script>
<script type="text/javascript" src="js/components/timepicker.js"></script>

<script type="text/javascript">
ng.ready( function() {
    ng.ready(function(){
        var tmpkr1 = new ng.TimePicker({
            input: 'diff_time1',
            events: {
                onSelect: calc_diff,
                onUnselect: calc_diff
            }
        });
        var tmpkr2 = new ng.TimePicker({
            input: 'diff_time2',
            events: {
                onSelect: calc_diff,
                onUnselect: calc_diff
            }
        });
        
        function calc_diff(){
            // getting the selected time values
            // value is a timestamp of the selected date
            // or null
            var tm1 = tmpkr1.p.value;
            var tm2 = tmpkr2.p.value;
            
            if ((!ng.defined(tm1)) || (!ng.defined(tm2))) {
                ng.get('diff_output').innerHTML = '';
                return;
            }
            
            var dif = Math.abs(tm1 - tm2); // difference in milliseconds
            var seconds = Math.round(dif/1000);
            var minutes = 0, hours = 0;
            if (seconds > 60) {
                minutes = Math.floor(seconds / 60);
                seconds = seconds - (minutes * 60);
            }
            if (minutes > 60){
                hours = Math.floor(minutes / 60);
                minutes = minutes - (hours * 60);    
            }
            
            var output = '';
            if (hours > 0) output = hours +' hours, ';
            if ((hours > 0) || (minutes > 0)) output += minutes+' minutes and ';
            output += seconds + ' seconds';
            
            ng.get('diff_output').innerHTML = output;
        };
    });
});
</script> --}} 



@endsection
