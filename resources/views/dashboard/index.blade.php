@extends('layouts.admin')
@section('content')
@php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp

    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Dashboard </title>
    @endforeach

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
            <br>
        @role('admin')

<!DOCTYPE html>
<html dir="ltr" lang="en">


<body>
            <div class="container-fluid">
        <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            
                                              
                                            <div class="col-2">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">{{ $jumlahsiswa }}</h5>
                                                   <small class="font-light">Total Siswa</small>
                                                </div>
                                            </div>
                                             <div class="col-2">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">{{ $countnewsiswa }}</h5>
                                                   <small class="font-light">Siswa Baru</small>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">{{ $jumlahtiketterjual }}</h5>
                                                   <small class="font-light">Total Tiket Event Terjual</small>
                                                </div>
                                            </div>
                                             <div class="col-2">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-tag m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">{{ $jumlahpengajar }}</h5>
                                                   <small class="font-light">Total Pengajar</small>
                                                </div>
                                            </div>
                                            <div class="col-2 ">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-table m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">{{ $jumlahevent }}</h5>
                                                   <small class="font-light">Total Event</small>
                                                </div>
                                            </div>
                                            <div class="col-2 ">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-globe m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">{{ $jumlahGallery }}</h5>
                                                   <small class="font-light">Jumlah Foto Gallery</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->

                {{--    
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">2540</h5>
                                                   <small class="font-light">Total Users</small>
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">120</h5>
                                                   <small class="font-light">New Users</small>
                                                </div>
                                            </div>
                                            <div class="col-6 ">
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
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                --}}   

                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kometar Web</h4>
                            </div>
                            <div class="comment-widgets scrollable">
                                <!-- Comment Row -->
                                @foreach($tb_m_pendapat_user as $data)
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="{{ asset('img/Fotosiswa/'.$data->user->tb_m_siswa->foto) }}" style="max-height:100px; max-width: 100px; margin-top:7px;" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">{{ $data->user->name }}</h6>
                                        <span class="m-b-15 d-block">{!! $data->pendapat !!} </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">{{Date::parse($data->created_at)->format('M d, Y')}}</span> 
                              <div class="row">
                                @if($data->status == 1)
                                <form action="{{ route('pendapat_user.publish',$data->id)}}" method="post">
                                    @csrf
                                <button type="submit" class="btn btn-danger">Jangan Publish</button>
                                </form>
                                @elseif($data->status == 0)
                                <form action="{{ route('pendapat_user.publish',$data->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-info" type="submit">Publish</button>
                                </form>
                                @endif 
                                &nbsp; &nbsp; 
                              <button onclick="deletePendapat('{{$data->id}}')" class="btn btn-danger"></i>Delete</button>
              
                                        </div>
                                    </div>
                                </div>
                              </div>
                                @endforeach
                                <!-- Comment Row -->
                                <!-- Comment Row -->
                            </div>
                        </div>
                        <!-- Card -->
        {{--                 <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">To Do List</h4>
                                <div class="todo-widget scrollable" style="height:450px;">
                                    <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                        <li class="list-group-item todo-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label todo-label" for="customCheck">
                                                    <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span> <span class="badge badge-pill badge-danger float-right">Today</span>
                                                </label>
                                            </div>
                                            <ul class="list-style-none assignedto">
                                                <li class="assignee"><img class="rounded-circle" width="40" src="/assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
                                                <li class="assignee"><img class="rounded-circle" width="40" src="/assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
                                                <li class="assignee"><img class="rounded-circle" width="40" src="/assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                                <li class="assignee"><img class="rounded-circle" width="40" src="/assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item todo-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label todo-label" for="customCheck1">
                                                    <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing</span><span class="badge badge-pill badge-primary float-right">1 week </span>
                                                </label>
                                            </div>
                                            <div class="item-date"> 26 jun 2017</div>
                                        </li>
                                        <li class="list-group-item todo-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label todo-label" for="customCheck2">
                                                    <span class="todo-desc">Give Purchase report to</span> <span class="badge badge-pill badge-info float-right">Yesterday</span>
                                                </label>
                                            </div>
                                            <ul class="list-style-none assignedto">
                                                <li class="assignee"><img class="rounded-circle" width="40" src="/assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                                <li class="assignee"><img class="rounded-circle" width="40" src="/assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item todo-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label todo-label" for="customCheck3">
                                                    <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing </span> <span class="badge badge-pill badge-warning float-right">2 weeks</span>
                                                </label>
                                            </div>
                                            <div class="item-date"> 26 jun 2017</div>
                                        </li>
                                        <li class="list-group-item todo-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label todo-label" for="customCheck4">
                                                    <span class="todo-desc">Give Purchase report to</span> <span class="badge badge-pill badge-info float-right">Yesterday</span>
                                                </label>
                                            </div>
                                            <ul class="list-style-none assignedto">
                                                <li class="assignee"><img class="rounded-circle" width="40" src="/assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                                <li class="assignee"><img class="rounded-circle" width="40" src="/assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
         --}}                <!-- card -->
                        <!-- card new -->
               {{--          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-b-0">News Updates</h4>
                            </div>
                            <ul class="list-style-none">
                                <li class="d-flex no-block card-body">
                                    <i class="fa fa-check-circle w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                        <span class="text-muted">dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">20</h5>
                                            <span class="text-muted font-16">Jan</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex no-block card-body border-top">
                                    <i class="fa fa-gift w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0">Congratulation Maruti, Happy Birthday</a>
                                        <span class="text-muted">many many happy returns of the day</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">11</h5>
                                            <span class="text-muted font-16">Jan</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex no-block card-body border-top">
                                    <i class="fa fa-plus w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0">Maruti is a Responsive Admin theme</a>
                                        <span class="text-muted">But already everything was solved. It will ...</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">19</h5>
                                            <span class="text-muted font-16">Jan</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex no-block card-body border-top">
                                    <i class="fa fa-leaf w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0">Envato approved Maruti Admin template</a>
                                        <span class="text-muted">i am very happy to approved by TF</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">20</h5>
                                            <span class="text-muted font-16">Jan</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex no-block card-body border-top">
                                    <i class="fa fa-question-circle w-30px m-t-5"></i>
                                    <div>
                                        <a href="#" class="m-b-0 font-medium p-0"> I am alwayse here if you have any question</a>
                                        <span class="text-muted">we glad that you choose our template</span>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="tetx-right">
                                            <h5 class="text-muted m-b-0">15</h5>
                                            <span class="text-muted font-16">Jan</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                --}}     </div>
                    <!-- column -->

                    <div class="col-lg-6">
                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-b-0">Bar</h4>
                                
                                <div class="m-t-20">
@php

$seratus=100;
if ($countnewsiswa>0) {
$persen=$countnewsiswa * $seratus /$jumlahsiswa;
}

if(count($tb_m_pendapat_user)>0){

$persenPublish=$countPendapatuserpublish * $seratus /$countPendapatuser;
}

@endphp
                                    
                                    <div class="d-flex no-block align-items-center">
                                        <span>{{ $persen }}% Siswa Baru</span>
                                        <div class="ml-auto">
                                            <span>{{ $jumlahsiswa }}</span>
                                        </div>
                                    </div>

                                    @if($persen >75)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width:{{ $persen }}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @elseif($persen > 50)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:{{ $persen }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @elseif($persen > 25)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{ $persen }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @else
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{ $persen }}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @endif

                                </div>
                                @if(count($tb_m_pendapat_user)>0)
                                <div>
                                    <div class="d-flex no-block align-items-center m-t-25">
                                        <span>{{ $persenPublish }}% Publish Komentar</span>
                                        <div class="ml-auto">
                                            <span>{{ $countPendapatuser }}</span>
                                        </div>
                                    </div>
                                     @if($persenPublish >75)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width:{{ $persenPublish }}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @elseif($persenPublish > 50)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:{{ $persenPublish }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @elseif($persenPublish > 25)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{ $persenPublish }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @else
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{ $persenPublish }}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                
                            </div>
                        </div>
                        <!-- card -->
                        {{-- <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Our partner (Box with Fix height)</h4>
                            </div>
                            <div class="comment-widgets scrollable" style="max-height: 130px;">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="/assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">James Anderson</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">April 14, 2016</span> 
                                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            <button type="button" class="btn btn-success btn-sm">Publish</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="/assets/images/users/4.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">Michael Jorden</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">May 10, 2016</span> 
                                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            <button type="button" class="btn btn-success btn-sm">Publish</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="/assets/images/users/5.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Johnathan Doeting</h6>
                                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">August 1, 2016</span> 
                                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            <button type="button" class="btn btn-success btn-sm">Publish</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         --}}<!-- accoridan part -->
                    {{--     <div class="accordion" id="accordionExample">
                            <div class="card m-b-0">
                                <div class="card-header" id="headingOne">
                                  <h5 class="mb-0">
                                    <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="m-r-5 fa fa-magnet" aria-hidden="true"></i>
                                        <span>Accordion Example 1</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 fa fa-magnet" aria-hidden="true"></i>
                                        <span>Accordion Example 2</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 fa fa-magnet" aria-hidden="true"></i>
                                        <span>Accordion Example 3</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                                </div>
                            </div>
                        </div>
                     --}}    <!-- toggle part -->
             {{--            <div id="accordian-4">
                            <div class="card m-t-30">
                                <a class="card-header link" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-1" aria-expanded="true" aria-controls="Toggle-1">
                                    <i class="seticon fa fa-arrow-right" aria-hidden="true"></i>
                                    <span>Toggle, Open by default</span>
                                </a>
                                <div id="Toggle-1" class="collapse show multi-collapse">
                                    <div class="card-body widget-content">
                                        This box is opened by default, paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.
                                    </div>
                                </div>
                                <a class="card-header link border-top" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-2" aria-expanded="false" aria-controls="Toggle-2">
                                    <i class="seticon fa fa-times" aria-hidden="true"></i>
                                    <span>Toggle, Closed by default</span>
                                </a>
                                <div id="Toggle-2" class="multi-collapse collapse" style="">
                                    <div class="card-body widget-content">
                                        This box is now open
                                    </div>
                                </div>
                                <a class="card-header collapsed link border-top" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-3" aria-expanded="false" aria-controls="Toggle-3">
                                    <i class="seticon fa fa-times" aria-hidden="true"></i>
                                    <span>Toggle, Closed by default</span>
                                </a>
                                <div id="Toggle-3" class="collapse multi-collapse">
                                    <div class="card-body widget-content">
                                        This box is now open
                                    </div>
                                </div>
                            </div>
                        </div>
              --}}           <!-- Tabs -->
             {{--            <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Tab1</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Tab2</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Tab3</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                        <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment..</p>
                                        <img src="/assets/images/background/img4.jpg" class="img-fluid">
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                    <div class="p-20">
                                        <img src="/assets/images/background/img4.jpg" class="img-fluid">
                                        <p class="m-t-10">And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment..</p>
                                    </div>
                                </div>
                                <div class="tab-pane p-20" id="messages" role="tabpanel">
                                    <div class="p-20">
                                        <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment..</p>
                                        <img src="/assets/images/background/img4.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
              --}}       </div>
                </div>


    
</body>

<script type="text/javascript">
function deletePendapat(id){
  swal({
  title: 'Anda Yakin Menghapus Komentar ini?',
  text: 'Tindakan ini tidak bisa dibatalkan',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#DD6B55',
  confirmButtonText: 'Hapus!',
  CancelButtonColor: '#DD6B55',
  cancelButtonText: 'Cancel',
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
    if (isConfirm) {
       $.ajax({
               type:'get',
               url:'<?php echo url("/delete-user-pendapat-user"); ?>/'+id,
               success:function(data){
                  location.href ='{{url('/dashboard') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "Komentar Gagal Dihapus.", "error");
    }
});
}
</script>
</html> 
</center>
 {{--    <h4>Statistik Penulis</h4>
<canvas id="chartPenulis" width="400" height="150"></canvas>

<script src="{{ asset('js/Chart.min.js') }}"></script> 
<script> 
    var data = { 
        labels: {!! json_encode($tb_m_buy_ticket) !!},
        datasets: [{ 
            label: 'Jumlah Mata Pelajaran',
            data: {!! json_encode($tb_m_tiket) !!},
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
</script> --}} @endrole
@endsection



