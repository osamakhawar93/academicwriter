@include('frontend.layouts.header')
@include('frontend.layouts.usernavbar')
<main class="content-row">
    <div class="page-title-wrapp">
        <div class="container">
                <div class="row">
                    <div class="col-md-12 card-box">
           <div class="col-md-12 table-responsive">
                <form method="post" action="{{url('/user_portal/profile/update')}}">
                    {{ csrf_field() }}
                    <div class="col-sm-12 reply-form__box-01 your-email">
                                <div class="col-sm-3 pull-left"><label> Name: <span class="red_star">*</span></label></div>
                                <input class="col-sm-8 reply-form__name" type="text" name="name" value="{{$user->name}}" id="name" aria-required="true" aria-invalid="false" required="true" placeholder="Name *">

                    </div>
                    <div class="col-sm-12 reply-form__box-01 your-email">
                                <div class="col-sm-3 pull-left"><label> Email: <span class="red_star">*</span></label></div>
                                <input class="col-sm-8 reply-form__name" type="email" name="email" value="{{$user->email}}" readonly="true">
                    </div>
                    <div class="col-sm-12 reply-form__box-01 your-email">
                                <div class="col-sm-3 pull-left"><label> Phone: <span class="red_star">*</span></label></div>
                                    <input  class="col-sm-8 reply-form__name" type="text" name="phone" value="{{$user->phone}}" id="phone" aria-required="true" required="true" aria-invalid="false" placeholder="Phone *">

                    </div>

                    <div class="col-sm-12 reply-form__box-01 your-email">
                                <div class="col-sm-3 pull-left"><label> Change Password: <span class="red_star">*</span></label></div>
                                <input class="pull-left checkbox" type="checkbox" name="check" id="changepasswordcheckbox" onchange="valueChanged();"><span style="float:left">Do want to change password</span>

                    </div>

                    <div class="col-sm-12 reply-form__box-01 your-email" id="opassword" style="display: none">
                                <div class="col-sm-3 pull-left"><label> Old Password: <span class="red_star">*</span></label></div>
                                <input style="width:66.6666%; float: left; " class="col-sm-8 reply-form__name" type="password" name="oldpassword" id="oldpassword"  aria-required="false" aria-invalid="false" placeholder="Enter Old Password.... *">

                    </div>
                    <div class="col-sm-12 reply-form__box-01 your-email" id="npassword" style="display: none">
                                <div class="col-sm-3 pull-left"><label> New Password: <span class="red_star">*</span></label></div>
                                <input style="width:66.6666%; float: left" onkeyup="checkpass();" class="col-sm-8 reply-form__name" type="password" name="newpassword" id="newpassword"  aria-required="false" aria-invalid="false" placeholder="Enter New Password *">
                    <span class="col-sm-6 red_star" id="passwordmessage" style="display: none; color: red;">* Password and Confirm  is not same</span>

                    </div>

                    <div class="col-sm-12 reply-form__box-01 your-email" id="cpassword" style="display: none">
                                <div class="col-sm-3 pull-left"><label> Confirm Password: <span class="red_star">*</span></label></div>
                                <input style="width:66.6666%; float: left" onkeyup="checkpass();" class="col-sm-8 reply-form__name" type="password" name="confirmpassword" id="confirmpassword"  aria-required="false" aria-invalid="false" placeholder="Re-type your new password *">

                    </div>

                        <input type="submit" class="col-sm-2 btn btn-success" value="Submit" style="float:left; margin-left: 25%">
                </form>
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
        <div class="modal-header" style="background-color:#337ab7; color: white; border-radius: 6px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
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
        function valueChanged()
        {
            if($('#changepasswordcheckbox').is(":checked")){   
               // alert('1');
                $('#opassword').show();
                $('#npassword').show();
                $('#cpassword').show();
                $('#oldpassword').attr('required',true);
                $('#confirmpassword').attr('required',true);
                $('#newpassword').attr('required',true);
            }else{
                //alert('2');
                //$(".changepassword").hide();
                
                $('#oldpassword').attr('required',false);
                $('#confirmpassword').attr('required',false);
                $('#newpassword').attr('required',false);
                $(':input[type="submit"]').prop('disabled', false);
                $('#opassword').hide();
                $('#npassword').hide();
                $('#cpassword').hide();
                
            }
        }
        function checkpass(){
            if($('#confirmpassword').val() != ''){
                if($('#confirmpassword').val() != $('#newpassword').val() ){
                    $(':input[type="submit"]').prop('disabled', true);
                    $('#passwordmessage').show();
                }
                if($('#confirmpassword').val() == $('#newpassword').val() && $('#confirmpassword').val() != '' && $('#newpassword').val() != ''){
                    $(':input[type="submit"]').prop('disabled', false);
                    
                    $('#passwordmessage').hide('');
                }
            }
        } 
        
</script>
<link type="text/css" href="{{asset('/')}}/js/jquery.simple-dtpicker.css" rel="stylesheet" />
<script type="text/javascript" src="{{asset('/')}}/js/jquery.simple-dtpicker.js"></script>
    
<!--  Plugin for the Wizard -->
<script src="{{asset('/')}}/js/material-bootstrap-wizard.js"></script>
    
<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('/')}}/js/jquery.validate.min.js">

</script>
<script type="text/javascript">
$(document).ready(function(){
    if('{{Session::has("success")}}'){
        
        $('#myModal').modal('show');
        $('.modal-body').text('{{Session::get("success")}}');
        
    }
    if('{{Session::has("error")}}'){
        
        $('#myModal').modal('show');
        $('.modal-body').text('{{Session::get("error")}}');
        
    }
    
});
</script> 