<?php 
	session_start();
	error_reporting(0);

	$organization = 'CCH';
	$company = 'NA';
	$leadQuality = 'Tentative';
	$accountType = 'Client';
	$leadOrigin = 'CCH Paid';
	$leadSource = 'CCH Google Adwords';
	$leadMedium = 'Webform';
	$leadCampaignCategory = 'TRP TFN PPC';
	$leadCampaign = 'CCH TFN AUS SER IN P';
	$leadCampaignLong = 'CCH_TFN_AUS_Search_India_Phrase';
	$leadCampaignType = 'Search';
	$webformName = 'CCH TFN PPC Form';
	$webformPosType1 = 'Banner form';
	$webformPosType2 = 'Footer form';
	$webformPosType3 = 'Pricing form';
	$webformPosType4 = 'Popup form';
	$keywordMatchType = 'Phrase';
	$roleOfContact = 'Decision Maker/Owner';

	$sourceURL = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


	// getting referenceURL if exists
	$referenceURL = '';
	if(isset($_SERVER['HTTP_REFERER'])) {
	$referenceURL = $_SERVER['HTTP_REFERER'];
	}

	// setting cookie values null for beginning
	$initialSource = '';
	$utmcsr = '';
	$utmcmd = '';
	$utmccn = '';
	$utmctr = '';

	$tollFreeNumber = '1844-599-9191';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="CallCenterHosting" />
	<meta name="robots" content="noindex, nofollow">

	<title>Best Sales Dialer | CallCenterHosting</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/css/intlTelInput.css" />

	<link rel="stylesheet" type="text/css" href="assets/css/style.css?version=1.11" />
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />

	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16548667590"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'AW-16548667590');
</script>


	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T2CXFKW');</script>
<!-- End Google Tag Manager -->

</head>
	<body>
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2CXFKW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
         
		<div class="wrapper">
			<!-- Header -->
			<header class="ace-top-menu ace-drker-elem">
				<div class="container">
					<div>
						<nav class="navbar navbar-expand-sm ace-wrap ace-top-menu-elem">
							<a class="navbar-brand nav-logo" href="javascript:void(0)">
								<img src="assets/img/logo.png" class="img-fluid ace-logo" />
							</a>
							
							<div class="top-right-menu">
								<ul>
									
<!--
									<li>
										<a href="tel:<?php echo $tollFreeNumber; ?>">
											<img class="d-none d-sm-block" src="assets/img/icons/call-icon.svg" class="img-fluid" /> 
											<span class="txt-prim ml-2"> <?php echo $tollFreeNumber; ?></span>
											<img class="d-block d-sm-none" src="assets/img/icons/call-icon-mobile.svg" class="img-fluid" />
										</a>
									</li>
-->
									<li>
										<a class="ace-btn-second-outline ace-btn-nav ace-btn-tsot-ani mt-0 arrow-cta" href="javascript:void(0);" onclick="openChatAgent();">
											<svg xmlns="http://www.w3.org/2000/svg" width="28.962" height="22.919" viewBox="0 0 28.962 22.919"> <g id="Group_8684" data-name="Group 8684" transform="translate(1 1)"> <g id="Group_8685" data-name="Group 8685"> <path id="Path_10556" class="p-grn-strk" data-name="Path 10556" d="M22.281,18.846H6.867a6.33,6.33,0,0,0-3.305.932L.646,21.565V5.973A5.327,5.327,0,0,1,5.973.646H22.281a5.327,5.327,0,0,1,5.327,5.327v7.546A5.327,5.327,0,0,1,22.281,18.846Z" transform="translate(-0.646 -0.646)" fill="none" stroke="#0A0A0A" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/> <path id="Path_10557" class="p-grn-fill" data-name="Path 10557" d="M11.07,10.91a2.3,2.3,0,1,1-2.3-2.3,2.3,2.3,0,0,1,2.3,2.3" transform="translate(-2.116 -1.646)" fill="#0A0A0A"/> <path id="Path_10558" data-name="Path 10558" class="p-grn-fill" d="M17.146,10.91a2.3,2.3,0,1,1-2.3-2.3,2.3,2.3,0,0,1,2.3,2.3" transform="translate(-1.192 -1.646)" fill="#0A0A0A"/> <path id="Path_10559" class="p-grn-fill" data-name="Path 10559" d="M23.222,10.91a2.3,2.3,0,1,1-2.3-2.3,2.3,2.3,0,0,1,2.3,2.3" transform="translate(-0.268 -1.646)" fill="#0A0A0A"/> </g> </g> </svg>
											
											<span class="ace-btn-tsot-elem">
												<span class="ace-btn-tsot-item ace-btn-tsot1">
													<span class="ace-btn-tsot">Chat with Experts</span>
													<span class="ace-btn-tsot-icon"><img src="assets/img/icons/arrow.png" alt="" /></span>
												</span>
												<!-- <span class="ace-btn-tsot-item ace-btn-tsot2">
													<span class="ace-btn-tsot">C</span><span class="ace-btn-tsot">h</span><span class="ace-btn-tsot">a</span><span class="ace-btn-tsot">t</span> <span class="ace-btn-tsot">w</span><span class="ace-btn-tsot">i</span><span class="ace-btn-tsot">t</span><span class="ace-btn-tsot">h</span> <span class="ace-btn-tsot">a</span><span class="ace-btn-tsot">n</span> <span class="ace-btn-tsot">e</span><span class="ace-btn-tsot">x</span><span class="ace-btn-tsot">p</span><span class="ace-btn-tsot">e</span><span class="ace-btn-tsot">r</span><span class="ace-btn-tsot">t</span>
													<span class="ace-btn-tsot-icon"><img src="assets/img/icons/arrow.png" alt="" /></span>
												</span> -->
											</span>
										</a>
									</li>
								</ul>
							</div> 
						</nav>
					</div>
				</div>
			</header>
		
			<div class="ace-content">

				<section class="ace-sec-xxl ace-tfn-bann-sec ace-drker-elem">
					<div class="ace-tfn-bann-back-elem"></div>
					<div class="ace-tfn-bann-elem">
						<div class="container">
							<div class="row">
								<div class="col-lg-6 align-self-center">
									<div class="ace-tfn-bann-cont">
										<div class="ace-tfn-bann-cont-elem">
											<h1 class="ace-head-minor fw-semi-bold text-uppercas txt-wht">Best Sales Dialer</h1>
											<h2 class="ace-head-xl fw-semi-bold ace-tfn-bann-head">Outbound dialers that streamline sales ops</h2>
											<p class="ace-summ txt-wht">Minimize calling obstacles and accelerate agent productivity with intuitive auto dialer functionalities.</p>
											<div class="ace-tfn-bann-award-desk">
												<!-- <div class="ace-tfn-bann-points">
													<div class="ace-tfn-bann-points-elem">
														<img src="assets/img/banner/accessibility.svg" class="img-fluid" />
														<p class="small">Accessibility</p>
													</div>
													<div class="ace-tfn-bann-points-elem">
														<img src="assets/img/banner/professionalism.svg" class="img-fluid" />
														<p class="small">Professionalism</p>
													</div>
													<div class="ace-tfn-bann-points-elem">
														<img src="assets/img/banner/customer-engagement.svg" class="img-fluid" />
														<p class="small">Customer <br />Engagement</p>
													</div>
													<div class="ace-tfn-bann-points-elem">
														<img src="assets/img/banner/tailored-solution.svg" class="img-fluid" />
														<p class="small">Tailored <br />Solutions</p>
													</div>
												</div> -->

												<div class="ace-tfn-bann-awards align-items-center">
													
													<div class="ace-tfn-bann-awards-elem">
														<img src="assets/img/banner/google.png" class="img-fluid" />
														<div class="d-flex align-items-center justify-content-cente ace-tfn-bann-awards-cont mt-lg-3 mt-2">
															<div class="ace-stars" style="--rating: 4.6;" title=""></div>
															<p class="m-0 small pl-1">4.6/5</p>
														</div>
													</div>
													<div class="ace-tfn-bann-awards-elem">
														<img src="assets/img/banner/trustpilot.png" class="img-fluid" />
														<div class="d-flex align-items-center justify-content-cente ace-tfn-bann-awards-cont mt-lg-3 mt-2">
															<div class="ace-stars" style="--rating: 4.8;" title=""></div>
															<p class="m-0 small pl-1">4.8/5</p>
														</div>
													</div>
													<div class="ace-tfn-bann-awards-elem">
														<img src="assets/img/banner/justdial.png" class="img-fluid" />
														<div class="d-flex align-items-center justify-content-cente ace-tfn-bann-awards-cont mt-lg-3 mt-2">
															<div class="ace-stars" style="--rating: 4.8;" title=""></div>
															<p class="m-0 small pl-1">4.8/5</p>
														</div>
													</div>
													<div class="ace-tfn-bann-awards-elem">
														<img src="assets/img/banner/g2.png" class="img-fluid" />
														<div class="d-flex align-items-center justify-content-cente ace-tfn-bann-awards-cont mt-lg-3 mt-2">
															<div class="ace-stars" style="--rating: 5;" title=""></div>
															<p class="m-0 small pl-1">5/5</p>
														</div>
													</div>
													<!-- <div class="ace-tfn-bann-awards-elem">
														<img src="assets/img/awards/customers-choice-2022.png" class="img-fluid" />
													</div> -->
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-5 offset-lg-1">
									<div class="ace-tfn-bann-form-part mt-lg-4">
										<h3 class="ace-head fw-bolder txt-prim text-center ace-tfn-bann-form-head text-uppercase mb-2">Limited Discount Offer</h3>
										<p class="text-center">Book a call today to <strong>know more</strong></p>
										<div class="ace-tfn-bann-form-elem">
											
											<form class="form-field" method="post" action="#" id="acefoneformThree" autocomplete="off">
												<div style="display: none; ">
													<input type="hidden" name="organization" id="organization" value="<?php echo $organization; ?>" />
		                                            <input type="hidden" name="leadQuality" id="leadQuality" value="<?php echo $leadQuality; ?>" />
		                                            <input type="hidden" name="roleOfContact" id="roleOfContact" value="<?php echo $roleOfContact; ?>" />
		                                            <input type="hidden" name="company" id="company" value="<?php echo $company; ?>" />
		                                            <input type="hidden" name="leadOrigin" id="leadOrigin" value="<?php echo $leadOrigin; ?>" />
		                                            <input type="hidden" name="leadSource" id="leadSource" value="<?php echo $leadSource; ?>" />
		                                            <input type="hidden" name="leadMedium" id="leadMedium" value="<?php echo $leadMedium; ?>" />
		                                            <input type="hidden" name="leadCampaignCategory" id="leadCampaignCategory" value="<?php echo $leadCampaignCategory; ?>" />
		                                            <input type="hidden" name="leadCampaign" id="leadCampaign" value="<?php echo $leadCampaign; ?>" />
		                                            <input type="hidden" name="leadCampaignLong" id="leadCampaignLong" value="<?php echo $leadCampaignLong; ?>" />
		                                            <input type="hidden" name="leadCampaignType" id="leadCampaignType" value="<?php echo $leadCampaignType; ?>" />
		                                            <input type="hidden" name="webformName" id="webformName" value="<?php echo $webformName; ?>" />
		                                            <input type="hidden" name="webformPosType" id="webformPosType1" value="<?php echo $webformPosType1; ?>" />
		                                            <input type="hidden" name="initialSource" id="initialSource" value="<?php echo $initialSource; ?>" />
		                                            <input type="hidden" name="sourceURL" id="sourceURL" value="<?php echo $sourceURL; ?>" />
		                                            <input type="hidden" name="ip" id="ip" value="" />
		                                            <input type="hidden" name="getGAId" id="getGAId" value="" />
		                                            <input type="hidden" name="zc_gad" id="zc_gad" value="" />
		                                            <input type="hidden" name="utmcsr" id="utmcsr" value="<?php echo $utmcsr;?>" />
		                                            <input type="hidden" name="utmcmd" id="utmcmd" value="<?php echo $utmcmd;?>" />
		                                            <input type="hidden" name="utmccn" id="utmccn" value="<?php echo $utmccn;?>" />
		                                            <input type="hidden" name="utmctr" id="utmctr" value="<?php echo $utmctr;?>" />
		                                            <input type="hidden" name="keywordMatchType" id="keywordMatchType" value="<?php echo $keywordMatchType; ?>" />
		                                            <input type="hidden" name="referenceURL" id="referenceURL" value="<?php echo $referenceURL; ?>" />
		                                            <input type="hidden" name="accountType" id="accountType" value="<?php echo $accountType; ?>" />
													<!-- <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-one" value="" /> -->
												</div>

												<!-- <div class="ace-ppc-form-field-elem">
													<div><span class='comp_error ace-ppc-form-error' style='display: none;'>Please enter company name</span></div>    
													<input type="text" name="company_name" id="compThree"  placeholder="Company name" class="ace-ppc-form-field tfn-field-comp" autocomplete="off" />
												</div> -->
												
												<div class="ace-ppc-form-field-elem">
													<div><span class="name_error ace-ppc-form-error" style="display: none;">Please enter your name</span></div>    
													<input type="text" name="name" id="nameThree"  placeholder="Full name" class="ace-ppc-form-field tfn-field-name" autocomplete="off" />
												</div>

												<div class="ace-ppc-form-field-elem">
													<div> <span class="label_error_pho_name ace-ppc-form-error" style="display: none;">Please enter a valid phone number</span></div>    
													<input type="tel" name="phonenumber" id="telThree" placeholder="Phone number" class="ace-ppc-form-field tfn-field-phone userPhnNum" autocomplete="off" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
												</div>

												<div class="ace-ppc-form-field-elem">
													<div><span class='email_error ace-ppc-form-error' style='display: none;'>Please enter a valid business email</span></div>    
													<input type="text" name="email" placeholder="Work email address" id="emailThree" class="ace-ppc-form-field tfn-field-email" autocomplete="off" />
												</div>

												<div class="ace-ppc-form-field-elem ace-ppc-form-select-elem">
													<div><span class='numberAgent_error ace-ppc-form-error' style='display: none;'>Please select number of users.</span></div>    
													<select class="ace-ppc-form-field tfn-field-agents" id="selectNumberUsers" name="selectNumberUsers">
														<option value="0" selected="selected" disabled="disabled">Number of users</option>
														<option value="1-3">1 - 3</option>
														<option value="4-9">4 - 9</option>
														<option value="10-19">10 - 19</option>
														<option value="20-49">20 - 49</option>
														<option value="50-99">50 - 99</option>
														<option value="100+">100+</option>
													</select>
												</div>

												<div class="ace-ppc-form-field-elem ace-ppc-form-no-icon-field">
													<textarea rows="4" id="message" class="ace-ppc-form-field ace-field-message" name="message" placeholder="How can we help you?" autocomplete="off"></textarea>
												</div>

												<div class="ace-tfn-bann-form-actions">
													<!-- <input type="button" class="ace-btn-second-outline-alt w-100 ace-tfn-bann-form-btn" value="Start my free trial"> -->

													<button type="button" class="ace-btn-second-outline-alt ace-btn-tsot-ani w-100 arrow-cta ace-tfn-bann-form-btn" id="aceFoneFormMobileThree">
														<span class="ace-btn-tsot-elem">
															<span class="ace-btn-tsot-item ace-btn-tsot1">
																<span class="ace-btn-tsot">Get My Offer</span>
																<span class="ace-btn-tsot-icon"><img src="assets/img/icons/arrow.png" alt="" /></span>
															</span>
															<!-- <span class="ace-btn-tsot-item ace-btn-tsot2">
																<span class="ace-btn-tsot">S</span><span class="ace-btn-tsot">t</span><span class="ace-btn-tsot">a</span><span class="ace-btn-tsot">r</span><span class="ace-btn-tsot">t</span> <span class="ace-btn-tsot">m</span><span class="ace-btn-tsot">y</span> <span class="ace-btn-tsot">f</span><span class="ace-btn-tsot">r</span><span class="ace-btn-tsot">e</span><span class="ace-btn-tsot">e</span> <span class="ace-btn-tsot">t</span><span class="ace-btn-tsot">r</span><span class="ace-btn-tsot">i</span><span class="ace-btn-tsot">a</span><span class="ace-btn-tsot">l</span>
																<span class="ace-btn-tsot-icon"><img src="assets/img/icons/arrow.png" alt="" /></span>
															</span> -->
														</span>
													</button>
												</div>
																	
											</form>
										</div>
										<div class="formPrivacyPolice-line">
											<p>By submitting this form, you agree to CallCenterHosting <br class="hide-xs" /><a href="https://www.callcenterhosting.com/privacy-policy/" target="_blank">privacy policy</a> and <a href="https://www.callcenterhosting.com/terms-of-service/">T&C</a>.</p>
										</div>
									</div>

								</div>
								<div class="col-lg-12">
									<div class="ace-tfn-bann-award-mob"></div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ace-sec-lg ace-ppc-foot-client-sec xs-pb-0">
					<div class="ace-ppc-foot-client-elem">
						<div class="container">
							<div class="row">
								<div class="col-xl-12">
									<div class="ace-ppc-foot-client-cont text-center">
										<h2 class="ace-head-minor ace-client-title mb-3">Trusted by 10,000+ brands <br class="visi-xs" />across the nation</h2>
										<ul class="list-unstyled ace-ppc-foot-client-anim">
											<li><img src="assets/img/clients/nec.png" alt="" class="img-fluid" /></li>
											<li><img src="assets/img/clients/sap.png" alt="" class="img-fluid" /></li>
											<li><img src="assets/img/clients/honda.png" alt="" class="img-fluid" /></li>
											<li><img src="assets/img/clients/michelin.png" alt="" class="img-fluid" /></li>
											<li><img src="assets/img/clients/bcg.png" alt="" class="img-fluid" /></li>
											<li><img src="assets/img/clients/uber.png" alt="" class="img-fluid" /></li>
											<li><img src="assets/img/clients/makemytrip.png" alt="" class="img-fluid" /></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ace-sec-xl ace-tfn-intro-sec xs-pb-0">
					<div class="ace-tfn-intro-elem">
						<div class="container">
							<div class="row">
								<div class="col-xl-12 mx-auto">
									<div class="ace-tfn-ftr-head-elem text-center">
										<h2 class="ace-head-lg fw-semi-bold pb-lg-4">Auto Dialer software</h2>
									</div>
									<div class="row">
										<div class="col-lg-6 align-self-center ace-tfn-intro-col">
											<div class="ace-tfn-intro-cont ace-tfn-intro-cont-spc-init">
												<div class="ace-tfn-intro-cont-elem comeAboard">
													<h2 class="ace-head-lg ace-tfn-intro-cont-head txt-prim ff-pops fw-semi-bold">Your Agents’ new best friend </h2>
                                                    
													<p>Auto dialers help your agents focus on having quality interactions with leads and bring in higher business revenue. They ramp-up your customer outreach campaigns by skipping manual dialing. Agents instead need only configure a predetermined list of prospects and begin making simultaneous calls. </p>
													<p>Our intuitive filters help your agents skip any irrelevant calls like junk, spam, unavailable, and auto-answering calls. With multiple dialers like preview, progressive and power, you can plan prospect engagement as you see fit. </p>
													 
												</div>
											</div>
										</div>
										<div class="col-lg-6 ace-tfn-intro-col">
											<div class="ace-tfn-intro-cont-img">
												<img src="assets/img/elevate-your-business.png" class="img-fluid" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ace-sec ace-tfn-adv-sec xs-pb-0">
					<div class="ace-tfn-adv-elem">
						<div class="container">
							<div class="row">
								<div class="col-xl-12 mx-auto">
									<div class="ace-tfn-adv-head-elem">
										<h2 class="ace-head-lg fw-semi-bold txt-prim text-center">Experience Smoother Campaign Management </h2>
									</div>
									<div class="row">
										<div class="col-lg-3">
											<div class="ace-tfn-adv-item">
												<div class="ace-tfn-adv-img">
													<img src="assets/img/use-cases/sales-order-hotline.svg" class="img-fluid">
												</div>
												<div class="ace-tfn-adv-cont">
													<h4 class="ace-summ fw-semi-bold txt-prim">Blended Campaign View </h4>
													<p>View inbound and outbound calls simultaneously in one pane. </p>
												</div>
											</div>
										</div>

										<div class="col-lg-3">
											<div class="ace-tfn-adv-item">
												<div class="ace-tfn-adv-img">
													<img src="assets/img/use-cases/customer-support.svg" class="img-fluid">
												</div>
												<div class="ace-tfn-adv-cont">
													<h4 class="ace-summ fw-semi-bold txt-prim">Increased Customization </h4>
													<p>Seamless integrations giving every interaction a personal touch.</p>
												</div>
											</div>
										</div>

										<div class="col-lg-3">
											<div class="ace-tfn-adv-item">
												<div class="ace-tfn-adv-img">
													<img src="assets/img/use-cases/marketing-reach.svg" class="img-fluid">
												</div>
												<div class="ace-tfn-adv-cont">
													<h4 class="ace-summ fw-semi-bold txt-prim">Unrestricted User Management </h4>
													<p>Edit user roles and extensions as per your business requirement.</p>
												</div>
											</div>
										</div>

										<div class="col-lg-3">
											<div class="ace-tfn-adv-item xs-mb-0">
												<div class="ace-tfn-adv-img">
													<img src="assets/img/use-cases/order-assistance.svg" class="img-fluid">
												</div>
												<div class="ace-tfn-adv-cont">
													<h4 class="ace-summ fw-semi-bold txt-prim">Video Contact Center </h4>
													<p>Connect with clients over video conferencing for specific use cases. </p>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ace-sec-xl ace-tfn-sm-cta-sec">
					<div class="ace-tfn-sm-cta-elem">
						<div class="container">
							<div class="ace-tfn-sm-cta">
								<div class="ace-tfn-sm-cta-cont">
									<h4 class="ace-head-minor txt-prim"><img src="assets/img/sm-cta.svg" class="img-fluid" /> Wish to know more about auto <strong>dialer software?</strong> </h4>
								</div>
								<div class="ace-tfn-sm-cta-action">
									<span class="ace-tfn-sm-cta-action-img"><img src="assets/img/cta-agents.png" class="img-fluid" /></span>
									<a class="txt-orange fw-semi-bold" href="javascript:void(0);" onclick="openChatAgent();">Chat with an expert <img src="assets/img/icons/arrow.png" class="ace-tfn-sm-cta-action-icon img-fluid" alt="" /></a>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ace-sec-xl ace-tfn-intro-sec bg-color xs-pb-0">
					<div class="ace-tfn-intro-elem">
						<div class="container">
							<div class="row">
								<div class="col-xl-12 mx-auto">
									<div class="ace-tfn-ftr-head-elem text-center">
										<h2 class="ace-head-lg fw-semi-bold pb-lg-4">Why get an Automated Dialer</h2>
									</div>
									<div class="row">
										<div class="col-lg-6 align-self-center ace-tfn-intro-col">
											<div class="ace-tfn-intro-cont ace-tfn-intro-cont-spc-init">
												<div class="ace-tfn-intro-cont-elem comeAboard">
													<h2 class="ace-head-sm fw-semi-bold ace-tfn-intro-cont-head txt-prim ff-pops">Quicker lead management</h2>
													<p>Manage larger chunks of leads data through instant integrations. Pool in leads data from multiple campaigns into one place for faster accessibility and prevent data loss. </p>
												</div>
											</div>
										</div>
										<div class="col-lg-6 ace-tfn-intro-col">
											<div class="ace-tfn-intro-cont-img">
												<img src="assets/img/global-connectivity.png" class="img-fluid" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ace-sec-xl ace-tfn-intro-sec bg-color xs-pb-0">
					<div class="ace-tfn-intro-elem">
						<div class="container">
							<div class="row">
								<div class="col-xl-12 mx-auto">
									<div class="row">
										<div class="col-lg-6 order-lg-0 order-1 ace-tfn-intro-col">
											<div class="ace-tfn-intro-cont-img">
												<img src="assets/img/enhanced-customer-experience.png" class="img-fluid" />
											</div>
										</div>
										<div class="col-lg-6 align-self-center ace-tfn-intro-col">
											<div class="ace-tfn-intro-cont ace-tfn-intro-cont-spc-init">
												<div class="ace-tfn-intro-cont-elem comeAboard">
													<h2 class="ace-head-sm fw-semi-bold ace-tfn-intro-cont-head txt-prim ff-pops">Greater Savings with Flexible Pricing</h2>
													<p>Pay as you go plans to offer maximum flexibility and minimize unwanted expenses during any change in your business dynamics. Add-on service charges exclusively. </p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ace-ppc-foot-cta-sec">
					<div class="ace-ppc-foot-cta-elem">
						<div class="container">
							<div class="ace-ppc-foot-cta-cont">
								<div class="ace-ppc-foot-cta-cont-elem">
									<!-- <h2 class="ace-head-lg fw-semi-bold txt-wht ace-ppc-blu-cta-head ff-pops">Get 15% off</h2> -->
									<h4 class="ace-head-sm txt-wht ff-pops fw-400">Automated Calling Solution at exclusive rates</h4>
								</div>
								<div class="ace-ppc-foot-cta-btn text-center">
									<a class="ace-btn-outline-alt mt-0 ace-btn-tsot-ani arrow-cta toTop" href="javascript:void(0);">
										<span class="ace-btn-tsot-elem">
											<span class="ace-btn-tsot-item ace-btn-tsot1">
												<span class="ace-btn-tsot">Get My Offer</span>
												<span class="ace-btn-tsot-icon"><img src="assets/img/icons/arrow.png" alt="" /></span>
											</span>
											<!-- <span class="ace-btn-tsot-item ace-btn-tsot2">
												<span class="ace-btn-tsot">S</span><span class="ace-btn-tsot">t</span><span class="ace-btn-tsot">a</span><span class="ace-btn-tsot">r</span><span class="ace-btn-tsot">t</span> <span class="ace-btn-tsot">m</span><span class="ace-btn-tsot">y</span> <span class="ace-btn-tsot">f</span><span class="ace-btn-tsot">r</span><span class="ace-btn-tsot">e</span><span class="ace-btn-tsot">e</span> <span class="ace-btn-tsot">t</span><span class="ace-btn-tsot">r</span><span class="ace-btn-tsot">i</span><span class="ace-btn-tsot">a</span><span class="ace-btn-tsot">l</span>
												<span class="ace-btn-tsot-icon"><img src="assets/img/icons/arrow.png" alt="" /></span>
											</span> -->
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ace-sec-lg ace-tfn-integ-sec">
                    <div class="ace-integ-elem">
                        <div class="container-fluid">
                            <div class="ace-integ-head-elem text-center mb-4 mb-lg-5">
								<p class="ace-summ fw-semi-bold txt-blue text-uppercase">Integrations</p>
                                <h2 class="ace-head-lg fw-semi-bold txt-prim">Time-saving Call Center Dialer Integrations</h2>
                                <p>Get industry leading CRM platforms with seamless integrations</p>
                            </div>

                            <div class="row">
                                <div class="ace-integ-col ace-integ-blank hide-xs">
                                    <div class="ace-integ-item"></div>
                                </div>
                                
                                <div class="ace-integ-col ace-integ-blank hide-xs">
                                    <div class="ace-integ-item"></div>
                                </div>

								<div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/google.png" alt="google" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Google</p>
										</div>
									</div>
                                </div>

								<div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/freshsales.png" alt="freshsales" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Freshsales</p>
										</div>
									</div>
                                </div>

                                <div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/zendesk.png" alt="zendesk" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Zendesk</p>
										</div>
									</div>
                                </div>

								<div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/freshworks.png" alt="freshworks" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Freshworks</p>
										</div>
									</div>
                                </div>

								<div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/salesforce.png" alt="salesforce" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Salesforce</p>
										</div>
									</div>
                                </div>

								<div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/leadsquared.png" alt="leadsquared" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Leadsquared CRM</p>
										</div>
									</div>
                                </div>

								<div class="ace-integ-col ace-integ-blank hide-xs">
                                    <div class="ace-integ-item"></div>
                                </div>

                                <div class="ace-integ-col ace-integ-blank hide-xs">
                                    <div class="ace-integ-item"></div>
                                </div>

								<div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/bitrix.png" alt="bitrix" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Bitrix24</p>
										</div>
									</div>
                                </div>

                                <div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/zoho.png" alt="zoho" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Zoho CRM</p>
										</div>
									</div>
                                </div>

                                <div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/hubspot.png" alt="hubspot" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>HubSpot CRM</p>
										</div>
									</div>
                                </div>

								<div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/contacts.png" alt="contacts" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Google Contactc</p>
										</div>
									</div>
                                </div>

                                <div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/msteams.png" alt="msteams" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Microsoft Teams</p>
										</div>
									</div>
                                </div>

                                <div class="ace-integ-col">
									<div class="ace-integ-item">
										<div class="ace-integ-img">
											<img src="assets/img/integrations/msazure.png" alt="msazure" class="img-fluid" />
										</div>
										<div class="ace-integ-cont">
											<p>Microsoft Azure</p>
										</div>
									</div>
                                </div>

                                
                                <div class="ace-integ-col ace-integ-blank hide-xs">
                                    <div class="ace-integ-item"></div>
                                </div>

                                <div class="ace-integ-col ace-integ-blank hide-xs">
                                    <div class="ace-integ-item"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

				<section class="ace-sec-lg ace-tfn-rate-sec">
					<div class="ace-tfn-rate-elem">
						<div class="container">
							<div class="ace-tfn-rate-head-elem">
								<h2 class="ace-head-lg fw-semi-bold txt-prim text-center">What our clients say about us</h2>
							</div>
							<div class="ace-tfn-rate-testi-part">
								<div class="homeReviewSlider swiper">
									<div class="swiper-wrapper">
										<div class="swiper-slide">
											<div class="testimonial-item">
												<div class="testimonial-head">
													<!-- <h4 class="ace-summ fw-semi-bold txt-prim">Arshad Zaidi</h4> -->
													<!-- <p class="txt-para small">Asst. Manager, OLA</p> -->
												</div>
												<div class="testimonial-body">
													<p>CallCenterHosting powered our voice broadcasting campaign and they were thoroughly impressive. Delivered us quality solutions, well in time. I am sure we have found a long-term partner in CallCenterHosting.</p>
												</div>
												<div class="testimonial-bottom">
													<div class="clientLogo"><img src="assets/img/testimonials/ola-logo.webp" /></div>
													<div class="testimonial-user">
														<h4 class="ace-summ fw-semi-bold txt-prim">Arshad Zaidi</h4>
														<p class="txt-para small">Asst. Manager, OLA</p>
													</div>
												</div>
											</div>
										</div>

										<div class="swiper-slide">
											<div class="testimonial-item">
												<div class="testimonial-head">
													<!-- <h4 class="ace-summ fw-semi-bold txt-prim">Piyush Chabbra</h4> -->
													<!-- <p class="txt-para small">Business Owner, ACN</p> -->
												</div>
												<div class="testimonial-body">
													<p>CallCenterHosting helps us survive an increasing call volume. Their call tracking & call automation tech has made real-time follow-ups extremely easy, which used to be a prime challenge for us. The order retention rate we are witnessing is higher than our expectations.</p>
												</div>
												<div class="testimonial-bottom">
													<div class="clientLogo"><img src="assets/img/testimonials/meaame-logo.webp" /></div>
													<div class="testimonial-user">
														<h4 class="ace-summ fw-semi-bold txt-prim">Piyush Chabbra</h4>
														<p class="txt-para small">Business Owner, ACN</p>
													</div>
												</div>
											</div>
										</div>

										<div class="swiper-slide">
											<div class="testimonial-item">
												<div class="testimonial-head">
													<!-- <h4 class="ace-summ fw-semi-bold txt-prim">Jatin Gupta</h4> -->
													<!-- <p class="txt-para small">Proprietor</p> -->
												</div>
												<div class="testimonial-body">
													<p>Very first business principle is 'never miss an opportunity'. CallCenterHosting is an absolutely perfect solution to follow that principle - at least for the opportunity that comes over phone calls. Its Toll-Free number and IVR service has delivered some amazing results for me.</p>
												</div>
												<div class="testimonial-bottom">
													<div class="clientLogo"><img src="assets/img/testimonials/feather-logo.webp" /></div>
													<div class="testimonial-user">
														<h4 class="ace-summ fw-semi-bold txt-prim">Jatin Gupta</h4>
														<p class="txt-para small">Proprietor</p>
													</div>
												</div>
											</div>
										</div>

										<div class="swiper-slide">
											<div class="testimonial-item">
												<div class="testimonial-head">
													<!-- <h4 class="ace-summ fw-semi-bold txt-prim">Varsha Bansal</h4> -->
													<!-- <p class="txt-para small">Marketing Manager</p> -->
												</div>
												<div class="testimonial-body">
													<p>I have always had positive experience working with CallCenterHosting! CallCenterHosting has always provided positive recommendations and the best price for the services. I'm especially impressed with the support provided after sales. I would highly recommend CallCenterHosting as your cloud telephony service providers.</p>
												</div>
												<div class="testimonial-bottom">
													<div class="clientLogo sliderTestimonialImage"><img src="assets/img/testimonials/vivaan-logo.webp" /></div>
													<div class="testimonial-user">
														<h4 class="ace-summ fw-semi-bold txt-prim">Varsha Bansal</h4>
														<p class="txt-para small">Marketing Manager</p>
													</div>
												</div>
											</div>
										</div>

										<div class="swiper-slide">
											<div class="testimonial-item">
												<div class="testimonial-head">
													<!-- <h4 class="ace-summ fw-semi-bold txt-prim">Nikhil Thapar</h4> -->
													<!-- <p class="txt-para small">Marketing Specialist</p> -->
												</div>
												<div class="testimonial-body">
													<p>The quality of IVR services offered by CallCenterHosting has been fantastic, their quick support and after sales has proved to be highly beneficial. I wish all the success to CallCenterHosting and I'm sure we have found a long term partner in CallCenterHosting! </p>
												</div>
												<div class="testimonial-bottom">
													<div class="clientLogo sliderTestimonialImage"><img src="assets/img/testimonials/sap-logo.webp" /></div>
													<div class="testimonial-user">
														<h4 class="ace-summ fw-semi-bold txt-prim">Nikhil Thapar</h4>
														<p class="txt-para small">Marketing Specialist</p>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="testimonial-swiper-control">
										<div class="swiper-button-prev"></div>
										<div class="swiper-pagination"></div>
										<div class="swiper-button-next"></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section>

				<section class="ace-sec-lg ace-tfn-awards-sec">
					<div class="ace-tfn-awards-elem">
						<div class="container">
							<div class="row">
								<div class="col-lg-12 mx-auto">
									<div class="row">
										<div class="col-10 col-lg-4 align-self-center mx-auto">
											<div class="ace-tfn-awards-head-elem">
												<div class="row">
													<div class="col-auto align-self-center">
														<div>
															<img src="assets/img/awards/awards-icon.svg" class="img-fluid" />
														</div>
													</div>
													<div class="col align-self-center">
														<div>
															<span class="ace-head-xl fw-bold txt-prim d-block lh-1">Awards</span>
															<span class="ace-head-sm fw-bold txt-prim d-block">&amp; Recognition</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-11 col-lg-8 mx-auto">
											<div class="ace-tfn-awards">
												<div class="row">
													<div class="col-6 col-lg-3 align-self-center">
														<div class="ace-tfn-awards-item">
															<img src="assets/img/awards/great-user-experience-2023.png" class="img-fluid" />
														</div>
													</div>
													<div class="col-6 col-lg-3 align-self-center">
														<div class="ace-tfn-awards-item">
															<img src="assets/img/awards/top-rated-software.png" class="img-fluid" />
														</div>
													</div>
													<div class="col-6 col-lg-3 align-self-center">
														<div class="ace-tfn-awards-item">
															<img src="assets/img/awards/best-customer-support-2022.png" class="img-fluid" />
														</div>
													</div>
													<div class="col-6 col-lg-3 align-self-center">
														<div class="ace-tfn-awards-item">
															<img src="assets/img/awards/capterra-shortlist-2022.png" class="img-fluid" />
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
				</section>

				<section class="ace-sec-xl ace-tfn-indus-sec">
					<div class="ace-tfn-indus-elem">
						<div class="container">
							<div class="ace-tfn-indus-head-elem">
								<h2 class="ace-head-lg fw-semi-bold txt-prim text-center">Frequently asked questions</h2>
								<p class="ace-summ small text-center">These are the commonly asked questions about Ratio dialer and Auto dialer. <br/>can’t find what you’re looking for? <br class="visi-xs" /><a class="txt-orange fw-semi-bold" href="javascript:void(0);" onclick="openChatAgent();">Chat to our friendly team!</a> </p>
							</div>

							<div class="ace-tfn-faqs-parent">
								<div class="ace-tfn-faqs">
									
									<div class="ace-tfn-faqs-elem">
										<button id="aceFAQ1" aria-expanded="false">
											<span class="ace-tfn-faqs-elem-head">Can CallCenterHosting dialer make scheduled calls automatically?</span>
											<span class="ace-tfn-faqs-elem-icon" aria-hidden="true"></span>
										</button>
										<div class="ace-tfn-faqs-elem-cont">
											<p>Yes, if there is any scheduled call for an agent, the call gets automatically dialed at the defined time without any manual intervention.</p>
										</div>
									</div>

									<div class="ace-tfn-faqs-elem">
										<button id="aceFAQ2" aria-expanded="false">
											<span class="ace-tfn-faqs-elem-head">Can you integrate dialers with CRM platforms/ applications/ helpdesk?</span>
											<span class="ace-tfn-faqs-elem-icon" aria-hidden="true"></span>
										</button>
										<div class="ace-tfn-faqs-elem-cont">
											<p>Yes, CallCenterHosting business phone dialer is compatible with 20+ CRM integrations.</p>
										</div>
									</div>

									<div class="ace-tfn-faqs-elem">
										<button id="aceFAQ3" aria-expanded="false">
											<span class="ace-tfn-faqs-elem-head">Do CallCenterHosting dialers support APIs? </span>
											<span class="ace-tfn-faqs-elem-icon" aria-hidden="true"></span>
										</button>
										<div class="ace-tfn-faqs-elem-cont">
											<p>Yes, CallCenterHosting auto dialers support APIs, giving you the power of customization and faster operations for each industry type</p>
										</div>
									</div>

									<div class="ace-tfn-faqs-elem">
										<button id="aceFAQ4" aria-expanded="false">
											<span class="ace-tfn-faqs-elem-head">Can we automatically fetch data from the CRM instead of manual uploading?</span>
											<span class="ace-tfn-faqs-elem-icon" aria-hidden="true"></span>
										</button>
										<div class="ace-tfn-faqs-elem-cont">
											<p>Yes, once auto dialers integrate with a CRM platform, identified users can access the customer data from the portal.</p>
										</div>
									</div>

									<div class="ace-tfn-faqs-elem">
										<button id="aceFAQ5" aria-expanded="false">
											<span class="ace-tfn-faqs-elem-head">How to get a free demo for CallCenterHosting dialer solution?</span>
											<span class="ace-tfn-faqs-elem-icon" aria-hidden="true"></span>
										</button>
										<div class="ace-tfn-faqs-elem-cont">
											<p>Visit CallCenterHosting and click on “Get demo” and submit your details. Our team will reach out to you ASAP.</p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</section>

				<div class="ace-ppc-foot-parent">

					<section class="ace-ppc-blue-cta-sec bg-dark-colo">
						<div class="ace-ppc-blu-cta-elem">
							<div class="container">
								<div class="row">
									<div class="col-lg-9 mx-auto">
										<div class="ace-ppc-blu-cta-cont">
											<div class="ace-ppc-blu-cta-cont-elem comeAboard">
												<h2 class="ace-head-xl fw-semi-bold xt-wht ace-ppc-blu-cta-head mb-4">Need we say more?</h2>
												<ul class="xt-wht list-unstyled ace-summ">
													<li>Instant setup</li>
													<li>Real-time reporting</li>
													<li>CRM integrations</li>
													<li>Cloud telephony suite</li>
													<li>99.95% uptime</li>
													<li>Market-friendly pricing</li>
												</ul>
											</div>
											<div class="ace-ppc-blu-cta-btn">
												<a class="ace-btn-second-outline-alt ace-btn-tsot-ani arrow-cta toTop servetel_web_click" href="javascript:void(0);">
													<span class="ace-btn-tsot-elem">
														<span class="ace-btn-tsot-item ace-btn-tsot1">
															<span class="ace-btn-tsot">Book My Call</span>
															<span class="ace-btn-tsot-icon"><img src="assets/img/icons/arrow.png" alt="" /></span>
														</span>
														<!-- <span class="ace-btn-tsot-item ace-btn-tsot2">
															<span class="ace-btn-tsot">G</span><span class="ace-btn-tsot">e</span><span class="ace-btn-tsot">t</span> <span class="ace-btn-tsot">a</span> <span class="ace-btn-tsot">d</span><span class="ace-btn-tsot">e</span><span class="ace-btn-tsot">m</span><span class="ace-btn-tsot">o</span> <span class="ace-btn-tsot">t</span><span class="ace-btn-tsot">o</span><span class="ace-btn-tsot">d</span><span class="ace-btn-tsot">a</span><span class="ace-btn-tsot">y</span>
															<span class="ace-btn-tsot-icon"><img src="assets/img/icons/arrow.png" alt="" /></span>
														</span> -->
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>

					<!-- Footer -->
					<footer class="ace-sec ace-footer ace-drker-ele">
						<div class="ace-foot-copy-imgs"></div>
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="ace-foot-copy-elem text-center">
										<p class="txt-prim mb-0 fw-400 small">&copy; <?php echo date("Y"); ?> CallCenterHosting - All rights reserved | <a href="https://www.callcenterhosting.com/privacy-policy/" target="_blank" style="color: #000;">Privacy Policy</a></p>
									</div>
								</div>
							</div>
						</div>
					</footer>
                    
                    <!-- cookie policy popup -->
                    
                    <style type="text/css">
                        .cookieAcceptPopUp{ background-color: #FFF; padding: 20px 15px 20px 20px; border-radius: 10px; position: fixed; left: 10px; bottom: 60px; width: 300px; border: 1px solid #efefef; box-shadow: 0px 10px 10px rgba(0,0,0,0.15); display: none; z-index: 1;  }
                        
                        .cookieAcceptPopUp-para p{ font-size: 14px; line-height: 24px; color: rgba(0,0,0,0.8);  }
                        
                        .cookieAcceptPopUp-links{ display: flex; column-gap: 1.5rem; }
                        
                        .cookieAcceptPopUp-links a{ font-size: 14px; color: #000; text-transform: uppercase; }
                        
                        .cookieAcceptPopUp-links a:last-child{ color: #de750b; font-weight: bold; }
                        
                    </style>
                    
                    <div class="cookieAcceptPopUp" id="cookieAcceptPopUp">
                        <div class="cookieAcceptPopUp-para">
                            <p>We use cookies to provide and improve our services. By using our site, you consent to cookies. Know more about Cookie Policy</p>
                        </div>
                        <div class="cookieAcceptPopUp-links">
                            <a href="https://www.callcenterhosting.com/cookie-policy/" target="_blank">Know More</a>
                            <a href="javascript:void(0);" onclick="acceptCookiePolicy();">Accept</a>
                        </div>
                    </div>
                    
                    <!-- cookie policy popup -->

				</div>

			</div>

		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/js/intlTelInput.min.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>
		
        <script type="text/javascript">
            
          

        function SetCookie(c_name,value,expiredays)
        {
        var exdate=new Date()
            exdate.setDate(exdate.getDate()+expiredays)
            document.cookie=c_name+ "=" +escape(value)+";path=/"+((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
        }

        function eraseCookieFromAllPaths() {
            var cookies = document.cookie.split("; ");
            for (var c = 0; c < cookies.length; c++) {
                var d = window.location.hostname.split(".");
                while (d.length > 0) {
                    var cookieBase = encodeURIComponent(cookies[c].split(";")[0].split("=")[0]) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join('.') + ' ;path=';
                    var p = location.pathname.split('/');
                    document.cookie = cookieBase + '/';
                    while (p.length > 0) {
                        document.cookie = cookieBase + p.join('/');
                        p.pop();
                    };
                    d.shift();
                }
            }

        }
        var delete_cookie = function(name) {
            document.cookie = name + '=; Path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        };
        </script>
        
        
        <script type="text/javascript">
        
            function acceptCookiePolicy(){
                SetCookie('acceptcookie','acceptcookie',365*10)
                  jQuery("#cookieAcceptPopUp").hide("slow");
                 
            }
            
            
            if( document.cookie.indexOf("acceptcookie") ===-1 ){
              
                   setTimeout(function(){

                     jQuery("#cookieAcceptPopUp").show();    

                    }, 2000);

            }else{
                jQuery("#cookieAcceptPopUp").hide();
                
            }
        
        </script>
<!--
		<script type="text/javascript">
		    setTimeout(function(){
		        var head = document.getElementsByTagName('head')[0];
		        var script = document.createElement('script');
		        // script.type = 'text/javascript';
		        script.defer = true;
		        script.src = "https://www.google.com/recaptcha/api.js?render=6LfD0n0lAAAAAFooQ-7Wjpdk1AhqZ37TfyN3wz1t";
		        head.appendChild(script);
		        script.onload = function() {
		            grecaptcha.ready(function() {
		                grecaptcha.execute('6LfD0n0lAAAAAFooQ-7Wjpdk1AhqZ37TfyN3wz1t', {action:'submit'})
		                      .then(function(token) {
		                    // add token value to form
		                    document.getElementById('g-recaptcha-response-one').value = token;
		                });
		            });
		        }
		    }, 5000);
		</script>
-->

		<!-- <script>
			function countryCode(){
				const userPhnNum = document.querySelector("#telThree");
				if(userPhnNum != null)
				phnInp = window.intlTelInput(userPhnNum, {
				initialCountry: "us",
				// geoIpLookup: getIp,
				preferredCountries: ["gb", "ca"],
				utilsScript:
				"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/utils.min.js",
				});
			}
				
			jQuery(window).on('load', function() {
				countryCode();
			});
			
		</script> -->

		<script type="text/javascript">
		    function countryCode() {
		        const userPhnNum = document.querySelector('.userPhnNum');
		        if (userPhnNum != null)
		            phnInp = window.intlTelInput(userPhnNum, {
		                 initialCountry: "in",
		                preferredCountries: ["us","gb","in","ca"],
		                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/js/utils.js",
		            });
		    }

		    jQuery(document).ready(function() {
		        countryCode();
		    });

			function isBussEmailChecker(userCurrEmail) {
				return new Promise(function(resolve, reject) {
					jQuery.ajax({
						url: '../assets/includes/busEmlConf.php',
						type: "post",
						data: 'aceBussEmail=' + userCurrEmail,
						cache: false,
						success: function(res) {
							resolve(res);
						},
						error: function(err) {
							reject(err);
						}
					});
				});
			}

		</script>

		<script type="text/javascript" defer>
			function openChatAgent(){
				javascript:$zoho.salesiq.floatwindow.visible('show');
			}
		</script>

		<script>
			jQuery(window).on('load', function() {
				setTimeout(() => {
					/*window._mfq = window._mfq || [];
					(function() {
						var mf = document.createElement("script"); 
						mf.defer = true; 
						mf.src = "//cdn.mouseflow.com/projects/96a6c4a8-9738-4c61-93ae-f1a68b381764.js"; 
						document.getElementsByTagName("head")[0].appendChild(mf); 
					})();*/
					
					var _zpsq = _zpsq || [];
					(function() {
						var zps = document.createElement("script");
						zps.type = "text/javascript"; zps.async = true;
						zps.src = "//cdn-in.pagesense.io/js/realtimedataservicespvtltd/f8ce19f9dbfc42298f4a3fd5b2dd2d76.js";
						document.getElementsByTagName("head")[0].appendChild(zps);
					})();
				}, 3000);
			});
		</script>

		
		<!-- $zoho chat -->
    	<?php include('../assets/includes/zoho-chat-widget.php'); ?>


		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('#aceFoneFormMobileThree').click(function(){

					var submitSelector = $(this);
        			var formSelector = submitSelector.parents('form');

					var formid = "acefoneformThree";
					// var phoneNumberRegex = /^[1-9]\d{15}$/;
					// var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
					var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
					// var compName = jQuery("#compThree").val();
					var name = jQuery("#nameThree").val();
					var email = jQuery("#emailThree").val();
					var phonenumber = jQuery("#telThree").val();
					var numberUser = jQuery('#selectNumberUsers :selected').val();

					/*if (compName == 0) {
						jQuery("#" + formid + " .comp_error").show();
						setTimeout(function () {
							jQuery("#" + formid + " .comp_error").fadeOut();
						}, 5000);
						return;
					}
					else {
						jQuery("#" + formid + " .comp_error").hide();
					}*/
					
					if (name == 0) {
						jQuery("#" + formid + " .name_error").show();
						setTimeout(function () {
							jQuery("#" + formid + " .name_error").fadeOut();
						}, 5000);
						return;
					}
					else {
						jQuery("#" + formid + " .name_error").hide();
					}
					
					if (!phnInp.isValidNumber()) {
						jQuery("#" + formid + " .label_error_pho_name").show();
						setTimeout(function () {
							jQuery("#" + formid + " .label_error_pho_name").fadeOut();
						}, 5000);
						return;
					} else {
						jQuery("#" + formid + " .label_error_pho_name").hide();
					}
					
					if (email == 0 || !emailRegex.test(email)) {
						jQuery("#" + formid + " .email_error").show();
						setTimeout(function () {
							jQuery("#" + formid + " .email_error").fadeOut();
						}, 5000);
						return;
					}
					else {
						isBussEmailChecker(email).then(function(res) {
							var data = jQuery.parseJSON(res);
				            // console.log(data.userValid);
				            // console.log(data);

				            if(!data.confirmStatus){
								jQuery("#" + formid + " .email_error").show();
								setTimeout(function () {
									jQuery("#" + formid + " .email_error").fadeOut();
								}, 5000);
								return;
				            }
				            if(data.confirmStatus){
								jQuery("#" + formid + " .email_error").hide();
								furtherProcess1();
				            }
						}).catch(function(err) {
							// console.log(err);

							jQuery("#" + formid + " .email_error").show();
							setTimeout(function () {
								jQuery("#" + formid + " .email_error").fadeOut();
							}, 5000);
							return;
						});
						// jQuery("#" + formid + " .email_error").hide();
					}

					function furtherProcess1(){
						if(numberUser == 0){
							jQuery("#" + formid + " .numberAgent_error").show();
							setTimeout(function () {
								jQuery("#" + formid + " .numberAgent_error").fadeOut();
							}, 5000);
							return;
						}else{
							jQuery("#" + formid + " .numberAgent_error").hide();
						}
						
						if (name != 0 && email != 0 && phnInp.isValidNumber() && numberUser != 0) {

							jQuery("#telThree").val(phnInp.getNumber(intlTelInputUtils.numberFormat.E164));

							// Passing values for advance tracking
							localStorage.setItem("userEmail",email);
							localStorage.setItem("userPhone",jQuery("#telThree").val());
							
							// var getFlagValue =  jQuery('#telThree').parent('.iti').find('.iti__selected-flag').attr('title');
							// getFlagValue = getFlagValue.split(":");
							// console.log(getFlagValue[1]);
							// var getPhoneNumberVal =  jQuery('#telThree').val(); 
							// getPhoneNumberVal = getFlagValue[1] + ' ' + getPhoneNumberVal; 
							// jQuery('#telThree').val(getPhoneNumberVal); 

							jQuery('#aceFoneFormMobileThree').val('Please wait ...').attr('disabled','disabled');
	                        
	                          
	                        jQuery('#aceFoneFormMobileThree .ace-btn-tsot').html('Please Wait ...');
	                        
							$.ajax({
								url: '../assets/includes/submit.php',
								type: "post",
								data: formSelector.serialize(),
								cache: false,
								//dataType:'json',
								success: function(res){
									// console.log(res);
									window.location.href = "https://www.callcenterhosting.com/thank-you/";    
								}
							});
						}

					}

					
				});
				
			}); 
			
			jQuery(document).ready(function(){
				jQuery("#emailThree").focusout(function(){
					jQuery('#aceFoneFormMobileThree').click();
				});
			});
		</script>

		<script type="text/javascript" src="https://crm.zoho.in/crm/javascript/zcga.js"> </script>

	</body>
</html>