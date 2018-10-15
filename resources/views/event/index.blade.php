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
            <br>
        <div class="col-md-12">
            <div class="panel panel-primary">
          <a class="btn btn-secondary" href="{{ route('event.create') }}"><i class="mdi mdi-plus"></i></a>
          
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                   <tr>
<td colspan="5"  class=" text-center" >No</td>
<td colspan="5"  class=" text-center" >Judul</td>
<td colspan="5"  class=" text-center" >Nama Pengajar</td>
<td colspan="5"  class=" text-center" >Alamat</td>
<td colspan="5"  class=" text-center" >Ruang</td>
<td colspan="5"  class=" text-center" >Waktu</td>
<td colspan="5"  class=" text-center" >Waktu Selesai</td>
<td colspan="5"  class=" text-center" >Deskripsi</td>
<td colspan="5"  class=" text-center" >Foto</td>
<td colspan="5"  class=" text-center" >Action</td>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($tb_m_event as $data)


                      <tr>
                        <td colspan="5" class="text-center ">{{ $no++ }}</td>
                        <td colspan="5" class="text-center ">{{ $data->judul }}</td>
                        <td colspan="5" class="text-center ">{{ $data->tb_m_pengajar->nama }}</td>
                        <td colspan="5" class="text-center ">{{ $data->alamat }}</td>
                        <td colspan="5" class="text-center ">{{ $data->ruangan }}</td>
                        <td colspan="5" class="text-center ">{{ $data->waktu }}</td>
                        <td colspan="5" class="text-center ">{{ $data->waktu_selesai }}</td>
                        <td colspan="5" class="text-center ">{!! str_limit($data->deskripsi,50) !!}</td>
                       
                        <td colspan="5" class="text-center" ><img src="{{ asset('img/Fotoevent/'.$data->foto) }}" style="max-height:100px; max-width: 100px; margin-top:7px;"></td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('event.show',$data->id) }}"><i class="mdi mdi-eye"></i>Show</a>
                        </td>   
                        <td>
                            <a class="btn btn-warning" href="{{ route('event.edit',$data->id) }}"><i class="mdi mdi-pencil"></i>Edit</a>
                        </td>
                        <td>
                            <button onclick="deleteEvent('{{$data->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i>delete</button>
                        </td>
                      </tr>
                      @endforeach   
                    </tbody>
                  </table>
                  
                </div>
              </div>
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

                    
                    