<?php
// Database connection
include 'feedback/feedbackcon.php';

// Function to fetch feedback data
function getFeedback($conn) {
    $sql = "SELECT email, rating, comments FROM feedback ORDER BY id DESC LIMIT 10";
    $result = $conn->query($sql);

    $feedbacks = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $feedbacks[] = $row;
        }
    }
    return $feedbacks;
}

$feedbacks = getFeedback($conn);
?>
<!doctype html>
<class?s="no-js" lang="en">

    <head>
		<style>
		body {
    max-width: 100%;
    overflow-x: hidden;
}
.container {
    width: 100%;
    max-width: 1200px;
    margin: auto;
}
.single-welcome-hero-form input {
    width: 100%;
}

			
.feedback-slider-wrapper {
    overflow: hidden;
    width: 100%;
    position: relative;
    padding: 20px 0;
    white-space: nowrap;
}

.feedback-slider {
    display: flex;
    gap: 20px;
    width: fit-content;
    animation: scroll 30s linear infinite; /* Slowed down to 3 seconds */
}

/* Smooth Scrolling Animation */
@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-100%); } /* Moves full width for continuous scrolling */
}
		</style>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>MSRTC Website For Local Bus (Sakoli Depot)</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/msrtc.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

		<!--flaticon.css-->
        <link rel="stylesheet" href="assets/css/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/slick-theme.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
		<!--live chat-->
		<link rel="stylesheet" href="live.css">
		<script src="live.js" defer></script>
	
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <![endif]-->

    </head>
	<body>
		<!--header-top start -->
		<header id="header-top" class="header-top">
			<ul>
				<li>
					<div class="header-top-left">
						<ul>
							<li class="select-opt">
								<select name="language" id="language">
									<option value="English">EN</option>
									<option value="Hindi">HN</option>
									<option value="Marathi">MA</option>
								</select>
							</li>
							<li class="select-opt">
								<a href="#"><span class="lnr lnr-magnifier"></span></a>
							</li>
						</ul>
					</div>
				</li>
				<li class="head-responsive-right pull-right">
					<div class="header-top-right">
						<ul>
							<li class="header-top-contact">
								9503586995
							</li>
							<li class="header-top-contact">
								<a href="../Signin/login.php">Registration</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
					
		</header><!--/.header-top-->
		<!--header-top end -->

		<!-- top-area Start -->
		<section class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="index.php">MS<span>RTC</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class=" scroll active"><a href="#home">home</a></li>
			                    <li class="scroll"><a href="#about ">about us</a></li>
			                    <li class="scroll"><a href="#contact">contact</a></li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
		<!-- top-area End -->
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
			<class="container">
				<div class="welcome-hero-txt">
					<h2>WELCOME TO MSRTC <br> that all you need </h2>
					<p>
						Find Best Place, to travel
					</p>
				</div>
        <div>
        
	</div>
</clas>/
</section></body></class>

		<!--welcome-hero end -->

		<!--list-topics start -->
		<section id="list-topics" class="list-topics" style="text-align: center;">
			<div class="container">
				<div class="list-topics-content" style="display: flex; justify-content: center; align-items: center; gap: 20px; flex-wrap: wrap;">
					<div class="single-list-topics-content">
						<div class="single-list-topics-icon">
							<a href="https://www.flaticon.com/free-icon/transport_10534946" class="view link-icon-detail" title="Transport">
								<img src="https://cdn-icons-png.flaticon.com/128/10534/10534946.png" loading="lazy" alt="Transport" title="Transport" width="64" height="64">
							</a>
						</div>
						<h2><a href="./schedule/timetable.php">SCHEDULE</a></h2>
					</div>
					
					<div class="single-list-topics-content">
						<div class="single-list-topics-icon">
							<a href="onlineTicket/routes.html" class="view link-icon-detail" title="Bus ticket">
								<img src="https://cdn-icons-png.flaticon.com/128/3644/3644245.png" loading="lazy" alt="Bus ticket" title="Bus ticket" width="64" height="64">
							</a>
						</div>
						<h2><a href="..\onlineTicket\routes.php">Online Booking</a></h2>
					</div>
					
					<div class="single-list-topics-content">
						<div class="single-list-topics-icon">
							<img src="https://cdn-icons-png.flaticon.com/128/10897/10897130.png" loading="lazy" alt="Customer experience" title="Customer experience" width="64" height="64">
						</div>
						<h2><a href="./feedback/Parcel.php">Parcel Service</a></h2>
						<a href="../feedback/Parcel.php"></a>
					</div>

					<div class="single-list-topics-content">
						<div class="single-list-topics-icon">
							<img src="https://cdn-icons-png.flaticon.com/128/10897/10897130.png" loading="lazy" alt="Customer experience" title="Customer experience" width="64" height="64">
						</div>
						<h2><a href="feedback/feedback.php">Feedback</a></h2>
						<a href="C:\xampp\htdocs\php\feedback\feedbackcon.php"></a>
					</div>
				</div>
			</div>
		</section>
		

		</section><!--/.list-topics-->
            <!--list-topics end-->
			<div>
				<!--Start of Tawk.to Script-->
			  <script type="text/javascript">
				var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
				(function(){
				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/67bd57dc574806190e371e75/1iktpue2u';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
				})();
				</script>
				<!--End of Tawk.to Script-->
				
			  </div>
		<!--explore start -->
		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>explore</h2>
					<p>Explore Types Of Buses & their Details </p>
				</div><!--/.section-header-->
				<div class="explore-content">
					<div class="row">
						<div class=" col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/shivshahi.jpeg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">Shivshai</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-1">
									<h2><a href="#">SHIVSHAHI</a></h2>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/shivshahi.jpeg" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													Shivshahi buses are air-conditioned luxury buses operated by the Maharashtra State Road Transport Corporation (MSRTC). </p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='#'">https://msrtc.maharashtra.gov.in</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/bus2.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">Hirkani</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-2">
									<h2><a href="#">Hirkani</a></h2>
									<p class="explore-rating-price">
										
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/bus2.jpg" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													The Hirkani bus is a semi-luxury city bus operated by the Maharashtra State Road Transport Corporation (MSRTC).

                        						</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn open-btn" onclick="window.location.href='#'">https://msrtc.maharashtra.gov.in</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/bus3.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">Vithai</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-3">
									<h2><a href="#">Vithai</a></h2>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/bus3.jpg" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													Vithai Travels has a good frequency of buses that run all throughout the day promoting safety and comfort of passengers.
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='#'">"https://msrtc.maharashtra.gov.in"</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class=" col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/bus4.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">Manav vikas</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-4">
									<h2><a href="#">Red Bus</a></h2>
									
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/bus4.jpg" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													RedBus is an online platform that allows users to book bus tickets for the Maharashtra State Road Transport Corporation (MSRTC).
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='#'">https://msrtc.maharashtra.gov.in</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/bus5.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">Manav Vikas</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-2">
									<h2><a href="#">Manav Vikas
									</a></h2>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/bus5.jpg" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10"
												<p>
													The Manav Vikas Mission (MVM) is a scheme in Maharashtra, India that provides free bus transportation for girls to and from school
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn open-btn" onclick="window.location.href='#'">https://msrtc.maharashtra.gov.in</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="assets/images/explore/bus6.jpg" alt="explore image">
									<div class="single-explore-img-info">
										<button onclick="window.location.href='#'">semi-luxury</button>
										<div class="single-explore-image-icon-box">
											<ul>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-arrows-alt"></i>
													</div>
												</li>
												<li>
													<div class="single-explore-image-icon">
														<i class="fa fa-bookmark-o"></i>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="single-explore-txt bg-theme-5">
									<h2><a href="#">semi-luxury ST bus</a></h2>
									
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="assets/images/explore/bus6.jpg" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
												<p>
													This appears to be a Maharashtra State Road Transport Corporation (MSRTC) bus, as indicated by its logo and color scheme. 
												</p>
											</div>
										</div>
									</div>
									<div class="explore-open-close-part">
										<div class="row">
											<div class="col-sm-5">
												<button class="close-btn" onclick="window.location.href='#'">https://msrtc.maharashtra.gov.in</button>
											</div>
											<div class="col-sm-7">
												<div class="explore-map-icon">
													<a href="#"><i data-feather="map-pin"></i></a>
													<a href="#"><i data-feather="upload"></i></a>
													<a href="#"><i data-feather="heart"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->
			<section id="customer-reviews">
    <div class="container">
        <h2>Customer Reviews</h2>
        <div class="feedback-slider-wrapper">
            <div class="feedback-slider">
                <?php foreach ($feedbacks as $feedback) { ?>
                    <div class="feedback-box">
                        <h4><?php echo htmlspecialchars($feedback['email']); ?></h4>
                        <p><strong>Rating:</strong> <?php echo htmlspecialchars($feedback['rating']); ?></p>
                        <p><?php echo htmlspecialchars($feedback['comments']); ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

		<!--subscription strat -->
		<section id="contact"  class="subscription">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						do you want to add your business listing with us?
					</h2>
					<p>
						Listrace offer you to list your business with us and we very much able to promote your Business.
					</p>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="subscription-input-group">
							<form action="#">
								<input type="email" class="subscription-input-form" placeholder="Enter your email here">
								<button class="appsLand-btn subscribe-btn" onclick="window.location.href='#'">
									creat account
								</button>
							</form>
						</div>
					</div>	
				</div>
			</div>

		</section><!--/subscription-->	
		<!--subscription end -->

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           		 <div class="navbar-header">
				                <a class="navbar-brand" href="index.php">MS<span>RTC</span></a>
				            </div><!--/.navbar-header-->
			           	</div>
			           	<div class="col-sm-9">
			           		<ul class="footer-menu-item">
			                    <li class="scroll"><a href="#explore">explore</a></li>
			                    <li class="scroll"><a href="#reviews">review</a></li>
			                    <li class="scroll"><a href="#contact">contact</a></li>
			                    <li class=" scroll"><a href="#contact">my account</a></li>
			                </ul><!--/.nav -->
			           	</div>
		           </div>
				</div>
				<div class="hm-footer-copyright">
					<div class="row">
						<div class="col-sm-5">
							<p>
								&copy;copyright. Mrunali Raut <a href="https://www.themesine.com/"></a>
							</p><!--/p-->
						</div>
						<div class="col-sm-7">
							<div class="footer-social">
								<span><i class="fa fa-phone"> 9503586995</i></span>
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div>
					
				</div><!--/.hm-footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		<script>
    document.addEventListener("DOMContentLoaded", function () {
        const slider = document.querySelector('.feedback-slider');
        if (slider) {
            slider.innerHTML += slider.innerHTML; // Duplicate items for smooth infinite scroll
        }
    });
</script>

		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

        <!--feather.min.js-->
        <script  src="assets/js/feather.min.js"></script>

        <!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>

        <!--slick.min.js-->
        <script src="assets/js/slick.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		     
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>


		
        
    </body>
	
</html>


