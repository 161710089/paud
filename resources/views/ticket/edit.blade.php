@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" type="text/css" href="/assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/libs/quill/dist/quill.snow.css">
    <link href="/dist/css/style.min.css" rel="stylesheet">
  

  
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <div class="row">
        <div class="container">
    
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Edit tiket</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('ticket.index') }}">tiket</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit tiket</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">
                        <a class="btn btn-primary" href="{{url()->previous()}}"><i class="mdi mdi-keyboard-backspace"></i></a>
                


                    <div class="panel-body">
             <form action="{{ route('ticket.update',$tb_m_ticket->id) }}" method="post" enctype="multipart/form-data" >
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}
            
<div class="row mb-3">

                <div class="col-md-3 col-lg-4">

<div class=" {{ $errors->has('id_event') ? ' has-error' : '' }}">
              <label class="control-label">Nama Pengajar</label> 
   <div class="input-group">

              <select name="id_event" class="form-control" >
                
                @foreach($tb_m_event as $data)
                <option value="{{ $data->id }}"{{$selectevent == $data->id ? 'selected="selected"':'' }} required>{{ 
                            $data->judul }}</option>
                @endforeach
              </select>
    </div>
    
              @if ($errors->has('id_event'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_event') }}</strong>
                            </span>
                        @endif
            </div>
            </div>
              
                <div class="col-md-6 col-lg-4 col-xlg-2">
                    <div class=" {{$errors->has('jumlah_tiket_tersedia') ? 'has-error' : ''}}">
                                <label >Jumlah Tiket Tersedia</label>
                                <input type="number" value="{{ $tb_m_ticket->jumlah_tiket_tersedia }}" class="form-control" name="jumlah_tiket_tersedia" required>
                                @if ($errors->has('jumlah_tiket_tersedia'))
                                    <span class="help-blocks">
                                        <strong>{{$errors->first('jumlah_tiket_tersedia')}}</strong>
                                    </span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xlg-2">
                    <div class=" {{$errors->has('harga') ? 'has-error' : ''}}">
                                <label >Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                <input type="text" value="{{ $tb_m_ticket->harga }}" class="form-control" name="harga" required>
                                </div>
                                @if ($errors->has('harga'))
                                    <span class="help-blocks">
                                        <strong>{{$errors->first('harga')}}</strong>
                                    </span>
                                @endif
                            </div>
                </div>
            </div>
                <div class="row mb-3">
            <div class="col-md-6 col-lg-4 col-xlg-2">
                    <div class=" {{$errors->has('tersedia_tanggal') ? 'has-error' : ''}}">
                                <label >Tersedia Tanggal </label>
                                <input type="text" value="{{ $tb_m_ticket->tersedia_tanggal }}"  class="form-control date" id="time" name="tersedia_tanggal" >
                                @if ($errors->has('tersedia_tanggal'))
                                    <span class="help-blocks">
                                        <strong>{{$errors->first('tersedia_tanggal')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            <div class="col-md-6 col-lg-4 col-xlg-2">
                    <div class=" {{$errors->has('sampai_tanggal') ? 'has-error' : ''}}">
                                <label >Sampai Tanggal</label>
                                <input type="text" value="{{ $tb_m_ticket->sampai_tanggal }}" class="form-control date" id="time2" name="sampai_tanggal" >
                                @if ($errors->has('sampai_tanggal'))
                                    <span class="help-blocks">
                                        <strong>{{$errors->first('sampai_tanggal')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
            
          
         

                 
            
            
                    
                            <div >
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>



                            </div>
                        </form>


      </div>
  </div>
</div>

<script>
    $('#time').datetimepicker({
        format: 'YYYY/MM/DD HH:mm:ss'
    });
    $('#time2').datetimepicker({
        format: 'YYYY/MM/DD HH:mm:ss'
    });
</script>

<script type="text/javascript">



    $('.date').datepicker({  


       format: 'yyyy/mm/dd'

     });  

</script> 

@endsection


