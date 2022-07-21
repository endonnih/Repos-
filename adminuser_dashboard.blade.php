<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin User</title>
	<link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
	<script src="{{ mix('js/app.js') }}"></script>
	<style type="text/css">
		th{
			height: 50px;
			background-color: silver;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		
		<div class="row justify-content-center" style="width:100%;height:150px;margin-left: 2px;padding-right: 2px;padding-left: 2px; border-radius: 12px;">
			<div class=" card mt-4 float-left" style="border-radius: 10px";>
					<div class="card-header" align="center">User List</div>
						<div class="flip-card">
							<div class="flip-card-inner">
							    <div class="flip-card-front">
							      <img src="{{asset('images/img_avatar.jpg')}}" alt="Avatar" style="width:182px;height:150px;">
							    </div>
							    <div class="flip-card-back">
							      <!-- <h1>test test</h1> -->
							      <div style="padding: 50px">
							      <a class=" buttonstyle btn btn-danger" href="/admin/adminuser">Get In</a>
							     	</div>
							      <!-- <p>We love that guy</p> -->
							    </div>
							</div>
						</div>
							
				</div>
		<!-- //============================================ -->
			<div class=" card mt-4 float-left" style="border-radius: 10px;margin-left:4px";>
					<div class="card-header" align="center">Customer Data</div>
						<div class="flip-card">
							<div class="flip-card-inner">
							    <div class="flip-card-front">
							      <img src="{{asset('images/img_avatar1.jpg')}}" alt="Avatar" style="width:182px;height:150px;">
							    </div>
							    <div class="flip-card-back">
							      <!-- <h1>test test</h1> -->
							      <div style="padding: 50px">
							      <a class=" buttonstyle btn btn-danger" href="/marketing/customer">Get In</a>
							     	</div>
							      <!-- <p>We love that guy</p> -->
							    </div>
							</div>
						</div>
							
				</div>
		</div>

	</div>


</body>
</html>