



@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
      
    </script>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    
    @foreach($sekolahs as $data)
    <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Abensi |Edit </title>
    @endforeach


<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

{{-- Clock Picker --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/clocklet@0.2.3/css/clocklet.css">
  
<body>
    <script src="https://cdn.jsdelivr.net/npm/clocklet@0.2.3/umd/clocklet.js">
</script>
<style>
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
</body>
{{--End Clock Picker --}}

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

<form action="{{ route('absensi.update',$tb_m_absensi->id) }}" method="post" enctype="multipart/form-data" >
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}


                                        
                                    

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
          <div class=" {{$errors->has('id_siswa') ? 'has-error' : ''}}">
                <label >Nama Siswa</label>
        <input class="form-control" type="text" id="nama" value="{{ $tb_m_absensi->tb_m_siswa->nama_lengkap }}" name="" readonly />
                  @if ($errors->has('id_siswa'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('id_siswa')}}</strong>
                  </span>
                @endif
              </div>
        </div>

          
        <input class="" type="hidden" id="id" value="{{ $tb_m_absensi->tb_m_siswa->id }}" name="id_siswa" readonly />
                  


<div class="col-md-3 col-lg-4">

<div class=" {{ $errors->has('id_pengajar') ? ' has-error' : '' }}">
              <label class="control-label">Nama Pengajar</label> 
   <div class="input-group">

              <select name="id_pengajar" class="jss-selectize" >
                
                @foreach($tb_m_pengajar as $data)
                <option value="{{ $data->id }}"{{$selectpengajar == $data->id ? 'selected="selected"':'' }}>{{ $data->nama}}</option>
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
                       onchange="whatsTheDay()" value="{{$tb_m_absensi->tanggal}}" name="tanggal" required>
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
        <input  class="form-control timepicker" type="time" name="jam_mulai" value="{{ $tb_m_absensi->jam_mulai }}"  id="timeOfCall" required />
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
        <input  class="form-control timepicker" type="time" value="{{ $tb_m_absensi->jam_akhir }}" id="timeOfResponse"  name="jam_akhir" />
                  @if ($errors->has('jam_akhir'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('jam_akhir')}}</strong>
                  </span>
                @endif
              </div>
        </div>

<div class="col-lg-4 col-md-3">
          <div class=" {{$errors->has('selisih_jam') ? 'has-error' : ''}}">
                <label >Lama Pelajaran</label>
        <input class="form-control timepicker" type="text" value="{{ $tb_m_absensi->selisih_jam }}"  id="delay" name="selisih_jam" readonly />
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
      
        format: 'HH:mm:ss'


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
 
 $('input,body,html,div,span,.page-wrapper,.custom')
  .on('load change blur mouseover mouseout mouseleave keydown keypress scroll focus resize click keyup mouseenter', function() {
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
    if (timeOfCall <= timeOfResponse) {

    hours = hours.toString().length<2?'0'+hours:hours;
    $('#delay').val(hours + jam+  ':'  + minutes +  menit);
    
    }
    else
      $('#delay').val(00 + jam+  ':'  + 00 +  menit);
    

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

