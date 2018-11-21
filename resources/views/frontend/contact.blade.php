@include('frontend.layouts.header')
@include('frontend.layouts.navbar')

<main class="content-row">
			<div class="page-title-wrapp">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-title-01">Contact Us</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<ul class="breadcrumbs">
								<li class="active">
									<a href="index.php">Home</a>
								</li>
								<li>Contact Us</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="padding-top-20 padding-bottom-20">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="contacts_map">
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<h3 class="title-02">Get in
								<span>Touch</span>
							</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="contact-box">
								<p>We have worls-class, flexible support via live chat, email and phone. We guarantee that you’ll be able to have any issue resolved within 24 hours. You can contact us immediately here. </p>
								<ul class="contact-box__list">
									
									<li>
										<span>Email:</span>
										<a href="mailto:info@YourAcademicWriter.com">info@Youracademicwriter.com</a>
									</li>
									<li>
										<span>Phones:</span>
										<div class="contact-box__phones-box">
											<p>+1 347 766 5551</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="reply-form">
								<div role="form" class="form-in-wrapp" id="form-in-wrapp-f1053-p976-o1" lang="en-US" dir="ltr">
									<div class="screen-reader-response"></div>
									<div id="note"></div>
									<div id="fields">
										<form id="ajax-contact-form" action="javascript:void(0);" method="post" novalidate="novalidate" class="reply-form__form">
											<div class="reply-form__box-01 name">
												<input class="reply-form__name form-in-wrapp-validates-as-required" type="text" name="name" aria-required="true" aria-invalid="false" placeholder="Name *">
											</div>
											<div class="reply-form__box-02 your-email">
												<input class="reply-form__email form-in-wrapp-validates-as-required form-in-wrapp-validates-as-email" type="email" name="email" aria-required="true" aria-invalid="false" placeholder="Email *">
											</div>
											<div class="reply-form__box-04 your-message">
												<textarea class="reply-form__message" name="message" aria-invalid="false" cols="30" rows="10" placeholder="Message..."></textarea>
											</div>
											<div class="reply-form__box-05">
												<button class="btn-01" type="submit">Send message</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

@include('frontend.layouts.footer')
