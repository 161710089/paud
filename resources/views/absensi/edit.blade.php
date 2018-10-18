@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
 <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
 
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
      {{-- <script src="//code.jquery.com/jquery-1.10.1.min.js"></script> --}}

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        {{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> --}}
          
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Edit Absensi</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('absensi.index') }}">Absensi</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Absensi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<br>             
                                    

            
<form action="{{ route('absensi.update',$tb_m_absensi->id) }}" method="post" enctype="multipart/form-data" >
			  		<input name="_method" type="hidden" value="PATCH">
			  		{{ csrf_field() }}

 
      
          <form action="{{route('absensi.update',$tb_m_absensi->id)}}" enctype="multipart/form-data" method="post">
          	<input type="hidden" name="_method" value="PATCH">
              {{csrf_field()}}


<div class="row">
<div class="col-md-3 col-lg-4" >
  <label>Cari Nik</label>
  <input type="text"  class="form-control" placeholder="Cari Nik......" id="searchNik"> 
              
</div>
</div>
              
            <div class="row md-3">
        <div class="col-lg-4 col-md-3">
          <div class=" {{$errors->has('') ? 'has-error' : ''}}">
                <label >Nama Siswa</label>
        <input class="form-control" type="text" id="nama" value="{{ $tb_m_absensi->tb_m_siswa->nama_lengkap }}" name="" readonly />
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

<div class="form-group {{ $errors->has('id_pengajar') ? ' has-error' : '' }}">
              <label class="control-label">Nama Pengajar</label> 
              <select name="id_pengajar" class="jss-selectize " >
                
                @foreach($tb_m_pengajar as $data)
                <option value="{{ $data->id }} " 
                	{{$selectpengajar == $data->id ? 'selected="selected"':'' }}>{{ $data->nama}} 
</option>
                @endforeach
              </select>
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



<div class="col-lg-4 col-md-3">
          <div class=" {{$errors->has('tanggal') ? 'has-error' : ''}}">
                <label >Tanggal</label>
                       <input class="form-control date" type="text" value="{{ $tb_m_absensi->tanggal }}" name="tanggal" required>
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
        <input class="form-control" type="time" name="jam_mulai" value="{{ $tb_m_absensi->jam_mulai }}" placeholder="HH-MM-SS"  id="timeOfCall" required />
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
        <input class="form-control" type="time" id="timeOfResponse" value="{{ $tb_m_absensi->jam_akhir }}" name="jam_akhir" />
                  @if ($errors->has('jam_akhir'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('jam_akhir')}}</strong>
                  </span>
                @endif
              </div>
        </div>

<div class="col-lg-4 col-md-3">
          <div class=" {{$errors->has('selisih_jam') ? 'has-error' : ''}}">
                <label >selisih_jam</label>
        <input class="form-control" type="text" value="{{$tb_m_absensi->selisih_jam}}" id="delay" name="selisih_jam" readonly />
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
                <button type="submit" class="btn btn-primary">Edit</button>
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


        <script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
<script type="text/javascript">

    $('.timepicker').datetimepicker({

        format: 'HH:mm:ss'

    }); 

</script>  

<script>
    $('.timeOfCall').datetimepicker({
      
        format: 'HH:mm:ss'
    });
   
    $('.timeOfResponse').datetimepicker({
      
        format: 'HH:mm:ss'
    });

</script>

<script>
   

</script>

<script type="text/javascript">



    $('.date').datepicker({  


       format: 'yyyy-mm-dd'

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

<script>
$(document).ready(function(){
$("input").keyup(function(){
    var timeOfCall = ($('#timeOfCall').val()),
       
        timeOfResponse = ($('#timeOfResponse').val()),
        hours = timeOfResponse.split(':')[0] - timeOfCall.split(':')[0],
        minutes = timeOfResponse.split(':')[1] - timeOfCall.split(':')[1];
    
    if (timeOfCall <= "12:00:00" && timeOfResponse >= "13:00:00"){
      a = 1;
    } else {
      a = 0;
    }
    minutes = minutes.toString().length<2?'0'+minutes:minutes;
    if(minutes<0){ 
        hours--;
        minutes = 60 + minutes;        
    }
    hours = hours.toString().length<2?'0'+hours:hours;
   
    $('#delay').val(hours-a+ ':' + minutes);
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
</script> --}} @endsection

