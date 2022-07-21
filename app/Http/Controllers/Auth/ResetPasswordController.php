<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rules\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function view(){
        // dd();
        // $name = Auth::guard('admin')->user()->name;
        // dd($name);
        // if($name=='admin'){

        return view('login.changepass');
         // }else{
            // return redirect()->back();
         }
    

    
    public function changepass(Request $request){
        // dd($request);

        // $request->validate([

        //       // 'email' => 'required|email|exists:users',

        //       'new_password' => 'required|string|min:6|confirmed',

        //       'confirm_password' => 'required'

        //   ]);


        $name = $request->Input('name');
        // dd($name);

        $passold = $request->Input('password');
        // $passold = Hash::make($passold);
        // dd($passold);
        $passnew= $request->Input('new_password');
        $passconfirm = $request->Input('confirm_password');
        if($passnew!=$passconfirm){
            session()->flash('warning', 'Password Tidak Sesuai...!');
            return redirect()->back();
        }else{
        // dd($passconfirm);
                $updatePassword = User::where('name','=',$name)->first();

                if(Hash::check($passold, $updatePassword['password'])){
                    $updatePassword['password']= Hash::make($passnew);
                    $updatePassword->save();
                }else{
                    session()->flash('warning', 'Cek Kembali Username dan Password Anda !!!');
                    return redirect()->back();
                    // return redirect('./login');
                    // return redirect('/');

                }
            }
        


        // dd($updatePassword);

        // if($updatePassword){
        

    return redirect('/login');
    }
}

