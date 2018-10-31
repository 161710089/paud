@extends('layouts.admin')
@section('content')

    @foreach($sekolahs as $data)
        <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Pendapat User </title>
    @endforeach

@php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp

    <table class="table table-striped table-bordered table-hover">
  
<tr>
  <td class="success" >Livechat</td>
  <td>

   @foreach($tb_s_widget  as $data ) 
      @if($data->status_livechat == 1)    
      <form action="{{ route('widget.publish',$data->id) }}" method="post">
          @csrf
      <button type="submit" class="btn btn-danger">Nonaktifkan</button>
      </form>
      @elseif($data->status_livechat == 0)
      <form action="{{ route('widget.publish',$data->id) }}" method="post">
          @csrf
          <button class="btn btn-info" type="submit">Aktifkan</button>
      </form>
      @endif
                    
    @endforeach
  
  </td>
  
</tr>
                    
                            
                     
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

