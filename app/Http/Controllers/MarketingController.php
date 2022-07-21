<?php

namespace App\Http\Controllers;
use App\customer;
use App\customer_visit;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Auth;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function show_login_form(){

    //     return view('login.login');
    // }

    public function index()
    {
        return view('marketing.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function customer(){
        $user = Auth::user();
        $name = $user->name;
        // dd($name);

        
        if($user){

        // $list = customer::all();
        $list = customer::where('user','=',$name)->get();


        // return response()->json($list);

        } 
        return view('marketing.customer', compact('list','user'));
        //return  view('marketing.customer');

    }
   
   
    public function create()
    {
        return view('marketing.tambahdata');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $Name  = $request->Input("tambah_name");
        $Business = $request->Input("tambah_business");
        $Alamat = $request->Input("tambah_address");
        $Phone = $request->Input("tambah_phone");
        $Pic = $request->Input("tambah_pic");
        $User = $request->Input("user-login");
        $Flaq = 1;

        // $nama = $request->Input('nama');
        // $alamat = $request -> Input('alamat');

        $new_data = new customer;

        $new_data['name'] = $Name;
        $new_data['alamat'] =$Alamat;
        $new_data['phone'] =$Phone;
        $new_data['pic'] =$Pic;
        $new_data['user'] =$User;
        $new_data['flaq'] =$Flaq;


        $new_data->save();

        // return response()->json($request);
        return redirect()->back();
    }

    //==================================================
     public function customer_progress(){

        return  view('marketing.customer_progress');

    }

    public function customer_progress_create(){

    }

    public function customer_progress_store(){

    }

    public function customer_progress_show(){

    }
    // =================================================

     public function customer_visit(){
        $user = Auth::user();
        $name = $user->name;
        if($user){

        $list_customer=customer::where('user','=',$name)->get();    
        $list= customer_visit::where('user','=',$name)->get();
        // dd($list_customer);
        }

        return  view('marketing.customer_visit',compact('list','name','list_customer'));
        // return view('marketing.customer', compact('list','name1'));


    }
    public function get_customer(Request $request){
        // dd($request);
        $id = $request->Input('tambah_cust_name');

        $cust = customer::where('id','=',$id)->first();
        // dd($cust);

        // return back()->json($request);
        return response()->json($cust);

    }


    public function customer_visit_create(){

    }

    public function customer_visit_store(Request $request){
        // dd($request);

      $cust_id = $request->Input("cust_id"); 
      $cust_name = $request->Input("hidden_cust_name");
      $Alamat = $request->Input("tambah_alamat");
      $date = $request->Input("tambah_date"); 
      $meeting_point = $request->Input("tambah_meeting_point"); 
      $so = $request->Input("tambah_so");
      $progress = $request->Input("tambah_progress");
      $user = $request->Input("user-login");
        


    $cust_visit = new customer_visit;
        // `id`, `name`, `user`, `alamat`, `meeting_point`, `date`, `service_offer`, `progress`, `flaq`, `created_at`, `updated_at
    $cust_visit['id_customer'] = $cust_id; 
    $cust_visit['name'] = $cust_name;
    $cust_visit['user'] =$user;
    $cust_visit['alamat']= $Alamat;
    $cust_visit['meeting_point']= $meeting_point;
    $cust_visit['date']= $date;
    $cust_visit['service_offer'] = $so;
    $cust_visit['progress'] = $progress;
    $cust_visit['flaq'] = 1;
    $cust_visit->save();

    return redirect()->back();

    }

    public function customer_visit_show(){

    }

    public function project(){

        return  view('marketing.project');

    }

    public function project_create(){


    }

    public function project_store(){

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
