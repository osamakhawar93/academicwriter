@include('frontend.layouts.header')
@include('frontend.layouts.usernavbar')
<?php $price = $orders->price;?>
<style>
.form-control {
    width: 77% !important;
}
.dataTables_length{
    float: left;
}
a.nav-link.active {
    color: #101010;
    background-color: #dcd3d3;
}
.nav-tabs>li>a {
    border: 1px solid transparent;
    margin-top: 3px;
    margin-left: 3px;
    color: white;
    background-color: #1ba8d !important;
}
label{
    float:left;
}
</style>
<main class="content-row">
    
    
    <div class="page-title-wrapp">
        <div class="container">
                <div class="row">
                    <div class="col-md-12 card-box" style="background-color:white">
                        
                        <p class="paragraph">
                        <h1>Thanks for choosing us!</h1>
                        Your writer will start working on your order immediately after you make payment.</br> All payments are securely processed via 2checkout. We accept Paypal and all major cards.
                        <p class="paragraph">
                            
                        </p> 
                
                    </div>
                    <div class="col-md-12 card-box ">
                        <?php
                                                    function random_password($chars = 8) {
                                                       $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                                                       return substr(str_shuffle($letters), 0, $chars);
                                                    }
                                                    $string = random_password(15);
                                                    ?>
                        @if($orders->is_completed == 0 )
                                <div class="col-sm-12" style="float:right; padding: 5px">
                                    <a style="float:right" href="{{url('/user_portal/placed_order_edit/').'/'.$string.'/'.$orders->key}}" class="btn btn-primary">Edit Order</a>
                                </div>
                                @endif
                             
                    <div class="col-sm-12 ">
                        <div class="col-sm-4">
                            <div class="col-sm-12 reply-form__box-01 your-email">
                              <div class="col-sm-6 pull-left"><label>Order-ID :</label></div>{{$orders->order_spid}}
                            </div>
                        </div>
                
                    <div class="col-sm-4">
                        <div class="col-sm-12 reply-form__box-01 your-email">
                        <div class="col-sm-4"><label>Status :</label></div>
                            <?php if($orders->is_completed == 0){?>
                                <a href="#" class="btn btn-warning" style="width: 45%; margin-left: 16px;">{{'Pending'}}</a>
                            <?php }else if($orders->is_completed == 1){?>
                                <a href="#" class="btn btn-success" style="width: 45%; margin-left: 16px;">{{'Completed'}}</a>
                            <?php }else if($orders->is_completed == 2){?>
                                <a href="#" class="btn btn-info" style="width: 45%; margin-left: 16px;">{{'InProgress'}}</a>
                            <?php }else if($orders->is_completed == 3){?>
                                <a href="#" class="btn btn-danger" style="width: 45%; margin-left: 16px;">{{'Cancelled'}}</a>
                            <?php }?>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12 reply-form__box-01 your-email">
                        <div class="col-sm-6"><label>Payment :</label></div>
                            <?php if($orders->is_payment == 0){?>
                            <a href="#" class="btn btn-warning" style="width: 45%;">{{'Pending'}}</a>
                            <?php }else if($orders->is_payment == 1){?>
                            <a href="#" class="btn btn-success" style="width: 45%;">{{'Paid'}}</a>

                            <?php }?>
                        </div>

                    </div>
                    </div>
                

                        <div class="row">
                           
                            <div class="col-sm-12 card-box">
                                <div class="tab-content ">
                                    <div class="row" style="margin-top: 25px">
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-4 pull-left"><label>Dead Line<span class="red_star">*</span></label></div>
                                                <div style="background-color: #1ba8dc; padding: 13px; color: #ffff; float: left;" class="col-sm-8 reply-form__email" id="deadline" value="" readonly="true"></div>
                                                     
                                        </div>
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-4 pull-left"><label>Subject<span class="red_star">*</span></label></div>
                                                <input class="col-sm-8 reply-form__email" value="{{$orders->subject}}" readonly="true">
                                                    
                                       </div>
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-4 pull-left"><label> Title<span class="red_star">*</span></label></div>
                                                <input class="col-sm-8 reply-form__email" value="{{$orders->title}}" readonly="true">
                                                    
                                       </div>
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-4 pull-left"><label>Document Type<span class="red_star">*</span></label></div>
                                                <input class="col-sm-8 reply-form__email" value="{{$orders->document_type}}" readonly="true">
                                                    
                                       </div>
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-4 pull-left"><label>Academic Level<span class="red_star">*</span></label></div>
                                                <input class="col-sm-8 reply-form__email" value="{{$orders->academic_level}}" readonly="true">
                                                    
                                       </div>
                                        
                                        
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-4 pull-left"><label>Citation<span class="red_star">*</span></label></div>
                                                <input class="col-sm-8 reply-form__email" value="{{$orders->citation}}" readonly="true">
                                                    
                                       </div>
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-4 pull-left"><label>Words /Pages<span class="red_star">*</span></label></div>
                                                <input class="col-sm-8 reply-form__email" value="{{$orders->no_words}}" readonly="true">
                                                    
                                       </div>
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-4 pull-left"><label>Number Of Sources<span class="red_star">*</span></label></div>
                                                <input class="col-sm-8 reply-form__email" value="{{$orders->sources}}" readonly="true">
                                                    
                                       </div>
                                        
                                            <div class="col-sm-12 reply-form__box-01 name">
                                                    <div class="col-sm-4"><label> Description</label></div>
                                            
                                                    <textarea readonly="true" style="margin: 0px; height: 163px;" class="col-sm-8 reply-form__name" type="text" name="description" id="description"   >
                                                        {{$orders->description}}
                                                    </textarea>
                                                   
                                                </div>
                                    
                                   
                                      <div class="col-sm-12 reply-form__box-01 your-email">
                                            <div class="col-sm-4 pull-left"> <label for="webSite">User Documents<span class="text-danger">:</span></label></div>
                                            
                                       
                                            <div class=" table-responsive" style="margin-top: 6px">
                                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Files</th>
                                                </tr>
                                                </thead>

                                                 <tbody>

                                                     @if(count($document)>0)
                                                     @foreach($document as $j=>$r) 
                                                <tr>
                                                    <td>{{$j+1}}</td>
                                                    <td>
                                                        
                                                        <a href="{{url('/')}}/user_portal/document/download/{{$r->attachment}}"><span class="glyphicon glyphicon-download-alt"></span>{{$r->orginal_name}} </a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                 </tbody>
                                            </table>

                                        </div>
                                        </div>
                                    </div>
                                        
                                        <div class="col-sm-4" style="float:right">
                                            
                                            <div id="rightPanelPrice" class="pricegrad" style="border-radius: 6px">  
                                                <div id="price-box-2">
                                                    <div class="price-box-inner">
                                                        <div class="pricegrad" style="border-radius: 6px">
                                                                                    <p style="padding: 10px 0px 0 20px; font-size: 20px;"><b>Your Price: $<span id="dprice" ><?php if($price == ''){echo '0.00';} else {echo $price;} ?></span></b></p>
                                                                                    <div style="width:85%;">
                                                                                            <p style="padding: 20px 0px 0px 22px; font-size: 20px;display:inline-block;">Was: $<span id="tprice" style="text-decoration: line-through; text-decoration-color: red;"><?php if($price == ''){echo '0.00';} else {echo $price*2;} ?></span></p>
                                                                                            <p style="padding: 20px 0px 0px 25px; font-size: 20px;display:inline-block;">Now: $<span id="d2price" ><?php if($price == ''){echo '0.00';} else {echo $price;} ?></span></p>
                                                                                    </div>
                                                                                    <p style="padding: 0 20px 0 20px; font-size: 20px;"><b>You Save: $<span id="d3price" ><?php if($price == ''){echo '0.00';} else {echo $price;} ?></span></b></p>
                                                                                    <p style="padding: 0 20px 25px 20px; font-size: 20px;">Offer Ends: <i class="fa fa-clock-o"></i> 7 Days</p>

                                                        </div>
                                                            <div id="payableMessage" style="padding-left:0px;"></div>
                                                    </div>
                                                </div>
                                                @if($orders->is_payment == 0)
                                                <div class="check-btn" style="padding-left: 100px;">
                                                    <input type="button" onclick="" class="btn btn-primary" value="Click Here To Pay">
                                                </div>
                                                @endif
                                                <div class="policy-text" style="margin-left:20px">
                                                <p>I agree with policies and terms and conditions by clicking button above</p>
                                                         
                                                        </div>
                                              <div class="payment-section">
                                                  <h3 style="padding: 10px 0px 10px 82px;">Payment Option</h3>
                                                  <a href="" style="padding: 71px"><img src="{{url('/')}}/img/payment-option.png" alt="" title=""></a>
                                               </div>
                                             </div>
                                        </div>   
                                    </div>
                                        </hr>
                                    
                                   
                                
                            </div>
                            </div>
                        </div>
                        
                </div>
                    @if($orders->is_completed == 0 )
                    <div class="col-sm-4" style="float:right">
                        <a style="float:right" href="{{url('/user_portal/placed_order_edit/').'/'.$string.'/'.$orders->key}}" class="btn btn-primary">Edit Order</a>
                    </div>
                    @endif
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
        <h4 class="modal-title">Your Order Status</h4>
      </div>
      <div class="modal-body" id="modalbody">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defualt" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@include('frontend.layouts.footer')
    
    
<script src="{{asset('/')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}/js/jquery.bootstrap.js" type="text/javascript"></script>
<script  src="{{asset('/')}}/js/jquery.maskedinput.min.js"></script>
<script>
	jQuery(function($){
	   $("#phone").mask("+99-9999999999");
	});
          $("#deadline").countdown("{{$orders->date}}", function(event) {
    $(this).text(
      event.strftime('%W weeks %-d days %-H h %M min %S sec')
    );
    //alert('here');
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
    if('{{Session::has("success")}}' || '{{Session::has("error")}}'){
    $('#myModal').modal('show');
    $('#modalbody').text('{{Session::get("success")}}');
}
     if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on("popstate", function() {
    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
    $("a[href='" + anchor + "']").tab("show");
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