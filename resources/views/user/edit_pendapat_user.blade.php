@extends('layouts.admin')
@section('content')

	@foreach($sekolahs as $data)
        <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | User | Koemntar Web </title>
    @endforeach

<link href="{{ asset('cesese/textarea.css') }}" rel="stylesheet">
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<script>
    		$(function(){
				$('.normal').autosize();
				$('.animated').autosize({append: "\n"});
			});
		</script>

<form action="{{ route('komentar-web-update.update',$tb_m_pendapat_user->id) }}" method="post" enctype="multipart/form-data" >
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}
            				
				<div class="row md-3">
					
  				<div class="col-lg-12">
		 <div class="well well-lg">
		 	<h3>Edit Komentar Tentang Web Kami</h3>
              <div class="media1">
        <div class="media-body">
                           <div class="form-group" style="padding:12px;">
                            <textarea class="form-control animated" name="pendapat" required>{{ $tb_m_pendapat_user->pendapat }}</textarea>
                            					
<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('id_user') ? 'has-error' : ''}}">
								<input type="hidden" value="{{Auth::user()->id }}"  class="form-control" name="id_user" required>
								@if ($errors->has('id_user'))
									<span class="help-blocks">
										<strong>{{$errors->first('id_user')}}</strong>
									</span>
								@endif
							</div>
						</div>
					<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">
								<input type="hidden" value="0"  class="form-control" name="status" required>
								@if ($errors->has('status'))
									<span class="help-blocks">
										<strong>{{$errors->first('status')}}</strong>
									</span>
								@endif
							</div>
						</div>
		
					</div>
		

     <button class="btn btn-info pull-right" style="margin-top:10px" type="submit">Kirim</button>
                           </div>
                       
        </div>
      </div>
     </div> 
	</div>
						</form>
						@endsection
