<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
	</title>
	<link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
	<script src="{{ mix('js/app.js') }}"></script>

	<style type="text/css">
		#body{
			overflow: hidden;
		}
		.row{
			height: 100vh;
		}
		.tableFixHead          { overflow: auto; height: 100vh;}
		.tableFixHead thead th { position: sticky; top: 0; z-index: 1; }

		table  { border-collapse: collapse; width: 100%; }
		th, td { padding: 8px 16px; }
		th     { background:#eee; }

		.container-fluid{
			width: 80%;
		}
		.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
 		  background-color: lightyellow;
}
	</style>
</head>
<body>
	<div class="container-fluid">
		<p><h2>Marketing Progress</h2></p>
		<div class="alert alert-info alert-block" style="text-align: right;">
    			<strong>Logged as : {{ Auth::user()->name }}</strong>
    			
    			<form method="post" action="{{ route('logout') }}">
    			<strong><a href="{{ route('logout') }}"> Logout </a></strong>
    			</form>
    			<strong><a href="{{ route('changepasspage') }}">Ganti Password </a></strong>	
    	<div class="nav"><input type="button" class= "btn btn-info btn-lg" data-toggle="modal" data-target="#modal_tambah" value="Tambah Data"></div>
		<!-- <div class="row tableFixHead" style="overflow-y: scroll; padding-left: 5px;padding-right: 5px;padding-bottom: 5px; box-shadow: 12px,12px,'grey';"> -->
			
			<table id="table_progress" name="table_progress" class="table table-striped table-hover" >
				<thead>	
				<tr>	
					
					<th>id</th>	
					<th>Id_customer</th>	
					<th>User</th>	
					<th>Service Offers</th>	
					<th>Service_Duration</th>	
					<th>Starting date</th>	
					<th>End_date</th>	
					<th>Deskripsi</th>	
					<th>Created_at</th>	
					<th>Update_at</th>	
					<th>Flaq</th>

				</tr>
				</thead>

				
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>

					</tr>
				</tbody>

			</table>	
		</div>
	</div>
	<script>
	$(document).ready(function(){
		
    $('#table_project').DataTable({
    	dom: 'Pfrtip',
    	fixedHeader: true,

    });

    $('#datetimepicker1').datetimepicker();


	});
</script>

</body>
	<div id=modal_tambah class="modal fade" style="margin-top:120px;" role="dialog">
		<div class="modal-dialog" >
			<div class="modal-content"> 
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">	
					<form id="form_visit" name="form_visit" method="post" action="./customer_visit/simpan">
					  @csrf	
						<label for="cust_id">Cust_id</label>
							<input class="form-control" type="text" id="cust_id" name="cust_id" readonly=true>

						<label for="tambah_name">Customer Name</label>
						<select>
							<option value="0">========================</option>
						</select>
							<input type="hidden" id="hidden_cust_name"name="hidden_cust_name">

						<label for="tambah_alamat">Alamat</label>
							<input class="form-control" type="text" id="tambah_alamat" name="tambah_alamat">	
	
						
						<label for="tambah_date">Date</label>
							<!-- <input class="form-control" type="date" id="tambah_date" name="tambah_date">	 -->
							<div class='input-group date' id='datetimepicker1' name="tambah_date">

           					    <input type='text' class="form-control" />
           					    <span class="input-group-addon">
           					    <span class="glyphicon glyphicon-calendar"></span>
           					    </span>
           					</div>


						<label for="tambah_business">meeting_point</label>
							<input class="form-control" type="text" id="tambah_meeting_point" name="tambah_meeting_point">
						
						<label for="tambah_service_offers">Service To Offers</label>

							<select class="form-control" id = "tambah_so" name="tambah_so">
								<option value="Off Air">Off Air</option>
								<option value="On Air">On Air</option>
								<option value="Off Air dan On Air">Off Air dan On Air</option>


							</select>
						<label for="tambah_progress">Progress Stage</label>
							<select class="form-control" id= "tambah_progress" name="tambah_progress" >

								<option value=0>===================</option>
								<option value=1>Prospect</option>
								<option value=2>Appointment Schedule</option>
								<option value=3>Analysis & Requirement</option>
								<option value=4>Deal processt</option>
								<option value=5>Contract Sent</option>
								<option value=6>Contract lost</option>

							</select>	

							<input type="hidden" name="user-login" value="{{ Auth::user()->name }}">
							<div align="center" style="margin-top:2px;">
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>

					</form>
				</div>	
				
			</div>
		</div>
	</div>
</html>