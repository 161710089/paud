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


    <!-- SB Admin CSS - Include with every page -->
    {{-- <link href="/cesese/sb-admin.css" rel="stylesheet"> --}}

</head>

<body>

<div class="row">
    <div class="container">
        <div class="col-md-12">
          <a class="btn btn-secondary" href="{{ url('admin/export_excel') }}"><i class="mdi mdi-plus"></i>Tambah data Absensi</a>
          
                <div class="table-responsive">

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<div class="col-md-3 col-lg-custom  float-left" >
  <form method="GET" action="absensi" class="" role="search" >
  <div class="input-group custom-search-form">
                                        
        <input type="text" name="search" class="form-select" placeholder="Search Nik....">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>

    </div>

  
</form>
  
</div>

                              <div class="panel-body">
 
                            <div class="table-responsive">


 
  
                            <div class="well">

                                <table class="table table-striped table-bordered table-hover">
  
<tr>
  <td class="success" colspan="50%" >Nama</td>
  <?php $header = null ?>
  <td class="text-center" colspan="50%"  > @foreach($absensi as $data  ) 
       @if ($header != $data->tb_m_siswa->nama_lengkap)
           <b>{{ $data->tb_m_siswa->nama_lengkap }}</b><br>
           <?php $header = $data->tb_m_siswa->nama_lengkap ?>
       @endif
                                          @endforeach
                                          </td>
  

<td class=" success" colspan="50%">Bulan</td>
  <?php $header = null ?>
  <?php  setlocale(LC_TIME, 'es_ES'); ?>

   <td class="text-center" colspan="50%"> @foreach($absensi as $data  )
               @if ($header != Carbon\Carbon::parse($data->tanggal)->format('M') )
                 <li> <b>{{ Carbon\Carbon::parse($data->tanggal)->format('M')  }}</b></li><br>
                  <?php $header = Carbon\Carbon::parse($data->tanggal)->format('M')  ?>
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
<tr>
  <td class=" success" colspan="50%">Keterangan</td>
   <td class="text-center" colspan="50%"></td>
</tr>


</table>

   <table class="table table-striped table-bordered table-hover">
  

<tr>
<td class="success " rowspan="2" >Detail</td>
<td colspan="100%" class="text-center success">Pertemuan</td>
</tr>

<tr>
@php $no = 1; @endphp
@foreach($absensi as $data)
  <td class="text-center">{{ $no++ }}</td>
@endforeach
</tr>
<tr>
  <td class="">Hari</td>
@foreach($absensi as $data)
  <td class="text-center">{{Carbon\Carbon::parse($data->tanggal)->format('D')}}</td>
@endforeach
   </tr>
<tr><td  class="">Tanggal</td>
@foreach($absensi as $data)
  <td class="text-center">
      {{Carbon\Carbon::parse($data->tanggal)->format('d,M Y') }}</td>
@endforeach

</tr>
<tr><td  class="">Jam Mulai</td>
@foreach($absensi as $data)
  <td class="text-center">{{$data->jam_mulai }}</td>
@endforeach
</tr>
<tr><td  class="">Jam Keluar</td>
@foreach($absensi as $data)
  <td class="text-center">{{$data->jam_akhir }}</td>
@endforeach
</tr>
<tr><td  class="">Pengajar</td>
@foreach($absensi as $data)
  <td class="text-center">{{$data->tb_m_pengajar->nama }}</td>
@endforeach
</tr>
</table>

{{ $absensi->links() }}</body>

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






                    
   


 @endsection
