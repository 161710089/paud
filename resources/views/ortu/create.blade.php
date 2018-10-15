@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Form tambah siswa
					<div class="panel-title pull-right">
						<a class="btn btn-primary" href="{{route('siswa.index')}}">Kembali</a>
					</div>
					</div>
					<div class="panel-body">
			<form action="{{ route('ortu.update',$tb_m_ortu->id) }}" method="post" enctype="multipart/form-data" >
			  		<input name="_method" type="hidden" value="PATCH">
			  		{{ csrf_field() }}
			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('nama_ayah') ? 'has-error' : ''}}">
								<label class="control-label">Nama </label>
								<input type="text"  class="form-control" name="nama_ayah" required>
								@if ($errors->has('nama_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('ttl_ayah') ? 'has-error' : ''}}">
								<label class="control-label">Tempat Tanggal Lahir</label>
								<input type="text" class="form-control"  name="ttl_ayah" required>
								@if ($errors->has('ttl_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('ttl_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>

			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('agama_ayah') ? 'has-error' : ''}}">
								<label class="control-label">Tempat Tanggal Lahir</label>
								<input type="text" class="form-control"  name="agama_ayah" required>
								@if ($errors->has('agama_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>

			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('kewarganegaraan_ayah') ? 'has-error' : ''}}">
								<label class="control-label">Agama</label>
								<input type="text" class="form-control"  name="kewarganegaraan_ayah" required>
								@if ($errors->has('kewarganegaraan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
<div class="col-md-6 col-lg-4 col-xlg-3">
<h3>Alamat</h3>

					<div class="form-group {{$errors->has('nik_ayah') ? 'has-error' : ''}}">
								<label class="control-label">Kewarganegaraan</label>
								<input type="text" class="form-control"  name="nik_ayah" required>
								@if ($errors->has('nik_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('nik_ayah')}}</strong>
									</span>
								@endif
							</div>



						<div class="form-group {{$errors->has('pendidikan_ayah') ? 'has-error' : ''}}">
								<label class="control-label">Pendidikan</label>
								<input type="text" class="form-control"  name="pendidikan_ayah" required>
								@if ($errors->has('pendidikan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan_ayah')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{$errors->has('pekerjaan_ayah') ? 'has-error' : ''}}">
								<label class="control-label">Pekerjaan</label>
								<input type="text" class="form-control"  name="pekerjaan_ayah" required>
								@if ($errors->has('pekerjaan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('pekerjaan_ayah')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{$errors->has('penghasilan_ayah') ? 'has-error' : ''}}">
								<label class="control-label">Penghasilan/Bulan</label>
								<input type="text" class="form-control" ] name="penghasilan_ayah" required>
								@if ($errors->has('penghasilan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('penghasilan_ayah')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{$errors->has('alamat_no_telepon_ayah') ? 'has-error' : ''}}">
								<label class="control-label">Alamat dan No Telepon </label>
								<input type="text" class="form-control"  name="alamat_no_telepon_ayah" required>
								@if ($errors->has('alamat_no_telepon_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon_ayah')}}</strong>
									</span>
								@endif
							</div>




<h3>Identitas Ibu</h3>



<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('nama_ibu') ? 'has-error' : ''}}">
								<label class="control-label">Nama </label>
								<input type="text"  class="form-control" name="nama_ibu" required>
								@if ($errors->has('nama_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('ttl_ibu') ? 'has-error' : ''}}">
								<label class="control-label">Tempat Tanggal Lahir</label>
								<input type="text" class="form-control"  name="ttl_ibu" required>
								@if ($errors->has('ttl_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('ttl_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>

			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('agama_ibu') ? 'has-error' : ''}}">
								<label class="control-label">Tempat Tanggal Lahir</label>
								<input type="text" class="form-control"  name="agama_ibu" required>
								@if ($errors->has('agama_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>

			<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('kewarganegaraan_ibu') ? 'has-error' : ''}}">
								<label class="control-label">Agama</label>
								<input type="text" class="form-control" " name="kewarganegaraan_ibu" required>
								@if ($errors->has('kewarganegaraan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
<div class="col-md-6 col-lg-4 col-xlg-3">
<h3>Alamat</h3>

					<div class="form-group {{$errors->has('nik_ibu') ? 'has-error' : ''}}">
								<label class="control-label">Kewarganegaraan</label>
								<input type="text" class="form-control"  name="nik_ibu" required>
								@if ($errors->has('nik_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('nik_ibu')}}</strong>
									</span>
								@endif
							</div>



						<div class="form-group {{$errors->has('pendidikan_ibu') ? 'has-error' : ''}}">
								<label class="control-label">Pendidikan</label>
								<input type="text" class="form-control"  name="pendidikan_ibu" required>
								@if ($errors->has('pendidikan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan_ibu')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{$errors->has('pekerjaan_ibu') ? 'has-error' : ''}}">
								<label class="control-label">Pekerjaan</label>
								<input type="text" class="form-control" value="{{ $tb_m_ortu->pekerjaan_ibu }}" name="pekerjaan_ibu" required>
								@if ($errors->has('pekerjaan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('pekerjaan_ibu')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{$errors->has('penghasilan_ibu') ? 'has-error' : ''}}">
								<label class="control-label">Penghasilan/Bulan</label>
								<input type="text" class="form-control" value="{{ $tb_m_ortu->penghasilan_ibu }}" name="penghasilan_ibu" required>
								@if ($errors->has('penghasilan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('penghasilan_ibu')}}</strong>
									</span>
								@endif
							</div>

					<div class="form-group {{$errors->has('alamat_no_telepon_ibu') ? 'has-error' : ''}}">
								<label class="control-label">Alamat dan No Telepon </label>
								<input type="text" class="form-control" value="{{ $tb_m_ortu->alamat_no_telepon_ibu }}" name="alamat_no_telepon_ibu" required>
								@if ($errors->has('alamat_no_telepon_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon_ibu')}}</strong>
									</span>
								@endif
							</div>







			
					
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
