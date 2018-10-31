@extends('layouts.admin')
@section('content')


  @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Sekolah </title>
  @endforeach


<div class="row">
    <div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Sekolah</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sekolah</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

          @if(session()->has('flash_notification_create.message'))
<div class="alert alert-{{ session()->get('flash_notification_create.level') }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {!! session()->get('flash_notification_create.message') !!}
</div>
@endif
          @if(session()->has('flash_notification.message'))
<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {!! session()->get('flash_notification.message') !!}
</div>
@endif

<br>

        <div class="col-md-12">
            <div class="panel panel-primary">
          <a class="btn btn-secondary" id="button" href="{{ route('sekolah.create') }}"><i class="mdi mdi-plus"></i>Tambah Data Sekolah</a>
         


              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                   <tr>
<td  colspan="5"  class=" text-center" >No</td>
<td  colspan="5"  class=" text-center" >Nama Sekolah</td>
<td  colspan="5" class="text-center ">Waktu Buka </td>
<td  colspan="5" class="text-center ">Hari Buka </td>
<td  colspan="5" class="text-center ">Alamat </td>
<td  colspan="5" class="text-center ">No Telpon </td>
<td  colspan="5" class="text-center ">Logo </td>

<td colspan="5" class="text-center">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($tb_s_sekolah as $data)


                      <tr >
                        <td id="valagency" colspan="5" class="text-center ">{{ $no++ }}</td>
                        <td id="valagency" colspan="5" class="text-center ">{{ $data->nama_sekolah }}</td>
                        <td id="valagency" colspan="5" class="text-center ">{{ $data->waktu_buka }}</td>
                        <td id="valagency" colspan="5" class="text-center ">{{ $data->hari_buka }}</td>
                        <td id="valagency" colspan="5" class="text-center ">{{ $data->alamat }}</td>
                        <td id="valagency" colspan="5" class="text-center ">{{ $data->no_telepon }}</td>   
                        <td id="valagency" colspan="5" class="text-center" ><img src="{{ asset('img/FotoSekolah/'.$data->logo) }}" style="max-height:100px; max-width: 100px; margin-top:7px;"></td>
                       <td id="valagency">
                            <a class="btn btn-primary" href="{{ route('sekolah.show',$data->id) }}"><i class="mdi mdi-eye"></i> Show </a>
                        </td>
                        <td id="valagency">
                            <a class="btn btn-warning" href="{{ route('sekolah.edit',$data->id) }}"><i class="mdi mdi-pencil"></i> Edit </a>
                        </td>
                        <td id="valagency">
                                     <button onclick="deleteSekolah('{{$data->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i>Delete</button>
              
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
  if(!$('#valagency').text()){
    $('#button').show();
}
else {
    $('#button').hide();
}
</script>

<script type="text/javascript">
function deleteSekolah(id){
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
               url:'<?php echo url("delete-sekolah"); ?>/'+id,
               success:function(data){
                  location.reload();
                                      }
            });
       
    }else {
        swal("Cancel", "Sekolah ini tidak jadi di hapus.", "error");
    }
});
}
</script>


@endsection

                    
                    