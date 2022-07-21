<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Ganti Password</title>

	<link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
	<script src="{{ mix('js/app.js') }}"></script>
	<style type="text/css">
		.container-fluid{
			width: 400px;
			padding-top: 100px;
		}
	</style>

</head>
<body>
	<div class="container-fluid mt-4">
		@include('flash-message')
		<!-- <div class="row" style="align-items: center;"> -->
			<div class="card">
				<div class="card-header"></div>
					<div class="card-body">

						<form method="post" action="{{route('changepass')}}" id="changepass" name="changepass">
							@csrf

							<label for="name">USERNAME</label>
							<input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}">

							<label for="password">Masukan Password saat ini</label>
							<input class="form-control" type="password" id="password" name="password">

							<label for="new_password">Masukan Password Baru</label>
							<input class="form-control" type="password" id="new_password" name="new_password">

							<label for="confirm_password">Konfirmasi Password Baru</label>
							<input class="form-control" type="password" id="confirm_password" name="confirm_password">

							<button class="btn btn-primary" style="margin-top:5px;" type="submit">Confirmed</button>

						</form>
					</div>
			</div>

		<!-- </div> -->


	</div>

</body>
</html>