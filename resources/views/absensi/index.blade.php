@extends('layouts.admin')
@section('content')

@extends('layouts.admin')
@section('content')
<!DOCTYPE HTML>
<html>
  <head>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
  </head>
  <body  onclick="sum()" onmouseout="sum()" onmouseover="sum()">
    <div id="datetimepicker" class="input-append date">
      <label>Jam Masuk</label>
      <input type="time" id="timeOfCall"></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar" style="position:relative; bottom:5px;"></i>
      </span>
    </div><br>
    <div id="datetimepicker2" class="input-append date">
      <label>Jam Keluar</label>
      <input type="time" id="timeOfResponse" onmouseout="sum()" onmouseover="sum()"></input>
      <span class="add-on" id="jam"  onclick="sum()" onmouseout="sum()" onmouseover="sum()">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar" style="position:relative; bottom:5px;" onmouseout="sum()" onmouseover="sum()"></i>
      </span>
    </div><br>
    <!-- <button type="submit" id="btn" class="btn btn-sm btn-default">Submit</button> -->
    <div>
      <label>Lama Jam Pelajaran</label>
      <input type="text" id="jam_pelajaran"><br><i>--<b>NaN = tak terdefinisi </b> (jam keluar/masuk belum diisi)--</i>
    </div>
  </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

      <script type="text/javascript"
       src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
      </script>
      <script type="text/javascript"
       src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
      </script>
      <script type="text/javascript"
       src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
      </script>
      <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'hh:mm:ss',
         pickDate: false
      });
      $('#datetimepicker2').datetimepicker({
        format: 'hh:mm:ss',
         pickDate: false
      });

      function sum(){
      var timeOfCall = $('#timeOfCall').val(),
          timeOfResponse = $('#timeOfResponse').val(),
       hours = timeOfResponse.split(':')[0] - timeOfCall.split(':')[0],
          minutes = timeOfResponse.split(':')[1] - timeOfCall.split(':')[1];

      minutes = minutes.toString().length<2?'0'+minutes:minutes;
      if(minutes<0){
          hours--;
          minutes = 60 + minutes;
      }

      hours = hours.toString().length<2?'0'+hours:hours;

     var t = hours  + ' jam ' + minutes + ' menit';
      document.getElementById("jam_pelajaran").value=t;
  }



        // $("#timeOfResponse".val()){
        //   document.getElementById("delay").innerHTML=t;
        // }

      </script>
<html>

@endsection
{{-- 
@extends('layouts.admin')
@section('content')
<!DOCTYPE HTML>
<html>
  <head>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
  </head>
  <body  onclick="sum()" onmouseout="sum()" onmouseover="sum()">
    <div id="datetimepicker" class="input-append date">
      <label>Jam Masuk</label>
      <input type="time" id="timeOfCall"></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar" style="position:relative; bottom:5px;"></i>
      </span>
    </div><br>
    <div id="datetimepicker2" class="input-append date">
      <label>Jam Keluar</label>
      <input type="time" id="timeOfResponse" onmouseout="sum()" onmouseover="sum()"></input>
      <span class="add-on" id="jam"  onclick="sum()" onmouseout="sum()" onmouseover="sum()">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar" style="position:relative; bottom:5px;" onmouseout="sum()" onmouseover="sum()"></i>
      </span>
    </div><br>
    <!-- <button type="submit" id="btn" class="btn btn-sm btn-default">Submit</button> -->
    <div>
      <label>Lama Jam Pelajaran</label>
      <input type="text" id="jam_pelajaran"><br><i>--<b>NaN = tak terdefinisi </b> (jam keluar/masuk belum diisi)--</i>
    </div>
  </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

      <script type="text/javascript"
       src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
      </script>
      <script type="text/javascript"
       src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
      </script>
      <script type="text/javascript"
       src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
      </script>
      <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'hh:mm:ss',
         pickDate: false
      });
      $('#datetimepicker2').datetimepicker({
        format: 'hh:mm:ss',
         pickDate: false
      });

      function sum(){
      var timeOfCall = $('#timeOfCall').val(),
          timeOfResponse = $('#timeOfResponse').val(),
       hours = timeOfResponse.split(':')[0] - timeOfCall.split(':')[0],
          minutes = timeOfResponse.split(':')[1] - timeOfCall.split(':')[1];

      minutes = minutes.toString().length<2?'0'+minutes:minutes;
      if(minutes<0){
          hours--;
          minutes = 60 + minutes;
      }

      hours = hours.toString().length<2?'0'+hours:hours;

     var t = hours  + ' jam ' + minutes + ' menit';
      document.getElementById("jam_pelajaran").value=t;
  }



        // $("#timeOfResponse".val()){
        //   document.getElementById("delay").innerHTML=t;
        // }

      </script>
<html>

@endsection --}}