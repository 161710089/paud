@extends('layouts.admin')
@section('content')

    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Gallery </title>
    @endforeach


<div class="row">
    <div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Gallery</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Gallery</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <div class="col-md-12">
            <div class="panel panel-primary">
          <a class="btn btn-secondary" href="{{ route('gallery.create') }}"><i class="mdi mdi-plus"></i></a>
          
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                   <tr>
<td colspan="5"  class=" text-center" >No</td>
<td colspan="5"  class=" text-center" >Judul</td>
<td colspan="5"  class=" text-center" >Kategori</td>
<td colspan="5"  class=" text-center" >Foto</td>

<td colspan="5" class="text-center">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($tb_m_gallery as $data)


                      <tr>
                        <td colspan="5" class="text-center ">{{ $no++ }}</td>
                        <td colspan="5" class="text-center ">{{ $data->judul }}</td>
                        <td colspan="5" class="text-center ">{{ $data->tb_m_kategori_gallery->kategori }}</td>
                        
                        <td colspan="5" class="text-center" ><img src="{{ asset('img/Fotogallery/'.$data->foto) }}" style="max-height:100px; max-width: 100px; margin-top:7px;"></td>
                           <td>
                            <a class="btn btn-warning" href="{{ route('gallery.edit',$data->id) }}">Edit</a>
                        </td>
                        <td>
                            <button onclick="deleteGalerry('{{$data->id}}')" class="btn btn-danger">delete</button>
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
function deleteGalerry(id){
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
               url:'<?php echo url("delete-gallery"); ?>/'+id,
               success:function(data){
                  location.reload();
                                      }
            });
       
    }else {
        swal("Cancel", "gallery ini tidak jadi di hapus.", "error");
    }
});
}
</script>

@endsection

                    
                    