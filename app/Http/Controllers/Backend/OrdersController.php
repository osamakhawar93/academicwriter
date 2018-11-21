<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;
use App;
use DB;

class OrdersController extends Controller
{
    public function index() {
       // dd('here');
        //new order function
        $orders = DB::table('tbl_order')
                //->where('is_payment',1)
                ->where('is_completed',0)
                ->orderby('order_id','Desc')->get();
        
        $data= [
            'orders'=>$orders,
            'type'=>'New Orders'
                ];
       // dd($data);
        return view('admin.order.view',$data);
    }
    public function inprogressOrder() {
       // dd('here');
        $orders = DB::table('tbl_order')
                //->where('is_payment',1)
                ->where('is_completed',2)
                ->orderby('order_id','Desc')->get();
        
        $data= [
            'orders'=>$orders,
            'type'=>'Inprogress Orders'
                ];
        return view('admin.order.view',$data);
    }
    public function completedOrders() {
       // dd('here');
        $orders = DB::table('tbl_order')
                //->where('is_payment',1)
                ->where('is_completed',1)
                ->orderby('order_id','Desc')->get();
        
        $data= [
            'orders'=>$orders,
            'type'=>'Completed Orders'
                ];
        return view('admin.order.view',$data);
    }
    public function cancalledOrders() {
       // dd('here');
        $orders = DB::table('tbl_order')
                //->where('is_payment',1)
                ->where('is_completed',3)
                ->orderby('order_id','Desc')->get();
        
        $data= [
            'orders'=>$orders,
            'type'=>'Cancelled Orders'
                ];
        return view('admin.order.view',$data);
    }
    public function orderdeatilbyid($type,$id){
        
        $order = DB::table('tbl_order')
               // ->where('is_payment',1)
                ->where('order_id',$id)->first();
        
        $document = DB::table('tbl_orderdocument')
                ->where('user_id',$order->user_id)
                ->where('order_id',$id)->get();
        
        $upload_work = DB::table('tbl_order_work_uploaded')
                ->join('tbl_order_work_uploaded_document','tbl_order_work_uploaded_document.ow_id','=','tbl_order_work_uploaded.ow_id')
                ->where('tbl_order_work_uploaded.user_id',$order->user_id)
                ->where('tbl_order_work_uploaded.order_id',$id)->get();
        
        
        $data= [
            'orders'=>$order,
            'document'=>$document,
            'upload_work'=>$upload_work,
            'type'=>$type
                ];
        //dd($data);
        return view('admin.order.detail',$data);
    }
    
     public function getDownload($filename)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= base_path() . str_replace("/", DIRECTORY_SEPARATOR, "/admin/uploads/documents/"). $filename;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::download($file, $filename, $headers);
    }
    public function viewreport($filename)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= base_path() . str_replace("/", DIRECTORY_SEPARATOR, "/admin/uploads/documents/"). $filename;

        $headers = array(
                  'Content-Type: application/pdf',
                  'Content-Type: application/msword',
                  'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                  'Content-Type: application/vnd.ms-excel',
                  'Content-Type: application/msword',
                );

        return Response::file($file, $headers);
    }
    public function changestatus($status,$id) {
        
        //dd('heer');
        try{
        if($status == 'startworking'){ 
            $value = 'Inprogress Orders';
            $data = [
                'is_completed'=>'2',
                'completed_date'=>time(),
            ];
            DB::table('tbl_order')->where('order_id',$id)->update($data);
            Session::flash('info', 'Project status has been change now you can see this project in inprogress order tab.Thanyou');
            //dd(redirect(url('admin/orders/detail/'.$value.'/'.$id)));    
            return redirect(url('admin/orders/detail/'.$value.'/'.$id));
        }else if($status == 'cancelled'){
            $value = 'Cancelled Orders';
            $data = [
                'is_completed'=>'3',
                'completed_date'=>time(),
            ];
            DB::table('tbl_order')->where('order_id',$id)->update($data);
            Session::flash('info', 'Project status has been change now you can see this project in cancel order tab.Thanyou');
                return redirect(url('admin/orders/detail/'.$value.'/'.$id));
        }else if($status == 'done'){
            $value = 'Completed Orders';
            $data = [
                'is_completed'=>'1',
                'completed_date'=>time(),
            ];
            DB::table('tbl_order')->where('order_id',$id)->update($data);
            Session::flash('info', 'Project status has been change now you can see this project in completed orders tab.Thanyou');
                return redirect(url('admin/orders/detail/'.$value.'/'.$id));
        }else{
        Session::flash('error', 'Oops!Something went wrong.');
                return redirect()->back();
        }
        }catch(Exception $ex){
           dd($ex);
       }
    }
    
    public function uploadwork(Request $request,$id) {
        try{
            //dd($request->all());
            if($files = $request->file('reports') != ""){
            $user_id = $request->input('user_id');
            $sp_id = $request->input('order_spid');
            $data = [
                'user_id' =>$user_id,
                'order_id' =>$id,
                'order_spid' =>$sp_id,
                'created_at' =>time(),
                'updated_at' =>time(),
            ];
            
      //  dd($files);
            $doc_id = '';
            $res = DB::table('tbl_order_work_uploaded')->where('order_id',$id)->first();
            if(count($res) > 0 ){
                $doc_id = $res->ow_id;
            }else{
            $doc_id = DB::table('tbl_order_work_uploaded')->insertGetId($data);}
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
                 'ow_id'=>$doc_id,               
                 'attachment'=>$name, 
                 'orginal_name'=>$orginal_name, 
             ];
                
                DB::table('tbl_order_work_uploaded_document')->insert($data);
                
            }
                Session::flash('success', 'Work has been successfully Uploaded');
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
        
                }catch(Exception $ex){
           Session::flash('error', 'Oops!Something Went Wrong');
                return redirect()->back();
       }
    }
    
    public function deleteworkuploaded($id) {
        try{
            DB::table('tbl_order_work_uploaded_document')->where('up_document_id',$id)->delete();
          Session::flash('success', 'Document has been successfully deleted');
                return redirect()->back();  
        }catch(Exception $ex){
           Session::flash('error', 'Oops!Something Went Wrong');
                return redirect()->back();
       }
    }
}
