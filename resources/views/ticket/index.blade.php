@extends('layouts.admin')
@section('content')
<h3 class="page-title">@lang('Ticket')</h3>
    
@if(session()->has('flash_notification.message'))
<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {!! session()->get('flash_notification.message') !!}
</div>
@endif

    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Tiket </title>
    @endforeach


    <p>
        <a href="{{ route('ticket.create') }}" class="btn btn-success">@lang('Tambah')</a>   
    </p>
    
    <div class="panel panel-default">
        
        <div class="panel-body table-responsive">
            <table class="table table-bordered {{ count($tb_m_ticket) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        
                        <th>@lang('event')</th>
                        <th>@lang('jumlah tiket tersedia')</th>
                        <th>@lang('tersedia tanggal')</th>
                        <th>@lang('sampai tanggal')</th>
                        <th>@lang('harga')</th>
                        <th>@lang('action')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tb_m_ticket) > 0)
                        @foreach ($tb_m_ticket as $data)
                            <tr data-entry-id="{{ $data->id }}">
                                
                                <td>{{ $data->tb_m_event->judul or '' }}</td>
                                <td>{{ $data->jumlah_tiket_tersedia }}</td>
                                <td>{{ $data->tersedia_tanggal }}</td>
                                <td>{{ $data->sampai_tanggal }}</td>
                                <td>Rp.{{ $data->harga }}</td>
                                <td>
                                <a class="btn btn-warning" href="{{ route('ticket.edit',$data->id) }}"><i class="mdi mdi-pencil"></i> Edit</a>
                    
                                <button onclick="deleteTicket('{{$data->id}}')" class="btn btn-danger">delete</button>
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
<script type="text/javascript">
function deleteTicket(id){
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
               url:'<?php echo url("delete-ticket"); ?>/'+id,
               success:function(data){
                  location.href ='{{url('admin/ticket') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "Ticket ini tidak jadi di hapus.", "error");
    }
});
}
</script>


@stop

