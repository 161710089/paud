@extends('layouts.admin')
@section('content')

    @foreach($sekolahs as $data)
        <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Pendapat User </title>
    @endforeach

@php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp

   <div class="panel-body table-responsive">
            <table class="table table-bordered  {{ count($tb_m_pendapat_user) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>@lang('Nama User')</th>
                        <th>@lang('Pendapat')</th>
                        <th>@lang('Tanggal')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                </thead>
    
                <tbody>
                    @if (count($tb_m_pendapat_user) > 0)
                        @foreach ($tb_m_pendapat_user as $data)
                      <tr data-entry-id="{{ $data->id }}">
                        <td class="">{{  $data->user->name}}</td>
                        <td class="">{!! $data->pendapat!!}</td>
                        <td class="">{{Date::parse($data->created_at)->diffForHumans()}}</td>
                        <td> 
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
                            </td>
                            <td>
                        <button onclick="deletePendapat('{{$data->id}}')" class="btn btn-danger"></i>Delete</button>
              
                                </td>
                            
                     </tr>
                     @endforeach
                     @else
                        <tr>
                            <td colspan="10">@lang('No Entries in Table')</td>
                        </tr>
                    @endif
</table>


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
                  location.href ='{{url('admin/pendapat_user') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "Komentar Gagal Dihapus.", "error");
    }
});
}
</script>



@endsection

