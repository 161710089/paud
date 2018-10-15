@extends('layouts.admin')
@section('content')

	@if ($tb_m_buy_ticket->count() == 0)
	<center>	
	<span class="succes">Tidak ada Tiket Yang Dibeli!</span>	
	</center>
  	@else
<table class="table table-striped table-bordered table-hover">
  
<tr>
  <td class=" success">No</td>
  <td class="success" >Event</td>
  <td class=" success">Action</td>
</tr>
  					@php $no=1; @endphp
  					@foreach($tb_m_buy_ticket  as $data )
										
					<tr>
						<td>{{ $no++ }}</td>
                        <td class="">{{ $data->tb_m_ticket->tb_m_event->judul  }}</td>
                        <td class="">
                            
                        <button onclick="batalBeli('{{$data->id}}')" class="btn btn-danger"></i>Batal</button>
              
                        </td>
                     </tr>
                     @endforeach
</table>
	@endif
@endsection

<script type="text/javascript">
function batalBeli(id){
  swal({
  title: 'Anda Yakin batal untuk membeli tiket ini?',
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
               url:'<?php echo url("delete-user-ticket"); ?>/'+id,
               success:function(data){
                  location.href ='{{url('user/tiket') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "Batal.", "error");
    }
});
}
</script>

