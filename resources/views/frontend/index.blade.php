<!DOCTYPE html>
<html lang="en">

<head>

	<title>YourAcademicWriter | CUSTOM ACADEMIC WRITING SERVICE</title>
	<meta charset="UTF-8">
	<meta name="keywords" content=" professional writing, academic writing, general writing">
	<meta name="description" content="YourAcademicWriter is the best place where you can find academic writers For essay Writing, we offer the best essay writing services in lowest rates">
	<link rel="canonical" href="http://www.YourAcademicWriter.com/" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset('/')}}favicon.png" type="image/x-icon" />
	<link rel="apple-touch-icon" href="{{asset('/')}}favicon.png" />

	<!-- Bootstrap v3.3.7 -->
        <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css">
        

	<!-- Font Awesome 4.7.0 -->
	<link rel="stylesheet" href="{{asset('/')}}css/font-awesome.min.css">

	<!-- Owl carousel -->
	<link rel="stylesheet" href="{{asset('/')}}css/owl.carousel.min.css">

	<!-- Main style -->
	<link rel="stylesheet" href="{{asset('/')}}css/style.css">
	
	<!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}js/switchery.min.css">
	<!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}js/datedropper.min.css" />
</head>

<style>
    .modal-dialogs {
    max-width: 350px !important;
    width: 100% !important;
    }
    
</style>
<body class="home-01">

	<!--[if lt IE 9]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
		<![endif]-->
		
	<div class="wrapp-content">
	
		<!-- Header -->
		<header class="wrapp-header">
			<div class="info-box-01">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4 text-sm-center">
							<ul class="social-list-01">
                                                            @if(Session::get('user') != 'user')
								<li><a href="#" style="color:#fff;" id="myBtn">Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
                                                                <li><a href="#" style="color:#fff;" id="myBtn1" >Register</a></li>
                                                             @else
                                                             <li><a href="#" style="color:#fff;" >Welcome {{Session::get('name')}} &nbsp;&nbsp;&nbsp;| </a></li>
                                                             <li><a href="{{url('user_portal/dashboard')}}" style="color:#fff;" >Dashboard</a></li>
                                                             @endif
							</ul>
						</div>
						<!-- The Modal -->
                                                
						<div id="myModal" class="modal">
							<div class="modal-dialog modal-dialogs">
								<div class="loginmodal-container">
                                                                    <button type="button" class="close closelogin" data-dismiss="modal">&times;</button>
									<h1>Login to Your Account</h1><br>
								  <form method="post" action="#" >
                                                                        {{ csrf_field() }}
                                                                        <span style="height: 44px; margin-bottom: 5px; color: red; display: none" class="form-control error" id="errorm"></span>
                                                                        <input style="height: 44px;" class="form-control" id="emaillogin" type="email" name="email" placeholder="Email" required="">
                                                                        <input style="margin-top: 8px" class="form-control" id="passwordlogin" type="password" name="password" placeholder="Password" required="">
                                                                        <input type="submit" name="login" id="loginform" class="login loginmodal-submit" value="Login">
								  </form>
									
								  <div class="login-help">
                                                                      <a href="#" id='btnreg'>Register</a> 
<!--                                                                      - <a href="#" id="btnforget">Forgot Password</a>-->
								  </div>
								</div>
							</div>
						</div>
                                                
                                                <div id="forgetmodel" class="modal">
							<div class="modal-dialog modal-dialogs">
								<div class="loginmodal-container">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1>Login to Your Account</h1><br>
								  <form method="post" action="{{url('/forgetpassword')}}" >
                                                                        {{ csrf_field() }}
                                                                        <input style="height: 44px;" class="form-control" type="email" name="email" placeholder="Email" required="">
                                                                        <input style="margin-top: 8px;" type="submit" name="submit" class="login loginmodal-submit" value="Submit">
								  </form>
									
								  <div class="login-help">
<!--                                                                      <a href="#" id='btnreg'>Register</a> - <a href="#" id="myBtn">Login</a>
								  -->
                                                                  </div>
								</div>
							</div>
						</div>
                                                <div id="myregistermodel" class="modal" style="padding: 0px !important;">
							<div class="modal-dialog modal-dialogs">
								<div class="loginmodal-container">
                                                                    <button type="button" class="close closereg" onClick="close();" data-dismiss="modal">&times;</button>
									<h1>Register Here</h1><br>
                                                                        <form class="register" method="post" action="#">
                                                                            {{ csrf_field() }}
                                                                            <div style="margin-top: 8px; border-color: red; display:none" class="form-control" type="text" id="regerrormsg"></div>
                                                                            <input style="margin-top: 8px" class="form-control" type="text" name="name" id="namereg" placeholder="Username">
                                                                            <input style="margin-top: 8px; height: 45px"  class="form-control" type="email" name="email" id="emailreg" placeholder="Email">
                                                                            <input style="margin-top: 8px" class="form-control" type="text" name="phone" placeholder="Phone" id="phonereg">
                                                                            <input style="margin-top: 8px" class="form-control" type="password" name="password" id="passwordreg" placeholder="Password">
                                                                            <input style="margin-top: 8px" class="form-control" type="password" name="cpass" id="cpasswordreg" placeholder="Confirm Password">
                                                                            <div style="margin-top: 8px; border-color: red; display:none" class="form-control" type="text" id="cperrormsg"></div>
                                                                            <input  type="checkbox" name="checkbox" id="acceptregpolicy" value="I have read the Privacy Policy and agree to the terms and conditions"><span>I have read the Privacy Policy and agree to the terms and conditions</span>
                                                                            <div style="margin-top: 8px; border-color: red; display:none" class="form-control" type="text" id="acceptregpolicymsg"></div>

                                                                            <input style="float:right; margin-top:27px" type="submit" name="submit" id="registerform" class="btn btn-primary" value="Submit">
                                                                      </form>
									
								  <div class="login-help">
                                                                      <a href="#"  id="myBtn3">Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
								  </div>
								</div>
							</div>
						</div>
                                                <div id="forgetmodel" class="modal">
							<div class="modal-dialog">
								<div class="loginmodal-container">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
									<h1>Login to Your Account</h1><br>
								  <form method="post" action="{{url('/forgetpassword')}}" >
                                                                        {{ csrf_field() }}
                                                                        <input style="height: 44px;" class="form-control" type="email" name="email" placeholder="Email" required="">
                                                                        <input style="margin-top: 8px;" type="submit" name="submit" class="login loginmodal-submit" value="Submit">
								  </form>
									
								  <div class="login-help">
<!--                                                                      <a href="#" id='btnreg'>Register</a> - <a href="#" id="myBtn">Login</a>
								  -->
                                                                  </div>
								</div>
							</div>
						</div>
                                                <div id="errormodal" class="modal">
							<div class="modal-dialog">
                                                            <div class="loginmodal-container" style="max-width: 592px;">
                                                                    <h1>Error Message</h1><br>
                                                                    <hr style="border-top: 2px solid #000;">
                                                                    
                                                                        <div class="errordisplay">
                                                                            
                                                                        </div>
									
								  <div class="login-help">
<!--                                                                      <a href="#" id='btnreg'>Register</a> - <a href="#" id="myBtn">Login</a>
								  -->
                                                                  </div>
								</div>
							</div>
						</div>
                                                <div id="successmodal" class="modal">
							<div class="modal-dialog">
								<div class="loginmodal-container" style="max-width: 592px;">
                                                                    <h1>Success Message</h1><br>
                                                                    <hr style="border-top: 2px solid #000;">
                                                                        <div class="successdisplay">
                                                                            
                                                                        </div>
									
								  <div class="login-help">
<!--                                                                      <a href="#" id='btnreg'>Register</a> - <a href="#" id="myBtn">Login</a>
								  -->
                                                                  </div>
								</div>
							</div>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8 text-sm-center text-right">
							<div class="contact-block-01">
								<a class="contact-block-01__email" href="mailto:info@YourAcademicWriter.com">info@YourAcademicWriter.com</a>
								<p class="contact-block-01__phone">+1 (559) 422 7719</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-nav">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<a href="./" class="logo">
								<img src="{{asset('/')}}/img/logo_white.png" alt="The Midterm Logo">
							</a>
							<div class="main-nav__btn">
								<div class="icon-left"></div>
								<div class="icon-right"></div>
							</div>
							<ul class="main-nav__list">
								<li class="active"><a href="{{route('home')}}">Home</a></li>
								<li><a href="{{route('writers')}}">Writers</a></li>
								<li><a href="{{route('samples')}}">Samples</a></li>
								<li><a href="{{route('pricing')}}">Pricing</a></li>
								<li><a href="{{route('order')}}">Order</a></li>
								<li><a href="{{route('faq')}}">FAQs</a></li>
								<li><a href="{{route('whyus')}}">Why Us</a></li>
								<li><a href="{{route('contact')}}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<form class="search-bg" action="{{route('order')}}" method="get">
								<label class="search-bg__title">CUSTOM ACADEMIC WRITING SERVICE</label>
								<label class="search-bg__title"><span>50% OFF</span> ON ALL ORDERS</label>
								<div class="row">
									<select class="search-bg__text" name="deadline" id="deadline">
										<option value="">Deadline?</option>
										<option value="6">8+ Days</option>
										<option value="5">6-7 Days</option>
										<option value="4">4-5 Days</option>
										<option value="3">3 Days</option>
										<option value="2">2 Days</option>
										<option value="1">24 Hours</option>
										<option value="0">12 Hours</option>
									</select>
                                                                    <?php $service = '2';?>
									<select class="search-bg__text-2" name="service" id="service" >
										<option value="none" <?php if($service == 'none'){echo 'selected';} ?>>What can we do for you?</option>
                                                                                    <option value="Essay" <?php if($service == 'Essay'){echo 'selected';} ?>>Essay</option>
                                                                                    <option value="Research Paper" <?php if($service == 'Research Paper'){echo 'selected';} ?>>Research Paper</option>
                                                                                    <option value="Thesis" <?php if($service == 'Thesis'){echo 'selected';} ?>>Thesis</option>
                                                                                    <option value="Term Paper" <?php if($service == 'Term Paper'){echo 'selected';} ?>>Term Paper</option>
                                                                                    <option value="Dissertation" <?php if($service == 'Dissertation'){echo 'selected';} ?>>Dissertation</option>
                                                                                    <option value="Assignment" <?php if($service == 'Assignment'){echo 'selected';} ?>>Assignment </option>
                                                                                    <option value="Book Reports" <?php if($service == 'Book Reports'){echo 'selected';} ?>>Book Reports </option>
                                                                                    <option value="Book Reviews" <?php if($service == 'Book Reviews'){echo 'selected';} ?>>Book Reviews </option>
                                                                                    <option value="Case Study" <?php if($service == 'Case Study'){echo 'selected';} ?>>Case Study </option>
                                                                                    <option value="College Paper" <?php if($service == 'College Paper'){echo 'selected';} ?>>College Paper </option>
                                                                                    <option value="Coursework" <?php if($service == 'Coursework'){echo 'selected';} ?>>Coursework </option>
                                                                                    <option value="eBooks" <?php if($service == 'eBooks'){echo 'selected';} ?>>eBooks </option>
                                                                                    <option value="Homework" <?php if($service == 'Homework'){echo 'selected';} ?>>Homework </option>
                                                                                    <option value="Lab Report" <?php if($service == 'Lab Report'){echo 'selected';} ?>>Lab Report </option>
                                                                                    <option value="Movie Review" <?php if($service == 'Movie Review'){echo 'selected';} ?>>Movie Review </option>
                                                                                    <option value="News Release" <?php if($service == 'News Release'){echo 'selected';} ?>>News Release </option>
                                                                                    <option value="Research proposal" <?php if($service == 'Research proposal'){echo 'selected';} ?>>Research proposal </option>
                                                                                    <option value="School Paper" <?php if($service == 'School Paper'){echo 'selected';} ?>>School Paper </option>
                                                                                    <option value="Speech" <?php if($service == 'Speech'){echo 'selected';} ?>>Speech </option>
                                                                                    <option value="Admission Essay" <?php if($service == 'Admission Essay'){echo 'selected';} ?>>Admission Essay</option>
                                                                                    <option value="Annotated Bibliography" <?php if($service == 'Annotated Bibliography'){echo 'selected';} ?>>Annotated Bibliography</option>
                                                                                    <option value="Application Letter" <?php if($service == 'Application Letter'){echo 'selected';} ?>>Application Letter</option>
                                                                                    <option value="Argumentative Essay" <?php if($service == 'Argumentative Essay'){echo 'selected';} ?>>Argumentative Essay</option>
                                                                                    <option value="Biography" <?php if($service == 'Biography'){echo 'selected';} ?>>Biography</option>
                                                                                    <option value="Business Plan" <?php if($service == 'Business Plan'){echo 'selected';} ?>>Business Plan</option>
                                                                                    <option value="Cover Letter" <?php if($service == 'Cover Letter'){echo 'selected';} ?>>Cover Letter</option>
                                                                                    <option value="Creative Writing" <?php if($service == 'Creative Writing'){echo 'selected';} ?>>Creative Writing</option>
                                                                                    <option value="Critical Thinking" <?php if($service == 'Critical Thinking'){echo 'selected';} ?>>Critical Thinking</option>
                                                                                    <option value="Literature Review" <?php if($service == 'Literature Review'){echo 'selected';} ?>>Literature Review</option>
                                                                                    <option value="Personal Statement" <?php if($service == 'Personal Statement'){echo 'selected';} ?>>Personal Statement</option>
                                                                                    <option value="Report" <?php if($service == 'Report'){echo 'selected';} ?>>Report</option>
                                                                                    <option value="Scholarship Essay" <?php if($service == 'Scholarship Essay'){echo 'selected';} ?>>Scholarship Essay</option>
                                                                                    <option value="Thesis Proposal" <?php if($service == 'Thesis Proposal'){echo 'selected';} ?>>Thesis Proposal</option>
                                                                                    <option value="Powerpoint Presentation (with speaker notes)" <?php if($service == 'Powerpoint Presentation (with speaker notes)'){echo 'selected';} ?>>Powerpoint Presentation (with speaker notes)</option>
                                                                                    <option value="Powerpoint Presentation (without speaker notes)" <?php if($service == 'Powerpoint Presentation (without speaker notes)'){echo 'selected';} ?>>Powerpoint Presentation (without speaker notes)</option>
                                                                                    <option value="other" <?php if($service == 'other'){echo 'selected';} ?>>Other</option>
                                                                            </select>
								</div>
								<div class="row" style="margin-top:20px;">
									<select class="search-bg__text" name="level" id="level">
										<option value="">You study at?</option>
										<option value="high school">High School</option>
										<option value="college undergraduate">College Undergraduate</option>
										<option value="master">Master</option>
										<option value="doctoral">Doctoral</option>
									</select>
									<select class="search-bg__text-2" name="pages" id="pages">
										
                                                                                <option  value="">Select Pages Per Words</option>
                                                                                <option  value="1">1 Page ~ 300 Words</option>
                                                                                <option  value="2">2 Pages ~ 600 Words</option>
                                                                                <option  value="3">3 Pages ~ 900 Words</option>
                                                                                <option  value="4">4 Pages ~ 1200 Words</option>
                                                                                <option  value="5">5 Pages ~ 1500 Words</option>
                                                                                <option  value="6">6 Pages ~ 1800 Words</option>
                                                                                <option  value="7">7 Pages ~ 2100 Words</option>
                                                                                <option  value="8">8 Pages ~ 2400 Words</option>
                                                                                <option  value="9">9 Pages ~ 2700 Words</option>
                                                                                <option  value="10">10 Pages ~ 3000 Words</option>
                                                                                <option  value="11">11 Pages ~ 3300 Words</option>
                                                                                <option  value="12">12 Pages ~ 3600 Words</option>
                                                                                <option  value="13">13 Pages ~ 3900 Words</option>
                                                                                <option  value="14">14 Pages ~ 4200 Words</option>
                                                                                <option  value="15">15 Pages ~ 4500 Words</option>
                                                                                <option  value="16">16 Pages ~ 4800 Words</option>
                                                                                <option  value="17">17 Pages ~ 5100 Words</option>
                                                                                <option  value="18">18 Pages ~ 5400 Words</option>
                                                                                <option  value="19">19 Pages ~ 5700 Words</option>
                                                                                <option  value="20">20 Pages ~ 6000 Words</option>
                                                                                <option  value="21">21 Pages ~ 6300 Words</option>
                                                                                <option  value="22">22 Pages ~ 6600 Words</option>
                                                                                <option  value="23">23 Pages ~ 6900 Words</option>
                                                                                <option  value="24">24 Pages ~ 7200 Words</option>
                                                                                <option  value="25">25 Pages ~ 7500 Words</option>
                                                                                <option  value="26">26 Pages ~ 7800 Words</option>
                                                                                <option  value="27">27 Pages ~ 8100 Words</option>
                                                                                <option  value="28">28 Pages ~ 8400 Words</option>
                                                                                <option  value="29">29 Pages ~ 8700 Words</option>
                                                                                <option  value="30">30 Pages ~ 9000 Words</option>
                                                                                <option  value="31">31 Pages ~ 9300 Words</option>
                                                                                <option  value="32">32 Pages ~ 9600 Words</option>
                                                                                <option  value="33">33 Pages ~ 9900 Words</option>
                                                                                <option  value="34">34 Pages ~ 10200 Words</option>
                                                                                <option  value="35">35 Pages ~ 10500 Words</option>
                                                                                <option  value="36">36 Pages ~ 10800 Words</option>
                                                                                <option  value="37">37 Pages ~ 11100 Words</option>
                                                                                <option  value="38">38 Pages ~ 11400 Words</option>
                                                                                <option  value="39">39 Pages ~ 11700 Words</option>
                                                                                <option  value="40">40 Pages ~ 12000 Words</option>
                                                                                <option  value="41">41 Pages ~ 12300 Words</option>
                                                                                <option  value="42">42 Pages ~ 12600 Words</option>
                                                                                <option  value="43">43 Pages ~ 12900 Words</option>
                                                                                <option  value="44">44 Pages ~ 13200 Words</option>
                                                                                <option  value="45">45 Pages ~ 13500 Words</option>
                                                                                <option  value="46">46 Pages ~ 13800 Words</option>
                                                                                <option  value="47">47 Pages ~ 14100 Words</option>
                                                                                <option  value="48">48 Pages ~ 14400 Words</option>
                                                                                <option  value="49">49 Pages ~ 14700 Words</option>
                                                                                <option  value="50">50 Pages ~ 15000 Words</option>
                                                                                <option  value="51">51 Pages ~ 15300 Words</option>
                                                                                <option  value="52">52 Pages ~ 15600 Words</option>
                                                                                <option  value="53">53 Pages ~ 15900 Words</option>
                                                                                <option  value="54">54 Pages ~ 16200 Words</option>
                                                                                <option  value="55">55 Pages ~ 16500 Words</option>
                                                                                <option  value="56">56 Pages ~ 16800 Words</option>
                                                                                <option  value="57">57 Pages ~ 17100 Words</option>
                                                                                <option  value="58">58 Pages ~ 17400 Words</option>
                                                                                <option  value="59">59 Pages ~ 17700 Words</option>
                                                                                <option  value="60">60 Pages ~ 18000 Words</option>
                                                                                <option  value="61">61 Pages ~ 18300 Words</option>
                                                                                <option  value="62">62 Pages ~ 18600 Words</option>
                                                                                <option  value="63">63 Pages ~ 18900 Words</option>
                                                                                <option  value="64">64 Pages ~ 19200 Words</option>
                                                                                <option  value="65">65 Pages ~ 19500 Words</option>
                                                                                <option  value="66">66 Pages ~ 19800 Words</option>
                                                                                <option  value="67">67 Pages ~ 20100 Words</option>
                                                                                <option  value="68">68 Pages ~ 20400 Words</option>
                                                                                <option  value="69">69 Pages ~ 20700 Words</option>
                                                                                <option  value="70">70 Pages ~ 21000 Words</option>
                                                                                <option  value="71">71 Pages ~ 21300 Words</option>
                                                                                <option  value="72">72 Pages ~ 21600 Words</option>
                                                                                <option  value="73">73 Pages ~ 21900 Words</option>
                                                                                <option  value="74">74 Pages ~ 22200 Words</option>
                                                                                <option  value="75">75 Pages ~ 22500 Words</option>
                                                                                <option  value="76">76 Pages ~ 22800 Words</option>
                                                                                <option  value="77">77 Pages ~ 23100 Words</option>
                                                                                <option  value="78">78 Pages ~ 23400 Words</option>
                                                                                <option  value="79">79 Pages ~ 23700 Words</option>
                                                                                <option  value="80">80 Pages ~ 24000 Words</option>
                                                                                <option  value="81">81 Pages ~ 24300 Words</option>
                                                                                <option  value="82">82 Pages ~ 24600 Words</option>
                                                                                <option  value="83">83 Pages ~ 24900 Words</option>
                                                                                <option  value="84">84 Pages ~ 25200 Words</option>
                                                                                <option  value="85">85 Pages ~ 25500 Words</option>
                                                                                <option  value="86">86 Pages ~ 25800 Words</option>
                                                                                <option  value="87">87 Pages ~ 26100 Words</option>
                                                                                <option  value="88">88 Pages ~ 26400 Words</option>
                                                                                <option  value="89">89 Pages ~ 26700 Words</option>
                                                                                <option  value="90">90 Pages ~ 27000 Words</option>
                                                                                <option  value="91">91 Pages ~ 27300 Words</option>
                                                                                <option  value="92">92 Pages ~ 27600 Words</option>
                                                                                <option  value="93">93 Pages ~ 27900 Words</option>
                                                                                <option  value="94">94 Pages ~ 28200 Words</option>
                                                                                <option  value="95">95 Pages ~ 28500 Words</option>
                                                                                <option  value="96">96 Pages ~ 28800 Words</option>
                                                                                <option  value="97">97 Pages ~ 29100 Words</option>
                                                                                <option  value="98">98 Pages ~ 29400 Words</option>
                                                                                <option  value="99">99 Pages ~ 29700 Words</option>
                                                                                <option  value="100">100 Pages ~ 30000 Words</option>

                                                       
									</select>
								</div>
								<div class="row" style="margin-top: 20px;">
									<div class="col-lg-12 text-center">
										<p style="color: #fff;font-size: 20px;display:inline;">Total Price:&nbsp;&nbsp;</p>
										<p style="color: #fff;font-size: 20px;display:inline;text-decoration: line-through;text-decoration-color: red;">
											$<span id="tprice">0.00</span>
										</p>
										<p style="color: #fff;font-size: 25px;display:inline;">
											&nbsp;&nbsp; $<span id="dprice">0.00</span>
										</p>
									</div>
								</div>
								<input type="hidden" name="price" id="pprice" />
								<input type="hidden" name="orginal_price" id="ttprice" />
								<button type="submit" class="parallax-btn" style="margin-top:20px;">Order Now</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- Content -->
		<main class="content-row">
			<div class="content-box-02">
				<div class="table-01">
					<div class="table-01__row">
						<div class="table-01__box-01">
							<div class="table-01__content">
								<h3 class="title-01">
									<span>Welcome</span> to YourAcademicWriter</h3>
								<div class="content-box-01__text">
									<p>YourAcademicWriter.com is renowned as the global source for professional writing services. Our native-English speaking team is based in the U.S. We're not an off-shore "paper mill" grinding out questionable research and inferior writing.</p>
								</div>
								<p class="author-info">
									- John S. Hogvaer,
									<span></span>
								</p>
								<div class="author-img">
									<img src="img/author_img.png" alt="The Midterm">
								</div>
							</div>
						</div>
						<div class="table-01__box-02">
							<img class="table-01__img" src="img/img_01.jpg" alt="Essay Writing Services">
						</div>
					</div>
				</div>
			</div>
			<div class="content-box-01 padding-top-100 padding-sm-top-50">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-05">
								<h3 class="servises-item__title">Unlimited Revisions</h3>
								<div class="servises-item__text">
									<p>We provide unlimited  FREE edits and rewrites within your deadline. Just give us your notes for any changes or additions after your finished paper, and we'll rewrite to your complete satisfaction.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-02">
								<h3 class="servises-item__title">Premium Quality</h3>
								<div class="servises-item__text">
									<p>World class native English speaking writers with advanced degrees  at elite U.S. universities. We have expertise in all academic subjects. All writing is custom-content and 100% original.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-01">
								<h3 class="servises-item__title">Deadline Driven</h3>
								<div class="servises-item__text">
									<p>We guarantee delivery by your specified deadline. Nobody beats our quality with 12-24-36- hour turnarounds. Just let us know NOW so we can provide out best-of-class quality!</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-03">
								<h3 class="servises-item__title">Private & Confidential</h3>
								<div class="servises-item__text">
									<p>You are the author and copyright owner of your project. You'll never see your paper anywhere online or in print because you own the copyright. We're committed to protecting your privacy.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-04">
								<h3 class="servises-item__title">Online Order Tracking</h3>
								<div class="servises-item__text">
									<p>Your private, password-protected account Dashboard gives you exclusive  and private 24/7 access to your order details of your writing project. Online chat and email support is always available to answer any questions.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-06">
								<h3 class="servises-item__title">Friendly Customer Support</h3>
								<div class="servises-item__text">
									<p>Professional account experts are standing by around the clock to answer questions, solve problems, and guarantee your 100% satisfaction. We're eager to work with you and are always available via Text message, email, or online chat.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="parallax parallax_01" data-type="background" data-speed="10">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="parallax-content-01">
								<h3 class="parallax-title">Trusted by Over
									<span>6000+</span> Students</h3>
								<div class="parallax-text">
									<p>Starting your paper is one thing,<br>
										Finishing it is another.<br>That's what we do, from start to finish.</p>
								</div>
								<a href="{{url('/order')}}" class="parallax-btn">Order Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content-box-02 content-box-02--ak">
				<div class="table-02">
					<div class="table-02__row">
						<div class="table-02__box-01">
							<img class="table-02__img" src="img/img_02.jpg" alt="Assignment Writing Services">
						</div>
						<div class="table-02__box-02">
							<div class="accordion-wrapp">
								<h3 class="title-03"><span>Services</span> We Offer
									
								</h3>
								<div class="accordion-01">
									<h6 data-count="1" class="accordion-01__title expanded_yes">Assignments</h6>
									<div class="accordion-01__body">
										<div class="accordion-01__text">
											<p>Routine homework and academic assignments at affordable prices. Give us your high school, college, university, or grad school assignment and a subject matter expert will get it done quickly and painlessly. Better grades can be yours without stress!</p>
										</div>
									</div>
									<h6 data-count="2" class="accordion-01__title expanded_no">Essays</h6>
									<div class="accordion-01__body">
										<div class="accordion-01__text">
											<p>Applying to college? Making an employment application? We specialize in writing dynamic and engaging personal statements and application essays. Our academic writers are experts at original compositions, creative writing, and literary analysis.</p>
										</div>
									</div>
									<h6 data-count="3" class="accordion-01__title expanded_no">Dissertations
										<span class='ico'></span>
									</h6>
									<div class="accordion-01__body">
										<div class="accordion-01__text">
											<p>The majority of our writers have advanced degrees and years of Ph.D.-level research & writing experience. They know what dissertation committees want. They'll do the research and the writing and prepare you to defend your dissertation!</p>
										</div>
									</div>
									<h6 data-count="4" class="accordion-01__title expanded_no">Research Papers
										<span class='ico'></span>
									</h6>
									<div class="accordion-01__body">
										<div class="accordion-01__text">
											<p>Everyone on our writing team is an experts in academic research and in APA, MLA, Chicago, Harvard citation formats. Your project arrives fully-formatted and ready to submit. The research behind the writing is always 100% original, and the writing is guaranteed plagiarism-free.</p>
										</div>
									</div>
									<h6 data-count="5" class="accordion-01__title expanded_no">Term Papers
										<span class='ico'></span>
									</h6>
									<div class="accordion-01__body">
										<div class="accordion-01__text">
											<p>We deliver polished, flawless grammar and composition to guarantee the academic success of International and American Students. When you submit your paper, you can be confident that it's written at the appropriate grade level and is ready to hand in to your teacher or professor. Better grades, less hassle!</p>
										</div>
									</div>
									<h6 data-count="6" class="accordion-01__title expanded_no">Non-Academic Custom Writing
										<span class='ico'></span>
									</h6>
									<div class="accordion-01__body">
										<div class="accordion-01__text">
											<p>Our seasoned business, internet blogging, and social media writers are true professionals with vast experience at turning words into action. Short deadlines under 24 hours are no problem for any correspondence, business plans, white papers, email marketing campaigns, and original, compelling web content. We have experienced, full-pro writers standing by to give you words that work for you!</p>
										</div>
									</div>
									<h6 data-count="7" class="accordion-01__title expanded_no">Editing & Proofreading
										<span class='ico'></span>
									</h6>
									<div class="accordion-01__body">
										<div class="accordion-01__text">
											<p>All academic and business writing simply has to have absolutely perfect grammar, punctuation, spelling, formatting, and composition. Our custom editorial and proofreading experts review your project with a detailed eye and with complete knowledge of all writing and style conventions. Proofreading sets any writing apart from "acceptable" and makes it exceptional.</p>
										</div>
									</div>
									<h6 data-count="8" class="accordion-01__title expanded_no">Thesis Writing
										<span class='ico'></span>
									</h6>
									<div class="accordion-01__body">
										<div class="accordion-01__text">
											<p>Masters Degree level research & writing by skilled writers who have earned graduate degrees in your subject matter. All citations and writing are 100% original. Your thesis is delivered to you ready to submit for faculty review. You can stand behind our writing and research with complete confidence.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content-box-01 padding-top-93 padding-bottom-63">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h3 class="title-05" style="margin-bottom:100px;">How It
								<span>Works</span>
							</h3>
							<div class="row">
								<div class="col-lg-12">
									<div class="process-info">
										<div class="process-info__box-01">
											<div class="process-info__icon-wrapp">
												<figure class="process-info__icon">
													<img src="{{asset('/')}}/img/process/process-icon-01.png" alt="Dissertation Writing Services">
													<p class="process-info__step">1</p>
												</figure>
												<h3 class="process-info__title">Place your
													<span>Order</span>
												</h3>
												<p class="process-info__text">Fill out the order <br>form.</p>
											</div>
										</div>
										<div class="process-info__box-02">
											<div class="process-info__icon-wrapp">
												<figure class="process-info__icon">
													<img src="{{asset('/')}}/img/process/process-icon-02.png" alt="Term Paper Writing Services">
													<p class="process-info__step">2</p>
												</figure>
												<h3 class="process-info__title">Get a
													<span>Writer</span>
												</h3>
												<p class="process-info__text">Our U.S.- based writer gets busy on your<br> project</p>
											</div>
										</div>
										<div class="process-info__box-03">
											<div class="process-info__icon-wrapp">
												<figure class="process-info__icon">
													<img src="{{asset('/')}}/img/process/process-icon-03.png" alt="Research Paper Writing Services">
													<p class="process-info__step">3</p>
												</figure>
												<h3 class="process-info__title">Download your
													<span>Document</span>
												</h3>
												<p class="process-info__text">Your project beats the deadline and shows up in your inbox</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<img src="{{asset('/')}}/img/rating.png" style="margin-top:50px;" />
							<p>Rated <b>4.3 / 5</b> based on <b>6079</b> students</p>
							<h3>Starting your paper is one thing,<br>
								Finishing it is another.<br>
								That's what we do, from start to finish.</h3>
								
							<a href="{{route('order')}}" class="parallax-btn" style="margin-top:20px;">Order Now</a>
						</div>
					</div>
					
				</div>
			</div>
		</main>

		<!-- Footer -->
		<footer class="wrapp-footer">
			<div class="footer-box-01">
				<div class="container">
					<div class="row">
						<div class="col-sm-3 col-md-3 col-lg-3">
							<a href="./" class="footer-logo">
								<img src="{{asset('/')}}/img/logo_white.png" alt="The Midterm Logo">
							</a>
							<ul class="widget-contact">
								<li>
									<h4 class="widget-contact__title">Telephone:</h4>
									<p class="widget-contact__text">559-422-7719</p>
								</li>
								<li>
									<h4 class="widget-contact__title">Email:</h4>
									<p class="widget-contact__text">
										<a class="widget-contact__text-email" href="mailto:info@YourAcademicWriter.com">info@YourAcademicWriter.com</a>
									</p>
								</li>
							</ul>
						</div>
						<div class="col-sm-2 col-md-2 col-lg-2">
							<div class="widget-link">
								<h3 class="widget-title">About</h3>
								<ul class="widget-list">
									<li>
										<a href="{{route('home')}}">Home</a>
									</li>
									<li>
										<a href="{{route('writers')}}">Writers</a>
									</li>
									<li>
										<a href="{{route('pricing')}}">Pricing</a>
									</li>
									<li>
										<a href="{{route('faq')}}">FAQs</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-7 col-md-7 col-lg-7">
							<div class="widget-link">
								<img src="{{asset('/')}}/img/sitelock.png" style="display:inline-block;margin-right: 30px;" alt="The Midterm" />
								<img src="{{asset('/')}}/img/comodo.png" style="display:inline-block;margin-right: 30px;" alt="The Midterm" />
								<img src="{{asset('/')}}/img/payment.png" style="display:inline-block;margin-right: 30px;" alt="The Midterm" />
								<img src="{{asset('/')}}/img/norton.png" style="display:inline-block;" alt="The Midterm" />
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="footer-box-02">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<p class="copy-info">&copy; 2018 YourAcademicWriter. All Rights Reserved.
						</p>
							
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4 text-center">
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
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="footer-info">
								<a class="footer-info__01" href="policies.php">Privacy Policy</a>
								<a class="footer-info__02" href="conditions.php">Terms Of use</a>
							</div>
						</div>
						
					</div>
				</div>
				<p  All works purchased from YourAcademicWriter are sold for purposes of research assistance or as business tools. Academic writing is intended to be used for research purposes only by students writing their own essays or dissertations. They are not intended to be presented as one's own work, as YourAcademicWriter supports the educational imperatives of original writing. Business writing services are provided to professionals in specific fields, with authorship and copyright of content attributable to the purchaser. YourAcademicWriter reserves no rights upon payment in full.</p>
			</div>
			<a href="#" class="back2top" title="Back to Top">Back to Top</a>
			
		</footer>
	</div>
        <script src="{{asset('/')}}assets/js/jquery.min.js"></script>
	<!-- JQuery v2.2.4 -->
	<script src="{{asset('/')}}js/jquery-2.2.4.min.js"></script>

	<!-- Superfish v1.7.9 -->
	<script src="{{asset('/')}}js/plugins/jquery.superfish.min.js"></script>

	<!-- Owl carousel v2.2.1 -->
	<script src="{{asset('/')}}js/plugins/jquery.owl.carousel.min.js"></script>
	<script type="text/javascript" src="{{asset('/')}}js/datedropper.min.js"></script>
	<!-- Switch component js -->
<!--    <script type="text/javascript" src="{{asset('/')}}/js/swithces.js"></script>
    <script type="text/javascript" src="{{asset('/')}}/js/switchery.min.js"></script>-->
	<!-- Main script -->
	<script src="{{asset('/')}}js/main.js"></script>
        <script src="{{asset('/')}}js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{asset('/')}}js/jquery.bootstrap.js" type="text/javascript"></script>
        <script  src="{{asset('/')}}js/jquery.maskedinput.min.js"></script>
<script>
	jQuery(function($){
	   $("#phone").mask("+99-9999999999");
	});
</script>
	
	<script type="text/javascript">
            
            
            $(document).ready(function(){
                
             console.log('here');
                $('#emailreg').on('keypress',function(){$(this).css('border-color','green');});
                $('#email').on('keypress',function(){$(this).css('border-color','green');});
                $('#password').on('keypress',function(){$(this).css('border-color','green');});
                $('#passwordreg').on('keypress',function(){$(this).css('border-color','green');});
                $('#cpasswordreg').on('keypress',function(){$(this).css('border-color','green');});
                $('#namereg').on('keypress',function(){$(this).css('border-color','green');});
                $('#phonereg').on('keypress',function(){$(this).css('border-color','green');});
             
             $('#myBtn').on('click',function(){
                 $('#myModal').toggle();
             });
             $('#btnreg').on('click',function(){
                 $('#myModal').toggle();
                 $('#myregistermodel').toggle();
             });
             $('#btnforget').on('click',function(){
                 $('#myModal').toggle();
                 $('#forgetmodel').toggle();
             });
             $('#myBtn1').on('click',function(){
                 $('#myregistermodel').toggle();
             });
             $('#myBtn3').on('click',function(){
                 //alert('1');
                 $('#myregistermodel').toggle();
                 $('#myModal').toggle();
             });
              $('.closereg').on('click',function(){
                 $('#myregistermodel').toggle();
             });
             $('.closelogin').on('click',function(){
                 $('#myModal').toggle();
             });
             
             
            });
          
                
               var modal = document.getElementById('myregistermodel');
               var modals = document.getElementById('myModal');
               var fmodals = document.getElementById('forgetmodel');
               var emodals = document.getElementById('errormodal');
               var smodals = document.getElementById('successmodal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == modals) {
        modals.style.display = "none";
    }
    if (event.target == fmodals) {
        fmodals.style.display = "none";
    }
    if (event.target == emodals) {
        emodals.style.display = "none";
    }
    if (event.target == smodals) {
        smodals.style.display = "none";
    }
}

$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $("#loginform").click(function(e){
        
        e.preventDefault();



        var email = $("#emaillogin").val();

        var password = $("#passwordlogin").val();

        var url = '{{url("/authentication")}}';
        
        if(email == ''){
            $('#errorm').html('');
            $('#errorm').html('Please fill the required field.*');
            $('#errorm').fadeIn().delay(3000).fadeOut();
            $('#email').css('border-color','red');
        }
        if(password == ''){
            $('#errorm').html('');
            $('#errorm').html('Please fill the required field.*');
            $('#password').css('border-color','red');
            $('#errorm').fadeIn().delay(3000).fadeOut();
        }
        if(email != '' && password != ''){
        $.ajax({

           type:'POST',

           url:url,

           data:{password:password, email:email},

           success:function(data){

              //alert(data.error);
              if(data.success == true){
                  window.location.href = '{{url("/")}}'+ '/' +data.urls;
                }else{
                    
                    $('#errorm').html(data.error);
                    $('#errorm').fadeIn().delay(3000).fadeOut();
                }
           }

        });

        }

	});
      
    $("#registerform").click(function(e){

        e.preventDefault();
        var email = $("#emailreg").val();
        var password = $("#passwordreg").val();
        var cpassword = $("#cpasswordreg").val();
        var name = $("#namereg").val();
        var phone = $("#phonereg").val();
        var url = '{{url("/registration")}}';
        //alert(phone);
       
        if(email == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
           // $('#emailreg').css('border-color','red');
                $('#emailreg').css('border-color','red');
        }
        if(password == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#passwordreg').css('border-color','red');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
        }
        if(cpassword == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#cpasswordreg').css('border-color','red');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
        }
        if(name == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#namereg').css('border-color','red');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
        }
        if(phone == ''){
            $('#regerrormsg').html('');
            $('#regerrormsg').html('Please fill the required field.*');
            $('#phonereg').css('border-color','red');
            $('#regerrormsg').fadeIn().delay(3000).fadeOut();
        }
        if(password != cpassword){
            $('#cperrormsg').html('');
            $('#cperrormsg').html('Password and Confirm Password does not matched.*');
            $('#passwordreg').css('border-color','red'); 
            $('#cpasswordreg').css('border-color','red'); 
            $('#cperrormsg').fadeIn().delay(3000).fadeOut();
        }
        if($('#acceptregpolicy').is(":checked") == false){
            $('#acceptregpolicymsg').html('');
            $('#acceptregpolicymsg').html('Please accept the registartion policy.*');
            $('#acceptregpolicy').css('border-color','red');
            $('#acceptregpolicymsg').fadeIn().delay(3000).fadeOut();
        }
        if(email != "" && password != "" && name != "" && phone != "" && password == cpassword && $('#acceptregpolicy').is(":checked") == true){
            
        $.ajax({
           type:'POST',
           url:url,
           data:{name:name,phone:phone,password:password, email:email},
           success:function(data){

              //alert(data.error);
              if(data.success == true){
                  $('#myregistermodel').toggle();
                  $('#successmodal').toggle();
                  $('.successdisplay').text(data.message);
                  
                }else{
                    
                    $('#regerrormsg').html('');
                    $('#regerrormsg').html(data.error);
                    $('#regerrormsg').fadeIn().delay(3000).fadeOut();
                }
           }

        });
        }


	});  
        
        
			$('#deadline,#pages,#level').on('change', function() {	
                           // alert('here');
				var dl = $('#deadline').val();
				var level = $('#level').val();
				var pages = $('#pages').val();
				if(dl == ''){
					alert('Please select a deadline');
				}
                                //8+ days
				if(dl == '6'){
					if(level == 'high school'){var price = '15';}
					if(level == 'college undergraduate'){var price = '18';}
					if(level == 'master'){var price = '20.50';}
					if(level == 'doctoral'){var price = '30';}
					}
                                        //6 to 7 days
				if(dl == '5'){
					if(level == 'high school'){var price = '15';}
					if(level == 'college undergraduate'){var price = '18.25';}
					if(level == 'master'){var price = '21';}
					if(level == 'doctoral'){var price = '32';}
					}
                                        //4 to 5 days
				if(dl == '4'){
					if(level == 'high school'){var price = '15.50';}
					if(level == 'college undergraduate'){var price = '18.50';}
					if(level == 'master'){var price = '21.50';}
					if(level == 'doctoral'){var price = '33';}
					}
                                        //3days
				if(dl == '3'){
					if(level == 'high school'){var price = '16.50';}
					if(level == 'college undergraduate'){var price = '19';}
					if(level == 'master'){var price = '22.75';}
					if(level == 'doctoral'){var price = '34';}
					}
                                        //2days
				if(dl == '2'){
					if(level == 'high school'){var price = '18.75';}
					if(level == 'college undergraduate'){var price = '19.50';}
					if(level == 'master'){var price = '22.75';}
					if(level == 'doctoral'){var price = '35';}
					}
                                        //24hours
				if(dl == '1'){
					if(level == 'high school'){var price = '20.25';}
					if(level == 'college undergraduate'){var price = '21.50';}
					if(level == 'master'){var price = '25.25';}
					if(level == 'doctoral'){var price = '50';}
					}
                                        //12 hourss
				if(dl == '0'){
					if(level == 'high school'){var price = '21.25';}
					if(level == 'college undergraduate'){var price = '22.50';}
					if(level == 'master'){var price = '27.25';}
					if(level == 'doctoral'){var price = '75';}
					}
				var dtotal = price * pages;
				var ttotal = dtotal * 2;
				document.getElementById("tprice").innerHTML = ttotal;
				document.getElementById("dprice").innerHTML = dtotal;
				document.getElementById("pprice").value = dtotal;
				document.getElementById("ttprice").value = ttotal;
			});
			
	</script>
	
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bbb49feb033e9743d02bd3c/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>