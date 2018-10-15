@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title">Profile</h2>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{Route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
      
	<div class="panel panel-default">
				
				<div class="panel-body">
					<table class="table">
   						<tbody>
      						<tr>
         						<td class="text-muted">Nama</td>
         						<td>{{ auth()->user()->name }}</td>
      						</tr>
      						<tr>
      						<tr>
        						 <td class="text-muted">Email</td>
         						<td>{{ auth()->user()->email }}</td>
      						</tr>
      						<tr>
         						<td class="text-muted">Login terakhir</td>
         						<td>{{ auth()->user()->last_login }}</td>
     						</tr>
   						</tbody>
					</table>
						<a class="btn btn-primary" href="{{ url('/settings/profile/edit') }}">Ubah</a>
				</div>
			</div>
			</div>
		</div>
</div>
@endsection