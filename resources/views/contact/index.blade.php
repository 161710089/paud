@extends('layouts.admin')
@section('content')
<h3 class="page-title">@lang('contact_us')</h3>
    
@if(session()->has('flash_notification.message'))
<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {!! session()->get('flash_notification.message') !!}
</div>
@endif

    @foreach($sekolahs as $data)
      <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Tiket </title>
    @endforeach


    
    <div class="panel panel-default">
        
        <div class="panel-body table-responsive">
            <table class="table table-bordered {{ count($tb_s_contact_us) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        
                        <th>@lang('nama')</th>
                        <th>@lang('Subject')</th>
                        <th>@lang('No Telepon')</th>
                        <th>@lang('Email')</th>
                        <th>@lang('Tanggal')</th>
                        <th>@lang('action')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tb_s_contact_us) > 0)
                        @foreach ($tb_s_contact_us as $data)
                            <tr data-entry-id="{{ $data->id }}">
                                
                                <td>{{ $data->name  }}</td>
                                <td>{{ $data->subject }}</td>
                                <td>{{ $data->no_telepon }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                  <button type="button" data-toggle="modal" data-target="#myModal" value="{{($data->id)}}" class="btn btn-default-sm">
                                    <i class="mdi mdi-plus"></i>
                                   </button>
       
                                <button onclick="deletecontact_us('{{$data->id}}')" class="btn btn-danger">delete</button>
                                </td>

                            </tr>


                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('No Entries in Table')</td>
                        </tr>
                    @endif
       <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
      <br>
        <button type="button" class="close" data-dismiss="modal">&times;<br> </button>
        <br>
       </div>
      <div class="modal-body">
                     <form action="" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Biografi">Biografi</a></li> &nbsp; &nbsp;
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Foto">Foto</a></li> 
  </ul>

  <div class="tab-content">
    <div id="Biografi" class="tab-pane fade in active">
      @foreach($readmessage as $data)
          {{ $data->message }}
      @endforeach
        </div>  
  <div id="Foto" class="tab-pane fade">
      <div class="row md-3">
        
        <div class="col-md-12 col-lg-12 col-xlg-12">         
              <div class=" {{ $errors->has('foto') ? ' has-error' : '' }}">
                      <label >Foto</label>
                      
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="mdi mdi-close-outline"></span> Hapus
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" 
                        value="" class="form-control" name="foto"/> <!-- rename it -->
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
      @if ($errors->has('foto'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('foto') }}</strong>
                             </span>
                         @endif
                  </div>
            </div>
  </div>
      </div>
     
     </div>    
      
      <br>
      <div class="form-group">
                <button type="submit" class="btn btn-danger">Submit</button>

                <button type="submit" class="btn btn-warning">Reset</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
 
        </form>
    </div>
    </div>  
          </div>
          </div>  
  
 </body>


                </tbody>
            </table>
        </div>
    </div>
<script type="text/javascript">
function deletecontact_us(id){
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
               url:'<?php echo url("delete-contact_us"); ?>/'+id,
               success:function(data){
                  location.href ='{{url('admin/contact_us') }}';
                                      }
            });
       
    }else {
        swal("Cancel", "contact_us ini tidak jadi di hapus.", "error");
    }
});
}
</script>


@stop

