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
		<!-- @include("flash-message") -->
		<div class="alert alert-info alert-block" style="text-align: right;">
    			<strong>Logged as : {{ Auth::user()->name }}</strong>
    			
    			<form method="post" action="{{ route('logout') }}">
    			<strong><a href="{{ route('logout') }}"> Logout </a></strong>
    			</form>
    			<strong><a href="{{ route('changepasspage') }}">Ganti Password </a></strong>	

		</div>
		<div class="row justify-content-center" style="width:100%;height:600px;margin-left: 2px;padding-right: 2px;padding-left: 2px; border-radius: 12px;">
			<table class="table table-striped">
			  <thead>
			  	<tr>
					<th>Id</th>
					<th>Name</th>	
					<th>E-mail</th>	
					<th>Password</th>
					<th>Access Role</th>
					<th>Role Description</th>
					<th>Created At</th>	
					<th>Update At</th>
					<th>Status</th>	
					<th>Enable</th>
					<th>Disable</th>

				</tr>
			  </thead>

			  <tbody>
			  @if($users)
			  	<?php 
			  		// $role_desc="";

			  	?>
			  	@foreach($users as $index => $userlist)


			  	<?php 
			  		$id = $userlist['id'];
			  		$flaq = $userlist['flaq'];
			  		$role = $userlist['role'];

			  		switch($role){
			  			case 1:
			  			$role_desc="Admin User";
			  			break;
			  			case 2:
			  			$role_desc="Marketing";
			  			break;
			  			case 3:
			  			$role_desc="Finance";
			  			break;
			  			case 4:
			  			$role_desc ="Warehouse";
			  			break;

			  			

			  		}
			  		


			  	?>

			  	<tr>

			  		<td>{{$userlist['id']}}</td>
			  		<td>{{$userlist['name']}}</td>
			  		<td>{{$userlist['email']}}</td>
			  		<td>{{$userlist['password']}}</td>
			  		<td>{{$userlist['role']}}</td>
			  		<td>{{$role_desc}}</td>

			  		<td>{{$userlist['created_at']}}</td>
			  		<td>{{$userlist['updated_at']}}</td>
			  		<td>{{$userlist['flaq']}}</td>
					<!-- <td><button id="enable_user" class="btn btn-info" >Enable</button></td> -->
					<form id="form" name="form"></form>
					<td><button id="enable_user" class="btn btn-info" onclick="enable_user('{{$id}}','{{$flaq}}');">Enable</button></td>
					<td><button id="disable_user" class="btn btn-danger" onclick="disable_user('{{$id}}','{{$flaq}}');">Disable</button></td>

			  	</tr>
			  	@endforeach
			  @endif
					
			  </tbody>
			  <tfoot></tfoot>

			</table>
		</div>
	</div>

<script>
 function enable_user(ids,flaq){
 	// alert(ids+"::"+flaq);



    	// var param1 = $('select[name=tambah_cust_name] option').filter(':selected').val();
    	// alert(param1);

    	// var cust_name = $("#tambah_cust_name option:selected").text();
    	// alert(cust_name);

    	// $('#tambah_cust_name')
    	var form_data = new FormData(document.getElementById('form'));
                        form_data.append('ids',ids);
                        form_data.append('flaq',flaq);

                     // form_data.append('kode',kode);
        // alert("save Membership");
             

                    $.ajaxSetup({
                        header:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                     });

                    jQuery.ajax({
                        "_token" : "{{ csrf_token() }}",
                        type:'POST',
                        url: '/admin/adminuser/enable' + '?_token=' + '{{csrf_token()}}',
                        async:false,
                        enctype: 'multipart/form-data',
                        dataType: 'JSON',
                        contentType: false,
                        processData: false,
                        data:form_data, 
                        
                    success: function(data){
                    	alert("Activasi User SUCCESS...");
                    	
                    	// $id = data['id'];
                    	// $cust_name = data['name'];
                    	// $alamat = data['alamat'];

                    	// $('#cust_id').val($id);
                    	// $('#hidden_cust_name').val($cust_name);
                    	// $('#tambah_alamat').val($alamat);
                    	// alert($id);

                    	location.reload();
            
					},
					error: function(data){
						alert("FAILED !!!");

					}
				});


 }
 function disable_user(ids,flaq){
 	// alert(ids+"::"+flaq);



    	// var param1 = $('select[name=tambah_cust_name] option').filter(':selected').val();
    	// alert(param1);

    	// var cust_name = $("#tambah_cust_name option:selected").text();
    	// alert(cust_name);

    	// $('#tambah_cust_name')
    	var form_data = new FormData(document.getElementById('form'));
                        form_data.append('ids',ids);
                        form_data.append('flaq',flaq);

                     // form_data.append('kode',kode);
        // alert("save Membership");
             

                    $.ajaxSetup({
                        header:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                     });

                    jQuery.ajax({
                        "_token" : "{{ csrf_token() }}",
                        type:'POST',
                        url: '/admin/adminuser/disable' + '?_token=' + '{{csrf_token()}}',
                        async:false,
                        enctype: 'multipart/form-data',
                        dataType: 'JSON',
                        contentType: false,
                        processData: false,
                        data:form_data, 
                        
                    success: function(data){
                    	alert("Deactivated User SUCCESS...");
                    	// $id = data['id'];
                    	// $cust_name = data['name'];
                    	// $alamat = data['alamat'];

                    	// $('#cust_id').val($id);
                    	// $('#hidden_cust_name').val($cust_name);
                    	// $('#tambah_alamat').val($alamat);
                    	// alert($id);

                    	location.reload();
            
					},
					error: function(data){
						alert("FAILED !!!");

					}
				});

 }		

</script>

</body>

</html>