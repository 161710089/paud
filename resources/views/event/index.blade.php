@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Event</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Event</li>
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

            <br>

<p>
        <a href="{{ route('event.create') }}" class="btn btn-success">@lang('Tambah')</a>
        
    </p>
<div class="panel panel-default">
        
        <div class="panel-body table-responsive">
            <table class="table table-bordered  {{ count($tb_m_event) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        <th>@lang('No')</th>
                        <th>@lang('Judul')</th>
                        <th>@lang('Pengajar')</th>
                        <th>@lang('Alamat')</th>
                        <th>@lang('Ruangan')</th>
                        <th>@lang('Waktu')</th>
                        <th>@lang('Waktu selesai')</th>
                        <th>@lang('Deskripsi')</th>
                        <th>@lang('Foto')</th>
                        <th>@lang('Action')</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tb_m_event) > 0)
                        @php $no=1; @endphp
                        @foreach ($tb_m_event as $data)
                            <tr data-entry-id="{{ $data->id }}">
                                
                                <td>{{ $no ++ }}</td>
                                <td>{{ $data->judul or '' }}</td>
                                <td>{{ $data->tb_m_pengajar->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->ruangan }}</td>
                                <td>{{ $data->waktu }}</td>
                              <td>{{ $data->waktu_selesai }}</td>
                        <td>{!! str_limit($data->deskripsi,50) !!}</td>
                       <td  class="text-center" ><img src="{{ asset('img/Fotoevent/'.$data->foto) }}" style="max-height:100px; max-width: 100px; margin-top:7px;"></td>
                          
                                <td>
                            <a class="btn btn-primary form-control" href="{{ route('event.show',$data->id) }}"><i class="mdi mdi-eye"></i>Show</a>
                            <center>-</center>
                            <a class="btn btn-warning form-control" href="{{ route('event.edit',$data->id) }}"><i class="mdi mdi-pencil"></i>Edit</a>
                            <center>-</center>
                            <button onclick="deleteEvent('{{$data->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i>delete</button>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('No Entries in Table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
        


<script type="text/javascript">
function deleteEvent(id){
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
                  location.reload();
                                      }
            });
       
    }else {
        swal("Cancel", "Event ini tidak jadi di hapus.", "error");
    }
});
}
</script>

@endsection

                    
                    