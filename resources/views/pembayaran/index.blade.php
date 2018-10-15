@extends('layouts.admin')
@section('content')
  <link href="/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
		table{
			border-collapse:collapse;
			width:100%;
			white-space: nowrap;
		}

		th{
			padding:3px;
		}

		tr,td,th{
			border: 1px solid #ccc;
			padding: 2px 2px 2px;
		}

		tbdody.last-row > tr:last-child{
			background: #ffc;
		}

		tbdody.first-row > tr:first-child{
			background: #ffc;
		}

		thead > th{
			border: 1px solid;
		}

		p{
			text-align:center;
			color:green;
			margin-top: -10px;
		}
		.list-student-fee > thead > tr >th {
			border :1px solid;
			padding: 5px 5px;
			}
		.list-student-fee > tbody > tr > td{
			border :1px solid;
			padding: 5px 5px;
		}
		table tr > td > input[type='text']{height: 30px; width:100%;padding:5px;}
		select {height:30;width:190px;}
		caption {background: transparent;border: none;color: #e410a1;padding-bottom: 5px;font-size: 11pt;}
		.panel-heading {display: inline-flex;width: 100%;}
		.eng-name{margin-top: 10px;}
		.date-invoice{margin:10px;text-align: right;}
		.invoice-number{margin: 10px;text-align: right;}
		.search{display: inline-block;float: right;}
		.disabled-bg{background: #e8e8e8;}
		.balance-red{font-weight: bold;color: blue;}
		.bg_flat{background: #eee; border: 1px solid #ccc;}
		#dialog-form-student-school-fee{display: none;}
		#dialog-form-list-sale-product{display: none;}
		#fee {height: 30px;width: 100%; padding:5px; background: rgb(245, 245 ,245);border: 1px solid rgb(204, 204 ,204);}
		.search-payment {width: 200px;margin-left: -15px; margin-top:10px; }
</style>

<div class="panel panel-default">



	<div class="panel-heading">
		<div class="col-md-3"> 
		<form action="{{ Route('lihatPembayaranSiswa') }}" class="search-payment" method="GET">
			<input class="form-control" name="id_siswa" placeholder="ID siswa" type="text">
		</form>
	</div>
	<div class="col-md-3">
		<label class="eng-name">Name: <b class="student-name"></b></label>
	</div>
	<div class="col-md-3">
	</div>
	<div class="col-md-3" style="text-align: right;">
				<label class="date-invoice">Date: <b>{{ date('d-M-Y') }}</b></label>
	</div>

	<div class="col-md-3" style="text-align: right;">
				<label class="invoice-number">Receipt N<sup>0</sup>:<b></b></label>		
	</div>
</div>

<div class="panel-body">
	<table style="margin-top: -12px; ">
		<caption class="academicDetail">
			/dxad
		</caption>
					<thead>
						<tr>
							<th>Program</th>
							<th>Level</th>
							<th>School</th>
							<th>Jumlah(Rp)</th>
							<th>Diskon(%)</th>
							<th>Bayar(Rp)</th>
							<th>Jumlah Kurang(Rp)</th>
							
						</tr>
					</thead>

					<tr>
						<td>
							<select id="AcademicID" name="AcademicID">
								<option value="">-------</option>
							</select>
						</td>

						<td>
							<select>
								<option value="">--------</option>
							</select>
						</td>

						<td>
							<input type="text" name="fee" id="Fee" readonly="true">
							<input type="hidden" name="fee_id" id="fee_id">
							<input type="hidden" name="id_siswa" id="IDsiswa">
							<input type="hidden" name="id_level" id="IDlevel">
							<input type="hidden" name="id_user" id="IDuser">
							<input type="hidden" name="transacdate" id="TransacDate">
						</td>

						<td>
							<input type="text" name="jumlah" id="Jumlah" required>
						</td>

						<td>
							<input type="text" name="diskon" id="Diskon">
						</td>

						<td>
							<input type="text" name="bayar" id="Bayar">
						</td>

						<td>
							<input type="text" name="balance" id="Balance">
						</td>

					</tr>
	

					<thead>
						<tr>
							<th colspan="2">Remark</th>
							<th colspan="5">Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="2">
								<input type="text" name="description" id="description">
							</td>
							<td colspan="5">
								<input type="text" name="remark" id="remark">
							</td>
						</tr>
					</tbody>
	</table>
	
</div>

	<div class="panel-footer" style="height: 40px;">
	</div>
</div>
@endsection