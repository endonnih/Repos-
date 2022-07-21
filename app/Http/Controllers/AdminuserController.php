<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Auth;


class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd($users);


        return view('admin.adminuser', compact('users'));
    }

    public function dashboard(){

        return view('admin.adminuser_dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enable_user(Request $request){
        // dd($request);

        $id_user = $request->Input('ids');
        $flaq = $request->Input('flaq');

        $enable_user = User::find($id_user);
        $enable = 1;
        $enable_user->flaq = $enable;

        $enable_user->save();

        return response()->json($enable_user);
    }
    public function disable_user(Request $request){
        // dd($request);
        
        $id_user = $request->Input('ids');
        // dd($id_user);
        $flaq = $request->Input('flaq');
        // dd($flaq);
        $disable_user = User::find($id_user);
        // dd($disable_user);

        $disable = 0;
        $disable_user->flaq = $disable;
        // $item = item::find($no);
        // $item->flaq = $flaq;


        $disable_user->save();

        return response()->json($disable_user);


    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
