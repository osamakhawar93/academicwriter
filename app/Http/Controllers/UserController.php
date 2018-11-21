<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Response;
use DB;
use DateTime;
use Time;

class UserController extends Controller
{
    
    
    public function authentication(Request $request){
        try
        {
          // dd(Input::all());
            $email = Input::get('email');
            $password1 = Input::get('password');
            $password = md5($password1);
            
            
                
            $res = DB::table('tbl_users')->where('email',$email)->where('password',$password)->count();

                if($res > 0){
                 $response = DB::table('tbl_users')->where('email',$email)->where('password',$password)->first();
                        session([
                                'name' => $response->name,
                                'email' => $response->email,
                                'phone' => $response->phone,
                                'user' => 'user',
                                'user_id' => $response->user_id,
                                'token' => $response->token,
                       ]);
                        $data = [
                            'success'=>true,
                            'urls'=>'user_portal/dashboard',
                        ];
                        return response()->json($data);
                        
                }else{
                        //dd('here');
                       // Session::flash('error', 'Oops!Invlaid Email or Password');
                      //  dd(Session::all());
                       return response()->json(['error'=>'Oops!Invalid Email or Password.']);
                }
            
        }
        catch(Exception $ex){
            dd($ex);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Session::get('user_id');
        $order = DB::table('tbl_order')
                ->join('order_key','order_key.order_ids','=','tbl_order.order_id')
                ->where('tbl_order.user_id',$user_id)
                ->orderby('tbl_order.order_id','Desc')->get();
      //  dd($order);
        $data = [
            'orders'=>$order,
            'active_tab'=>'order_history',
        ];
        return view('frontend.userdashboard1',$data);
    }
    
    public function inprogressOrder()
    {
        $user_id = Session::get('user_id');
        $order = DB::table('tbl_order')
                ->join('order_key','order_key.order_ids','=','tbl_order.order_id')
                //->where('is_payment',1)
                ->where('tbl_order.user_id',$user_id)
                ->where('tbl_order.is_completed',2)
                ->orderby('tbl_order.order_id','Desc')->get();
        
        $data = [
            'orders'=>$order,
            'active_tab'=>'order_inprogress',
        ];
        return view('frontend.userdashboard1',$data);
    }
    public function revisionOrder()
    {
        $user_id = Session::get('user_id');
        $order = DB::table('tbl_order')
                ->join('order_key','order_key.order_ids','=','tbl_order.order_id')
                ->where('tbl_order.user_id',$user_id)
                //->where('is_payment',1)
                ->where('tbl_order.is_completed',1)->orderby('tbl_order.order_id','Desc')->get();
        $revision_order = DB::table('tbl_order_revision')
                ->join('tbl_order','tbl_order.order_id','=','tbl_order_revision.order_id')
                ->join('order_key','order_key.order_ids','=','tbl_order_revision.order_id')
                ->select('order_key.sp_key as key','tbl_order.*','tbl_order_revision.is_completed as rv_completed','tbl_order_revision.created_at as rv_date')
                ->where('tbl_order_revision.user_id',$user_id)
                ->orderby('tbl_order_revision.review_id','Desc')->get();
        $revision_inprogress = DB::table('tbl_order_revision')
                ->join('tbl_order','tbl_order.order_id','=','tbl_order_revision.order_id')
                ->join('order_key','order_key.order_ids','=','tbl_order_revision.order_id')
                ->select('order_key.sp_key as key','tbl_order.*','tbl_order_revision.is_completed as rv_completed','tbl_order_revision.created_at as rv_date')
                ->where('tbl_order_revision.user_id',$user_id)
                ->where('tbl_order_revision.is_completed',2)
                ->orderby('tbl_order_revision.review_id','Desc')->get();
        $revision_completed = DB::table('tbl_order_revision')
                ->join('tbl_order','tbl_order.order_id','=','tbl_order_revision.order_id')
                ->join('order_key','order_key.order_ids','=','tbl_order_revision.order_id')
                ->select('order_key.sp_key as key','tbl_order.*','tbl_order_revision.is_completed as rv_completed','tbl_order_revision.created_at as rv_date')
                ->where('tbl_order_revision.user_id',$user_id)
                ->where('tbl_order_revision.is_completed',1)
                ->orderby('tbl_order_revision.review_id','Desc')->get();
        $data = [
            'orders'=>$order,
            'revision_order'=>$revision_order,
            'revision_inprogress'=>$revision_inprogress,
            'revision_completed'=>$revision_completed,
            'active_tab'=>'order_revision',
        ];
        
       // dd($data);
        return view('frontend.revisionOrder',$data);
    }
    public function downloadWork()
    {
        $user_id = Session::get('user_id');
        $order = DB::table('tbl_order')
                ->join('order_key','order_key.order_ids','=','tbl_order.order_id')
                ->join('tbl_order_work_uploaded','tbl_order_work_uploaded.order_id','=','tbl_order.order_id')
                ->where('tbl_order.user_id',$user_id)->where('tbl_order.is_completed',1)->orderby('tbl_order.order_id','Desc')->get();
        $data = [
            'orders'=>$order,
            'active_tab'=>'order_download',
        ];
        return view('frontend.userdashboard1',$data);
    }
    
    public function downloadreport($filename)
    {
         $file= base_path() . str_replace("/", DIRECTORY_SEPARATOR, "/admin/uploads/documents/"). $filename;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::download($file, $filename, $headers);
    }
    public function profile()
    {
        $user_id = Session::get('user_id');
        $user = DB::table('tbl_users')
                ->where('user_id',$user_id)->first();
        //dd($user->name);
        $data = [
            'active_tab'=>'profile',
            'user'=>$user,
        ];
        return view('frontend.userprofile',$data);
    }
    
    public function verfication($param) {
        try{
            
            $res = DB::table('tbl_user')->where('token',$param)->where('is_verified',0)->count();
            
            if($res > 0){
                $data = [
                  'is_verified' =>1,
                    'updated_at' =>time(),
                ];
                DB::table('tbl_user')->where('token',$param)->where('is_verified',0)->update($data);
                Session::flash('success', 'You successfully verified and now can login.ThankYou');
                     return redirect(url('/home'));
            }else{
                Session::flash('error', 'Sorry!Link has been expire.ThankYou');
                     return redirect(url('/home'));
            }
        }
        catch(Exception $ex){
            
        }
    }
    
    public function orderdeatilbyid($type,$tab,$ids){
        
        
        $user_id = Session::get('user_id');
        $sp_key = DB::table('order_key')->where('user_id',$user_id)->where('sp_key',$ids)->first();
        $id = $sp_key->order_ids;
        $order = DB::table('tbl_order')
                ->join('order_key','order_key.order_ids','=','tbl_order.order_id')
                ->select('order_key.sp_key as key','tbl_order.*')
                ->where('tbl_order.user_id',$user_id)->where('order_key.sp_key',$ids)->first();
        
        $document = DB::table('tbl_orderdocument')
                ->where('user_id',$user_id)
                ->where('order_id',$id)->get();
        
        $upload_work = DB::table('tbl_order_work_uploaded')
                ->join('tbl_order_work_uploaded_document','tbl_order_work_uploaded_document.ow_id','=','tbl_order_work_uploaded.ow_id')
                ->where('tbl_order_work_uploaded.user_id',$user_id)
                ->where('tbl_order_work_uploaded.order_id',$id)->get();
        
        
        $data= [
            'orders'=>$order,
            'document'=>$document,
            'upload_work'=>$upload_work,
            'type'=>$type,
            'active_tab'=>$tab
                ];
        //dd($data);
        if(count($order) > 0){
           return view('frontend.orderdetail',$data); 
        }
        else{
            
            return view('frontend.found404');
         }
    }
    
    public function revisiondeatilbyid($type,$tab,$ids){
        
        
        $user_id = Session::get('user_id');
        $sp_key = DB::table('order_key')->where('user_id',$user_id)->where('sp_key',$ids)->first();
        $id = $sp_key->order_ids;
        $order = DB::table('tbl_order')
                ->join('order_key','order_key.order_ids','=','tbl_order.order_id')
                ->select('order_key.sp_key as key','tbl_order.*')
                ->where('tbl_order.user_id',$user_id)->where('order_key.sp_key',$ids)->first();
        $revision = DB::table('tbl_order_revision')->where('order_id',$id)->first();
        $user_revision_doc = DB::table('tbl_order_revisondocument')->where('order_id',$id)->where('rv_id',$$revision->review_id)->orderby('up_document_id','Desc')->get();
        $document = DB::table('tbl_orderdocument')
                ->where('user_id',$user_id)
                ->where('order_id',$id)->get();
       
        $upload_work = DB::table('tbl_order_work_uploaded')
                ->join('tbl_order_work_uploaded_document','tbl_order_work_uploaded_document.ow_id','=','tbl_order_work_uploaded.ow_id')
                ->where('tbl_order_work_uploaded.user_id',$user_id)
                ->where('tbl_order_work_uploaded.order_id',$id)->get();
        
        $revision_work = DB::table('tbl_revision_work_uploaded')
                ->join('tbl_revision_work_uploaded_document','tbl_revision_work_uploaded_document.rv_id','=','tbl_revision_work_uploaded.rv_id')
                ->where('tbl_revision_work_uploaded.user_id',$user_id)
                ->where('tbl_revision_work_uploaded.order_id',$id)
                ->where('tbl_revision_work_uploaded.order_id',$id)
                ->orderby('tbl_revision_work_uploaded_document.up_document_id','Desc')->get();
        
        
        $data= [
            'orders'=>$order,
            'document'=>$document,
            'upload_work'=>$upload_work,
            'revision'=>$revision,
            'user_revision_doc'=>$user_revision_doc,
            'revision_work'=>$revision_work,
            'type'=>$type,
            'active_tab'=>$tab
                ];
        //dd($data);
        return view('frontend.revisiondetail',$data);
    }
    
    public function placedorderdeatilbyid($type,$ids){
        
        
        $user_id = Session::get('user_id');
       // dd('hh');
        $sp_key = DB::table('order_key')->where('user_id',$user_id)->where('sp_key',$ids)->first();
        $id = $sp_key->order_ids;
        $order = $order = DB::table('tbl_order')
                ->join('order_key','order_key.order_ids','=','tbl_order.order_id')
                ->select('order_key.sp_key as key','tbl_order.*')
                ->where('tbl_order.user_id',$user_id)->where('order_key.sp_key',$ids)->first();
        
        $document = DB::table('tbl_orderdocument')
                ->where('user_id',$user_id)
                ->where('order_id',$id)->get();        
        $tab = 'Order History';
        $data= [
            'orders'=>$order,
            'document'=>$document,
            'type'=>$type,
            'active_tab'=>$tab
                ];
        //dd($data);
        return view('frontend.placedorderdetail',$data);
    }
    
    public function placedorderedit($type,$ids){
        
        
        $user_id = Session::get('user_id');
        $sp_key = DB::table('order_key')->where('user_id',$user_id)->where('sp_key',$ids)->first();
        $id = $sp_key->order_ids;
        $order = DB::table('tbl_order')->where('user_id',$user_id)->where('order_id',$id)->first();
        
        $document = DB::table('tbl_orderdocument')
                ->where('user_id',$user_id)
                ->where('order_id',$id)->get();        
        $tab = 'Order History';
        $data= [
            'orders'=>$order,
            'document'=>$document,
            'type'=>$type,
            'active_tab'=>$tab
                ];
        //dd($data);
        return view('frontend.placedorderedit',$data);
    }
    
    
    
    public function viewreport($filename)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= base_path() . str_replace("/", DIRECTORY_SEPARATOR, "/admin/uploads/documents/"). $filename;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::file($file, $headers);
    }
    
    public function deletereport($doc_id,$id) {
        try{
            $user_id = Session::get('user_id');
            //$sp_key = DB::table('order_key')->where('user_id',$user_id)->where('sp_key',$ids)->first();
            //$order_id = $sp_key->order_ids;
            DB::table('tbl_orderdocument')->where('order_id',$id)->where('attachment_id',$doc_id)->where('user_id',$user_id)->delete();
          Session::flash('success', 'Document has been successfully deleted');
                return redirect()->back();  
        }
        catch(Exception $ex){
           Session::flash('error', 'Oops!Something Went Wrong');
                return redirect()->back();
       }
    }
    
    public function ajaxuser(){
        try{
            
            if(Session::has('user')){
                
                return 1;
            }else{
                return 0;
            }
            
            
        }catch(Exception $ex){
           Session::flash('error', 'Oops!Something Went Wrong');
                return redirect()->back();
       }
    }
}
