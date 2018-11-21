@include('frontend.layouts.header')
@include('frontend.layouts.usernavbar')
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
</style>
<main class="content-row">
    <div class="page-title-wrapp">
        <div class="container">
                <div class="row">
                    <div class="col-md-12 card-box" style="background-color:white">
                        
                        <p class="paragraph">
                            If you need changes, edits, or additions to your downloaded project, please mark revisions here immediately. Your project writer may have a backlog of other work, but if you remain within your deadline period, those tasks will be set aside to provide you with reasonable revisions on a "first come' basis. Changes to original guidelines, however, are not considered revisions. You must provide specific and detailed notes, comments, and instructions when requesting any changes.  Extensive changes beyond your original guidelines or project description may incur delivery delays and reasonable additional charges. Your complete satisfaction is our objective, and you are the sole judge of the writing we provide.</p>
                        <p class="paragraph">Please be sure to give us an accurate Order ID and to include detailed notes below.</p> 
                
                    </div>
                    <div class="col-md-12">
                        
                                                <div class="row">
                                                    <ul class="nav nav-tabs">
                                    
                                                    <li class="nav-item">
                                                        <a style="background-color: #1ba8dc;" href="#home" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                            New Request For Revision 
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a style="background-color: #1ba8dc;" href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                            Revision History
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a style="background-color: #1ba8dc;" href="#inprogress" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                            Inprogress Revision
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a style="background-color: #1ba8dc;" href="#completed" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                            Completed Revision
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                                    <div class="tab-content card-box">
                                    
                                                        <div class="tab-pane active" id="home">
                                                            <div class="row">
                                                                <div class="col-md-12 table-responsive">
                                                                    @if(count($orders)>0)
                                                                    <form method="post" enctype="multipart/form-data" action="{{url('/order_revision/save')}}">
                                                                        {{ csrf_field() }}
                                                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                                                <div class="col-sm-2 pull-left"><label> Order TW ID: <span class="red_star">*</span></label></div>
                                                                                <select name="order" id="citation" class="col-sm-8 reply-form__name required" onchange="changeCitation();">
                                                                                        <option value="">Select order by Tw ID</option>
                                                                                        @foreach($orders as $r)
                                                                                        <option value="{{$r->order_id}}">{{$r->order_spid}}</option>
                                                                                        @endforeach
                                                                                </select>
                                                                            </div>
                                                                            
                                                                            <div class="col-sm-12 reply-form__box-01 name">
                                                                                <div class="col-sm-2 pull-left"><label> Description</label></div>

                                                                                <textarea style="margin: 0px; height: 163px;" class="col-sm-8 reply-form__name" type="text" name="description" id="description"   placeholder="Describe your task in detail or attach original file with teacher's instructions." required="true"></textarea>

                                                                            </div>

                                                                            <div class="col-sm-12 col-md-12 col-lg-12 reply-form__box-01 name">
                                                                                <div class="col-sm-2 col-md-2 col-lg-2 pull-left" style="margin-bottom: 6px"><label> Attchment <span class="red_star">*</span></label></div>

                                                                                <input  data-buttonText="Select a File" class="col-sm-8 reply-form__name fileUpload small" type="file" name="reports[]" id="file" multiple="true" required>

                                                                            </div>
                                                                            <div class="col-sm-10 wizard-footer">
                                                                                <div class="pull-left" style="margin-left: 30%">
                                                                                    <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Submit' style="width: 120px;"/>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                            </div>
                                                                    </form>
                                                                    @else
                                                                    <h3 style="float:left">Currently their is no work avaible for revision</h3>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="messages">
                                                            <div class="row">
                                                                <div class="col-md-12 table-responsive">
                                                                    @if(count($revision_order) > 0)
                                                                         <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Sr#</th>
                                                                                    <th>Order TW</th>
                                                                                    <th>Title</th>
                                                                                    <th>Subject</th>
                                                                                    <th>Document Type</th>
                                                                                    <th>Academic Level</th>
                                                                                    <th>Status</th> 
                                                                                    <th>Revision Date</th>
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
                                                                                 @foreach($revision_order as $key=>$r)
                                                                                <tr>
                                                                                    <td>{{$key+1}}</td>
                                                                                    <td>{{$r->order_spid}}</td>
                                                                                    <td>{{$r->title}}</td>
                                                                                    <td>{{$r->subject}}</td>
                                                                                    <td>{{$r->document_type}}</td>
                                                                                    <td>{{$r->academic_level}}</td>
                                                                                    <td>
                                                                                        <?php if($r->rv_completed == 0){?>
                                                                                            <a href="#" class="btn btn-warning" style=" margin-left: 16px;">{{'Pending'}}</a>
                                                                                        <?php }else if($r->rv_completed == 1){?>
                                                                                            <a href="#" class="btn btn-success" style=" margin-left: 16px;">{{'Completed'}}</a>
                                                                                        <?php }else if($r->rv_completed == 2){?>
                                                                                            <a href="#" class="btn btn-info" style=" margin-left: 16px;">{{'InProgress'}}</a>
                                                                                        <?php }else if($r->rv_completed == 3){?>
                                                                                            <a href="#" class="btn btn-danger" style=" margin-left: 16px;">{{'Cancelled'}}</a>
                                                                                        <?php }?>
                                                                                    </td>
                                                                                    <td>{{date('d/m/Y',$r->rv_date)}}</td>
                                                                                    <td><div class="btn-group pull-right m-t-15">
                                                                                            
                                                                                            <a type="button" class="btn btn-primary waves-effect waves-light" href="{{url('/user_portal/revision_detail')}}/{{$string}}/{{$active_tab}}/{{$r->key}}"  aria-expanded="false">Detail</a>
                                                                                        
                                                                                    </div></td>
                                                                                </tr>
                                                                                
                                                                                @endforeach

                                                                             </tbody>
                                                                        </table>
                                                                    @else
                                                                    @if($active_tab == 'order_history')
                                                                       <h3 style="float:left">Currently their is no order history.</h3>
                                                                    @endif
                                                                    @if($active_tab == 'order_inprogress')
                                                                       <h3 style="float:left">Currently your no order is inprogress.</h3>
                                                                    @endif
                                                                    @if($active_tab == 'order_download')
                                                                       <h3 style="float:left">Currently their is no downlaodable file avaible.</h3>
                                                                    @endif

                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                            
                                    
                                                        <div class="tab-pane" id="inprogress">
                                                            <div class="row">
                                                                <div class="col-md-12 table-responsive">
                                                                    @if(count($revision_inprogress) > 0)
                                                                         <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Sr#</th>
                                                                                    <th>Order TW</th>
                                                                                    <th>Title</th>
                                                                                    <th>Subject</th>
                                                                                    <th>Document Type</th>
                                                                                    <th>Academic Level</th>
                                                                                    <th>Status</th>
                                                                                    <th>Revision Date</th>
                                                                                    
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                             <tbody>
                                                                                
                                                                                 @foreach($revision_inprogress as $key=>$r)
                                                                                <tr>
                                                                                    <td>{{$key+1}}</td>
                                                                                    <td>{{$r->order_spid}}</td>
                                                                                    <td>{{$r->title}}</td>
                                                                                    <td>{{$r->subject}}</td>
                                                                                    <td>{{$r->document_type}}</td>
                                                                                    <td>{{$r->academic_level}}</td>
                                                                                    <td>
                                                                                        <?php if($r->rv_completed == 0){?>
                                                                                            <a href="#" class="btn btn-warning" style=" margin-left: 16px;">{{'Pending'}}</a>
                                                                                        <?php }else if($r->rv_completed == 1){?>
                                                                                            <a href="#" class="btn btn-success" style=" margin-left: 16px;">{{'Completed'}}</a>
                                                                                        <?php }else if($r->rv_completed == 2){?>
                                                                                            <a href="#" class="btn btn-info" style=" margin-left: 16px;">{{'InProgress'}}</a>
                                                                                        <?php }else if($r->rv_completed == 3){?>
                                                                                            <a href="#" class="btn btn-danger" style=" margin-left: 16px;">{{'Cancelled'}}</a>
                                                                                        <?php }?>
                                                                                    </td>
                                                                                    <td>{{date('d/m/Y',$r->rv_date)}}</td>
                                                                                    
                                                                                    <td><div class="btn-group pull-right m-t-15">
                                                                                            
                                                                                            <a type="button" class="btn btn-primary waves-effect waves-light" href="{{url('/user_portal/revision_detail')}}/{{$string}}/{{$active_tab}}/{{$r->key}}"  aria-expanded="false">Detail</a>
                                                                                        
                                                                                    </div></td>
                                                                                </tr>
                                                                                
                                                                                @endforeach

                                                                             </tbody>
                                                                        </table>
                                                                    @else
                                                                    @if($active_tab == 'order_history')
                                                                       <h3 style="float:left">Currently their is no order history.</h3>
                                                                    @endif
                                                                    @if($active_tab == 'order_inprogress')
                                                                       <h3 style="float:left">Currently your no order is inprogress.</h3>
                                                                    @endif
                                                                    @if($active_tab == 'order_download')
                                                                       <h3 style="float:left">Currently their is no downlaodable file avaible.</h3>
                                                                    @endif

                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="completed">
                                                            <div class="row">
                                                                <div class="col-md-12 table-responsive">
                                                                    @if(count($revision_completed) > 0)
                                                                         <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Sr#</th>
                                                                                    <th>Order TW</th>
                                                                                    <th>Title</th>
                                                                                    <th>Subject</th>
                                                                                    <th>Document Type</th>
                                                                                    <th>Academic Level</th>
                                                                                    <th>Status</th>
                                                                                    <th>Revision Date</th>
                                                                                    
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                             <tbody>
                                                                                
                                                                                 @foreach($revision_completed as $key=>$r)
                                                                                <tr>
                                                                                    <td>{{$key+1}}</td>
                                                                                    <td>{{$r->order_spid}}</td>
                                                                                    <td>{{$r->title}}</td>
                                                                                    <td>{{$r->subject}}</td>
                                                                                    <td>{{$r->document_type}}</td>
                                                                                    <td>{{$r->academic_level}}</td>
                                                                                    <td>
                                                                                        <?php if($r->rv_completed == 0){?>
                                                                                            <a href="#" class="btn btn-warning" style=" margin-left: 16px;">{{'Pending'}}</a>
                                                                                        <?php }else if($r->rv_completed == 1){?>
                                                                                            <a href="#" class="btn btn-success" style=" margin-left: 16px;">{{'Completed'}}</a>
                                                                                        <?php }else if($r->rv_completed == 2){?>
                                                                                            <a href="#" class="btn btn-info" style=" margin-left: 16px;">{{'InProgress'}}</a>
                                                                                        <?php }else if($r->rv_completed == 3){?>
                                                                                            <a href="#" class="btn btn-danger" style=" margin-left: 16px;">{{'Cancelled'}}</a>
                                                                                        <?php }?>
                                                                                    </td>
                                                                                    <td>{{date('d/m/Y',$r->rv_date)}}</td>
                                                                                    
                                                                                    <td><div class="btn-group pull-right m-t-15">
                                                                                            
                                                                                            <a type="button" class="btn btn-primary waves-effect waves-light" href="{{url('/user_portal/revision_detail')}}/{{$string}}/{{$active_tab}}/{{$r->key}}"  aria-expanded="false">Detail</a>
                                                                                        
                                                                                    </div></td>
                                                                                </tr>
                                                                                
                                                                                @endforeach

                                                                             </tbody>
                                                                        </table>
                                                                    @else
                                                                    @if($active_tab == 'order_history')
                                                                       <h3 style="float:left">Currently their is no order history.</h3>
                                                                    @endif
                                                                    @if($active_tab == 'order_inprogress')
                                                                       <h3 style="float:left">Currently your no order is inprogress.</h3>
                                                                    @endif
                                                                    @if($active_tab == 'order_download')
                                                                       <h3 style="float:left">Currently their is no downlaodable file avaible.</h3>
                                                                    @endif

                                                                    @endif
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
        <div class="modal-header" style="background-color:#337ab7; color: white; border-radius: 6px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request Submmitted</h4>
      </div>
      <div class="modal-body">
          <p><b>Your query has been successfully submitted.</br>We will contact you soon.</b> </br><span class="pull-right"><strong>Thankyou</strong></span></p></b>
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
<script src="{{asset('/')}}/js/navtabs.js"></script>
    
<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('/')}}/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    if('{{Session::get("success")}}' == 'success' && '{{$active_tab}}' === "order_revision"){
        
        $('#myModal').modal('show');
    }
});
</script> 