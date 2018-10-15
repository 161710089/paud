@extends('layouts.admin')
@section('content')

	<div class="row">
		<div class="container">
	
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Show Pengajar</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('pengajar.index') }}">Pengajar</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Show pengajar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						

					<div class="row mb-3">
						<a class="btn btn-primary" href="{{route('pengajar.edit',$tb_m_pengajar->id)}}"><i class="mdi mdi-pencil"></i></a>&nbsp;
						         <button onclick="deletePengajar('{{$tb_m_pengajar->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                  									&nbsp;
						<a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('pengajar.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
					</div>
					<div class="panel-body">
					<div class="row mb-3">

			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('nama') ? 'has-error' : ''}}">
								<label >Nama</label>
								<input type="text" value="{{ $tb_m_pengajar->nama }}" class="form-control"  name="nama" readonly>
								@if ($errors->has('nama'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama')}}</strong>
									</span>
								@endif
							</div>
				</div>				
					
 	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
			  			<label >Jenis Kelamin</label><br>	
								<input type="radio" class="radio-control" name="jenis_kelamin" 
								value="Laki-laki" {{ $tb_m_pengajar->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }} disabled>Laki laki&nbsp&nbsp
								<input type="radio" class="radio-control" name="jenis_kelamin"  
								value="Perempuan" {{ $tb_m_pengajar->jenis_kelamin == 'Perempuan' ? 'checked' : '' }} disabled>Perempuan&nbsp&nbsp
								
			  		@if ($errors->has('jenis_kelamin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('ttl') ? 'has-error' : ''}}">
								<label >Tempat Tanggal Lahir</label>
								<input type="text" value="{{ $tb_m_pengajar->ttl }}" class="form-control" name="ttl" readonly>
								@if ($errors->has('ttl'))
									<span class="help-blocks">
										<strong>{{$errors->first('ttl')}}</strong>
									</span>
								@endif
							</div>
				</div>
</div>
			<div class="row mb-3">
				<div class="col-md-6 col-lg-4 col-xlg-3">
			<div class=" {{$errors->has('agama') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" value="{{ $tb_m_pengajar->agama }}" class="form-control" name="agama" readonly>
								@if ($errors->has('agama'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama')}}</strong>
									</span>
								@endif
							</div>
							</div>
			 	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('kewarganegaraan') ? 'has-error' : ''}}">
								<label >kewarganegaraan</label>
								<input type="text" value="{{ $tb_m_pengajar->kewarganegaraan }}" class="form-control" name="kewarganegaraan" readonly>
								@if ($errors->has('kewarganegaraan'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan')}}</strong>
									</span>
								@endif
							</div>
				</div>
				

<div class="col-md-6 col-lg-4 col-xlg-3">
						<div class=" {{$errors->has('pendidikan') ? 'has-error' : ''}}">
								<label >Pendidikan</label>
								<input type="text" value="{{ $tb_m_pengajar->pendidikan }}" class="form-control"  name="pendidikan" readonly>
								@if ($errors->has('pendidikan'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan')}}</strong>
									</span>
								@endif
							</div>
</div>
</div>
<div class="row mb-3">		
<div class="col-md-6 col-lg-4 col-xlg-3">

					<div class=" {{$errors->has('alamat_no_telepon') ? 'has-error' : ''}}">
								<label >Alamat dan No Telepon</label>
								<input type="text" value="{{ $tb_m_pengajar->alamat_no_telepon }}" class="form-control"  name="alamat_no_telepon" readonly>
								@if ($errors->has('alamat_no_telepon'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon')}}</strong>
									</span>
								@endif
							</div>
</div>


<div class="col-md-6 col-lg-4 col-xlg-3">					
  <div class=" {{ $errors->has('foto') ? ' has-error' : '' }}">
              <label >Foto</label>  
              <img src="{{ asset('img/Fotopengajar/'.$tb_m_pengajar->foto) }}" class="img-circle" style="max-height:270px; max-width: 270px; margin-top:7px;">
              @if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
            </div>
        </div>

<div class="col-md-6 col-lg-4 col-xlg-3">


			
					<div class="form-group {{ $errors->has('id_mapel') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Mapel</label>	
			  			<select  name="id_mapel" class="form-control" disabled>	
			  			@foreach($mata_pelajaran as $data)
			  			<option value="{{ $data->id}}"
			  				{{$selectmapel == $data->id ? 'selected="selected"':'' }} readonly>{{ 
			  				$data->nama_mata_pelajaran }}</option>
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
</div>
</div>
</div>
</div>
<script type="text/javascript">
function deletePengajar(id){
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
               url:'<?php echo url("delete-pengajar"); ?>/'+id,
               success:function(data){
                  location.href ='{{url('admin/pengajar') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "Pengajar ini tidak jadi di hapus.", "error");
    }
});
}
</script>



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

@endsection

