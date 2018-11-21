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
                                <div class="btn-group pull-right m-t-15">
                                    @if($orders->is_completed != 1 )
                                    @if($orders->is_completed == 0)
                                    <a style="margin: 2px" type="button" id="startworking" class="btn btn-success  waves-effect waves-light"  aria-expanded="false">Start Working</a>
                                    @endif
                                    @if($orders->is_completed != 3)
                                    @if($orders->is_completed == 2)
                                    <a style="margin: 2px" type="button" id="uploadwork" class="btn btn-defualt  waves-effect waves-light"  aria-expanded="false">Upload Work</a>                                    
                                    <?php if(isset($upload_work)){?> 
                                        @if(count($upload_work) > 0)
                                    <a style="margin: 2px" type="button" id="donework" class="btn btn-success  waves-effect waves-light"  aria-expanded="false">Done Project</a>                                    
                                        @endif
                                    <?php }?>
                                    @endif
                                    <a style="margin: 2px" type="button" id="cancelwork" class="btn btn-danger  waves-effect waves-light"  aria-expanded="false">Cancel Work</a>
                                    @else
                                    <label style="background-color: #f05050; color: white; border-radius: 5px; height: 45px; padding: 7px; font-size: 21px;" >Project has been cancalled</label>
                                    @endif
                                    @else
                                    <label style="background-color: #549e92; color: white; border-radius: 5px; height: 45px; padding: 7px; font-size: 21px;">Work has been completed sucessfully</label>
                                    @endif
                                    @if($orders->is_payment == 0)
                                    <a style="margin: 2px" type="button"  class="btn btn-info  waves-effect waves-light"  aria-expanded="false">Payment Pending</a>
                                    @else
                                    <a style="margin: 2px" type="button"  class="btn btn-success  waves-effect waves-light"  aria-expanded="false">Paymennt Done</a>
                                    @endif
                                </div>
                                
                                <h4 class="page-title">TW ID: {{$orders->order_spid}}</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Orders</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('/admin/orders')}}/{{$type}}">{{$type}}</a></li>
                                    <li class="breadcrumb-item"><a href="#">Detail</a></li>
                                    <li class="breadcrumb-item"><a href="#">{{$orders->subject}}</a></li>
                                </ol>

                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#client" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                            Client Information
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Project Information
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            User Attachment
                                        </a>
                                    </li>
                                    <?php if(isset($upload_work)){?> 
                                        @if(count($upload_work) > 0)
                                    <li class="nav-item">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Admin Uploads
                                        </a>
                                    </li>
                                        @endif
                                    <?php }?>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="client">
                                        <div class="row">
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-4 col-form-label">Name<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->name}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hori-pass1" class="col-4 col-form-label">Email<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->email}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hori-pass2" class="col-4 col-form-label">Phone
                                                <span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                 {{$orders->phone}}
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="home">
                                        <div class="row">
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Price<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->price}} <span>$</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Subject<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->subject}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Title<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->title}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Document Type<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->document_type}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Academic Level<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->academic_level}}
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">DeadLine<span class="text-danger">:</span></label>
                                            <div class="col-7" id="getting-started" style="background-color: #5fbeaa; color: white; text-align: center; padding: 5px; font-size: large; border-radius: 5px">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Order Date<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{date('d/m/Y',$orders->created_at)}}
                                            </div>
                                        </div>                                        
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Citation<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->citation}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Words /Pages <span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->no_words}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Number Of Sourcs<span class="text-danger">:</span></label>
                                            <div class="col-7 form-control">
                                                {{$orders->sources}}
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    </div>
                                        </hr>
                                    <div class="form-group row">
                                            <label for="webSite" class="col-2 col-form-label">Description<span class="text-danger">:</span></label>
                                           
                                            <div class="col-8 form-control">
                                                {{$orders->description}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <div class="form-group row">
                                            <label for="webSite" class="col-4 col-form-label">Documents<span class="text-danger">:</span></label>
                                            
                                        </div>
                                        <div class="card-box table-responsive">
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
                                                    <td><a href="{{url('/')}}/admin/document/download/{{$r->attachment}}" class="btn btn-inverse"><i class="icon-download-alt"> </i> Download Report </a>
                                                                                   </td>
                                                    <td><a  href="{{url('/')}}/admin/document/view/{{$r->attachment}}" target="_blank" class="btn btn-info"><i class="icon-download-alt"> </i> View Report </a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                 </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <?php if(isset($upload_work)){?> 
                                        @if(count($upload_work) > 0)
                                    <div class="tab-pane" id="settings">
                                        
                                        <div class="card-box table-responsive">
                                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Filname</th>
                                                    <th>View</th>
                                                    <th>Download</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>

                                                 <tbody>

                                                     @if(count($upload_work)>0)
                                                     @foreach($upload_work as $key=>$work) 
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$work->orginal_name}}</td>
                                                    <td><a href="{{url('/')}}/admin/document/download/{{$work->attachment}}" class="btn btn-inverse"><i class="icon-download-alt"> </i> Download Report </a>
                                                                                   </td>
                                                    <td><a  href="{{url('/')}}/admin/document/view/{{$work->attachment}}" target="_blank" class="btn btn-info"><i class="icon-download-alt"> </i> View Report </a></td>
                                                    <td><a class="btn btn-danger" href="{{url('admin/upload/document/delete').'/'.$work->up_document_id}}">Delete</a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                 </tbody>
                                            </table>

                                        </div>
                                    </div>
                                        @endif
                                    <?php }?>
                                </div>
                            </div>

                            
                            
                        </div>
                        
                       
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                                    <!-- sample modal content -->
                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #81c868 !important;padding: 9px">
                                                    <h4 class="modal-title mt-0" id="myModalLabel">Project Status Confirmation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Are you sure to start working on this project?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{url('/admin/orders/status/inprogress')}}/{{'startworking'}}/{{$orders->order_id}}" type="button" class="btn btn-primary waves-effect waves-light">Yes</a>
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Back</button>
                                                
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <!-- sample modal content -->
                                    <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #f05050 !important;padding: 9px;">
                                                    <h4 class="modal-title mt-0" id="myModalLabel">Project Status Confirmation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Are you sure to cancel this project?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{url('/admin/orders/status/cancelled')}}/{{'cancelled'}}/{{$orders->order_id}}" type="button" class="btn btn-primary waves-effect waves-light">Yes</a>
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Back</button>
                                                
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <!-- sample modal content -->
                                    <div id="donemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #00000 !important;padding: 9px;">
                                                    <h4 class="modal-title mt-0" id="myModalLabel">Project Status Confirmation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Are you sure you have completed this project?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{url('/admin/orders/status/done')}}/{{'done'}}/{{$orders->order_id}}" type="button" class="btn btn-primary waves-effect waves-light">Yes</a>
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Back</button>
                                                
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    <!-- sample modal content -->
                                    <div id="uploadmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #68c8bf !important; padding: 9px;">
                                                    <h4 class="modal-title mt-0" id="myModalLabel">Upload work</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form method="post" action="{{url('/admin/orders/status/uploadwork')}}/{{$orders->order_id}}" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="user_id" value="{{$orders->user_id}}">
                                                    <input type="hidden" name="order_spid" value="{{$orders->order_spid}}">
                                                    <div class="form-group">
                                                        <label class="control-label">Upload Work</label>
                                                        <input type="file" class="filestyle" name="reports[]" data-iconname="fa fa-cloud-upload" multiple="true" required="true">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button  type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                                                
                                                </div>
                                            </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
<!--                <footer class="footer text-right">
                    &copy; 2018 - 2019. All rights reserved.
                </footer>-->

            </div>
@include('admin.includes.layouts.footer')
<script type="text/javascript">
  $("#getting-started").countdown("{{$orders->date}}"+" "+"{{$orders->time}}", function(event) {
    $(this).text(
      event.strftime('%W weeks %-d days %-H h %M min %S sec')
    );
  });
  $('#cancelwork').on('click',function(){
      $('#myModal2').modal('show');
  });
   $('#startworking').on('click',function(){
      $('#myModal').modal('show');
  });
  $('#uploadwork').on('click',function(){
      $('#uploadmodal').modal('show');
  });
  $('#donework').on('click',function(){
      $('#donemodal').modal('show');
  });
</script>