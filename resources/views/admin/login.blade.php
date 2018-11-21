<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Your Academic writer</title>

        <link href="{{url('/')}}/assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/assets/backend/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/assets/backend/css/style.css" rel="stylesheet" type="text/css" />

        <script src="{{url('/')}}/assets/backend/js/modernizr.min.js"></script>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="card-box">
                <div class="panel-heading">
                    <h4 class="text-center"> Admin Panel <strong class="text-custom">Your Academic Writer</strong></h4>
                </div>


                <div class="p-20">
                          <form class="form-horizontal m-t-20" method="post" action="{{url('/')}}/backend/authantication">
                          {{ csrf_field() }}
                        <div class="form-group ">
                            <div class="col-12">
                                <input class="form-control" type="text" name="email" required="" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" type="password" name="password" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Log In
                                </button>
                            </div>
                        </div>

<!--                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-12">
                                <a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot
                                    your password?</a>
                            </div>
                        </div>-->
                    </form>

                </div>
            </div>
          
            
        </div>
        
        

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{url('/')}}/assets/backend/js/jquery.min.js"></script>
        <script src="{{url('/')}}/assets/backend/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="{{url('/')}}/assets/backend/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/assets/backend/js/detect.js"></script>
        <script src="{{url('/')}}/assets/backend/js/fastclick.js"></script>
        <script src="{{url('/')}}/assets/backend/js/jquery.slimscroll.js"></script>
        <script src="{{url('/')}}/assets/backend/js/jquery.blockUI.js"></script>
        <script src="{{url('/')}}/assets/backend/js/waves.js"></script>
        <script src="{{url('/')}}/assets/backend/js/wow.min.js"></script>
        <script src="{{url('/')}}/assets/backend/js/jquery.nicescroll.js"></script>
        <script src="{{url('/')}}/assets/backend/js/jquery.scrollTo.min.js"></script>

        <script src="{{url('/')}}/assets/backend/js/jquery.core.js"></script>
        <script src="{{url('/')}}/assets/backend/js/jquery.app.js"></script>
        <script type="text/javascript" >
	 $( document ).ready(function() {
                    
                    var success = '{{Session::get("success")}}';
                    var warning = '{{Session::get("warning")}}';
                    var error = '{{Session::get("error")}}';
                    var info = '{{Session::get("info")}}';
                    if(success != ""){
                    $.Notification.autoHideNotify('success', 'top right',success );
                }if(warning != ""){
                    $.Notification.autoHideNotify('warning', 'top right',warning );
                }if(error != ""){
                    $.Notification.autoHideNotify('error', 'top right',error );
                }if(info != ""){
                    $.Notification.autoHideNotify('info', 'top right',info );
                }
        });
        </script>
        <script type="text/javascript" src="{{url('/')}}/assets/plugins/notifyjs/js/notify.js"></script>
        <script type="text/javascript" src="{{url('/')}}/assets/plugins/notifications/notify-metro.js"></script>
	</body>
</html>
</html>
