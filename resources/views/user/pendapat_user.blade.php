@extends('layouts.admin')
@section('content')


  @foreach($sekolahs as $data)
        <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | User | Komentar Web </title>
    @endforeach


  <link href="{{ asset('cesese/textarea.css') }}" rel="stylesheet">
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp


<script>
    		$(function(){
				$('.normal').autosize();
				$('.animated').autosize({append: "\n"});
			});
		</script>
	<table class="table table-striped table-bordered table-hover">
  
<tr>
  <td class=" success">No</td>
  <td class="success" >Komentar</td>
  <td class=" success">Tanggal</td>
  <td colspan="2" class=" success">Action</td>

</tr>
  					@php $no=1; @endphp
  					@foreach($tb_m_pendapat_user  as $data )
										
					<tr>
						<td>{{ $no++ }}</td>
                        <td class="">{!! $data->pendapat!!}</td>
                        <td class="">{{ Date::parse($data->created_at)->diffForHumans()}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('edit_pendapat_user',$data->id) }}">Edit</a>
                        </td>
                        <td class="">
                            
                        <button onclick="deletePendapat('{{$data->id}}')" class="btn btn-danger"></i>Delete</button>
              
                        </td>
                     </tr>
                     @endforeach
</table>
     {{ $tb_m_pendapat_user->appends(request()->input())->links() }}</body>
<br>
<form action="{{route('komentar-web.store')}}" enctype="multipart/form-data" method="post">
							{{csrf_field()}}
				<div class="row md-3">
					
  				<div class="col-lg-12">
		 <div class="well well-lg">
		 	<h3>Komentar Tentang Web Kami</h3>
              <div class="media1">
         
        <div class="media-body">
                                                
                           <div class="form-group" style="padding:12px;">
                            <textarea class="form-control animated" name="pendapat" placeholder="Berikan Komentar" required></textarea>
<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('id_user') ? 'has-error' : ''}}">
								<input type="hidden" value="{{Auth::user()->id }}"  class="form-control" name="id_user" required>
								@if ($errors->has('id_user'))
									<span class="help-blocks">
										<strong>{{$errors->first('id_user')}}</strong>
									</span>
								@endif
							</div>
						</div>
					<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">
								<input type="hidden" value="0"  class="form-control" name="status" required>
								@if ($errors->has('status'))
									<span class="help-blocks">
										<strong>{{$errors->first('status')}}</strong>
									</span>
								@endif
							</div>
						</div>
		
					</div>
		

     <button class="btn btn-info pull-right" style="margin-top:10px" type="submit">Kirim</button>
                           </div>
                       
        </div>
      </div>
     </div> 
	</div>
						</form>

@endsection

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
                  location.href ='{{url('user/komentar-web') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "Komentar Gagal Dihapus.", "error");
    }
});
}
</script>




