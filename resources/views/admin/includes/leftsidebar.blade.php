            <!-- ========== Left Sidebar Start ========== -->
<?php
$total_order = DB::table('tbl_order')->count();
$completed_orders = DB::table('tbl_order')->where('is_completed',1)->count();
$inprogress_orders = DB::table('tbl_order')->where('is_completed',2)->count();
$cancelled_orders = DB::table('tbl_order')->where('is_completed',3)->count();
$new_orders = DB::table('tbl_order')->where('is_completed',0)->count();

$total_revisions = DB::table('tbl_order_revision')->count();
$new_revisions = DB::table('tbl_order_revision')->where('is_completed',0)->count();
$completed_revisions = DB::table('tbl_order_revision')->where('is_completed',1)->count();
$inprogress_revisions = DB::table('tbl_order_revision')->where('is_completed',2)->count();
$cancelled_revisions = DB::table('tbl_order_revision')->where('is_completed',3)->count();
?>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="text-muted menu-title"><b>{{Session::get('admin_role')}}</b></li>
                                
<!--                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{url('/')}}/backend/site_statistics">Site Statistics</a></li>
                                </ul>
                            </li>-->
                            
                           
                       
<!--                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-book"></i><span>Company Bookings </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{url('/')}}/backend/bookings/{{'company'}}/{{'new_bookings'}}"><span>New Bookings</span></a></li>
                                    <li><a href="{{url('/')}}/backend/bookings/{{'company'}}/{{'in_progress_bookings'}}"><span>In Progress Bookings</span></a></li>
                                    <li><a href="{{url('/')}}/backend/bookings/{{'company'}}/{{'pending_payments'}}"><span>Payments</span></a></li>
                                    <li><a href="{{url('/')}}/backend/bookings/{{'company'}}/{{'pending_reports'}}"><span>Pending Reports</span></a></li>
                                    <li><a href="{{url('/')}}/backend/bookings/{{'company'}}/{{'done_bookings'}}">Done Bookings</a></li>
                                    <li><a href="{{url('/')}}/backend/bookings/{{'company'}}/{{'cancelled_bookings'}}"><span>Cancelled Booking</span></a></li>
                                   
                                </ul>
                            </li>-->
                         
                            <li class="has_sub waves-effect" >
                                <a href="{{url('/')}}/admin/dashboard"><i class="ti-home"></i><span>Dashboard</span></a>
                            </li>
                                 
                           <li class="has_sub">
                               <a href="javascript:void(0);" class="waves-effect "><i class="ti-pencil-alt"></i><span class="label label-primary pull-right">{{$total_order}}</span><span>Orders</span></a>
                            <ul class="list-unstyled" <?php   if(isset($type)){  if($type == 'New Orders' || $type == 'Inprogress Orders' || $type == 'Completed Orders' || $type == 'Cancelled Orders'){ echo 'style="display:block !important"'; }}?>>
                            <li <?php if(isset($type)){if($type == 'New Orders'){ echo 'class="active"'; }}?>>
                                <a href="{{url('/')}}/admin/orders/new_orders" ><span class="label label-info pull-right">{{$new_orders}}</span><span>New Orders</span></a>
                            </li>
                            <li <?php if(isset($type)){if($type == 'Inprogress Orders'){ echo 'class="active"'; }}?>>
                                <a href="{{url('/')}}/admin/orders/inprogress"><span class="label label-warning pull-right">{{$inprogress_orders}}</span><span>Inprogress Orders</span></a>
                            </li>
                            <li <?php if(isset($type)){if($type == 'Completed Orders'){ echo 'class="active"'; }}?>>
                                <a href="{{url('/')}}/admin/orders/completed"><span class="label label-success pull-right">{{$completed_orders}}</span><span>Completed Orders</span></a>
                            </li>
                            <li <?php if(isset($type)){if($type == 'Cancelled Orders'){ echo 'class="active"'; }}?>>
                                <a href="{{url('/')}}/admin/orders/cancelled"><span class="label label-danger pull-right">{{$cancelled_orders}}</span><span>Cancelled Orders</span></a>
                            </li>
                            </ul>
                           </li>
                           
                           <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect "><i class="ti-light-bulb"></i><span class="label label-primary pull-right">{{$total_revisions}}</span><span>Revisions</span></a>
                            <ul class="list-unstyled" <?php   if(isset($type)){  if($type == 'New Revision' || $type == 'Inprogress Revision' || $type == 'Completed Revision' || $type == 'Cancelled Revision'){ echo 'style="display:block !important"'; }}?>>
                            <li <?php if(isset($type)){if($type == 'New Revision'){ echo 'class="active"'; }}?>>
                                <a href="{{url('/')}}/admin/revision/new_revision" ><span class="label label-info pull-right">{{$new_revisions}}</span><span>New Revisions</span></a>
                            </li>
                            <li <?php if(isset($type)){if($type == 'Inprogress Revision'){ echo 'class="active"'; }}?>>
                                <a href="{{url('/')}}/admin/revision/inprogress"><span class="label label-warning pull-right">{{$inprogress_revisions}}</span><span>Inprogress Revisions</span></a>
                            </li>
                            <li <?php if(isset($type)){if($type == 'Completed Revision'){ echo 'class="active"'; }}?>>
                                <a href="{{url('/')}}/admin/revision/completed"><span class="label label-success pull-right">{{$completed_revisions}}</span><span>Completed Revisions</span></a>
                            </li>
                            <li <?php if(isset($type)){if($type == 'Cancelled Revision'){ echo 'class="active"'; }}?>>
                                <a href="{{url('/')}}/admin/revision/cancelled"><span class="label label-danger pull-right">{{$cancelled_revisions}}</span><span>Cancelled Revisions</span></a>
                            </li>
                            </ul>
                           </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->