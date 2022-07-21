<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>
		
	</title>
	<link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
	<script src="{{ mix('js/app.js') }}"></script>

	<style type="text/css">
		body{
			margin: 0px;
			overflow-y: hidden;
			/*height: 100vh;*/
		}

		.row1{
			min-width: 100%;
			max-width: 100%;
			height:0px;
			padding-top: 0px;
			width: 100%;
		}
		.tableFixHead          { overflow: auto; height: 100vh;}
		.tableFixHead thead th { position: sticky; top: 0; z-index: 1; }

		table  { border-collapse: collapse; width: 100%; }
		th, td { padding: 8px 16px; }
		th     { background:#eee; }

		.container{
			height: 100vh;
			width: 100%;
		}
		.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
 		  background-color: lightyellow;
 		}
 		.buttonstyleDis{
 		 width: 80px;	
 		 box-shadow: 1px 1px 1px rgba(255, 0, 0, 0.4);
  		 transition: all 0.3s ease 0s;
 		 color: black;
 		}  
 		.buttonstyleDis:hover{
 		background-color: red;
  		box-shadow: 5px 5px 5px white;
  		color: #fff;
  		transform: translateY(-7px);
 		}
 		.buttonstyleEdt{
 		 width: 80px;	
 		 box-shadow: 1px 1px 1px rgba(0, 215, 255, 0.4);
  		 transition: all 0.3s ease 0s;
 		}  
 		.buttonstyleEdt:hover{
 		background-color: rgba(0, 233, 255, 0.4);;
  		box-shadow: 5px 5px 5px white;
  		color: #fff;
  		transform: translateY(-7px);
 		}

 		.buttonstyletambah{
 		 color: black;
 		 background-color: rgb(79, 138, 67);	
 		 box-shadow: 1px 1px 1px rgba(0, 215, 255, 0.4);
  		 transition: all 0.3s ease 0s;
 		}  
 		.buttonstyletambah:hover{
 		background-color: rgba(79, 138, 67, 0.4);;
  		box-shadow: 5px 5px 5px white;
  		color: #fff;
  		transform: translateY(-7px);
 		}

}
	</style>
</head>
<body>
	<div class="container-fluid">
		<p><h2>Customer Data</h2></p>
		<div class="alert alert-info alert-block" style="text-align: right;">
    			<strong>Logged as : {{ Auth::user()->name }}</strong>
    			
    			<form method="post" action="{{ route('logout') }}">
    			<strong><a href="{{ route('logout') }}"> Logout </a></strong>
    			</form>
    			<strong><a href="{{ route('changepasspage') }}">Ganti Password </a></strong>	

		</div>
		<!-- <div class="nav"><a href="./customer/tambah_data">Tambah Data</a></div> -->
		<div class="nav"><input type="button" class= " buttonstyletambah btn btn-info btn-lg" data-toggle="modal" data-target="#modal_tambah" value="Tambah Data"></div>

		<!-- <div class="row1 tableFixHead" style="overflow-y: scroll; height: 600px; padding-left: 5px;padding-right: 5px;padding-bottom: 2px; box-shadow: 12px,12px,'grey';"> -->
			<div class="row justify-content-center" style="width: 100%; margin-left: 2px; height: 600px; padding-left: 5px;padding-right: 5px;padding-bottom: 2px; box-shadow: 12px,12px,'grey';">
			<table id="table_customer" name="table_customer" class="table table-striped table-hover" >
				<thead>	
				<tr>	
					<!-- name	business	alamat	telp	pic	created_by	created_at	update_at	flaq -->

					<th>Id.</th>
					<th>Nama</th>
					<th>business</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Pic</th>
					<th>User</th>
					<th>Created_At</th>
					<th>Updated_At</th>
					<th>Flaq</th>
					<th>Edit</th>
					<th>Disable</th>

				</tr>
				</thead>

				<tbody>				
			@if($list)		
			@foreach($list as $index => $listing)
				<tr>
					<td>{{$listing['id']}}</td>
					<td>{{$listing['name']}}</td>
					<td>{{$listing['business']}}</td>
					<td>{{$listing['alamat']}}</td>
					<td>{{$listing['phone']}}</td>
					<td>{{$listing['pic']}}</td>
					<td>{{$listing['user']}}</td>
					<td>{{$listing['created_at']}}</td>
					<td>{{$listing['updated_at']}}</td>
					<td>{{$listing['flaq']}}</td>
					<td><button class="buttonstyleEdt btn btn-info" type="button">Edit</button></td>
					<td><button class="buttonstyleDis btn btn-danger" type="button">Disable</button></td>

				</tr>
			@endforeach	
			 
			@endif
				</tbody>
			</table>
		<!-- </div> -->

	<!-- </div> -->
	<!-- =============================Modal tambah Data ==================================== -->
	<div id=modal_tambah class="modal fade" style="margin-top:150px" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content"> 
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">	
					<form method="post" action="./customer/simpan_data">
					  @csrf	
						<label for="tambah_name">Customer_Name</label>
							<input class="form-control" type="text" id="tambah_name" name="tambah_name">
						<label for="tambah_business">Business</label>
							<input class="form-control" type="text" id="tambah_business" name="tambah_business">
						<label for="tambah_alamat">address</label>
							<input class="form-control" type="text" id="tambah_address" name="tambah_address">
						<label for="tambah_telepon">Phone</label>
							<input class="form-control" type="text" id = "tambah_phone" name="tambah_phone">
						<label for="tambah_pic">PIC</label>
							<input class="form-control" type="text" id= "tambah_pic" name="tambah_pic" >

							<input type="hidden" name="user-login" value="{{ Auth::user()->name }}">
							<div align="center" style="margin-top:2px;">
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>

					</form>
				</div>	
				
			</div>
		</div>
	</div>

</body>
<script>
	$(document).ready(function(){
		
    $('#table_customer').DataTable({
    	dom: 'Pfrtip',
    	fixedHeader: true,
    	"scrollY": 400,

    });

});
</script>
</html>