@include('frontend.layouts.header')
@include('frontend.layouts.navbar')
<style>
    .nav-pills>li>a {
    border-radius: 4px;
    background-color: #cccc;
    color: #2d2929;
}
.col-sm-offset-2 {
    margin-left: 19.666667%;
}
.top-nav-list {
    float: left;
    width: 100%;
    margin: 20px 0 40px 0;
}
.top-list li:first-child {
    font-family: "PTSans-Bold";
    font-size: 21px;
    padding: 7px 10px;
}

.top-list li {
    background: #a9a9a9 none repeat scroll 0 0;
    border-radius: 5px;
    color: #fff;
    float: left;
/*    margin-right: 10px;*/
    margin-bottom: 10px;
/*    padding: 2px 2px;*/
}
.top-list-active {
    background: #1ba8dc !important;
}

.top-list li a {
    color: #fff;
}

li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.top-list ul {
    float: left;
    width: 100%;
    padding: 0;
    margin: 0;
    list-style: none;
}
.list-img {
    float: left;
    width: 100%;
    text-align: center;
}
.top-list span {
    float: left;
    text-align: center;
    width: 100%;
}
.imgspan{
    width: 39px;
    vertical-align: middle
}

.table>tbody>tr>td, .table>thead>tr>th {
    text-align: left;
    border: 1px solid #ddd;
}
.table-responsive{
    width: 90%;
    margin-left: 3%;
    margin-top: 2%;
    border: none;
    
}
.table{
    border: 1px solid #ddd;
}
.page-title-01 {
    font-size: 58px;
    line-height: 34px;
    color: #101a1d;
    margin: 32px 0 25px;
    text-align: center;
}
.logoutbtn{
    float: right;
    color: white;
    margin-top: 31px;
    background-color: black;
    border-radius: 6px;
    width: 120px;
    zoom: 8px;
}
</style>
<main class="content-row">
    <div class="page-title-wrapp">
        <div class="container">
                <div class="row">
                    <div class="col-md-12" style="background-color: #1ba8dc !important">
                        <div class="col-md-4">
                                <h1 class="page-title-01"> </h1>
                                
                        </div>
                        <div class="col-md-4">
                                <h1 class="page-title-01">Dashboard</h1>
                                
                        </div>
                            <div class="col-md-4">
                            <a href="" class="logoutbtn"> <span class="list-img"><img class="imgspan" style="margin-right: 12px;" src="{{asset('/img/usericon')}}/images.png" alt="" title="">Logout</span> </a>
                        </div>
                      
        <div class="col-md-12 main-nav" style="position:static">
				<div class="container">
					<div class="row">
                                            <div class="top-nav-list">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="top-list">
                                                      <div class="main-nav__btn">
                                                            <div class="icon-left"></div>
                                                            <div class="icon-right"></div>
                                                      </div>
                                                                <ul class="main-nav__list">
                                                                    <li class="top-list top-list-active"><a href=""><span>Place New Order</span> </a></li>
                                                                    <li class="top-list"><a href=""> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/profile-icon.png" alt="" title=""></span> <span>Manage Profile</span> </a></li>
                                                                    <li class="top-list-active"><a href=""> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/edit.png" alt="" title=""></span> <span>Order History</span> </a></li>
                                                                    <li class="top-list"><a href=""> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/progress-icon.png" alt="" title=""></span> <span>Order Progress</span> </a></li>
                                                                    <li class="top-list"><a href=""> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/download-alt.png" alt="" title=""></span> <span>Download Work</span></a></li>
                                                                    <li class="top-list"><a href=""> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/revision-icon.png" alt="" title=""></span> <span>Request Revision</span> </a></li>
                                                                  </ul>
                                                        </div>
                                                    </div>
                                                            <!--<div class="col-md-3">
                                                              <div class="search-bar">
                                                                <form name="" action="" method="post">
                                                                  <input type="text" class="search-type" name="search" placeholder="Search">
                                                                </form>
                                                              </div>
                                                            </div>-->
                                                            <div class="row">
                                                                <div class="col-md-12 table-responsive">
                                                            <table class="table-striped table-hover table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr#</th>
                                                                        <th>Order TW</th>
                                                                        <th>Title</th>
                                                                        <th>Subject</th>
                                                                        <th>Date</th>
                                                                        <th>Detail</th>
                                                                    </tr>
                                                                </thead>
                                                                 <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>2</td>
                                                                        <td>3</td>
                                                                        <td>4</td>
                                                                        <td>5</td>
                                                                        <td>6</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>dfds</td>
                                                                        <td>df</td>
                                                                        <td>dsd</td>
                                                                        <td>dfsd</td>
                                                                        <td>ddsds</td>
                                                                    </tr>
                                                                 </tbody>
                                                            </table>
                                                             </div>
                                                        </div>
                                                </div>
                                            </div>
					</div>
				</div>
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
@include('frontend.layouts.footer')
    
    
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
$(document).ready(function(){
    
});
</script> 