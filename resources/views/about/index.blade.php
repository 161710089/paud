@extends('layouts.admin')
@section('content')


  @foreach($sekolahs as $data)
    <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | About </title>
    @endforeach



<div class="row">
    <div class="container">

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">About</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> About</li>
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
        <div class="col-md-12">
            <div class="panel panel-primary">
              @if(count($tb_m_about)<=0)
          <a class="btn btn-secondary" href="{{ route('about.create') }}"><i class="mdi mdi-plus"></i></a>
              @endif
          @if(count($tb_m_history_about)>0)
          <a class="btn btn-secondary text-white" data-toggle="modal" data-target="#myModal" >Tambah History pencapaian</a>
              <div class="panel panel-default">
          @endif
        <br>
        <div class="panel-body table-responsive">
            <table class="table table-bordered {{ count($tb_m_about) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        
                        <th >@lang('About')</th>
                        <th colspan="2">@lang('Foto About')</th>
                        {{-- <th>@lang('Action')</th> --}}
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tb_m_about) > 0)
                        @foreach ($tb_m_about as $data)
                            <tr data-entry-id="{{ $data->id }}">
                                
                                <td>{!! $data->about !!}</td>
                                <td colspan="2"><img src="{{ asset('img/Fotoabout/'.$data->foto) }}" style="max-height:100px; max-width: 100px; margin-top:7px;"></td></td>
                                
                            </tr>


                        @endforeach
                        
                
                <thead>
                    <tr>
                        
                        <th >@lang('Hisitory')</th>
                        <th>@lang('Foto History')</th>
                        <th>@lang('Histori Pencapaian')</th>
                       
                    </tr>
                </thead>
                
                        @foreach ($tb_m_about as $data)
                            <tr data-entry-id="{{ $data->id }}">
                                
                                <td>{!! $data->about !!}</td>
                                <td><img src="{{ asset('img/Fotoabout/'.$data->foto) }}" style="max-height:100px; max-width: 100px; margin-top:7px;"></td>
                                    
                              <td>
                                @foreach($tb_m_history_about_pencapaian as $data)
                                -{{ $data->pencapaian }}<br>@endforeach
                              </td>
                                
                            </tr>


                   <tr>
                       <td colspan="5" class="text-center">
                                <a class="btn btn-warning" href="{{ route('about.edit',$data->id) }}"><i class="mdi mdi-pencil"></i> Edit</a>
                                &nbsp;
                                  
                                <button onclick="deleteabout('{{$data->id}}')" class="btn btn-danger"><i class="mdi mdi-delete"></i> Delete</button>
                                </td>

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
    </div>
</div>

</div>

<script type="text/javascript">
function deleteabout(id){
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
               url:'<?php echo url("delete-about"); ?>/'+id,
               success:function(data){
                  location.reload();
                                      }
            });
       
    }else {
        swal("Cancel", "about ini tidak jadi di hapus.", "error");
    }
});
}
</script>

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
                     <form action="{{route('history_about_pencapaian.store')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
  
  
  <div class="row mb-3">
          <div class="col-md-12 col-lg-12 col-xlg-12">
          <div class=" {{$errors->has('pencapaian') ? 'has-error' : ''}}">
                <label >Pencapaian</label>
                <input type="text" class="form-control" name="pencapaian" required>
                @if ($errors->has('pencapaian'))
                  <span class="help-blocks">
                    <strong>{{$errors->first('pencapaian')}}</strong>
                  </span>
                @endif
              </div>
        </div>        
          
          @foreach($tb_m_about as $data)
          <input type="hidden" name="id_history_about" value="{{ $data->tb_m_history_about->id }}" name="">
          @endforeach
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


@endsection

                    
                    
                    