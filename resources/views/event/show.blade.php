@extends('layouts.admin')
@section('content')

	<div class="row">
		<div class="container">

 	@foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Event | Show </title>
    @endforeach


<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Show event</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('event.index') }}">event</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Show event</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						

					</div>
					<div class="panel-body">
			<div class="row mb-3">
			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('judul') ? 'has-error' : ''}}">
								<label >Judul</label>
								<input type="text" value="{{ $tb_m_event->judul }}" class="form-control"  name="judul" readonly>
								@if ($errors->has('judul'))
									<span class="help-blocks">
										<strong>{{$errors->first('judul')}}</strong>
									</span>
								@endif
							</div>
				</div>		
				<div class="col-md-6 col-lg-4 col-xlg-3">		
					<div class=" {{$errors->has('Pengajar') ? 'has-error' : ''}}">
								<label >Nama Pengajar</label>
								<input type="text" value="{{ $tb_m_event->tb_m_pengajar->nama }}" class="form-control" name="Pengajar" readonly>
								@if ($errors->has('Pengajar'))
									<span class="help-blocks">
										<strong>{{$errors->first('Pengajar')}}</strong>
									</span>
								@endif
							</div>
				</div>
 	
			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('alamat') ? 'has-error' : ''}}">
								<label >alamat</label>
								<input type="text" value="{{ $tb_m_event->alamat }}" class="form-control" name="alamat" readonly>
								@if ($errors->has('alamat'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat')}}</strong>
									</span>
								@endif
							</div>
				</div>
  			</div>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('waktu') ? 'has-error' : ''}}">
								<label >waktu</label>
								<input type="text" value="{{ $tb_m_event->waktu }}" class="form-control"  name="waktu" readonly>
								@if ($errors->has('waktu'))
									<span class="help-blocks">
										<strong>{{$errors->first('waktu')}}</strong>
									</span>
								@endif
					</div>
				</div>		
				<div class="col-md-6 col-lg-4 col-xlg-3">		
					<div class=" {{$errors->has('waktu_selesai') ? 'has-error' : ''}}">
								<label >Nama waktu_selesai</label>
								<input type="text" value="{{ $tb_m_event->waktu_selesai }}" class="form-control" name="waktu_selesai" readonly>
								@if ($errors->has('waktu_selesai'))
									<span class="help-blocks">
										<strong>{{$errors->first('waktu_selesai')}}</strong>
									</span>
								@endif
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xlg-3">		
					<div class=" {{$errors->has('ruangan') ? 'has-error' : ''}}">
								<label >Nama ruangan</label>
								<input type="text" value="{{ $tb_m_event->ruangan }}" class="form-control" name="ruangan" readonly>
								@if ($errors->has('ruangan'))
									<span class="help-blocks">
										<strong>{{$errors->first('ruangan')}}</strong>
									</span>
								@endif
					</div>
				</div>
			</div>

  <div class="row">
	<div class="col-md-12 col-lg-12 col-xlg-12 text-center">	
	<label><h3>Foto</h3></label>
  	</div>
  </div>
  <div class="row">
	<div class="col-md-12 col-lg-12 col-xlg-12 text-center">	
	<img src="{{ asset('img/Fotoevent/'.$tb_m_event->foto) }}" style="max-height:310px; max-width: 650px; min-height:310px; min-width: 650px; margin-top:7px;">  
	</div>
  </div>

<div class="row">
	<div class="col-md-12 col-lg-12 col-xlg-12">	
	<label><h3>Deskripsi</h3></label>
	  <tr>
  		<td class="text-center">{!! $tb_m_event->deskripsi !!}</td>
	  </tr>
	</div>
</div>
<tr>
  
</table>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {        
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });   
    });
</script>

<script type="text/javascript">
function deleteevent(id){
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
               url:'<?php echo url("delete-event"); ?>/'+id,
               success:function(data){
                  location.href ='{{url('admin/event') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "event ini tidak jadi di hapus.", "error");
    }
});
}
</script>


@endsection

