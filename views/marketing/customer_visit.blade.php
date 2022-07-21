<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
	</title>

	  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> -->

  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
 -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->



	<link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
	<script src="{{ mix('js/app.js') }}"></script>

	<style type="text/css">
		body{
			overflow: hidden;
		}
		/*.row{
			height: 100vh;
			width: 900px;
		}*/
		.tableFixHead          { overflow: auto; height: 100vh;}
		.tableFixHead thead th { position: sticky; top: 0; z-index: 1; }

		table  { border-collapse: collapse; width: 100%; }
		th, td { padding: 8px 16px; }
		th     { background:#eee; }

		.container-fluid{
			/*width: 100%;*/
			height: 100vh;
		}
		.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
 		  background-color: lightyellow;
}
	</style>
</head>
<body>
	<div class="container-fluid">
		<p><h2>Marketing Visits</h2></p>
		<div class="alert alert-info alert-block" style="text-align: right;">
    			<strong>Logged as : {{ Auth::user()->name }}</strong>
    			
    			<form method="post" action="{{ route('logout') }}">
    			<strong><a href="{{ route('logout') }}"> Logout </a></strong>
    			</form>
    			<strong><a href="{{ route('changepasspage') }}">Ganti Password </a></strong>	
    		<!-- <div class="nav"><a href="./tambah_data">Tambah Data</a></div> -->
		<div class="nav"><input type="button" class= "btn btn-info btn-lg" data-toggle="modal" data-target="#modal_tambah" value="Tambah Data"></div>



		<!-- <div class="row tableFixHead" style="overflow-y: scroll; padding-left: 5px;padding-right: 5px;padding-bottom: 5px; box-shadow: 12px,12px,'grey';"> -->
		<div class="row justify-content-center" style="height:600px; padding-left: 5px;padding-right: 5px;padding-bottom: 5px; box-shadow: 12px,12px,'grey';">
			<?php 
			$i = 0; 
			?>

			<table id = "table_visit" name="table_visit" class="table table-striped table-hover" >
				<thead>	
				<tr>	
					<th>ID</th>
					<th>Id Customer.</th>
					<th>Customer Name</th>
					<th>Alamat</th>
					<th>Meeting Point</th>
					<th>Date</th>
					<th>Service Offers</th>
					<th>Progress</th>
					<th>User</th>
					<th>Flaq</th>
					<th>Created_At</th>
					<th>Updated_At</th>

				</tr>
				</thead>
    <!-- id    id_customer    user      alamat    meeting_point  date      service_offer  progress  flaq      created_at     updated_at  -->
    			
				
    			@if($list)
	    			@foreach($list as $index => $listing)
	    			<?php $i++; 
	    			?>	
					<tr>
						<td>{{$i}}</td>
						<td>{{$listing['id_customer']}}</td>
						<td>{{$listing['name']}}</td>
						<td>{{$listing['alamat']}}</td>
						<td>{{$listing['meeting_point']}}</td>
						<td>{{$listing['date']}}</td>
						<td>{{$listing['service_offer']}}</td>
						<td>{{$listing['progress']}}</td>
						<td>{{$listing['user']}}</td>
						<td>{{$listing['flaq']}}</td>
						<td>{{$listing['created_at']}}</td>
						<td>{{$listing['updated_at']}}</td>


					</tr>
					@endforeach
				@endif

			</table>	
		<!-- </div> -->
	</div>
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
							<select class="form-control" id="tambah_cust_name" name="tambah_cust_name" onchange="javascript:select_customer()"> 
						@if($list_customer)	
							@foreach($list_customer as $index =>$listing_customer)	
							<option value=0 >===================</option>
							<option value="{{$listing_customer['id']}}">{{$listing_customer['name']}}</option>	
							@endforeach
						@endif	
							</select>

							<input type="hidden" id="hidden_cust_name"name="hidden_cust_name">

						<label for="tambah_alamat">Alamat</label>
							<input class="form-control" type="text" id="tambah_alamat" name="tambah_alamat">	
	
						
						<label for="tambah_date">Date</label>
							<!-- <input class="form-control" type="date" id="tambah_date" name="tambah_date">	 -->
							<div class='input-group date' id='datetimepicker1' >

           					    <input type='text' class="form-control" name="tambah_date" />
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

</body>
<script>
	$(document).ready(function(){
		
    $('#table_visit').DataTable({
    	dom: 'Pfrtip',
    	fixedHeader: true,
    	"scrollY": 400,

    });

    $('#datetimepicker1').datetimepicker();


});

         
             

	function select_customer(){

    	var param1 = $('select[name=tambah_cust_name] option').filter(':selected').val();
    	// alert(param1);

    	var cust_name = $("#tambah_cust_name option:selected").text();
    	// alert(cust_name);

    	// $('#tambah_cust_name')
    	var form_data = new FormData(document.getElementById('form_visit'));
                        form_data.append('cust_name',cust_name);
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
                        url: '../marketing/customer_visit/get_customer' + '?_token=' + '{{csrf_token()}}',
                        async:false,
                        enctype: 'multipart/form-data',
                        dataType: 'JSON',
                        contentType: false,
                        processData: false,
                        data:form_data, 
                        
                    success: function(data){
                    	// alert("SUCCESS...");
                    	$id = data['id'];
                    	$cust_name = data['name'];
                    	$alamat = data['alamat'];

                    	$('#cust_id').val($id);
                    	$('#hidden_cust_name').val($cust_name);
                    	$('#tambah_alamat').val($alamat);
                    	// alert($id);

                    	// location.reload();
            
					},
					error: function(data){
						alert("FAILED !!!");

					}
				});


    }
function simpan_customer_visit(){

// var param1 = $('select[name=tambah_cust_name] option').filter(':selected').val();
    	// alert(param1);

    	var cust_name = $("#tambah_cust_name option:selected").text();
    	// alert(cust_name);

    	// $('#tambah_cust_name')
    	var form_data = new FormData(document.getElementById('form_visit'));
                        form_data.append('cust_name',cust_name);
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
                        url: '../marketing/customer_visit/simpan' + '?_token=' + '{{csrf_token()}}',
                        async:false,
                        enctype: 'multipart/form-data',
                        dataType: 'JSON',
                        contentType: false,
                        processData: false,
                        data:form_data, 
                        
                    success: function(data){
                    	alert("SIMPAN DATA SUCCESS...");
                    	// $id = data['id'];
                    	// $alamat = data['alamat'];
                    	// $('#cust_id').val($id);
                    	// $('#tambah_alamat').val($alamat);
                    	// alert($id);

                    	// location.reload();
            
					},
					error: function(data){
						alert("SIMPAN DATA FAILED !!!");

					}
				});



}

</script>
</html>