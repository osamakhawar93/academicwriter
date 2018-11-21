@include('frontend.layouts.header')
@include('frontend.layouts.usernavbar')
<main class="content-row">
    <div class="page-title-wrapp">
        <div class="container">
                <div class="row">
                    <div class="col-md-12 card-box">
                        <div class="col-md-12 card-box" style="background-color:white">
                            @if($active_tab === "order_history")
                             <p class="paragraph">This is where you can privately manage your personal information, review your current orders, request project updates, and download completed orders...</p>
                             <p class="paragraph">All at the click of a button!</p>
                             @endif
                             @if($active_tab === "order_download")
                               <p class="paragraph">
                                        You can download your work when it is completed from here.  
                                            </p>
                                    <p class="paragraph">Be sure to save the complete file to your desktop.<br>
                            We ask that you review your project immediately.  If you require any revisions, edits, or other changes, let us know promptly.  If your request falls within your deadline period, we'll gladly make any changes without additional charge.  Beyond your deadline period, we will make every effort to accommodate reasonable change requests.</p>
                                            <p class="paragraph">We will always go the "extra mile" to provide work that exceeds your expectations. We will always do our absolute best to provide quality work as per your instructions.  You are the sole judge of the writing we provide and cannot guarantee academic results of any kind as they depend on factors beyond anyones control.</p>
                                            <p class="paragraph">Your satisfaction is our utmost priority. If you have any questions about downloading or saving your file, contact us immediately.
                                    </p>
                             @endif
                             @if($active_tab === "order_inprogress")
                               <p class="paragraph">Just give us your Order ID, and we'll gladly share up-to- the-minute progress on your writing project.</p>
                                <p class="paragraph">Because our writers are working 24/7 around the clock, we often respond within 30minutes. If your personal writer is currently offline (sometimes they actually eat and sleep!), your update will appear in your email Inbox within 12 hours.</p>
                             @endif
                         </div>
                        <div class="col-md-12 table-responsive">
                        @if(count($orders) > 0)
                             <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Order TW</th>
                                        <th>Title</th>
                                        <th>Subject</th>
                                        <th>Document Type</th>
                                        <th>Academic Level</th>
                                        <th>Status</th>
                                        <th>Order Date</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                     <?php
                                                    function random_password($chars = 8) {
                                                       $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                                                       return substr(str_shuffle($letters), 0, $chars);
                                                    }
                                                    $string = random_password(15);
                                                    ?>
                                     @foreach($orders as $key=>$r)
                                    <tr>
                                        
                                        <td>{{$r->order_spid}}</td>
                                        <td>{{$r->title}}</td>
                                        <td>{{$r->subject}}</td>
                                        <td>{{$r->document_type}}</td>
                                        <td>{{$r->academic_level}}</td>
                                        <td><?php if($r->is_completed == 0){?>
                                                    <a href="#" class="btn btn-warning" style=" margin-left: 16px;">{{'Pending'}}</a>
                                                <?php }else if($r->is_completed == 1){?>
                                                    <a href="#" class="btn btn-success" style=" margin-left: 16px;">{{'Completed'}}</a>
                                                <?php }else if($r->is_completed == 2){?>
                                                    <a href="#" class="btn btn-info" style=" margin-left: 16px;">{{'InProgress'}}</a>
                                                <?php }else if($r->is_completed == 3){?>
                                                    <a href="#" class="btn btn-danger" style=" margin-left: 16px;">{{'Cancelled'}}</a>
                                                <?php }?>
                                        </td>
                                        <td>{{date('d/m/Y.',$r->created_at)}}</td>

                                        <td><div class="btn-group pull-right m-t-15">

                                                <a type="button" class="btn btn-primary waves-effect waves-light" href="{{url('/user_portal/order_detail')}}/{{$string}}/{{$active_tab}}/{{$r->sp_key}}"  aria-expanded="false">Detail</a>

                                        </div></td>
                                    </tr>

                                    @endforeach

                                 </tbody>
                            </table>
                        @else
                        @if($active_tab == 'order_history')
                           <h3 style="float:left">Currently their is no order has placed.</h3>
                        @endif
                        @if($active_tab == 'order_inprogress')
                           <h3 style="float:left">Currently your no order is inprogress.</h3>
                        @endif
                        @if($active_tab == 'order_download')
                           <h3 style="float:left">Currently their is no downlaodable file available.</h3>
                        @endif

                        @endif
                        </div>
                                       
                    </div>
                </div>
        </div>
    </div>
    
</main>

<div class="clearfix"></div>
<hr>
<div id="myModal" class="modal fade" role="dialog" style="display:none">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width:100%;">
        <div class="modal-header" style="background-color:#6db6a5; color: white; border-radius: 6px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Order Submmitted</h4>
      </div>
      <div class="modal-body">
          <p><b>Your order has been successfully submitted please check your mail for confirmation.</br>We will contact you soon.</b> </br><span class="pull-right"><strong>Thankyou</strong></span></p></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defualt" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@include('frontend.layouts.userfooter')
    
    
<script src="{{asset('/')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}/js/jquery.bootstrap.js" type="text/javascript"></script>
<script  src="{{asset('/')}}/js/jquery.maskedinput.min.js"></script>
<script>
	jQuery(function($){
	   $("#phone").mask("+99-9999999999");
	});
</script>
<link type="text/css" href="{{asset('/')}}/js/jquery.simple-dtpicker.css" rel="stylesheet" />
<script type="text/javascript" src="{{asset('/')}}/js/jquery.simple-dtpicker.js"></script>
    
<!--  Plugin for the Wizard -->
<script src="{{asset('/')}}/js/material-bootstrap-wizard.js"></script>
    
<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('/')}}/js/jquery.validate.min.js">

</script>
<script type="text/javascript">
    
$(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: true,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            
    $(function() {
    $("td[colspan=8]").find("p").hide();
    $("table").click(function(event) {
        event.stopPropagation();
        var $target = $(event.target);
        if ( $target.closest("td").attr("colspan") > 1 ) {
            $target.slideUp();
        } else {
            $target.closest("tr").next().find("p").slideToggle();
        }                    
    });
});
    } );
</script> 