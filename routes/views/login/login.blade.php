<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
	<title>Please Login</title>
	<link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
	<script src="{{ mix('js/app.js') }}"></script>

	<style type="text/css">
		#html{
			overflow: hidden;
		}
		.container-fluid{
			overflow: hidden;
			height: 80vh;
			width: 400px;		
		}

		.card{
			overflow: hidden;
			margin-top: 150px;
			border-radius: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}
		#body{
			margin: 0;
			overflow: hidden;
		}
	</style>

</head>
<body>
	<div class="container-fluid mt-4">
    	<div class ="card">
		@include('flash-message');
    		
    		<div class="card-body">

    			<div class="card-header">Please Login</div>
    			     
    				<form id="login_form" name="login_form" method="post" action="{{ route('verified') }}">
    					@csrf
    					<label for="username">Username</label>
    					<input class= "form-control" type="text-black-50" id="name" name="name">
    					<label for="password">Password</label>
    					<input class= "form-control" type="password" id="password" name="password">
    					<button class="form-control btn btn-primary" style="margin-top: 10px;" type="submit" >Login</button>
    					<a href="{{ route('register') }}">click here to Register</a>


    				</form>
    			 <li class="nav-item menu-items">
      				<a class="nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
        
        				<span class="menu-icon">
          					<i class="mdi mdi-speedometer"></i>
        				</span>
        				<span class="menu-title">Logout</span>
    				</a>    
    			<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
        			{{ csrf_field() }}
    			</form>
    			</li> 
    			<!-- ============================== -->
    			<li class="nav-item menu-items">
      				<a class="nav-link href="{{ route('changepasspage') }}" onclick="event.preventDefault(); document.getElementById('frm-changepass').submit();">
        
        				<span class="menu-icon">
          					<i class="mdi mdi-speedometer"></i>
        				</span>
        				<span class="menu-title">Change Passwordt</span>
    				</a>    
    			<form id="frm-changepass" action="{{ route('changepasspage') }}" method="POST" style="display: none;">
        			{{ csrf_field() }}
    			</form>
    			</li>
    		</div>

    	</div>


    </div>

</body>
</html>