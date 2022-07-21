<?php

namespace App\Http\Controllers\Auth;


use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Admin;
use Illuminate\Http\Request;
// use Illuminate\Http\RedirectResponse;
use Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function guard()
    {
    return Auth::guard('admin');
    }

    public function __construct()
    {

        $this->middleware('guest')->except('logout');

    }
     
    public function login_admin(){
        // $log="OK";
        // dd($log);
        return view('admin.login_admin');
     }

     public function show_login_form()
    {
        return view('login.login');
    }

    public function process_login(Request $request)
    {
        // dd($request);
        
        $name = $request->Input('name');
        $password = $request->Input('password');
        $email = $request->Input('email');

        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        // $credentials = $request->except(['_token']);
        // dd($credentials);

        $user = User::where('name',$request->name)
                     ->where('flaq','=', 1)->first();
        // dd($user);
        
        // if (auth()->attempt(['name'=>$name, 'email' => $email, 'password' => $password, 'active' => 1])) {
    // Authentication was successful...

        if(Auth::guard('admin')->attempt($credentials)){
                // $name = Auth::guard('admin')->name;
                $name =Auth::guard('admin')->user()->name;

            return view('admin.login_admin',compact('name'));
             

        }
        // else{
        //     session()->flash('warning', 'Cek Kembali Username dan Password Anda !!!');
        //               return redirect()->back();
        // }  



        // if (Auth::guard('usr')->attempt([$credentials,'flaq'=>1])) {
            if (Auth::guard('usr')->attempt(['name'=>$name,'password'=>$password,'flaq'=>1])) {
        
            $users=Auth::guard('usr')->user()->name;
            $name=Auth::guard('usr')->user()->name;


            // dd($users);
            // role type:
                // 1. adminuser
                // 2. marketing
                // 3. Finance
                // 4.Warehouse
            $role= Auth::guard('usr')->user()->role;
                if($role == '2'){
                     return redirect('/marketing')->with('info','User Logged');

                 }elseif($role == '3'){
            // session()->flash('warning', 'Invalid credentials');
                     return redirect('/finance')->with('info','User Logged');
            
                 }elseif($role == '4'){
            // session()->flash('warning', 'Invalid credentials');
                      return redirect('/warehouse')->with('info','User Logged');

                 } elseif($role == ''){
                      session()->flash('warning', 'Ada Kesalahan Verifikasi Role Anda  !!!');
                      return redirect()->back();
                
                 } elseif($role== '1'){
                      // return view('admin.login_admin')->with('info','User Logged');
                      return view('admin.adminuser_dashboard', compact('name'));


                 } else{
                      session()->flash('warning', 'Cek Kembali Username dan Password Anda  !!!');
                      return redirect()->back();
                 }
    
        }else{
             session()->flash('warning', 'Cek Kembali Username dan Password Anda atau Username dan Password Anda belum Aktif.. Silahkan Contact Administrator');
                      return redirect()->back();
        }   
     }   

     public function show_signup_form()
    {
        return view('login.register');
    }
    public function process_signup(Request $request)
    {   
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255', 'unique:users,name'],
        //     'email' => 'required',
        //     'password' => 'required',
        //     'role' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            
        ]);

        if ($validator->fails()) {
             session()->flash('warning','Sorry, this username has already been taken!');
            return redirect()->back();
            
            // return [ 'name.unique' => 'Sorry, this username has already been taken!'];
        }else{
            
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'role' => ($request->Input('role')),
        ]);

        session()->flash('message', 'Your account is created');
       
        return redirect()->route('login');
    
        }

    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }

    
    // public function changepass(){
    //     // return view('login.changepass');
    // }


}
