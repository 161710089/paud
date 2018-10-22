@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
              <h3 class="page-title">@lang('Kategori Gallery')</h3>
                       <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Kategori Gallery</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            @if(session()->has('flash_notification.message'))
<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {!! session()->get('flash_notification.message') !!}
</div>
@endif

            <br>
        
     <p>
        <a href="{{ route('kategori_gallery.create') }}" class="btn btn-success">@lang('Tambah')</a>
        
    </p>
    
    <div class="panel panel-default">
        
        <div class="panel-body table-responsive">
            <table class="table table-bordered  {{ count($tb_m_kategori_gallery) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        <th>@lang('No')</th>
                        <th>@lang('Kategori')</th>
                        <th>@lang('action')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tb_m_kategori_gallery) > 0)
                        @php $no=1; @endphp
                        @foreach ($tb_m_kategori_gallery as $data)
                            <tr data-entry-id="{{ $data->id }}">
                                <td>{{ $no ++ }}</td>
                                <td>{{ $data->kategori or '' }}</td>
                                  <td>
                                    <a class="btn btn-warning" href="{{ route('kategori_gallery.edit',$data->id) }}"><i class="mdi mdi-pencil"></i> Edit</a>
                    
                                    <button onclick="deleteKategoriGallery('{{$data->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i>Delete</button>
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
  </div>
</div>




<script type="text/javascript">
function deleteKategoriGallery(id){
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
               url:'<?php echo url("delete-kategori-gallery"); ?>/'+id,
               success:function(data){
                  location.reload();
                                      }
            });
       
    }else {
        swal("Cancel", "kategori gallery ini tidak jadi di hapus.", "error");
    }
});
}
</script>

@endsection

                    
                    