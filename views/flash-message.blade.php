@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
 
 
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
 
 
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block ">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif
 
 
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block" style="text-align: right; border-radius: 5px;">
    <!-- <button type="button" class="close" data-dismiss="alert">×</button>  -->
    <strong>Logged as : {{ Auth::user()->name }}</strong> |
    <a href="{{ route('changepasspage') }}">Rubah Password </a> |
    <a href="{{ route('logout') }}">Log Out </a>

</div>
@endif
 
 
@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    Please check the form below for errors
</div>
@endif