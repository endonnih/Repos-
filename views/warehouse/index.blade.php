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
			margin-left: 28%;
		}
		.card{
			height: 263px;
			width: 187px;
			margin-left: 0px;
			box-shadow: 10px;
			padding-left:0px;
			padding-right: 2px;
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
			  width: 187px;
			  height: 200px;
			  border: 1px solid #f1f1f1;
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
			  width: 187px;
			  color: black;
			}

			/* Style the back side */
			.flip-card-back {
			  background-color: #ddd;
			  color: black;
			  width: 187px;
			  vertical-align: middle;
			  transform: rotateY(180deg);
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
						.full-height{
							height: 100vh;
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