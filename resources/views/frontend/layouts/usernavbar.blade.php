<style>
.main-nav__list li a {
    font-size: 15px;
 }
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
    width: 100%;
}
.imgspan {
    width: 27px !important;
    vertical-align: -webkit-baseline-middle;
    margin: 0px 4px 9px 0px;
}
.table>tbody>tr>td, .table>thead>tr>th {
    text-align: left;
    border: 1px solid #ddd;
}
.table-responsive{
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
.dataTables_length{
    float: left;
}
.abcdmsg{
    font-size: 18px;
    line-height: 16px;
    color: #0c0c0c;
    display: inline-block;
    vertical-align: middle;
    padding-right: 15px;
    padding-left: 16px;
    margin-left: 36px;
    position: relative;
    font-weight: 300;
}
.abcdlogout{
    font-size: 16px;
    line-height: 16px;
    color: #f9f9f9;  
    position: relative;
    display: inline-block;
    font-weight: 300;
    background-color: #1ba8dc;
    border-radius: 5px;
    padding: 5px 15px 5px 15px;
    text-decoration: none;
}
.card-box {
    padding: 20px;
    border: 1px solid rgba(54, 64, 74, 0.05);
    border-radius: 5px;
    margin-bottom: 20px;
    background-clip: padding-box;
    background-color: #f8f8f8;
}
.paragraph{
    color: black;
    line-height: 1.42851;
    font-size: 14px;
    font-family: 'MyriadPro-Regular' !important;
}
</style>
<header class="wrapp-header">
			<div class="info-box-01">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4 text-sm-center">
							<ul class="social-list-01">
								<li>
									<a href="javascript:;">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<i class="fa fa-instagram" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<i class="fa fa-google-plus" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8 text-sm-center text-right">
							<div class="contact-block-01">
                                                                <p class="abcdmsg">Welcome {{Session::get('name')}}</p>
                                                                <a class="abcdlogout" href="{{url('/logout')}}">Logout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-nav">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<a href="{{url('/')}}" class="logo">
								<img src="{{asset('/')}}/img/logo_dark.png" alt="">
							</a>
                                                    
							<div class="col-md-12">
                                                    <div class="top-list">
                                                      <div class="main-nav__btn">
                                                            <div class="icon-left"></div>
                                                            <div class="icon-right"></div>
                                                      </div>
                                                        <ul class="main-nav__list">
                                                                    <li class="top-list top-list-active"><a  href="{{url('/order')}}"><span>Place New Order</span> </a></li>
                                                                    <li class="{{ $active_tab === "profile" ? "top-list-active" : "top-list" }}" ><a href="{{route('profile')}}"> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/profile-icon.png" alt="" title="">Manage Profile</span> </a></li>
                                                                    <li class="{{ $active_tab === "order_history" ? "top-list-active" : "top-list" }}"><a href="{{route('order-history')}}"> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/edit.png" alt="" title="">Order History</span> </a></li>
                                                                    <li class="{{ $active_tab === "order_inprogress" ? "top-list-active" : "top-list" }}"><a href="{{route('order-inprogress')}}"> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/progress-icon.png" alt="" title="">Order Progress</span> </a></li>
                                                                    <li class="{{ $active_tab === "order_download" ? "top-list-active" : "top-list" }}"><a href="{{route('download-work')}}"> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/download-alt.png" alt="" title="">Download Work</span></a></li>
                                                                    <li class="{{ $active_tab === "order_revision" ? "top-list-active" : "top-list" }}"><a href="{{route('order-revision')}}"> <span class="list-img"><img class="imgspan" src="{{asset('/img/usericon')}}/revision-icon.png" alt="" title="">Request Revision</span> </a></li>
                                                        </ul>
                                                        </div>
                                                        </div>
						</div>
					</div>
				</div>
			</div>
</header>

