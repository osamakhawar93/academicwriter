<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use DB;
use DateTime;
use Time;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }
    
    public function checkUnique($tablename,$attribute,$data) {

        $respones = DB::table($tablename)->where($attribute,$data)->count();
        //dd($respones);
        return $respones;
    }
    
    function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

            for ($i=0; $i < $length; $i++) {
                $token .= $codeAlphabet[random_int(0, $max-1)];
            }

                return $token;
    }
    public function saveuser(Request $request){
        try{
            
            $email = $request->input('email');
            $user = $request->input('name');
            $password1 = $request->input('password');
            $phone = $request->input('phone');
            $password = md5($password1);
            $token =$this->getToken(16);
            
            $data = [
                'name'=>$user,
                'password'=>$password,
                'phone'=>$phone,
                'email'=>$email,
                'token'=>$token,
                'created_at'=>time(),
                'updated_at'=>time(),
            ];
                $res =$this->checkUnique('tbl_users', 'email', $email);
                
            
                if($res > 0){
                     
                     return response()->json(['error'=>'You are already register with this Email-ID.']);
                }
                else{
                     DB::table('tbl_users')->insert($data);
                     
//                     $htmlContent = '
//    <html>
//    <head>
//        <title>Welcome to The Academic Writer</title>
//    </head>
//    <body>
//        <h1>Thanks you for trusting on us!</h1>
//        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
//            <tr>
//                <th>Verification Link:</th><td></td>
//            </tr>
//            <tr style="background-color: #e0e0e0;">
//                <th>Email:</th><td><a href="http://youracademicwriter.com/verifcation_link/"'.$token.'">Click here</a></td>
//            </tr>
//            <tr>
//                <th>Website:</th><td><a href="http://youracademicwriter.com">http://youracademicwriter.com</a></td>
//            </tr>
//        </table>
//    </body>
//    </html>';
//                     Mail::send('emailtemplate',$data, function ($message) use($email,$htmlContent) {
//                    
//        			$message->from('contact@youracademicwriter.com','Your Academic Writer');
//        			$message->to($email);
//        			$message->subject('Contact form submitted on domainname.com ');
//        			$message->attachData($htmlContent,$email);
//         		}); 
                     //Session::flash('success', 'You have been successfully registered.Shortly you will recive a confirmation mail on your given email for verification.Than you can login to your portal.ThankYou');
                     $data = [
                         'success'=>true,
                         'message'=>'You have been successfully registered.ThankYou',
                         ];
                     return response()->json($data);
                }
            
        }
        catch(Exception $ex){
            
        }
    }

    
    public function profileupdate(Request $request){
        try{
            $user_id = Session::get('user_id');
            $user = $request->input('name');
            $phone = $request->input('phone');
            $password1 = $request->input('oldpassword');
            $newpassword1 = $request->input('newpassword');
            
            if($password1 != ''){
                $password = md5($password1);
                $res = DB::table('tbl_users')->where('user_id',$user_id)->where('password',$password)->count();
                
                if($res > 0){
                    $data = [
                'name'=>$user,
                'password'=>md5($newpassword1),
                'phone'=>$phone,
                'updated_at'=>time(),
            ];
                    DB::table('tbl_users')->where('user_id',$user_id)->update($data);
                            Session::flash('success', 'Your profile have been successfully updated');
                             session([
                                'name' => $user,
                                'phone' => $phone,
                       ]);
                     return redirect()->back();
                }else{
                     Session::flash('error', 'Error....!Your password is incorrect.Please type correct password.');
                     return redirect()->back();
                }
            }else{
                
               $data = [
                'name'=>$user,
                'phone'=>$phone,
                'updated_at'=>time(),
            ];
                     DB::table('tbl_users')->where('user_id',$user_id)->update($data);
                            Session::flash('success', 'Your profile have been successfully updated');
                            session([
                                'name' => $user,
                                'phone' => $phone,
                       ]);
                     return redirect()->back();
                }
            
        }
        catch(Exception $ex){
            
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function content()
    {
        return view('usertemplete');
    }
    
}
