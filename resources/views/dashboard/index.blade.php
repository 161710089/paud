@extends('layouts.admin')
@section('content')


            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        @role('admin')
                <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                 <h5 class="m-b-0 m-t-5">{{ $jumlahguru }}</h5>
                                                   <small class="font-light">Total Pengajar</small>
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fas fa-users"></i>
                                                 <h5 class="m-b-0 m-t-5">{{ $jumlahsiswa }}</h5>
                                                   <small class="font-light">Total Siswa</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">656</h5>
                                                   <small class="font-light">Total Shop</small>
                                                </div>
                                            </div>
                                             <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-tag m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">9540</h5>
                                                   <small class="font-light">Total Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-table m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">100</h5>
                                                   <small class="font-light">Pending Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-globe m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">8540</h5>
                                                   <small class="font-light">Online Orders</small>
                                                </div>

            </div>
        </div>
    </div>
    <h4>Statistik Penulis</h4>
<canvas id="chartPenulis" width="400" height="150"></canvas>

<script src="/js/Chart.min.js"></script> 
<script> 
    var data = { 
        labels: {!! json_encode($tb_m_pengajar) !!},
        datasets: [{ 
            label: 'Jumlah Mata Pelajaran',
            data: {!! json_encode($tb_m_mata_pelajaran) !!},
            backgroundColor: "rgba(151,187,205,0.5)",
            borderColor: "rgba(151,187,205,0.8)",
             }]
            };
var options = {
 scales: {
  yAxes: [{
   ticks: {
    beginAtZero:true,
     stepSize: 1 }
      }]
       }
        };
var ctx = document.getElementById("chartPenulis").getContext("2d");
var authorChart = new Chart(ctx,
 { type: 'bar',
  data: data,
  options: options });
</script> 
@endrole
@endsection



