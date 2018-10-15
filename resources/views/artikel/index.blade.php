@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Artikel</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Artikel</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <div class="col-md-12">
            <div class="panel panel-primary">
          <a class="btn btn-secondary" href="{{ route('artikel.create') }}"><i class="mdi mdi-plus"></i></a>
          
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                   <tr>
<td colspan="5"  class=" text-center" >No</td>
<td colspan="5"  class=" text-center" >Judul</td>
<td colspan="5"  class=" text-center" >Deskripsi</td>
<td colspan="5"  class=" text-center" >penulis</td>
<td colspan="5"  class=" text-center" >Foto</td>

<td colspan="5" class="text-center">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($tb_m_artikel as $data)


                      <tr>
                        <td colspan="5" class="text-center ">{{ $no++ }}</td>
                        <td colspan="5" class="text-center ">{{ $data->judul }}</td>
                        <td colspan="5" class="text-center ">{!! str_limit($data->deskripsi,250) !!}</td>
                        <td colspan="5" class="text-center ">{{ $data->user->name }}</td>
                        <td colspan="5" class="text-center" ><img src="{{ asset('img/Fotoartikel/'.$data->foto) }}" style="max-height:100px; max-width: 100px; margin-top:7px;"></td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('artikel.show',$data->id) }}"><i class="mdi mdi-eye"></i>Show</a>
                        </td>   
                        <td>
                            <a class="btn btn-warning" href="{{ route('artikel.edit',$data->id) }}"><i class="mdi mdi-pencil"></i>Edit</a>
                        </td>
                        <td>
                            <button onclick="deleteArtikel('{{$data->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i>delete</button>
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
function deleteArtikel(id){
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
               url:'<?php echo url("delete-artikel"); ?>/'+id,
               success:function(data){
                  location.reload();
                                      }
            });
       
    }else {
        swal("Cancel", "Artikel ini tidak jadi di hapus.", "error");
    }
});
}
</script>

@endsection

                    
                    