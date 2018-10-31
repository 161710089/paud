@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="container">

      @foreach($sekolahs as $data)
        <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Kategori Artikel | Edit </title>
      @endforeach


<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tambah Kategori artikel</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{Route('kategori_artikel.index') }}">Kategori artikel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah Kategori artikel</li>
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

            <form action="{{ route('kategori_artikel.update',$tb_m_kategori_artikel->id) }}" 
                method="post" enctype="multipart/form-data" >
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}
  	                    <div class="col-md-6 col-lg-4 col-xlg-3">
                            <div class="form-group {{$errors->has('kategori') ? 'has-error' : ''}}">
                                <label class="control-label">Nama Kategori </label>
                                <input type="text"  class="form-control" value="{{ $tb_m_kategori_artikel->kategori }}" name="kategori">
                                @if ($errors->has('kategori'))
                                    <span class="help-blocks">
                                        <strong>{{$errors->first('kategori')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>      
    
							<div class="form-group">
								<button onclick="editkatgal" class="btn btn-primary">Tambah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript">
function editkatgal(id){
  swal({
  title: 'Pastikan untuk melakukan tindakan ini?',
  text: 'Tindakan ini tidak bisa dibatalkan',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#DD6B55',
  confirmButtonText: 'Edit!',
  cancelButtonText: 'Cancel',
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
    if (isConfirm) {
       $.ajax({
               type:'get',
               url:'<?php echo url("kategori_artikel.update"); ?>/'+id,
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
