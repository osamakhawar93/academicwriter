<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Validator;
use App;
use DB;

class MainController extends Controller
{
  //  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index() {
       // dd('here');
        return view('admin.login');
    }

    public function authantication() {
       try{
         
           $email = Input::get('email');
           $password1 = Input::get('password');
           $password = md5($password1);
           $response = DB::table('tbl_admin')->where('email',$email)->where('password',$password)->first();
           // dd($password);
           if($response){              
               session([
                  // 'name' => $response->name,
                   'user_id' => $response->admin_id,
                   'admin' => 'admin',
                   'email' => $response->email,
                       ]);
            //   dd(Session::all());
               return  redirect('/admin/dashboard');              
                            
               
           }else{
             //   dd("2");
               Session::flash('error', 'Invalid Email/Password');
                return redirect()->back();
           }
       }catch(Exception $ex){
           dd($ex);
       }
        
    }
    
    public function logout(){
        Session::flush();
        Session::flash('success', 'You are successfully logged Out');
        
        return redirect('admin/login');
    }
}
