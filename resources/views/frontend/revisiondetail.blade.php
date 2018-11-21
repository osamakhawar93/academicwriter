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
label{
    float:left;
}
</style>
<main class="content-row">
    <div class="page-title-wrapp">
        <div class="container">
                <div class="row">

                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    
                                    <li class="nav-item">
                                        <a style="background-color: #1ba8dc;" href="#home" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                            Project Information
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="background-color: #1ba8dc;" href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Your Attachment
                                        </a>
                                    </li>
                                    <?php if(isset($user_revision_doc)){?> 
                                        @if(count($user_revision_doc) > 0)
                                    <li class="nav-item">
                                        <a style="background-color: #1ba8dc;" href="#userrevisions" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            User Revision Files
                                        </a>
                                    </li>
                                        @endif
                                    <?php }?>
                                    <?php if(isset($upload_work)){?> 
                                        @if(count($upload_work) > 0)
                                    <li class="nav-item">
                                        <a style="background-color: #1ba8dc;" href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Pervious Downloads
                                        </a>
                                    </li>
                                        @endif
                                    <?php }?>
                                        
                                        @if($revision->is_completed == 1)
                                    <?php if(isset($revision_work)){?> 
                                        @if(count($revision_work) > 0)
                                        @if($revision->is_completed == 1)
                                    <li class="nav-item">
                                        <a style="background-color: #1ba8dc;" href="#downloadsrv" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Revisions Downloads
                                        </a>
                                    </li>
                                        @endif
                                        @endif
                                    <?php }?> 
                                        @endif
                                </ul>
                                <div class="card-box tab-content">
                                    
                                    <div class="tab-pane  active" id="home">
                                        <div class="row" style="margin-top: 25px">
                                    <div class="col-sm-6">
                                        
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                            <div class="col-sm-6 pull-left"><label>Order-ID :</label></div>
                                              <a href="#" class="btn btn-defualt" style="width: 30%; color:white; background-color: #000;">{{$orders->order_spid}}</a>

                                        </div>
                                        <div class="col-sm-12 reply-form__box-01 your-email">
                                                <div class="col-sm-4 pull-left"><label>Dead Line<span class="red_star">*</span></label></div>
                                                <div style="background-color: #1ba8dc; float:left; padding: 13px; color: #ffff;" class="col-sm-8 reply-form__email" id="deadline" value="" readonly="true"></div>
                                                     
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
                                        
                                    </div>
                                    </div>
                                        </hr>
                                    
                                            <div class="col-sm-12 reply-form__box-01 name ">
                                                    <div class="col-sm-2"><label> Description</label></div>
                                            
                                                    <textarea readonly="true" style="margin: 0px; height: 163px;" class="col-sm-8 reply-form__name" type="text" name="description" id="description"   >
                                                        {{$orders->description}}
                                                    </textarea>
                                                   
                                                </div>
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <div class="form-group row">
                                            <label for="webSite" class="col-sm-2 ">Documents<span class="text-danger">:</span></label>
                                            
                                        </div>
                                        <div class="table-responsive">
                                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Filname</th>
                                                    <th>Download</th>         
                                                    <th>View</th>

                                                </tr>
                                                </thead>

                                                 <tbody>

                                                     @if(count($document)>0)
                                                     @foreach($document as $j=>$r) 
                                                <tr>
                                                    <td>{{$j+1}}</td>
                                                    <td>{{$r->orginal_name}}</td>
                                                    <td><a href="{{url('/')}}/user_portal/document/download/{{$r->attachment}}" class="btn btn-success"><i class="icon-download-alt"> </i> Download Report </a>
                                                                                   </td>
                                                    <td><a  href="{{url('/')}}/user_portal/document/view/{{$r->attachment}}" target="_blank" class="btn btn-info"><i class="icon-download-alt"> </i> View Report </a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                 </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <?php if(isset($user_revision_doc)){?> 
                                        @if(count($user_revision_doc) > 0)
                                    <div class="tab-pane" id="userrevisions">
                                        
                                        <div class="col-sm-12 reply-form__box-01 name" style="margin-top: 25px">
                                                    <div class="col-sm-2"><label> Description</label></div>
                                            
                                                    <textarea readonly="true" style="margin: 0px; height: 80px;" class="col-sm-8 reply-form__name" type="text" name="description" id="description"   >
                                                        {{$revision->description}}
                                                    </textarea>
                                                   
                                                </div>
                                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Filname</th>        
                                                    <th>Download</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>

                                                 <tbody>

                                                     @if(count($user_revision_doc)>0)
                                                     @foreach($user_revision_doc as $key=>$work) 
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$work->orginal_name}}</td>
                                                    <td><a href="{{url('/')}}/user_portal/document/download/{{$work->attachment}}" class="btn btn-success"><i class="icon-download-alt"> </i> Download Report </a>
                                                                                   </td>
                                                    <td><a  href="{{url('/')}}/user_portal/document/view/{{$work->attachment}}" target="_blank" class="btn btn-info"><i class="icon-download-alt"> </i> View Report </a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                 </tbody>
                                            </table>

                                        </div>
                                    
                                        @endif
                                    <?php }?> 
                                        
                                    <?php if(isset($upload_work)){?> 
                                        @if(count($upload_work) > 0)
                                    <div class="tab-pane" id="settings">
                                        
                                        <div class="table-responsive">
                                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Filname</th>
                                                    <th>Download</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>

                                                 <tbody>

                                                     @if(count($upload_work)>0)
                                                     @foreach($upload_work as $key=>$work) 
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$work->orginal_name}}</td>
                                                    <td><a href="{{url('/')}}/user_portal/document/download/{{$work->attachment}}" class="btn btn-success"><i class="icon-download-alt"> </i> Download Report </a>
                                                                                   </td>
                                                    <td><a  href="{{url('/')}}/user_portal/document/view/{{$work->attachment}}" target="_blank" class="btn btn-info"><i class="icon-download-alt"> </i> View Report </a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                 </tbody>
                                            </table>

                                        </div>
                                    </div>
                                        @endif
                                    <?php }?>
                                       
                                        @if($revision->is_completed == 1)
                                    <?php if(isset($revision_work)){?>
                                        @if(count($revision_work) > 0)                 
                                        @if($revision->is_completed == 1)

                                    <div class="tab-pane" id="downloadsrv">
                                        
                                        
                                            <div class="col-sm-12 reply-form__box-01 name" style="margin-top: 25px">
                                                    <div class="col-sm-2"><label> Description</label></div>
                                            
                                                    <textarea readonly="true" style="margin: 0px; height: 80px;" class="col-sm-8 reply-form__name" type="text" name="description" id="description"   >
                                                        {{$revision->description}}
                                                    </textarea>
                                                   
                                                </div>
                                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Filname</th>
                                                    <th>View</th>
                                                    <th>Download</th>
                                                </tr>
                                                </thead>

                                                 <tbody>

                                                     @if(count($revision_work)>0)
                                                     @foreach($revision_work as $key=>$work) 
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$work->orginal_name}}</td>
                                                    <td><a href="{{url('/')}}/user_portal/document/download/{{$work->attachment}}" class="btn btn-success"><i class="icon-download-alt"> </i> Download Report </a>
                                                                                   </td>
                                                    <td><a  href="{{url('/')}}/user_portal/document/view/{{$work->attachment}}" target="_blank" class="btn btn-info"><i class="icon-download-alt"> </i> View Report </a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                 </tbody>
                                            </table>

                                        </div>
                                    
                                        @endif
                                        @endif
                                    <?php }?>      
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
@include('frontend.layouts.footer')
    
    
<script src="{{asset('/')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}/js/jquery.bootstrap.js" type="text/javascript"></script>
<script  src="{{asset('/')}}/js/jquery.maskedinput.min.js"></script>
<script>
	jQuery(function($){
	   $("#phone").mask("+99-9999999999");
	});
            $("#deadline").countdown("{{$orders->date}}"+" "+"{{$orders->time}}", function(event) {
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