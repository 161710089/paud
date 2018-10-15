@extends('layouts.admin')
@section('content')

	<div class="row">
		<div class="container">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Form Data Siswa</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

		<div class="col-md-12">
			<div class="panel panel-primary">
		@foreach($tb_m_siswa as $data)			
				<div class="panel-body">
					<div class="row mb-3">
			  			<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('nama_lengkap') ? 'has-error' : ''}}">
								<label >Nama Lengkap</label>
								<input type="text" value="{{ $data->nama_lengkap }}" class="form-control"  name="nama_lengkap" readonly>
								@if ($errors->has('nama_lengkap'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_lengkap')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">				
							<div class=" {{$errors->has('email') ? 'has-error' : ''}}">
								<label >Email</label>
								<input type="text" value="{{ $data->user->email }}" class="form-control" name="email" readonly>
								@if ($errors->has('email'))
									<span class="help-blocks">
										<strong>{{$errors->first('email')}}</strong>
									</span>
								@endif
							</div>
						</div>

 						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
			  					<label >Jenis Kelamin</label><br>	
								<input type="radio" class="radio-control" name="jenis_kelamin" 
								value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }} disabled>Laki laki&nbsp&nbsp
								<input type="radio" class="radio-control" name="jenis_kelamin"  
								value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }} disabled>Perempuan&nbsp&nbsp
						  		@if ($errors->has('jenis_kelamin'))
            	               	 	<span class="help-block">
                	                	<strong>{{ $errors->first('jenis_kelamin') }}</strong>
                    	        	</span>
                        		@endif
                    		</div>
                		</div>
					</div>

					<div class="row mb-3">
			  			<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('ttl') ? 'has-error' : ''}}">
								<label >Tempat Tanggal Lahir</label>
								<input type="text" value="{{ $data->ttl }}" class="form-control" name="ttl" readonly>
								@if ($errors->has('ttl'))
									<span class="help-blocks">
										<strong>{{$errors->first('ttl')}}</strong>
									</span>
								@endif
							</div>
						</div>
			 	
			 			<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('nik') ? 'has-error' : ''}}">
								<label >Nik</label>
								<input type="text" value="{{ $data->nik }}" class="form-control" name="nik" readonly>
								@if ($errors->has('nik'))
									<span class="help-blocks">
										<strong>{{$errors->first('nik')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>


<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Biografi">Biografi</a></li> 
  &nbsp; &nbsp;
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Ortu">Identitas orangtua</a></li> 
</ul>


	<div class="tab-content">
  		<div id="Ortu" class="tab-pane fade in">
  			<div class="panel-body">
  				<h3>Identitas Ayah</h3>
					<div class="row mb-3">
						 <div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('nama_ayah') ? 'has-error' : ''}}">
								<label >Nama </label>
								<input type="text"  value="{{ $data->tb_m_ortu->nama_ayah }}" class="form-control" name="nama_ayah" readonly>
								@if ($errors->has('nama_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('ttl_ayah') ? 'has-error' : ''}}">
								<label >Tempat Tanggal Lahir</label>
								<input type="text" value="{{ $data->tb_m_ortu->ttl_ayah }}" class="form-control"  name="ttl_ayah" readonly>
								@if ($errors->has('ttl_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('ttl_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('agama_ayah') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" value="{{ $data->tb_m_ortu->agama_ayah }}" class="form-control"  name="agama_ayah" readonly>
								@if ($errors->has('agama_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
		
					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('kewarganegaraan_ayah') ? 'has-error' : ''}}">
								<label >Kewarganegaraan</label>
								<input type="text" value="{{ $data->tb_m_ortu->kewarganegaraan_ayah }}" class="form-control"  
									name="kewarganegaraan_ayah" readonly>
								@if ($errors->has('kewarganegaraan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('pendidikan_ayah') ? 'has-error' : ''}}">
								<label >Pendidikan</label>
								<input type="text" value="{{ $data->tb_m_ortu->pendidikan_ayah }}" class="form-control"  name="pendidikan_ayah" readonly>
								@if ($errors->has('pendidikan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('pekerjaan_ayah') ? 'has-error' : ''}}">
								<label >Pekerjaan</label>
								<input type="text" value="{{ $data->tb_m_ortu->pekerjaan_ayah }}" class="form-control"  name="pekerjaan_ayah" readonly>
								@if ($errors->has('pekerjaan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('pekerjaan_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('penghasilan_ayah') ? 'has-error' : ''}}">
								<label >Penghasilan/Bulan</label>
								<input type="text" value="{{ $data->tb_m_ortu->penghasilan_ibu }}" class="form-control" ] name="penghasilan_ayah" readonly>
								@if ($errors->has('penghasilan_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('penghasilan_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('alamat_no_telepon_ayah') ? 'has-error' : ''}}">
								<label >Alamat dan No Telepon </label>
								<input type="text" value="{{ $data->tb_m_ortu->alamat_no_telepon_ayah }}" class="form-control"  name="alamat_no_telepon_ayah" readonly>
								@if ($errors->has('alamat_no_telepon_ayah'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon_ayah')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
				
				<h3>Identitas Ibu</h3>
					<div class="row mb-3">
						 <div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('nama_ibu') ? 'has-error' : ''}}">
								<label >Nama </label>
								<input type="text"  value="{{ $data->tb_m_ortu->nama_ibu }}" class="form-control" name="nama_ibu" readonly>
								@if ($errors->has('nama_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('ttl_ibu') ? 'has-error' : ''}}">
								<label >Tempat Tanggal Lahir</label>
								<input type="text" value="{{ $data->tb_m_ortu->ttl_ibu }}" class="form-control"  name="ttl_ibu" readonly>
								@if ($errors->has('ttl_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('ttl_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('agama_ibu') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" value="{{ $data->tb_m_ortu->agama_ibu }}" class="form-control"  name="agama_ibu" readonly>
								@if ($errors->has('agama_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('kewarganegaraan_ibu') ? 'has-error' : ''}}">
								<label >Kewarganegaraan</label>
								<input type="text" value="{{ $data->tb_m_ortu->kewarganegaraan_ibu }}" class="form-control"  name="kewarganegaraan_ibu" readonly>
								@if ($errors->has('kewarganegaraan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>			

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('pendidikan_ibu') ? 'has-error' : ''}}">
								<label >Pendidikan</label>
								<input type="text" value="{{ $data->tb_m_ortu->pendidikan_ibu }}" class="form-control"  name="pendidikan_ibu" readonly>
								@if ($errors->has('pendidikan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('pekerjaan_ibu') ? 'has-error' : ''}}">
								<label >Pekerjaan</label>
								<input type="text" value="{{ $data->tb_m_ortu->pekerjaan_ibu }}" class="form-control"  name="pekerjaan_ibu" readonly>
								@if ($errors->has('pekerjaan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('pekerjaan_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('penghasilan_ibu') ? 'has-error' : ''}}">
								<label >Penghasilan/Bulan</label>
								<input type="text" value="{{ $data->tb_m_ortu->penghasilan_ibu }}" class="form-control" ] name="penghasilan_ibu" readonly>
								@if ($errors->has('penghasilan_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('penghasilan_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('alamat_no_telepon_ibu') ? 'has-error' : ''}}">
								<label >Alamat dan No Telepon </label>
								<input type="text" value="{{ $data->tb_m_ortu->alamat_no_telepon_ibu }}" class="form-control"  name="alamat_no_telepon_ibu" readonly>
								@if ($errors->has('alamat_no_telepon_ibu'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon_ibu')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
				<h3>Identitas wali</h3>
					<div class="row mb-3">
						 <div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('nama_wali') ? 'has-error' : ''}}">
								<label >Nama </label>
								<input type="text"  value="{{ $data->tb_m_ortu->nama_wali }}" class="form-control" name="nama_wali" readonly>
								@if ($errors->has('nama_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>
			
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('ttl_wali') ? 'has-error' : ''}}">
								<label >Tempat Tanggal Lahir</label>
								<input type="text" value="{{ $data->tb_m_ortu->ttl_wali }}" class="form-control"  name="ttl_wali" readonly>
								@if ($errors->has('ttl_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('ttl_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('agama_wali') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" value="{{ $data->tb_m_ortu->agama_wali }}" class="form-control"  name="agama_wali" readonly>
								@if ($errors->has('agama_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
		
					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('kewarganegaraan_wali') ? 'has-error' : ''}}">
								<label >Kewarganegaraan</label>
								<input type="text" value="{{ $data->tb_m_ortu->kewarganegaraan_wali }}" class="form-control"  name="kewarganegaraan_wali" readonly>
								@if ($errors->has('kewarganegaraan_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>			

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('pendidikan_wali') ? 'has-error' : ''}}">
								<label >Pendidikan</label>
								<input type="text" value="{{ $data->tb_m_ortu->pendidikan_wali }}" class="form-control"  name="pendidikan_wali" readonly>
								@if ($errors->has('pendidikan_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('pendidikan_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('pekerjaan_wali') ? 'has-error' : ''}}">
								<label >Pekerjaan</label>
								<input type="text" value="{{ $data->tb_m_ortu->pekerjaan_wali }}" class="form-control"  name="pekerjaan_wali" readonly>
								@if ($errors->has('pekerjaan_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('pekerjaan_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
					
					<div class="row mb-3">		
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('penghasilan_wali') ? 'has-error' : ''}}">
								<label >Penghasilan/Bulan</label>
								<input type="text" value="{{ $data->tb_m_ortu->penghasilan_ibu }}" class="form-control" ] name="penghasilan_wali" readonly>
								@if ($errors->has('penghasilan_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('penghasilan_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('alamat_no_telepon_wali') ? 'has-error' : ''}}">
								<label >Alamat dan No Telepon </label>
								<input type="text" value="{{ $data->tb_m_ortu->alamat_no_telepon_wali }}" class="form-control"  name="alamat_no_telepon_wali" readonly>
								@if ($errors->has('alamat_no_telepon_wali'))
									<span class="help-blocks">
										<strong>{{$errors->first('alamat_no_telepon_wali')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

							<div class=" {{$errors->has('id_ortu') ? 'has-error' : ''}}">
								<input type="hidden"  class="form-control"  name="id_ortu" readonly>
								@if ($errors->has('id_ortu'))
									<span class="help-blocks">
										<strong>{{$errors->first('id_ortu')}}</strong>
									</span>
								@endif
							</div>



				</div>
			</div>

  		<div id="Biografi" class="tab-pane fade">
 
					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('nama_panggilan') ? 'has-error' : ''}}">
								<label >Nama Panggilan</label>
								<input type="text" value="{{ $data->nama_panggilan }}" class="form-control" name="nama_panggilan" readonly>
								@if ($errors->has('nama_panggilan'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_panggilan')}}</strong>
									</span>
								@endif
							</div>
						</div>	

						<div class="col-md-6 col-lg-4 col-xlg-3">	
							<div class=" {{$errors->has('nama_jalan') ? 'has-error' : ''}}">
								<label >Jalan</label>
								<input type="text" value="{{ $data->nama_jalan }}" class="form-control" name="nama_jalan" readonly>
								@if ($errors->has('nama_jalan'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_jalan')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('nama_desa') ? 'has-error' : ''}}">
								<label >Desa/Kelurahan</label>
								<input type="text" value="{{ $data->nama_desa }}" class="form-control" name="nama_desa" readonly>
								@if ($errors->has('nama_desa'))
									<span class="help-blocks">
										<strong>{{$errors->first('nama_desa')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('kecamatan') ? 'has-error' : ''}}">
								<label >Kecamatan</label>
								<input type="text" value="{{ $data->kecamatan }}" class="form-control" name="kecamatan" readonly>
								@if ($errors->has('kecamatan'))
									<span class="help-blocks">
										<strong>{{$errors->first('kecamatan')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('kabupaten') ? 'has-error' : ''}}">
								<label >kabupaten/kota</label>
								<input type="text" value="{{ $data->kabupaten }}" class="form-control" name="kabupaten" readonly>
								@if ($errors->has('kabupaten'))
									<span class="help-blocks">
										<strong>{{$errors->first('kabupaten')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('provinsi') ? 'has-error' : ''}}">
								<label >Provinsi</label>
								<input type="text" value="{{ $data->provinsi }}" class="form-control" name="provinsi" readonly>
								@if ($errors->has('provinsi'))
									<span class="help-blocks">
										<strong>{{$errors->first('provinsi')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('agama') ? 'has-error' : ''}}">
								<label >Agama</label>
								<input type="text" value="{{ $data->agama }}" class="form-control" name="agama" readonly>
								@if ($errors->has('agama'))
									<span class="help-blocks">
										<strong>{{$errors->first('agama')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('kewarganegaraan') ? 'has-error' : ''}}">
								<label >Kewarganegaraan</label>
								<input type="text" value="{{ $data->kewarganegaraan }}" class="form-control" name="kewarganegaraan" readonly>
								@if ($errors->has('kewarganegaraan'))
									<span class="help-blocks">
										<strong>{{$errors->first('kewarganegaraan')}}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('anak_ke') ? 'has-error' : ''}}">
								<label >Anak ke berapa</label>
								<input type="text" value="{{ $data->anak_ke }}" class="form-control" name="anak_ke" readonly>
								@if ($errors->has('anak_ke'))
									<span class="help-blocks">
										<strong>{{$errors->first('anak_ke')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('jumlah_saudara_kandung') ? 'has-error' : ''}}">
								<label >Jumlah Saudara Kandung</label>
								<input type="text" value="{{ $data->jumlah_saudara_kandung }}" class="form-control" name="jumlah_saudara_kandung" readonly>
								@if ($errors->has('jumlah_saudara_kandung'))
									<span class="help-blocks">
										<strong>{{$errors->first('jumlah_saudara_kandung')}}</strong>
									</span>
								@endif
							</div>
						</div>	
						
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('jumlah_saudara_tiri') ? 'has-error' : ''}}">
								<label >Jumlah Saudara Tiri</label>
								<input type="text" value="{{ $data->jumlah_saudara_tiri }}" class="form-control" name="jumlah_saudara_tiri" readonly>
								@if ($errors->has('jumlah_saudara_tiri'))
									<span class="help-blocks">
										<strong>{{$errors->first('jumlah_saudara_tiri')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('jumlah_saudara_angkat') ? 'has-error' : ''}}">
								<label >Jumlah Saudara Angkat</label>
								<input type="text" value="{{ $data->jumlah_saudara_angkat }}" class="form-control" name="jumlah_saudara_angkat" readonly>
								@if ($errors->has('jumlah_saudara_angkat'))
									<span class="help-blocks">
										<strong>{{$errors->first('jumlah_saudara_angkat')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('status_yatim') ? 'has-error' : ''}}">
								<label >status_yatim</label><br>
								<input type="radio" class="radio-control" name="status_yatim" 
								value="Yatim" {{ $data->status_yatim == 'Yatim' ? 'checked' : '' }} disabled>Yatim&nbsp&nbsp
								<input type="radio" class="radio-control" name="status_yatim"  
								value="Piatu" {{ $data->status_yatim == 'Piatu' ? 'checked' : '' }} disabled>Piatu&nbsp&nbsp
								<input type="radio" class="radio-control" name="status_yatim" 
								value="Yatim Piatu" {{ $data->status_yatim == 'Yatim Piatu' ? 'checked' : '' }} disabled>Yatim Piatu&nbsp&nbsp
								<input type="radio" class="radio-control" name="status_yatim"  
								value="-" {{ $data->status_yatim == '-' ? 'checked' : '' }} disabled>-&nbsp&nbsp			
								@if ($errors->has('status_yatim'))
									<span class="help-blocks">
										<strong>{{$errors->first('status_yatim')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
		 					<div class=" {{$errors->has('bahasa') ? 'has-error' : ''}}">
								<label >Bahasa Sehari-hari</label>
								<input type="text" value="{{ $data->bahasa }}" class="form-control" name="bahasa" readonly>
								@if ($errors->has('bahasa'))
									<span class="help-blocks">
										<strong>{{$errors->first('bahasa')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('golongan_darah') ? 'has-error' : ''}}">
								<label >golongan_darah</label><br>
								<input type="radio" class="radio-control" name="golongan_darah" 
								value="A" {{ $data->golongan_darah == 'A' ? 'checked' : '' }} disabled>A
								&nbsp&nbsp
								<input type="radio" class="radio-control" name="golongan_darah"  
								value="B" {{ $data->golongan_darah == 'B' ? 'checked' : '' }} disabled>B
								&nbsp&nbsp
								<input type="radio" class="radio-control" name="golongan_darah" 
								value="AB" {{ $data->golongan_darah == 'AB' ? 'checked' : '' }} disabled>AB
								&nbsp&nbsp
								<input type="radio" class="radio-control" name="golongan_darah"  
								value="O" {{ $data->golongan_darah == 'O' ? 'checked' : '' }} disabled>O
								&nbsp&nbsp
								@if ($errors->has('golongan_darah'))
									<span class="help-blocks">
										<strong>{{$errors->first('golongan_darah')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
					
					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('penyakit') ? 'has-error' : ''}}">
								<label >Penyakit yang pernah diderita </label>
								<input type="text" value="{{ $data->penyakit }}" class="form-control" name="penyakit" readonly>
								@if ($errors->has('penyakit'))
									<span class="help-blocks">
										<strong>{{$errors->first('penyakit')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('imunisasi') ? 'has-error' : ''}}">
								<label >Imunisasi yang pernah diterima</label>
								<input type="text" value="{{ $data->imunisasi }}" class="form-control" name="imunisasi" readonly>
								@if ($errors->has('imunisasi'))
									<span class="help-blocks">
										<strong>{{$errors->first('imunisasi')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('ciri_ciri') ? 'has-error' : ''}}">
								<label >Ciri-ciri</label>
								<input type="text" value="{{ $data->ciri_ciri }}" class="form-control" name="ciri_ciri" readonly>
								@if ($errors->has('ciri_ciri'))
									<span class="help-blocks">
										<strong>{{$errors->first('ciri_ciri')}}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
					
					<div class="row mb-3">
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('tinggi_berat_badan') ? 'has-error' : ''}}">
								<label >Tinggi Badan/Berat Badan</label>
								<input type="text" value="{{ $data->tinggi_berat_badan }}" class="form-control" name="tinggi_berat_badan" readonly>
								@if ($errors->has('tinggi_berat_badan'))
									<span class="help-blocks">
										<strong>{{$errors->first('tinggi_berat_badan')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class=" {{$errors->has('jarak_rumah') ? 'has-error' : ''}}">
								<label >Jarak Rumah ke Sekolah</label>
								<input type="text" value="{{ $data->jarak_rumah }}" class="form-control" name="jarak_rumah" readonly>
								@if ($errors->has('jarak_rumah'))
									<span class="help-blocks">
										<strong>{{$errors->first('jarak_rumah')}}</strong>
									</span>
								@endif
							</div>

						</div>

						<div class="col-md-6 col-lg-4 col-xlg-3">					
  							<div class=" {{ $errors->has('foto') ? ' has-error' : '' }}">
              					<label >Foto</label>  
              					<img src="{{ asset('img/Fotosiswa/'.$data->foto) }}" 
              					style="max-height:270px; max-width: 270px; margin-top:7px;">
              					@if ($errors->has('foto'))
                            		<span class="help-block">
                                		<strong>{{ $errors->first('foto') }}</strong>
                            		</span>
                        		@endif
            				</div>
        				</div>
    				</div>
    				@endforeach
  				</div>
			</div>
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
function deleteSiswa(id){
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
               url:'<?php echo url("delete-siswa"); ?>/'+id,
               success:function(data){
                  location.href ='{{url('admin/siswa') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "siswa ini tidak jadi di hapus.", "error");
    }
});
}
</script>


@endsection

