@extends('layouts.admin')
@section('content')

{{-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script> --}}
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

               <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">pendapat</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard')  }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">pendapat</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<br>
    <div class="panel panel-succes">
      @if(session()->has('flash_notification.message'))
<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {!! session()->get('flash_notification.message') !!}
</div>
@endif


    


</div>

                                        
                                    
<div class="col-md-3 col-lg-auto  float-right" >

<form method="GET" action="pendapat" class="form-control" role="search" >
    <label>Cari Nama:</label>
  <div class="input-group custom-search-form">
                                        
        <input type="text" name="search" class="form-select" placeholder="Search ....">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>

    </div>
    

  
</form>

                                

{{-- <div class="col-md-3 col-lg-auto  float-right" >
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
    <ul class="nav nav-tabs">
  <a data-toggle="tab" href="#home">Cari Data Lain</a></li>
  
</ul>

  
</form>


<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
  <form method="GET" action="nama_panggilan" class="form-control" role="search" >
      
    <div class="input-group custom-search-form">
      <input type="text" name="search" class="form-control" placeholder="Cari Nama Panggilan ....">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>
  </div>
</form>

<form method="GET" action="ttl" class="form-control" role="search" >
        
    <div class="input-group custom-search-form">
      <input type="text" name="search" class="form-control" placeholder="Cari Tanggal Lahir ....">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>
  </div>
</form>

<form method="GET" action="siswa" class="form-control" role="search" >
        
    <div class="input-group custom-search-form">
      <input type="text" name="search" class="form-control" placeholder="Cari Alamat ....">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>
  </div>
</form>
 </div>
</div> 
 --}}</div> 
            

        <div class="panel-heading"><a class="btn btn-secondary"  href="{{ route('pendapat.create') }}"><i class="mdi mdi-plus"></i> Tambah data pendapat</a> 
        </div>
{{-- @if(count($tb_m_pendapat)>0) 
        <br><br><br><br><br>
<center>
    <h3><b><i>Maaf Tidak ada Siswa yang ditemukan </i></b></h3>
<a class="btn btn-primary" href="{{url()->previous()}}">Kembali</a>

</center>
@endif
 --}}
      <br>
<div class="row">
<table id="zero_config">
@foreach($tb_m_pendapat as  $data)
						
					</span></h3>
					<div class="col-md-4 col-lg-auto col-xlg-3">
                        <div class="card card-hover" id="myTable">
                            <div class="box bg-light ">
                                <h1 class="font-light text-black text-center"><img class="img-circle" src="{{ asset('img/Fotopendapat/'.$data->foto) }}" style="min-height:175px; min-width:185px;   max-height:175px; max-width:185px; margin-top:7px;"></h1>
                               <a href="{{ route('pendapat.show',$data->id) }}"><h6 class="text-black text-center">{{ $data->nama }}</h6></a>
                               
                                <div>
                               <h6 class="text-black text-center"> {{ $data->nama }}</h6>
                            	</div>
                            </div>

                            </div>
                        </div>
                    </div>

                    
@endforeach
</table>
{{-- {!! $data->render !!}

@endif --}}                    </div>
        {{-- {{ $tb_m_pendapat->appends(request()->input())->links() }}   --}}


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



@endsection
