@extends('layouts.admin')
@section('content')

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SISTEM ABSENSI REAL TIME</title>

     <!-- Core CSS - Include with every page -->
    <link href="/cesese/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    {{-- Page-Level Plugin CSS - Tables --}}
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>    
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>


<link href="/cesese/test.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  


    <!-- SB Admin CSS - Include with every page -->
    {{-- <link href="/cesese/sb-admin.css" rel="stylesheet"> --}}

</head>

<body>

        <div class="col-md-12">
                <div class="table-responsive">
<div class="row">
    <div class="container">
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Absensi</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Absensi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<br>
          <a class="btn btn-secondary" href="{{ route('absensi.create') }}"><i class="mdi mdi-plus"></i>Tambah data Absensi</a>
          

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<div class="col-md-auto col-lg-auto  float-left" >
  <form method="GET" action="absensi" class="" role="search" >
  <div class="input-group custom-search-form">
                                        
        <input type="text" name="search" class="form-select" placeholder="Search Nik....">
        <span class="group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>

    </div><br>
<ul class="nav nav-tabs">
  <a data-toggle="collapse" href="#collapse1">Cari Tanggal</a>
</ul>
<br>
<div id="collapse1" class="panel-collapse collapse">
  
    
      <div class="row md-3">
        
        <div class="col-md-6 col-lg-6 col-xlg-2">
      
      <label>Dari Tanggal</label>
      <input type="text" id="time" value="{{ carbon\carbon::createFromDate(2018, 1, 1)->toDateString()}}" 
      class="form-select date" name="a" required="">
        </div>

        <div class="col-md-6 col-lg-6 col-xlg-2">
      <label>Sampai Tanggal</label>
      <input type="text" id="time2" value="{{ carbon\carbon::tomorrow()->toDateString()}}" 
      class="form-select date" name="b" required="">
        </div> 
      </div>
      <br>
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
           Submit
          </button>
        </span>
  </form>
</div>
</div>
  


                              <div class="panel-body">
 
                            <div class="table-responsive">


 
  
                            <div class="well">

                                <table class="table table-striped table-bordered table-hover">
  
<tr>
  <td class="success" colspan="50%" >Nama</td>
  <?php $header = null ?>
  <td class="text-center" colspan="50%"  > @foreach($tb_m_absensi as $data  ) 
       @if ($header != $data->tb_m_siswa->nama_lengkap)
           <b>{{ $data->tb_m_siswa->nama_lengkap }}</b><br>
           <?php $header = $data->tb_m_siswa->nama_lengkap ?>
       @endif
                                          @endforeach
                                          </td>
  

<td class=" success" colspan="50%">Bulan</td>
  <?php $header = null ?>
  <?php  setlocale(LC_TIME, 'es_ES'); ?>

   <td class="text-center" colspan="50%"> @foreach($tb_m_absensi as $data  )
               @if ($header != Date::parse($data->tanggal)->format('M') )
                 <li> <b>{{ Date::parse($data->tanggal)->format('M')  }}</b></li><br>
                  <?php $header = Date::parse($data->tanggal)->format('M')  ?>
              @endif
   


            @endforeach
 </td>
  {{-- <td class=" success" colspan="50%" rowspan="2">Grade</td>
  <td class="text-center" colspan="50%" rowspan="2"></td>
  --}}
</tr>

{{-- <tr>
  <td  class=" success" colspan="50%">Pembayaran Tanggal</td>
  <td class="text-center" colspan="50%" id="id"></td>
</tr>
 --}}
{{-- <tr>
  <td  class=" success" colspan="50%">Nama admin</td>
  <td class="text-center" colspan="50%"></td>
  
</tr>
 --}}
{{-- <tr>
  <td class=" success" colspan="50%">Keterangan</td>
   <td class="text-center" colspan="50%"></td>
</tr>
 --}}

</table>

   <table class="table table-striped table-bordered table-hover">
  

<tr>
<td class="success " rowspan="2" >Detail</td>
<td colspan="100%" class="text-center success">Pertemuan</td>
</tr>
@php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp
<tr>
@php $no = 1; @endphp
@foreach($tb_m_absensi as $data)
  <td class="text-center">{{ $no++ }}</td>
@endforeach
</tr>
<tr>
  <td class="">Hari</td>
@foreach($tb_m_absensi as $data)
  <td class="text-center">{{Date::parse($data->tanggal)->format('D')}}</td>
@endforeach
   </tr>
<tr><td  class="">Tanggal</td>
@foreach($tb_m_absensi as $data)
  <td class="text-center">
      {{Date::parse($data->tanggal)->format('d,M Y')}}</td>
@endforeach

</tr>
<tr><td  class="">Jam Mulai</td>
@foreach($tb_m_absensi as $data)
  <td class="text-center">{{Date::parse($data->jam_mulai)->format('H:i') }}</td>
@endforeach
</tr>
<tr><td  class="">Jam Keluar</td>
@foreach($tb_m_absensi as $data)
  <td class="text-center">{{Date::parse($data->jam_akhir)->format('H:i') }}</td>
@endforeach
</tr>
<tr><td  class="">Lama Mengajar</td>
@foreach($tb_m_absensi as $data)
  <td class="text-center">{{Date::parse($data->selisih_jam)->format('H:i') }} menit</td>
@endforeach
</tr>

<tr><td  class="">Pengajar</td>
@foreach($tb_m_absensi as $data)
  <td class="text-center">{{$data->tb_m_pengajar->nama }}</td>
@endforeach
</tr>

<tr ><td class="">Action</td>
{{-- @foreach($tb_m_absensi as $data)
<td class="text-center">
                       
            <a class="btn btn-primary" href="{{route('absensi.edit',$data->id)}}"><i class="mdi mdi-pencil"></i>edit</a>
               </td>
               
@endforeach
 --}}            
@foreach($tb_m_absensi as $data)

               <td class="text-center">
<div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item text-primary" href="{{route('absensi.edit',$data->id)}}"><i class="mdi mdi-pencil"></i>edit</a>
    <a class="dropdown-item text-danger" onclick="deleteAbsensi('{{$data->id}}')" href="#"><i class="mdi mdi-delete"></i>Delete</a>
  </div>
</div>
              {{-- <button onclick="deleteAbsensi('{{$data->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i>Delete</button>
              &nbsp; 
 --}}
                        </td>
@endforeach
</tr>

</table>

{{ $tb_m_absensi->appends(request()->input())->links() }}</body>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</html>


                  
              </div>
            </div>  
        </div>
    
<script type="text/javascript">
    $('#searchNik').autocomplete({
      source :'{!!URL::route('searchSiswa')!!}',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        $('#nama').text(ui.item.nama),
        $('#id').text(ui.item.id);          
      }
    });
</script>

<script>
    $('#time').datetimepicker({
        format: 'YYYY/MM/DD'
    });
    $('#time2').datetimepicker({
        format: 'YYYY/MM/DD'
    });
</script>

<script type="text/javascript">



    $('.date').datepicker({  


       format: 'yyyy/mm/dd'

     });  

$('.sa-remove').click(function () {
            var postId = $(this).data('id'); 
            swal({
                title: "are u sure?",
                text: "lorem lorem lorem",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(){
                window.location.href = "your-url/" + postId;
            }); here
</script>


<script type="text/javascript">
function deleteAbsensi(id){
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
               url:'<?php echo url("delete-absensi"); ?>/'+id,
               success:function(data){
                  location.reload();
                                      }
            });
       
    }else {
        swal("Cancel", "Absensi ini tidak jadi di hapus.", "error");
    }
});
}
</script>


                    
   


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