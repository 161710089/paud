
@extends('layouts.admin')
@section('content')
<div class="page-content">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url({{ asset('assets/user/images/banner/bnr1.jpg') }});">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
					<h1 class="text-white">Hasil Pencarian !</h1>
					<h4 class="text-white">tb_m_siswa tb_m_siswa yang anda cari.</h4>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <div class="section-full content-inner bg-white">
            <div class="container">
                <div class="row">
                    <!-- Side bar start -->                    
                    <!-- Side bar END -->
                    <!-- left part start -->
                    <div class="col-sm-12 col-md-12 col-lg-13">
                        <div class="row">							
                            <!-- blog grid  -->
                            <div id="masonry" class="dlab-blog-grid-3 used-car-info">
                            @if (count($tb_m_siswa) > 0)
								@foreach($tb_m_siswa as $data)
								@if($data->status == 0)
    							@else
								<div class="post card-container col-lg-6 col-md-6 col-sm-6 col-xs-12">										
									<div class="dlab-feed-list m-b30 text-left">																			
										<div class="dlab-media"> 
											<a href="{{ route('tb_m_siswa',$data->id) }}"><img src="{{ asset('img/Fotosiswa/'.$data->foto) }}" style="height:400px;width:600px;margin-top:10px;" alt=""></a> 
										</div>												
										<div class="dlab-info text-left">
											<h4 class="dlab-title"><a href="{{ route('tb_m_siswa',$data->id) }}">{{ $data->nama_lengkap }}</a></h4>
											<p class="dlab-price"><span class="text-black">Rp.{{ number_format($data->nama_panggilan) }} </span></p>
											<div class="m-t10"><i class="flaticon-placeholder font-18"></i>{{ $data->lokasi->provinsi }}</div>
											<div class="icon-box-btn text-center m-tb20">
												<ul class="clearfix">													
													<li>{{ $data->transmisi }}</li>
													<li>{{ $data->merk->nama_merk }} </li>
													<li>{{ $data->tipe->nama_tipe }}</li>
												</ul>
											</div>											
										</div>										
									</div>
                                </div>
								@endif
								@endforeach	
                            @else 
                            <h3><b><i><center>Mohon Maaf tb_m_siswa Yang Anda Cari Tidak Ditemukan</center></i></b></h3>
                            @endif							
							</div>
							
                            <!-- blog grid END -->
                            <!-- Pagination  -->
                            <!-- <div class="pagination-bx col-lg-12 clearfix ">
                                <ul class="pagination">
                                    <li class="previous"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div> -->
                            <!-- Pagination END -->
                        </div>
						<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<div class="modal-body clearfix">
										<div class="pull-letf max-width-300"></div>
										<div class="lead-form">
											<form>
												<h3 class="m-t0">Where should we send seller details?</h3>
												<div class="form-group">
													<input  value="" class="form-control" placeholder="Name"/>
												</div>	
												<div class="form-group">
													<input  value="" class="form-control" placeholder="tb_m_siswae Number"/>
												</div>
												<div class="text-left">
													<div class="search-content">
														<input id="send-details" type="checkbox">
														<label for="send-details"  class="search-content-area">Send details on email </label>
													</div>
												</div>
												<div class="clearfix">
													<button type="button" class="btn-primary site-button btn-block">See Seller Details Now</button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
                    </div>
                    <!-- left part END -->
                </div>
            </div>
        </div>
    </div>
@endsection