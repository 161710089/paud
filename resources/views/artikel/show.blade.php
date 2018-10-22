@extends('layouts.admin')
@section('content')

	@foreach($sekolahs as $data)
    <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Artikel </title>
    @endforeach


	<div class="row">
		<div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Show artikel</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('artikel.index') }}">artikel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Show artikel</li>
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
								<input type="text" value="{{ $tb_m_artikel->judul }}" class="form-control"  name="judul" readonly>
								@if ($errors->has('judul'))
									<span class="help-blocks">
										<strong>{{$errors->first('judul')}}</strong>
									</span>
								@endif
							</div>
				</div>		
				<div class="col-md-6 col-lg-4 col-xlg-3">		
					<div class=" {{$errors->has('Penulis') ? 'has-error' : ''}}">
								<label >Penulis</label>
								<input type="text" value="{{ $tb_m_artikel->user->name }}" class="form-control" name="Penulis" readonly>
								@if ($errors->has('Penulis'))
									<span class="help-blocks">
										<strong>{{$errors->first('Penulis')}}</strong>
									</span>
								@endif
							</div>
				</div>
 	
			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('slug') ? 'has-error' : ''}}">
								<label >Slug</label>
								<input type="text" value="{{ $tb_m_artikel->slug }}" class="form-control" name="slug" readonly>
								@if ($errors->has('slug'))
									<span class="help-blocks">
										<strong>{{$errors->first('slug')}}</strong>
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
	<img src="{{ asset('img/Fotoartikel/'.$tb_m_artikel->foto) }}" style="max-height:310px; max-width: 650px; min-height:310px; min-width: 650px; margin-top:7px;">  
	</div>
  </div>

<div class="row">
	<div class="col-md-12 col-lg-12 col-xlg-12">	
	<label><h3>Deskripsi</h3></label>
	  <tr>
  		<td class="text-center">{!! $tb_m_artikel->deskripsi !!}</td>
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
function deleteartikel(id){
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
               url:'<?php echo url("delete-artikel"); ?>/'+id,
               success:function(data){
                  location.href ='{{url('admin/artikel') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "artikel ini tidak jadi di hapus.", "error");
    }
});
}
</script>


@endsection

