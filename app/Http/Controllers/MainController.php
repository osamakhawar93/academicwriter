<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\MailService;
use App\Services\EmailTemplateService;
use DB;
use DateTime;
use Time;
use Response;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    //
   
    public function __construct() {
        
        
    }


    public function charge(Request $request)
    {
    
    $stripe_token =  $_POST['stripeToken'];
    $stripe_email =  $_POST['stripeEmail'];
     $stripe_amount =  $_POST['stripePrice'];

        try {
    Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    $customer = Customer::create(array(
        'email' => $request->stripeEmail,
        'source' => $request->stripeToken
    ));

    $charge = Charge::create(array(
        'customer' => $customer->id,
        'amount' => round($stripe_amount * 100),
        'currency' => 'usd'
    ));

    return 'Charge successful, you get the course!';
    
} catch (\Exception $ex) {
    return $ex->getMessage();
}
    }
    

    public function home()
    {
       // dd('here');
        return view('frontend.index');
    }
    public function writers()
    {
        $tab = 'writers';
        $data =[
            'tab'=>$tab,
        ];
        return view('frontend.writers',$data);
    }
    public function contact()
    {
        $tab = 'contact';
        $data =[
            'tab'=>$tab,
        ];
        return view('frontend.contact',$data);
    }
    public function whyus()
    {
        $tab = 'whyus';
        $data =[
            'tab'=>$tab,
        ];
        return view('frontend.whyus',$data);
    }
    public function faq()
    {
        $tab = 'faq';
        $data =[
            'tab'=>$tab,
        ];
        return view('frontend.faq',$data);
    }
    public function samples()
    {
        $tab = 'samples';
        $data =[
            'tab'=>$tab,
        ];
        return view('frontend.samples',$data);
    }
    public function pricing()
    {
        $tab = 'pricing';
        $data =[
            'tab'=>$tab,
        ];
        return view('frontend.pricing',$data);
    }
    public function order()
    {
        $tab = 'order';
        $data =[
            'tab'=>$tab,
            'active_tab'=>$tab,
        ];
        return view('frontend.order',$data);
    }
    
    public function random_password($chars) {
        $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($letters), 0, $chars);
     }
    public function saveorder(Request $request){
        
       
        try{
            $fname=$request->input('name');
            $email=$request->input('email');
            $user_id = Session::get('user_id');
        $data = [
            'user_id'=>$user_id,
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'document_type'=>$request->input('work_type'),
            'academic_level'=>$request->input('level'),
            'no_words'=>$request->input('pages'),
            'date'=>$request->input('date'),
            'time'=>$request->input('hours'),
            'sources'=>$request->input('sources'),
            'subject'=>$request->input('subject'),
            'citation'=>$request->input('citation'),
            'description'=>$request->input('description'),
            'title'=>$request->input('title'),
            'price'=>$request->input('price'),
            'orginal_price'=>$request->input('orginal_price'),
            'created_at'=>time(),
            'updated_at'=>time(),
        ];
        $files = $request->file('reports');

        $order_id = DB::table('tbl_order')->insertGetId($data);
        
        $tw_id = 'TW-'.$order_id;
        
        $tws = [
            'order_spid'=> $tw_id,
            'updated_at'=> time(),
        ];
        
        DB::table('tbl_order')->where('order_id',$order_id)->update($tws);
        $sp_data =[
            'sp_key'=>$this->random_password(16),
            'order_ids'=>$order_id,
            'user_id'=>$user_id,
                
        ];
         DB::table('order_key')->insert($sp_data);
        //dd($tws);
        $files = $request->file('reports');
         //   dd('1');
             $doc = array();
             $docs = "";
             if($request->hasFile('reports'))
            {
                // dd($files);
               //  echo 'here1';
                foreach ($files as $i => $file) {
                //    echo 'here';
                    //$supported_files = array('txt', 'pdf', 'docx', 'doc');
                    $name = uniqid() . $_FILES['reports']['name'][$i];
                    $orginal_name = $_FILES['reports']['name'][$i];
                    $destinationPath = base_path() . str_replace("/", DIRECTORY_SEPARATOR, "/admin/uploads/documents/") . $name;
                    move_uploaded_file($_FILES['reports']['tmp_name'][$i],$destinationPath);
               
                $data = [               
                 'order_id'=>$order_id,               
                 'attachment'=>$name, 
                 'orginal_name'=>$orginal_name, 
                 'user_id'=>$user_id, 
             ];
                
             DB::table('tbl_orderdocument')->insert($data);
           
                }
        }
       // dd('here');
        

        Mail::send('emailtemplate',$data, function ($message) use($email) {
                    
        			$message->from('contact@youracademicwriter.com','Your Academic Writer');
        			$message->to($email);
        			$message->subject('Contact form submitted on domainname.com ');
         		});

        Session::flash('success', 'Your order has been successfully placed.');
        $token = $this->random_password(25);
        $bd = DB::table('order_key')->where('order_ids',$order_id)->where('user_id',$user_id)->first();
    
       $url = url('/user_portal/placed_order_detail/').'/'.$token.'/'.$bd->sp_key;

        return redirect($url);
           
        }
        catch(Exception $ex){
            Session::flash('error', 'Oops!Something Went Wrong.Please Try Again');
            return redirect()->back();
            
        }
    }
    public function saverevision(Request $request) {
        try
        {
           // dd($request->all());
            if($files = $request->file('reports') != ""){
            $user_id = Session::get('user_id');
            $id = $request->input('order');
            $sp_ids = DB::table('tbl_order')->where('order_id',$id)->first();
           
            $sp_id = $sp_ids->order_spid;
            
            
            $data = [               
                 'order_id'=>$request->input('order'),              
                 'description'=>$request->input('description'),              
                 'document'=>'abc', 
                 'user_id'=>$user_id, 
                 'created_at'=>time(), 
                 'updated_at'=>time(), 
             ];
            
      //  dd($files);
            $doc_id = '';
            $res = DB::table('tbl_order_revision')->where('order_id',$id)->first();
            if(count($res) > 0 ){
                $doc_id = $res->review_id;
            }else{
            $doc_id = DB::table('tbl_order_revision')->insertGetId($data);
            }
        $files = $request->file('reports');
         //   dd('1');
             $doc = array();
             $docs = "";
             if($request->hasFile('reports'))
            {
                // dd($files);
               //  echo 'here1';
                foreach ($files as $i => $file) {
                //    echo 'here';
                    //$supported_files = array('txt', 'pdf', 'docx', 'doc');
                    $name = uniqid() . $_FILES['reports']['name'][$i];
                    $orginal_name = $_FILES['reports']['name'][$i];
                    $destinationPath = base_path() . str_replace("/", DIRECTORY_SEPARATOR, "/admin/uploads/documents/") . $name;
                    move_uploaded_file($_FILES['reports']['tmp_name'][$i],$destinationPath);
               
                $data = [               
                 'order_id'=>$id,               
                 'rv_id'=>$doc_id,               
                 'attachment'=>$name, 
                 'orginal_name'=>$orginal_name, 
             ];
                
                DB::table('tbl_order_revisondocument')->insert($data);
                
            }
                Session::flash('success', 'Your request has been successfully submitted');
                return redirect()->back();    
                }else{
                    Session::flash('error', 'Oops!Something Went Wrong');
                    return redirect()->back();
                }
        }
        
            else{
                    Session::flash('error', 'Oops!Something Went Wrong');
                    return redirect()->back();
                }
        
                }
                catch(Exception $ex){
           Session::flash('error', 'Oops!Something Went Wrong');
                return redirect()->back();
       }
    }
    public function checkpassword(Request $request) {

        dd($request->all());
        try {
            $user_id = Session::get('user_id');
            $password = $request->input('password');
            $res = DB::table('tbl_user')->where('user_id',$user_id)->where('password',$password)->get();
            $result = new \stdClass();
            $result->status = true;


            return json_encode($result);
        } catch (\Exception $ex) {
            //dd($ex);
            $result = new \stdClass();
            $result->status = false;
            $result->message = 'Exception';

            return json_encode($result);
        }
    }
    
    
    
    public function updateorder(Request $request){
        
       // dd($request->all());
        try{
            $order_id=$request->input('order_id');
            $email=$request->input('email');
            $user_id = Session::get('user_id');
        $data = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'document_type'=>$request->input('work_type'),
            'academic_level'=>$request->input('level'),
            'no_words'=>$request->input('pages'),
            'date'=>$request->input('date'),
            'time'=>$request->input('hours'),
            'sources'=>$request->input('sources'),
            'subject'=>$request->input('subject'),
            'citation'=>$request->input('citation'),
            'description'=>$request->input('description'),
            'title'=>$request->input('title'),
            'price'=>$request->input('price'),
            'orginal_price'=>$request->input('orginal_price'),
            'updated_at'=>time(),
        ];
  
        DB::table('tbl_order')->where('user_id',$user_id)->where('order_id',$order_id)->update($data);
        //dd($tws);
        $files = '';
      //      dd('1');
           
        $countfiles = $request->input('doccount');
         
          //  dd($countfiles);
             $doc = array();
             $docs = "";
         if(count($countfiles) > 0) { 
             if(count($request->file('reportss')) > 0){
             $files = $request->file('reportss');
             if($request->hasFile('reportss'))
            {
                // dd($files);
               //  echo 'here1';
                foreach ($files as $i => $file) {
                //    echo 'here';
                    //$supported_files = array('txt', 'pdf', 'docx', 'doc');
                    $name = uniqid() . $_FILES['reportss']['name'][$i];
                    $orginal_name = $_FILES['reportss']['name'][$i];
                    $destinationPath = base_path() . str_replace("/", DIRECTORY_SEPARATOR, "/admin/uploads/documents/") . $name;
                    move_uploaded_file($_FILES['reportss']['tmp_name'][$i],$destinationPath);
               
                $data = [               
                 'order_id'=>$order_id,               
                 'attachment'=>$name, 
                 'orginal_name'=>$orginal_name, 
                 'user_id'=>$user_id, 
             ];
                
             DB::table('tbl_orderdocument')->insert($data);
           
                }
        }
             }
         }
      
         else {
             $files = $request->file('reports');
             if($request->hasFile('reports'))
                {
                // dd($files);
               //  echo 'here1';
                foreach ($files as $i => $file) {
                //    echo 'here';
                    //$supported_files = array('txt', 'pdf', 'docx', 'doc');
                    $name = uniqid() . $_FILES['reports']['name'][$i];
                    $orginal_name = $_FILES['reports']['name'][$i];
                    $destinationPath = base_path() . str_replace("/", DIRECTORY_SEPARATOR, "/admin/uploads/documents/") . $name;
                    move_uploaded_file($_FILES['reports']['tmp_name'][$i],$destinationPath);
               
                $data = [               
                 'order_id'=>$order_id,               
                 'attachment'=>$name, 
                 'orginal_name'=>$orginal_name, 
                 'user_id'=>$user_id, 
             ];
                
             DB::table('tbl_orderdocument')->insert($data);
           
                }
        }
         }
//dd('jgjh');
        Mail::send('emailtemplate',$data, function ($message) use($email) {
                    
        			$message->from('contact@youracademicwriter.com','Your Academic Writer');
        			$message->to($email);
        			$message->subject('Order updated successfully.');
         		});

        Session::flash('success', 'Your order has been successfully updated.');
        $token = $this->random_password(25);
       // dd(Session::get('success'));
        $sp_key = DB::table('order_key')->where('user_id',$user_id)->where('order_ids',$order_id)->first();
        $id = $sp_key->sp_key;
       // dd($id);
       $url = url('/user_portal/placed_order_detail/').'/'.$token.'/'.$id;
        return redirect($url);
           
        }
        catch(Exception $ex){
            Session::flash('error', 'Oops!Something Went Wrong.Please Try Again');
            return redirect()->back();
            
        }
    }
    public function logout(){
        Session::flush();
        Session::flash('success', 'You have been successfully logged Out');
        
        return redirect('/home');
    }
}
