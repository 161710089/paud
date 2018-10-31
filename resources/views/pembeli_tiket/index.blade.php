@extends('layouts.admin')

@section('content')
    
    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Pembeli Tiket </title>
    @endforeach

    <h3 class="page-title">@lang('Pembeli Ticket')</h3>

    
    <div class="panel panel-default">
        
    @if(session()->has('flash_notification.message'))
<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {!! session()->get('flash_notification.message') !!}
</div>
@endif
    <div class="panel-body table-responsive">
            <table class="table table-bordered  {{ count($tb_m_buy_ticket) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>@lang('Event')</th>
                        <th>@lang('Pembeli')</th>
                        <th>@lang('Tanggal Beli')</th>
                        <th>@lang('action')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tb_m_buy_ticket) > 0)
                        @foreach ($tb_m_buy_ticket as $data)
                            <tr data-entry-id="{{ $data->id }}">
                                
                                <td>{{ $data->tb_m_ticket->tb_m_event->judul or '' }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->created_at }}</td>
                                  <td>
                                    <button onclick="deleteBuyTicketRecord('{{$data->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i>Delete</button>
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
function deleteBuyTicketRecord(id){
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
               url:'<?php echo url("delete-buy-ticket"); ?>/'+id,
               success:function(data){
                  location.reload();
                                      }
            });
       
    }else {
        swal("Cancel", "Pembeli ini tidak jadi di hapus.", "error");
    }
});
}
</script>

@stop

@section('javascript')

  @endsection