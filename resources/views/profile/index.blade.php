@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Form Show siswa
						

					<div class="row mb-3">
								
						<a class="btn btn-secondary" data-toggle="confirmation"  href="{{route('siswa.index')}}"><i class="mdi mdi-keyboard-backspace"></i></a>
					</div>
					</div>
					<div class="panel-body">
					<div class="row mb-3">


<div class="col-md-6 col-lg-4 col-xlg-3">					
  <div class=" {{ $errors->has('foto') ? ' has-error' : '' }}">
              <label >Foto</label>  
              <img src="" style="max-height:270px; max-width: 270px; margin-top:7px;">
              @if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                        @endif
            </div>
        </div>
    </div>
 			<div class="row mb-3">

			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('name') ? 'has-error' : ''}}">
								<label >Nama </label>
								<input type="text" value="{{ Auth::user()->name}}" class="form-control"  name="name" readonly>
								@if ($errors->has('name'))
									<span class="help-blocks">
										<strong>{{$errors->first('name')}}</strong>
									</span>
								@endif
							</div>
				</div>				
					<div class=" {{$errors->has('email') ? 'has-error' : ''}}">
								<label >Email</label>
								<input type="text" value="{{ Auth::user()->email}}" class="form-control" name="email" readonly>
								@if ($errors->has('email'))
									<span class="help-blocks">
										<strong>{{$errors->first('email')}}</strong>
									</span>
								@endif
							</div>
		
 			  	<div class="col-md-6 col-lg-4 col-xlg-3">
					<div class=" {{$errors->has('password') ? 'has-error' : ''}}">
								<label >Password</label>
								<input type="text" value="{{ Auth::user()->password}}" class="form-control" name="password" readonly>
								@if ($errors->has('password'))
									<span class="help-blocks">
										<strong>{{$errors->first('password')}}</strong>
									</span>
								@endif
							</div>
				</div>
				
			


					</div>
				</div>

 
</div>
   </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {        
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });   
    });
</script>

@endsection

