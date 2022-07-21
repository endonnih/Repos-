<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>USER Administration</title>
<link rel="stylesheet" href="{{ mix('css/app.css')}}" type="text/css">
<script src="{{mix('js/app.js')}}"> </script>

</head>
<body>
	<div class="container-fluid mt-4">
		{{ $name }}
		<div class="row" style="margin-left: 0px;">
			<div class="col-sm">
				<li><a href="/register"> Register</a></li>
				<li><a href="./changepass" > Ganti Password</a></li>
				<li><a href="/admin/adminuser/dashboard" target="content">User Role Access</a></li>
				<p>-------------------------------------------------------- </p>
				<li><a href="/home">Home</li>
			</div>
			<div id="content" name="content">
				
			</div>
			
		</div>
</body>
</html>