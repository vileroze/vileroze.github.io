<?php
	get_header();

	/* just for testing, can be deleted
	//13 is the id of "home sweet home"
	$currPageId = 13; 
	*/

	//current page (homepage) id
	$currPageId = $post->ID;

	//main section
	$mainSecVisibility = !empty(get_theme_mod('set_main_visibility')) ? get_theme_mod('set_main_visibility') : "0";
	$mainSecImgPos = !empty(get_theme_mod('set_main_img_pos')) ? __(get_theme_mod('set_main_img_pos'), 'vile') : "2";
	$mainSecTitle = !empty(get_theme_mod('set_main_title')) ? __(get_theme_mod('set_main_title'), 'vile') : "Showcase your app beautifully";
	$mainSecDesc = nl2br(!empty(get_theme_mod('set_main_desc')) ? __(get_theme_mod('set_main_desc'), 'vile') : "Launch your mobile app landing page faster with this free, open source theme from Start Bootstrap!");
	$appBadge1Img = !empty(get_theme_mod('set_dwnld_btn_1')) ? get_theme_mod('set_dwnld_btn_1') : "/wp-content/themes/vilecustomizable/assets/images/google-play-badge.svg";
	$appBadge1Target = !empty(get_theme_mod('set_dwnld_btn_1_link')) ? get_theme_mod('set_dwnld_btn_1_link') : "https://youtube.com";
	$appBadge2Img =  !empty(get_theme_mod('set_dwnld_btn_2')) ? get_theme_mod('set_dwnld_btn_2') : "/wp-content/themes/vilecustomizable/assets/images/google-play-badge.svg";
	$appBadge2Target = !empty(get_theme_mod('set_dwnld_btn_2_link')) ? get_theme_mod('set_dwnld_btn_2_link') : "https://youtube.com";
	$phoneBorderImg = !empty(get_theme_mod('set_phone_border')) ? get_theme_mod('set_phone_border') : "/wp-content/themes/vilecustomizable/assets/images/portrait_black.png";
	$appDemoVideo = !empty(get_theme_mod('set_app_demo_vid')) ? wp_get_attachment_url(get_theme_mod('set_app_demo_vid')) : "/wp-content/themes/vilecustomizable/assets/images/demo-screen.mp4";
	$linkOpenStyle = get_theme_mod('set_link_target') == 0 ? "_self" : "_blank";

	//testimonial section
	$testimonialTitle = nl2br(!empty(get_theme_mod('set_testimonial_title')) ? __(wp_kses(get_theme_mod('set_testimonial_title'), 'strip'), 'vile') : '"An intuitive solution to a common problem that we all face, wrapped up in a single app!"');
	$testimonialImg =  !empty(get_theme_mod('set_testimonial_by')) ? get_theme_mod('set_testimonial_by') : "/wp-content/themes/vilecustomizable/assets/images/tnw-logo.svg";

	//desktop download section
	$desktopDwnTitle = nl2br(!empty(get_theme_mod('set_desktop_dwnld_title')) ? __(get_theme_mod('set_desktop_dwnld_title'), 'vile') : "Stop waiting. Start building.");
	$desktopDwnBtnTitlePos = '';
	$desktopDwnBtnTitlePosTemp = get_theme_mod('set_desk_title_pos');
	if (!empty($desktopDwnBtnTitlePosTemp)) {
		if($desktopDwnBtnTitlePosTemp == 'left'){
			$desktopDwnBtnTitlePos = 'text-start';
		}else if($desktopDwnBtnTitlePosTemp == 'right'){
			$desktopDwnBtnTitlePos = 'text-end';
		}else if($desktopDwnBtnTitlePosTemp == 'center'){
			$desktopDwnBtnTitlePos = 'text-center';
		}
	}else{
		$desktopDwnBtnTitlePos = 'text-start';
	}
	$desktopDwnBtnLink = !empty(get_theme_mod('set_desktop_dwnld_link')) ? __(get_theme_mod('set_desktop_dwnld_link'), 'vile') : "https://developer.wordpress.com";
	

	//quick download links section
	$quickDwnldLinkTitle = nl2br(!empty(get_theme_mod('set_quick_dwnld_links')) ? __(wp_kses(get_theme_mod('set_quick_dwnld_links'), 'strip'), 'vile') : 'Get the app now!');
	$dwnldLinkOpenStyle = get_theme_mod('set_dwnld_link_target') == 0 ? "_self" : "_blank";


	if ($mainSecVisibility == 0) { ?>
	
		<!-- Mashead header-->
		<header class="masthead">
			<div class="container px-5">
				<div class="row gx-5 align-items-center">
					<div class=" col-lg-6  order-<?php echo $mainSecImgPos; ?>">
						<!-- Mashead text and app badges-->
						<div class="mb-5 mb-lg-0 text-center text-lg-start">
							
							<h1 class="main-title display-1 lh-1 mb-3"><?php echo $mainSecTitle; ?></h1> 

							<p class="main-desc lead fw-normal text-muted mb-5"><?php echo $mainSecDesc; ?></p>

							<div class="d-flex flex-column flex-lg-row align-items-center">
								<a class="main-dwnld-1 me-lg-3 mb-4 mb-lg-0" href="<?php echo $appBadge1Target; ?>" target="<?php echo $linkOpenStyle; ?>">
									<img class="app-badge" src="<?php echo $appBadge1Img; ?> " alt="..." />
								</a>
								<a class="main-dwnld-2" href="<?php echo $appBadge2Target; ?>" target="<?php echo $linkOpenStyle; ?>">
									<img class="app-badge" src="<?php echo $appBadge2Img; ?> " alt="..." />
								</a>
							</div>

						</div>
					</div>
					<div class="col-lg-6 order-3">
						<!-- Masthead device mockup feature-->
						<div class="main-phone-border masthead-device-mockup">
							<div class="main-gradient"></div>
							<svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
								<defs>
									<linearGradient id="circleGradient" gradientTransform="rotate(45)">
										<stop class="gradient-start-color" offset="0%"></stop>
										<stop class="gradient-end-color" offset="100%"></stop>
									</linearGradient>
								</defs>
								<circle cx="50" cy="50" r="50"></circle>
							</svg>
							<svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
								<rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
								<rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect>
							</svg>
							<svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
								<circle cx="50" cy="50" r="50"></circle>
							</svg>
							<div class="main-app-demo device-wrapper">
								<div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
									
									<!-- changes the background image of the "device" class -->
									<style type="text/css" id="vilecustomizable-theme-option-css">
										.device[data-device=iPhoneX][data-orientation=portrait][data-color=black]::after {
											content: "";
											background-image: url("<?php echo $phoneBorderImg ?>");
										}
									</style>
									
									<div class="screen bg-black">
										<!-- PUT CONTENTS HERE:-->
										<!-- * * This can be a video, image, or just about anything else.-->
										<!-- * * Set the max width of your media to 100% and the height to-->
										<!-- * * 100% like the demo example below.-->
										<video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%;">
										<source src="<?php echo $appDemoVideo; ?>" type="video/mp4" />
										</video>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
	<?php } ?>

	<!-- Quote/testimonial aside-->
	
	<aside class="text-center ">
		<div class="container px-5">
			<div class="row gx-5 justify-content-center bg-gradient-primary-to-secondary py-5">
				<div class="col-xl-8 ">
					<div class="testimonial-title h2 fs-1 text-white mb-4"><?php echo $testimonialTitle;//echo get_post_meta($currPageId, "app_slogan", true); ?></div>
					<div class="testimonial-img"></div>
					<img  src="<?php echo $testimonialImg; //echo get_field("company_logo"); ?>" alt="..." style="height: 3rem" />
				</div>
			</div>

			<?php
				$customizer_repeater_testimonial = get_theme_mod('customizer_repeater_testimonial');
				$customizer_repeater_testimonial_decoded = json_decode($customizer_repeater_testimonial);
				if(!is_null($customizer_repeater_testimonial_decoded)){
					foreach($customizer_repeater_testimonial_decoded as $repeater_item){
						echo '
							<div class="row gx-5 justify-content-center bg-gradient-primary-to-secondary mt-5 py-5">
								<div class="col-xl-8">
									<div class="h2 fs-1 text-white mb-4">'.$repeater_item->title.'</div>
									<img  src="'.$repeater_item->image_url.'" alt="..." style="height: 3rem" />
								</div>
							</div>
							';
					}
				}
			?>
		</div>
	</aside>

	<?php if (get_field("show_features_section") == "show") { ?>
		<!-- App features section-->
		<section id="features">
			<div class="container px-5">
				<div class="row gx-5 align-items-center">
					<div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
						<div class="container-fluid px-5">
							<div class="row gx-5 justify-content-center">
								<div class="col-md-4">
									<!-- Feature item-->
									<div class="text-center">
										<i class="bi-<?php echo get_field("feature_1_logo") ?> icon-feature text-gradient d-block mb-3"></i>
										<h3 class="font-alt"><?php echo get_post_meta($currPageId, "feature_1", true); ?></h3>
										<p class="text-muted mb-0"><?php echo get_post_meta($currPageId, "feature_1_description", true); ?></p>
									</div>
								</div>

								<?php
									$customizer_repeater_feature = get_theme_mod('customizer_repeater_feature');
									$customizer_repeater_feature_decoded = json_decode($customizer_repeater_feature);
									if(!is_null($customizer_repeater_feature_decoded)){
										foreach($customizer_repeater_feature_decoded as $repeater_item){
											echo '
												<div class="col-md-4 mb-5">
													<div class="text-center">
														<img class="mb-4 rounded-circle" src="'.$repeater_item->image_url.'" style="height: 5.5rem!important" />
														<h3 class="font-alt">'.$repeater_item->title.'</h3>
														<p class="text-muted mb-0">'.$repeater_item->subtitle.'</p>
													</div>
												</div>
												';
										}
									}
									
								?>
							</div>
						</div>
					</div>
					<div class="col-lg-4 order-lg-0">
						<!-- Features section device mockup-->
						<div class="features-device-mockup">
							<svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
								<defs>
									<linearGradient id="circleGradient" gradientTransform="rotate(45)">
										<stop class="gradient-start-color" offset="0%"></stop>
										<stop class="gradient-end-color" offset="100%"></stop>
									</linearGradient>
								</defs>
								<circle cx="50" cy="50" r="50"></circle>
							</svg>
							<svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
								<rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
								<rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect>
							</svg>
							<svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
								<circle cx="50" cy="50" r="50"></circle>
							</svg>
							<div class="device-wrapper">
								<div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
									<div class="screen bg-black">
										<!-- PUT CONTENTS HERE:-->
										<!-- * * This can be a video, image, or just about anything else.-->
										<!-- * * Set the max width of your media to 100% and the height to-->
										<!-- * * 100% like the demo example below.-->
										<video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%"><source src="<?php echo get_field("app_demo_video"); ?>" type="video/mp4" /></video>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	


	<?php if (get_theme_mod('set_info_visibility', 1) == 0) { //get_field("show_information_section") == "show"?> 
		
		<!-- Information section-->
		<section class="bg-light">
			<div class="container px-5">
				<div class="row gx-5 align-items-center justify-content-center justify-content-lg-between ">
					<div class="col-12 col-lg-5 order-<?php echo (get_theme_mod('set_info_img_pos') != "" ? get_theme_mod('set_info_img_pos') : "2") ?>">
						<h2 class="display-4 lh-1 mb-4"><?php echo get_theme_mod('set_info_title'); ?></h2>
						<p class="lead fw-normal text-muted mb-5 mb-lg-0"><?php echo get_theme_mod('set_info_desc'); ?></p>
					</div>
					<div class="col-sm-8 col-md-6 order-3">
						<div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="<?php echo get_theme_mod('set_info_sec_img'); ?>" alt="..." /></div>
					</div>
				</div>

				<h1 class="text-center my-5 py-5 text-decoration-underline">New Features</h1>

				<?php
					$customizer_repeater_information = get_theme_mod('customizer_repeater_example');
					$customizer_repeater_information_decoded = json_decode($customizer_repeater_information);

					if(!is_null($customizer_repeater_information_decoded)){
						foreach($customizer_repeater_information_decoded as $repeater_item){
							echo '
								<div class="row gx-5 justify-content-center justify-content-lg-between mb-5 pb-5">
									<div class="col-12 col-lg-5 order-2">
										<h2 class="display-4 lh-1 mb-4">'.$repeater_item->title.'</h2>
										<p class="lead fw-normal text-muted mb-5 mb-lg-0">'.$repeater_item->subtitle.'</p>
									</div>
									<div class="col-sm-8 col-md-6 order-3">
										<div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="'.$repeater_item->image_url.'" alt="..." /></div>
									</div>
								</div>
								';
						}
					}
				?>
			</div>
		</section>

	<?php } ?>

	
	<?php if (get_field("show_download_section") == "show") { ?>
		<!-- Call to action section-->
		<section class="cta">
			<div class="cta-content">
				<div class="container px-5 <?php echo $desktopDwnBtnTitlePos ?>">
					<h2 class="desktop-dwn-title text-white display-1 lh-1 mb-4">
						<?php echo $desktopDwnTitle; ?>
					</h2>
					<a class="desktop-dwn-btn btn btn-outline-light py-3 px-4 rounded-pill" href="https://startbootstrap.com/theme/new-age" target="_blank">Download for free</a>
				</div>
			</div>
		</section>

	<?php } ?>
	

	<!-- Quck download links section-->
	<section class="bg-gradient-primary-to-secondary" id="download">
		<div class="container px-5">
			<h2 class="quick-link-title text-center text-white font-alt mb-4"><?php echo $quickDwnldLinkTitle; //echo get_post_meta($currPageId, "get_app_title", true); ?></h2>
			<div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
				<?php
					$customizer_repeater_download_links = get_theme_mod('customizer_repeater_download_links');
					$customizer_repeater_download_links_decoded = json_decode($customizer_repeater_download_links);
					if(!is_null($customizer_repeater_download_links_decoded)){
						foreach($customizer_repeater_download_links_decoded as $repeater_item){
							echo '<a class="ms-2" href="'.$repeater_item->title.'" target="'.$dwnldLinkOpenStyle.'"><img class="app-badge" src="'.$repeater_item->image_url.'" alt="..." /></a>';
						}
					}
				?>
			</div>
		</div>
	</section>
	
	<!-- Feedback Modal-->
	<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-gradient-primary-to-secondary p-4">
					<h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
					<button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body border-0 p-4">
					<!-- * * * * * * * * * * * * * * *-->
					<!-- * * SB Forms Contact Form * *-->
					<!-- * * * * * * * * * * * * * * *-->
					<!-- This form is pre-integrated with SB Forms.-->
					<!-- To make this form functional, sign up at-->
					<!-- https://startbootstrap.com/solution/contact-forms-->
					<!-- to get an API token!-->
					<form id="contactForm" data-sb-form-api-token="API_TOKEN">
						<!-- Name input-->
						<div class="form-floating mb-3">
							<input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
							<label for="name">Full name</label>
							<div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
						</div>
						<!-- Email address input-->
						<div class="form-floating mb-3">
							<input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
							<label for="email">Email address</label>
							<div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
							<div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
						</div>
						<!-- Phone number input-->
						<div class="form-floating mb-3">
							<input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
							<label for="phone">Phone number</label>
							<div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
						</div>
						<!-- Message input-->
						<div class="form-floating mb-3">
							<textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
							<label for="message">Message</label>
							<div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
						</div>
						<!-- Submit success message-->
						<!---->
						<!-- This is what your users will see when the form-->
						<!-- has successfully submitted-->
						<div class="d-none" id="submitSuccessMessage">
							<div class="text-center mb-3">
								<div class="fw-bolder">Form submission successful!</div>
								To activate this form, sign up at
								<br />
								<a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
							</div>
						</div>
						<!-- Submit error message-->
						<!---->
						<!-- This is what your users will see when there is-->
						<!-- an error submitting the form-->
						<div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
						<!-- Submit Button-->
						<div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
	get_footer();
?>