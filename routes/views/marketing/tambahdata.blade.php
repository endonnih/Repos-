<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
     <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
     <meta name="author" content="Vincent Garreau" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css"> -->
    
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- <script src="http://threejs.org/examples/js/libs/stats.min.js"></script> -->
    <link rel="stylesheet" media="screen" href="{{ asset('css/style.css')}}">

<style type="text/css">
  .card{
    margin-top: 200px;
    
  }
  .full-height{
    height: 100vh;
  }
  .container{
    width: 600px;
  }
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

</style>

</head>
<body>
  <script>
  
particlesJS.load('particles-js', "{{ asset('js/particles.json')}}", function() {
  console.log('callback - particles.js config loaded');
});
</script>

  <!-- <div id="particles-js" class="flex-center position-ref full-height"> -->
  
<div id="particles-js" class="full-height">

  <div class="container mt-4">

  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Laravel 8 - Add Blog Post Form Example
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('simpan_data')}}">
       @csrf
        <div class="form-group">
          <label for="Nama">Nama</label>
          <input type="text" id="nama" name="nama" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" class="form-control" required=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
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