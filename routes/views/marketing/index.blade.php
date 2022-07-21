<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
	<script src="{{ mix('js/app.js') }}"></script>

	<style type="text/css">
		body{
			overflow-y: hidden;
		}
		.container{
			height: 100vh;
			width: 800px;
			/*margin-left: 100px;*/
		}
		.row{
			margin-top: 100px;
			margin-left: 25%;
			min-width: 400px;
		}
		.card{
			height: 263px;
			width: 185px;
			margin-left: 3px;
			box-shadow: 10px;
			padding-left:0px;
			padding-right: 0px;
		}
		.card-inner{
			color: black;
		}
		.card-inner:hover{
			background-color: #8bc5b0;
			color: yellow;
		}

		.flip-card {
			  background-color: transparent;
			  width: 185px;
			  height: 200px;
			  /*border: 1px solid #f1f1f1;*/
			  perspective: 1000px; /* Remove this if you don't want the 3D effect */
			}

/* This container is needed to position the front and back side */
			.flip-card-inner {
			  position: relative;
			  width: 100%;
			  height: 100%;
			  text-align: center;
			  transition: transform 0.8s;
			  transform-style: preserve-3d;
			}

			/* Do an horizontal flip when you move the mouse over the flip box container */
			.flip-card:hover .flip-card-inner {
			  transform: rotateY(180deg);
			}

			/* Position the front and back side */
			.flip-card-front, .flip-card-back {
			  position: absolute;
			  width: 100%;
			  height: 100%;
			  -webkit-backface-visibility: hidden; /* Safari */
			  backface-visibility: hidden;
			}

			/* Style the front side (fallback if image is missing) */
			.flip-card-front {
			  background-color: #bbb;
			  width: 185px;
			  color: black;
			  /*border: 1;*/
			}

			/* Style the back side */
			.flip-card-back {
			  background-color: white;
			  color: black;
			  width: 180px;
			  vertical-align: middle;
			  transform: rotateY(180deg);
			  /*border: 1;*/

			}
					

/*==========================================================*/
canvas {  
            margin-top: -500px;
            display: block;
              align-content: center;
            } /* ---- particles.js container ---- */
            #particles-js {
              position: absolute;
              width: 100%;
              height: 100%;
              /*background-color: #73615f;*/
              background-color: silver;
              
              background-image: url("");
              background-repeat: no-repeat;
              background-size: cover;
              background-position: 50% 50%;
            } /* ---- stats.js ---- */
            .count-particles {
              background: #000022;
              position: absolute;
              top: 0;
              left: 0;
              width: 80px;
              color: #13e8e9;
              font-size: 0.8em;
              text-align: left;
              text-indent: 4px;
              line-height: 14px;
              padding-bottom: 2px;
              font-family: Helvetica, Arial, sans-serif;
              font-weight: bold;
            }
            .js-count-particles {
              font-size: 1.1em;
            }
            #stats,
            .count-particles {
              -webkit-user-select: none;
              margin-top: 5px;
              margin-left: 5px;
            }
            #stats {
              border-radius: 3px 3px 0 0;
              overflow: hidden;
            }
            .count-particles {
              border-radius: 0 0 3px 3px;
            }
            
            .buttonstyle{
				 		 color: black;
				 		 background-color: #ddd;	
				 		 box-shadow: 5px 5px 5px rgba(0,0,0, 0.4);
  		 			 transition: all 0.3s ease 0s;
 						}  
 						.buttonstyle:hover{
 							background-color: rgba(79, 138, 67, 0.4);;
  						box-shadow: 15px 15px 15px ;
  						color: #fff;
  						transform: translateY(-7px);
 						}
		
		
	</style>
</head>
<body>
	<script>
  
			particlesJS.load('particles-js', "{{ asset('js/particles.json')}}", function() {
			  console.log('callback - particles.js config loaded');
			});
	</script>
	
<div id="particles-js" class="full-height">	
	<div class="container-fluid mt4">
		
		<form style="text-align:right"  method="post" action="{{ route('logout') }}">
		@include('flash-message');

    		<!-- <strong><a href="{{ route('logout') }}"> Logout </a></strong> -->

    	</form>
    	<div class="row">

				<div class=" card mt-4 float-left" style="border-radius: 10px";>
					<div class="card-header" align="center">Customer Data</div>
						<div class="flip-card">
							<div class="flip-card-inner">
							    <div class="flip-card-front">
							      <img src="{{asset('images/img_avatar.jpg')}}" alt="Avatar" style="width:182px;height:200px;">
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
				<!-- ============================================= -->
				<div class=" card mt-4 float-left" style="border-radius: 10px";>
					<div class="card-header" align="center">Marketting Progress </div>
						<div class="flip-card">
							<div class="flip-card-inner">
							    <div class="flip-card-front">
							      <img src="{{asset('images/img_avatar3.jpg')}}" alt="Avatar" style="width:182px;height:200px;">
							    </div>
							    <div class="flip-card-back">
							      <!-- <h1>test test</h1> -->
							      <div style="padding:50px">
							      <a class=" buttonstyle btn btn-danger" href="/marketing/customer_progress">Get In</a>
							      </div>
							      <!-- <p>We love that guy</p> -->
							    </div>
							</div>
						</div>
							
				</div>
				<!-- ============================================= -->
				<div class="card mt-4 float-left" style="border-radius: 10px; margin-left: 3px;">
					<div class="card-header" align="center">Visiting Schedules</div>
						<div class="flip-card">
							<div class="flip-card-inner">
							    <div class="flip-card-front">
							      <img src="{{asset('images/img_avatar1.jpg')}}" alt="Avatar" style="width:182px;height:200px;">
							    </div>
							    <div class="flip-card-back">
							      <!-- <h1>test test</h1> -->
							      <div style="padding:50px">
							      	<a class=" buttonstyle btn btn-danger" href="/marketing/customer_visit">Get In</a>
							     	</div>
							      <!-- <p>We love that guy</p> -->
							    </div>
							</div>
						</div>
					
				</div>
				<!-- =================================================== -->
				<div class="card mt-4 float-left" style="border-radius: 10px; margin-left: 3px;">
					<div class="card-header" align="center">Marketing Project</a></div>
						<div class="flip-card">
							<div class="flip-card-inner">
							    <div class="flip-card-front">
							      <img src="{{asset('images/img_avatar2.jpg')}}" alt="Avatar" style="width:182px;height:200px;">
							    </div>
							    <div class="flip-card-back">
							      <!-- <h1>test test</h1> -->
							      <div style="padding: 50px;">
							     		<a class=" buttonstyle btn btn-danger" href="/marketing/project">Get In</a>
							      </div>
							      <!-- <p>We love that guy</p> -->
							    </div>
							</div>
						</div>
					
				</div>
		</div>		
	</div>
</div>	

<script src="{{ mix('js/particles.js')}}"></script>


<script>


              var count_particles, stats, update;
              stats = new Stats;
              stats.setMode(0);
              stats.domElement.style.position = 'absolute';
              stats.domElement.style.left = '0px';
              stats.domElement.style.top = '0px';
              document.body.appendChild(stats.domElement);
              count_particles = document.querySelector('.js-count-particles');
              update = function() {
                stats.begin();
                stats.end();
                if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                  count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
                }
                requestAnimationFrame(update);
              };
              requestAnimationFrame(update);
        </script>
</body>
</html>