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

class DashBoardController extends Controller
{
    public function index() {
       // dd('here');
        
        $total_order = DB::table('tbl_order')->count();
        $completed_order = DB::table('tbl_order')->where('is_completed',1)->count();
        $new_order = DB::table('tbl_order')->where('is_completed',0)->count();
        $inprogress_order = DB::table('tbl_order')->where('is_completed',2)->count();
        $completed_revision = DB::table('tbl_order_revision')->where('is_completed',1)->count();
        $inprogress_revision = DB::table('tbl_order_revision')->where('is_completed',2)->count();
        $new_revision = DB::table('tbl_order_revision')->where('is_completed',0)->count();
        $total_revision = DB::table('tbl_order_revision')->count();
        $total_user = DB::table('tbl_users')->count();
        $data = [
            'new_order'=>$new_order,
            'total_order'=>$total_order,
            'completed_order'=>$completed_order,
            'inprogress_order'=>$inprogress_order,
            'total_user'=>$total_user,
            'completed_revision'=>$completed_revision,
            'inprogress_revision'=>$inprogress_revision,
            'total_revision'=>$total_revision,
            'new_revision'=>$new_revision,
        ];
        return view('admin.dashboard',$data);
    }
}
