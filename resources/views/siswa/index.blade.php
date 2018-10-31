<!DOCTYPE html>
<html>
<head>
@extends('layouts.admin')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Siswa </title>
    @endforeach

             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Siswa</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
         
@if(session()->has('flash_notification.message'))
<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {!! session()->get('flash_notification.message') !!}
</div>
@endif

                                    
  {{-- <div class="col-md-3 col-lg-auto float-right" >
<form method="GET" action="siswa" class="" role="search" >
    <label>Cari Nik:</label>
  <div class="input-group custom-search-form">
                                        
        <input type="text" name="search" class="form-control" placeholder="Search ....">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>

    </div>
</form>
    <ul class="nav nav-tabs">
  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Cari Data Lain</a></li>
  <div class="dropdown-menu">
                                          <a class="dropdown-item form-control" href="#">
                                            <form method="GET" action="siswa" class="form-control" role="search" >
                                                  <label>Cari Nik:</label>
                                                <div class="input-group custom-search-form">
                                                     <input type="text" name="search" class="form-control" placeholder="Search ....">
                                                     <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-default-sm">
                                                          <i class="fa fa-search"></i>
                                                        </button>
                                                     </span>

                                                  </div>
                                              </a>
                                            </form>
                                          <a class="dropdown-item form-control " href="#">Another action</a>
                                          <a class="dropdown-item form-control" href="#">Something else here</a>
                                         
</div>
</a>                                
</ul>
 </div> 
  </div>
</div>
 --}}
      <div class="col-md-3 col-lg-3  float-right" >
        <form method="GET" action="siswa" class="form-control" role="search" >
          <label>Cari Nik:</label>
          <div class="input-group custom-search-form">
            <input type="text" name="search" class="form-select" placeholder="Search ....">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default-sm">
                <i class="fa fa-search"></i>
                </button>
              </span>
          </div>

      <ul class="nav nav-tabs">
    <a data-toggle="collapse" href="#collapse1">Cari data lain</a>
      </ul>
        </form>
 
      <div id="collapse1" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item">
        <form method="GET" action="{{ Route('nama_panggilan') }}" class="" role="search" >
          <label>Nama Panggilan</label>
          <div class="input-group custom-search-form">
            <input type="text" name="search" class="form-select" placeholder="Search....">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default-sm">
                <i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>

          </li>
          <li class="list-group-item">
        <form method="GET" action="{{ Route ('tanggal_lahir') }}" class="" role="search" >
          <label>Tanggal Lahir</label>
          <div class="input-group custom-search-form">
            <input type="text" name="search" class="form-select" placeholder="Search....">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default-sm">
                <i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>

          </li>
          <li class="list-group-item">
        <form method="GET" action="alamat" class="" role="search" >
          <label>Alamat</label>
          <div class="input-group custom-search-form">
            <input type="text" name="search" class="form-select" placeholder="Search ....">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default-sm">
                <i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>
          </li>
      
      <div class="panel-footer">Footer</div>
        </ul>
      </div>
        </div>

        <div class="panel-heading"><a class="btn btn-secondary"  href="{{ route('siswa.create') }}"><i class="mdi mdi-plus"></i> Tambah data Siswa</a> 
        </div>

           @if(Session::has('success'))
   <div class="alert alert-success">
     {{ Session::get('success') }}
   </div>
@endif

        <br>
        <div class="row">
          <table id="zero_config">
          @foreach($tb_m_siswa as  $data)   
          <div class="col-md-4 col-lg-auto col-xlg-3">
            <div class="card card-hover" id="search">
              <div class="box bg-light ">
                <h1 class="font-light text-black text-center"><img class="img-circle" src="{{ asset('img/Fotosiswa/'.$data->foto) }}" style="min-height:175px; min-width:185px;   max-height:175px; max-width:185px; margin-top:7px;">
                </h1>
                <a href="{{ route('siswa.show',$data->id) }}"><h6 class="text-black text-center">{{ $data->nama_lengkap }}</h6></a>             
                <div>
                  <h6 class="text-black text-center"> {{ $data->nik }}</h6>
                </div>
                <div>
                <h6 class="text-black text-center"> {{ $data->ttl }}</h6>
                
                </div>
              </div>
            </div>
          </div>  
          @endforeach
        </table>
      </div>

{{ $tb_m_siswa->links() }}
          
{{-- {!! $data->render !!}

@endif                    

</div>
</div>
<script type="text/javascript">
  $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
      type:'get',
      url:'{{URL::route('search')}}',
      data: {'search':$value},
      success:function(data){
        $('tbody').html(data);
        console.log(data);
      }
    });
  })

</script>


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



</body>
</html>

@endsection
