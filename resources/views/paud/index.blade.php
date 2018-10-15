@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i></h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"><a href="">Home</a></i></li>
			<li><i class="fa fa-home"><a href="">Paud</a></i></li>
			<li><i class="fa fa-home"><a href="">Management Paud</a></i></li>
		</ol>
	</div>
</div>

<div class="row">
<div class="col-lg-12">
					<section class="panel panel-default">
						<header class="panel-heading">
							Management Paud
						</header>
						<form class="form-horizontal">
							
							<div class="panel-body" style="border-bottom: 1px solid #ccc;">								
								<div class="form-group">
									
									<div class="col-sm-3">
										<label for="academic-year">Academic Year</label>
										<div class="input-group">
											<select class="form-select" name="">
												
											</select>
											
										</div>
									</div>
								</div>
								
							</div>
							
						</form>
					</section>
	
</div>
	
</div>
@endsection