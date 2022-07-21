<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Form</title>
  <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
  <script src = "{{mix('js/app.js')}}"></script>

  <style> 
    .container-fluid{
      width: 400px;
    }
  </style>

</head>
<body>
      <div class="container-fluid mt-4">    
        <div class="card">
          @include('flash-message');
           <div class="card-header">Register</div>
             <div class="card-body"> 
                <form method="post" action="{{ route('register') }}">
                      @csrf
                      
                    <div class="form-group">
                      <label>Username</label>
                      <input class="form-control" type="text" name="name" class="form-control p_input">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" type="email" name="email" class="form-control p_input">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input class="form-control" type="password" name="password" class="form-control p_input">
                    </div>
                    <div class="form-group">
                      <label>Role Access</label>
                      <!-- <input class="form-control" type="text" name="role" class="form-control p_input"> -->
                      <select class="form-control" name="role" class="form-control p_input">
                       <option value="0">===========</option> 
                       <option value="2">Marketing</option>
                       <option value="3">Finance</option>
                       <option value="4">WareHouse</option> 


                      
                      </select>  
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                    </div>

                    <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>
                    <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                </form>
          </div>
        </div>    
    </div>        
</body>
</html>
 