@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h3 class="page-title">@lang('Service')</h3>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> service</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        
    <p>
        <a href="{{ route('service.create') }}" class="btn btn-success">@lang('Tambah')</a>
        
    </p>
    
    <div class="panel panel-default">
        
        <div class="panel-body table-responsive">
            <table class="table table-bordered {{ count($tb_m_service) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>@lang('No')</th>   
                        <th>@lang('Judul')</th>
                        <th>@lang('Deskripsi')</th>
                        <th>@lang('Foto')</th>
                        <th>@lang('Action')</th>
                       </tr>
                </thead>
                
                <tbody>
                    @if (count($tb_m_service) > 0)
                    @php $no=1; @endphp
                        @foreach ($tb_m_service as $data)
                            <tr data-entry-id="{{ $data->id }}">
                                
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{!! str_limit($data->deskripsi,50) !!}</td>
                                  
                                <td><img src="{{ asset('img/Fotoservice/'.$data->foto) }}" style="max-height:100px; max-width: 100px; margin-top:7px;"></td>
                                <td>
                                   <a class="btn btn-primary" href="{{ route('service.show',$data->id) }}"><i class="mdi mdi-eye"></i>Show</a>
                                   <a class="btn btn-warning" href="{{ route('service.edit',$data->id) }}">Edit</a>
                    
                                    <button onclick="deleteservice('{{$data->id}}')" class="btn btn-danger">delete</button>
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
function deleteservice(id){
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
               url:'<?php echo url("delete-service"); ?>/'+id,
               success:function(data){
                  location.reload();
                                      }
            });
       
    }else {
        swal("Cancel", "service ini tidak jadi di hapus.", "error");
    }
});
}
</script>

@endsection
                    
                    