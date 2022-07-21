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
			width: 900px;
		}

	</style>
</head>
<body>
	<div class="container-fluid">
		<p><h2>List Data</h2></p>
		<div class="alert alert-info alert-block" style="text-align: right;">
    			<strong>Logged as : {{ Auth::user()->name }}</strong>
    			
    			<form method="post" action="{{ route('logout') }}">
    			<strong><a href="{{ route('logout') }}"> Logout </a></strong>
    			</form>
    			<strong><a href="{{ route('changepasspage') }}">Ganti Password </a></strong>	

		</div>
		<div class="nav"><a href="./tambah_data">Tambah Data</a></div>
		<div class="row tableFixHead" style="overflow-y: scroll;">
			<table class="table table-striped table-hover">
			<thead style="background-color: black">	
			<tr>	
				<th>Id.</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Created_At</th>
				<th>Updated_At</th>
			</tr>
			</thead>	
			@foreach($list as $index => $listing)

				<tr>
					<td>{{$listing['id']}}</td>
					<td>{{$listing['nama']}}</td>
					<td>{{$listing['alamat']}}</td>
					<td>{{$listing['created_at']}}</td>
					<td>{{$listing['updated_at']}}</td>
				</tr>
			@endforeach	
			</table>
		</div>

	</div>

</body>
</html>