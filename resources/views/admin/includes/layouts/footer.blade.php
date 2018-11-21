
        </div>
        <!-- END wrapper -->


       
        <script type="text/javascript" >
            var resizefunc = [];
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

        <!-- jQuery  -->
        <script type="text/javascript" src="{{asset('/')}}assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script type="text/javascript" src="{{asset('/')}}assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/detect.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/fastclick.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/jquery.slimscroll.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/jquery.blockUI.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/waves.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/wow.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/jquery.nicescroll.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/js/select2.js"></script>
        
        
        
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" ></script>
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" ></script>
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" ></script>

        <!-- Modal-Effect -->
        <script src="{{asset('/')}}assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="{{asset('/')}}assets/plugins/custombox/js/legacy.min.js"></script>

        <script src="{{ asset('/assets/vendors/iCheck/icheck.js') }}" type="text/javascript"></script>
        <!-- Required datatable js -->
        
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/notifyjs/js/notify.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/notifications/notify-metro.js"></script>
        
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{asset('/')}}assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="{{asset('/')}}assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<!--        <script src="{{asset('/')}}assets/plugins/datatables/jszip.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.2.0/jszip.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.0.0/jszip-deflate.js"></script>
        
        <script src="{{asset('/')}}assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="{{asset('/')}}assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="{{asset('/')}}assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="{{asset('/')}}assets/plugins/datatables/buttons.colVis.min.js"></script>
        <script src="{{asset('/')}}assets/plugins/datatables/buttons.html5.min.js"></script>
        
        
        
        <!-- Responsive examples -->
        <script src="{{asset('/')}}assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="{{asset('/')}}assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
        
        <!-- Start Date js -->
        <script src="{{asset('/')}}assets/plugins/moment/moment.js"></script>
        <script src="{{asset('/')}}assets/plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="{{asset('/')}}assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="{{asset('/')}}assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="{{asset('/')}}assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="{{asset('/')}}assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="{{asset('/')}}assets/pages/jquery.form-pickers.init.js"></script>
        <!-- END Date js -->
        <!-- App js -->
        <script src="{{asset('/')}}assets/js/jquery.core.js"></script>
        <script src="{{asset('/')}}assets/js/jquery.app.js"></script>
        <script src="{{asset('/')}}js/jquery.countdown.js"></script>
        <script src="{{asset('/')}}js/jquery.countdown.min.js"></script>
        
        <script type="text/javascript" src="{{asset('/')}}assets/plugins/parsleyjs/parsley.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
        <script type="text/javascript">
            var token = "{{ csrf_token() }}";
            var filerDialogs = {
                alert: function (text) {
                    return message_toast(text, 'error');
                },
                confirm: function (text, callback) {
                    confirm(text) ? callback() : null;
                }
            };            
        </script>

         <script src="{{asset('/')}}assets/custom/js/master.js">
         
         </script>


    </body>
</html>