<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link rel="shortcut icon" href="{{asset('/')}}assets/images/favicon_1.ico">

        <title>The Academic Writer - Admin Panel</title>
        
        <!-- DataTables -->
        <link href="{{asset('/')}}assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('/')}}assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{asset('/')}}assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
                <!-- Plugins css-->
        <link href="{{asset('/')}}assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="{{asset('/')}}assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
        <link href="{{asset('/')}}assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="{{asset('/')}}assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <!--Start Date Picker -->
        <link href="{{asset('/')}}assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="{{asset('/')}}assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="{{asset('/')}}assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="{{asset('/')}}assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="{{asset('/')}}assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!--END Date Picker -->
        <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('/')}}assets/css/select2.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('/')}}assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('/')}}assets/css/style.css" rel="stylesheet" type="text/css" />
<!-- ICheck -->
        <link href="{{ asset('/assets/vendors/iCheck/skins/square/blue.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/vendors/iCheck/skins/minimal/minimal.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/vendors/iCheck/skins/minimal/green.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/vendors/iCheck/skins/minimal/red.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/vendors/iCheck/skins/flat/red.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/vendors/iCheck/skins/flat/blue.css') }}" rel="stylesheet" type="text/css"/>
         <link href="{{asset('/')}}assets/plugins/custombox/css/custombox.css" rel="stylesheet">
        <!--Morris Chart CSS -->
        <script src="{{asset('/')}}assets/js/jquery.min.js"></script>
        
        <script src="{{asset('/')}}assets/js/modernizr.min.js"></script>
        
        <script src="{{asset('/')}}assets/ckeditor/ckeditor.js"></script>
       


    </head>
    <style>
        #wrapper {
            overflow: auto;
        }
        .input-group-sm>.input-group-btn>select.btn:not([size]):not([multiple]), .input-group-sm>select.form-control:not([size]):not([multiple]), .input-group-sm>select.input-group-addon:not([size]):not([multiple]), select.form-control-sm:not([size]):not([multiple]) {
    height: calc(1.8125rem + 6px);
}
element.style {
}

.modal .modal-dialog .modal-content {
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    border-color: #DDDDDD;
    /* border-radius: 2px; */
    box-shadow: none;
    padding: 13px;
}
.modal-header{
    border-radius: 6px;
}
.modal-title{
    color: white;
    padding: 2px;
}

    </style>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper" >
