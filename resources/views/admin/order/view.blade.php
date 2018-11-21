@include('admin.includes.layouts.header')

@include('admin.includes.topsidebar')

@include('admin.includes.leftsidebar')
 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
<!--                                <div class="btn-group pull-right m-t-15">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings</button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Dropdown One</a>
                                        <a class="dropdown-item" href="#">Dropdown Two</a>
                                        <a class="dropdown-item" href="#">Dropdown Three</a>
                                        <a class="dropdown-item" href="#">Dropdown Four</a>
                                    </div>
                                </div>-->

                                <h4 class="page-title">All Orders</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Orders</a></li>
                                    <li class="breadcrumb-item"><a href="#">{{$type}}</a></li>
                                </ol>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Work type</th>
                                            <th>Time Left</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                         <tbody>
                                             
                                             @if(count($orders)>0)
                                             @foreach($orders as $key=>$order)
                                             
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->email}}</td>
                                            <td>{{$order->subject}}</td>
                                            <td>{{$order->document_type}}</td>
                                            <td>
                                                <?php
                                                $currentdate = time();
                                                $starttime = date('m/d/Y h:i',$currentdate);
                                                $date = $order->date;
                                                $time = $order->time;
                                                $enddatetime = $date.' '.$time;
                                                $date1 = strtotime($starttime);
                                                $date2 = strtotime($enddatetime);
                                                
                                                $subTime = $date2 - $date1;
                                                $y = ($subTime/(60*60*24*365));
                                                $d = ($subTime/(60*60*24))%365;
                                                $h = ($subTime/(60*60))%24;
                                                $m = ($subTime/60)%60;
                                                $settime = $d.'days'.' '.$h.':'.$m;
                                                 ?>
                                                @if($d <= 0 && $h <= 0 && $m <= 0)
                                                <a class="btn btn-danger">{{'Times Up'}}</a>
                                                       
                                                
                                                @else
                                                <a class="btn btn-info">{{$settime}}</a>
                                                    
                                                @endif
                                            </td>
                                            <td><a type="button" class="btn btn-success" href="{{url('/admin/orders/detail')}}/{{$type}}/{{$order->order_id}}">View</a></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                         </tbody>
                                    </table>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    &copy; 2016 - 2017. All rights reserved.
                </footer>

            </div>
@include('admin.includes.layouts.footer')
<script type="text/javascript">
            $(document).ready(function() {
              $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: true,
                    buttons: ['csv']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>