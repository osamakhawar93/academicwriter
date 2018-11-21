@include('frontend.layouts.header')
@include('frontend.layouts.navbar')
		<!-- Content -->
		<main class="content-row">
			<div class="page-title-wrapp">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-title-01">Why Choose Us</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<ul class="breadcrumbs">
								<li class="active">
									<a href="{{route('home')}}">Home</a>
								</li>
								<li>Why Us</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="padding-top-20 padding-bottom-20">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="nivoSlider about-slider">
								<img src="{{asset('/')}}/img/about-slider/about-slider_01.jpg" alt="" style="width: 555px; visibility: hidden;">
								<img src="{{asset('/')}}/img/about-slider/about-slider_02.jpg" alt="" style="width: 555px; visibility: hidden;">
								<img src="{{asset('/')}}/img/about-slider/about-slider_03.jpg" alt="" style="width: 555px; visibility: hidden;">
							<img class="nivo-main-image" src="{{asset('/')}}/img/about-slider/about-slider_03.jpg" style="display: inline-block; height: 448px;"><div class="nivo-caption"></div><div class="nivo-directionNav"><a class="nivo-prevNav">Prev</a><a class="nivo-nextNav">Next</a></div><div class="nivo-slice" name="0" style="left: 0px; width: 555px; height: 448px; opacity: 1; overflow: hidden;"><img src="{{asset('/')}}/img/about-slider/about-slider_03.jpg" style="position:absolute; width:555px; height:auto; display:block !important; top:0; left:-0px;"></div></div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="servise-box-01">
								<h2>We do not buy prepackaged content!</h2>
								<p>There are over a 100,000 different websites that offer cut and paste information " but if you see it one place you are bound to see it somewhere else, and that is deemed 'plagiarized'. Plagiarism detection software has become highly sophisticated and is used by educators, universities and even the U.S. government these days. Accusations of plagiarism can cause you to be expelled from school, lose a job or fail the class " none of these are tenable options.</p>
								<div class="module_skills">
									<div class="module_inner">
										<div class="shortcode_skills">
											<ul class="skills_list">
												<li class="skill_li skill_li-in">
													<h6 class="skill-title">Premium Quality</h6>
													<div class="diagram_bar">
														<div class="skill_div skill_div-style" data-percent="90%" style="width: 100%;"></div>
													</div>
													<p class="skill_percent skill_div" data-percent="100%" style="width: 100%;">100%</p>
												</li>
												<li class="skill_li skill_li-in">
													<h6 class="skill-title">Deadline Driven</h6>
													<div class="diagram_bar">
														<div class="skill_div skill_div-style" data-percent="100%" style="width: 100%;"></div>
													</div>
													<p class="skill_percent skill_div" data-percent="100%" style="width: 100%;">100%</p>
												</li>
												<li class="skill_li skill_li-in">
													<h6 class="skill-title">Private & Confidential</h6>
													<div class="diagram_bar">
														<div class="skill_div skill_div-style" data-percent="100%" style="width: 100%;"></div>
													</div>
													<p class="skill_percent skill_div" data-percent="100%" style="width: 100%;">100%</p>
												</li>
												<li class="skill_li skill_li-in">
													<h6 class="skill-title">Customer Support</h6>
													<div class="diagram_bar">
														<div class="skill_div skill_div-style" data-percent="100%" style="width: 100%;"></div>
													</div>
													<p class="skill_percent skill_div" data-percent="100%" style="width: 100%;">100%</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<p>YourAcademicWriter.com writers provide original writing tailored to your specific needs and request. Do not purchase pre-written work; you will be disappointed every time.</p>
						<p>Choose YourAcademicWriter.com when you want the best! That way you can be sure you will retain full control over the writing process from beginning to end and always know the status of your order. Other assurances offered by YourAcademicWriter.com include:</p>
						<ul>
							<li>Direct contact with your writer.</li>
							<li>The writing style will fit your needs.</li>
							<li>Only Native English speakers are used who are familiar with American and English vernacular and colloquialism.</li>
							<li>Subject area experts aligned to your writing needs that hold PhDs, Masters, or Bachelor Degrees.</li>
							<li>Wavering and absolute quality assurance.</li>
							<li>Work to begin immediately upon receipt of the 50% deposit; balance on delivery.</li>
							<li>Error-free formatting (MLA, APA, CMS)</li>
							<li>No unexpected charges " what we quote is what you pay.</li>
							<li>Never a hidden charge or any add-ons.</li>
							<li>Revisions and edits upon request.</li>
							<li>Bibliography/Citation pages for free.</li>
							<li>Unparalleled quality content from experts with authentic and varied relevant experience.</li>
						</ul>
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
								<a href="order.php" class="parallax-btn">Order Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

                
@include('frontend.layouts.footer')