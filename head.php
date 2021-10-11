<?php
ob_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once 'cauhinh.php';
include_once 'config.php';
include_once 'set.php';
?>
<!doctype html>
<html lang="en">

<head>
	<meta property='og:image' content='/img/logo.png' />
	<meta property="og:image:width" content="250" />
	<meta property="og:image:height" content="250" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="csrf-token" content="Bnokvfoe0nRbXdt0IxpeOTLdt4KafTn2kVI3yayo">
	<title><?php echo $_title; ?></title>
	<link rel="shortcut icon" href='http://27.0.14.78/dl/image/iconninja32.png' type="image/x-icon" />

	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
	<link href="assets/frontend/theme/assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN: BASE PLUGINS  -->
	<link href="assets/frontend/theme/assets/global/plugins/magnific/magnific.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" />

	<link href="assets/frontend/plugins/fancybox/dist/jquery.fancybox.css" rel="stylesheet" type="text/css" />
	<!-- END: BASE PLUGINS -->
	<!-- BEGIN: PAGE STYLES -->
	<link href="assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
	<!-- END: PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="assets/frontend/theme/assets/demos/default/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/demos/default/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
	<link href="assets/frontend/theme/assets/demos/default/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css" />
	<link href="assets/frontend/theme/assets/demos/default/css/custom.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/frontend/plugins/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="assets/frontend/plugins/owl-carousel/owl.theme.css">
	<link rel="stylesheet" href="assets/frontend/plugins/owl-carousel/owl.transitions.css">
	<script src="assets/frontend/plugins/jquery/jquery-2.1.0.min.js"></script>
	<script src="assets/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/frontend/plugins/owl-carousel/slider.js"></script>
	<script src="assets/frontend/plugins/owl-carousel/owl.carousel.min.js"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script src="assets/frontend/plugins/jquery-cookie/jquery.cookie.js"></script>
	<link href="assets/frontend/css/style8968.css?v=163326351959887" rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->
	<script src="assets/frontend/theme/assets/plugins/moment.min.js" type="text/javascript"></script>
	<script src="assets/frontend/theme/assets/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
	<script src="assets/frontend/theme/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
	<script src="assets/frontend/theme/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
	<script src="assets/frontend/theme/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
	<script src="assets/frontend/theme/assets/demos/default/js/scripts/pages/datepicker.js" type="text/javascript"></script>
	<script src="assets/frontend/plugins/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js" type="text/javascript"></script>
	<script src="assets/frontend/plugins/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js" type="text/javascript"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<style>
		.c-layout-header .c-navbar .c-mega-menu>.nav.navbar-nav>li>.c-link {
			padding: 41px 10px 39px 10px
		}

		.ui-autocomplete {
			max-height: 500px;
			overflow-y: auto;
			overflow-x: hidden;
		}

		.input-group-addon {
			background-color: #FAFAFA;
		}

		.input-group .input-group-btn>.btn,
		.input-group .input-group-addon {
			background-color: #FAFAFA;
		}

		.modal {
			text-align: center;
		}

		@media screen and (min-width: 768px) {
			.modal:before {
				display: inline-block;
				vertical-align: middle;
				content: " ";
				height: 100%;
			}
		}

		@media screen and (max-width: 767px) {
			.modal-dialog:before {
				margin-top: 75px;
				display: inline-block;
				vertical-align: middle;
				content: " ";
				height: 100%;
			}

			.modal-dialog {
				width: 100%;

			}

			.modal-content {
				margin-right: 20px;
			}
		}

		.modal-dialog {
			display: inline-block;
			text-align: left;

		}

		.mfp-wrap {
			z-index: 20000 !important;
		}

		.c-content-overlay .c-overlay-wrapper {
			z-index: 6;
		}

		.z7 {
			z-index: 7 !important;
		}
	</style>

</head>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
	<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
		<div class="c-topbar c-topbar-light">
			<div class="container">
				<!-- BEGIN: INLINE NAV -->
				<nav class="c-top-menu c-pull-left">
					<ul class="c-icons c-theme-ul">
						<li>
							<a href="https://www.facebook.com/bolili1010/" target="_blank">
								<i class="icon-social-facebook"></i>
							</a>
						</li>
						<li>
							<a href="https://www.youtube.com/channel/UCnu7qhik415MnCzJ_hgZ78A" target="_blank">
								<i class="icon-social-youtube"></i>
							</a>
						</li>

					</ul>
				</nav>
				<!-- END: INLINE NAV -->
				<!-- BEGIN: INLINE NAV -->
				<nav class="c-top-menu c-pull-right m-t-10">
					<ul class="c-links c-theme-ul">
						<li style="color:var(--sub-color)">
							Hotline: <a href="tel:0565675508">0565675508 </a>
						</li>

						<!--                <li class="c-divider">|</li>
                                    <li>
                                        <a href="/contact.html">Liên hệ</a>
                                    </li>
                                    <li class="c-divider">|</li>
                                    <li>
                                        <a href="/faq.html">FAQ</a>
                                    </li>-->
					</ul>
				</nav>
				<!-- END: INLINE NAV -->
			</div>
		</div>
		<div class="c-navbar">
			<div class="container">
				<!-- BEGIN: BRAND -->
				<div class="c-navbar-wrapper clearfix">
					<div class="c-brand c-pull-left">
						<div style="margin: 0px;display: inline-block">
							<a href="index.php" class="c-logo" alt="Shop bán nick game, acc game online avatar, đột kích – CF, liên minh huyền thoại lol , ngọc rồng, khí phách anh hùng - kpah giá rẻ, uy tín...">
								<img height="65px" src="storage/images/HYFiUkwC3Y_1560966469.jpg" alt="png-image" class="c-desktop-logo">
								<img height="45px" src="storage/images/HYFiUkwC3Y_1560966469.jpg" alt="png-image" class="c-desktop-logo-inverse">
								<img height="45px" src="storage/images/HYFiUkwC3Y_1560966469.jpg" alt="png-image" class="c-mobile-logo"> </a>
						</div>
						<button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
							<span class="c-line"></span>
							<span class="c-line"></span>
							<span class="c-line"></span>
						</button>
						<button class="c-topbar-toggler" type="button">
							<i class="fa fa-ellipsis-v"></i>
						</button>
						<button class="c-search-toggler" type="button">
							<i class="fa fa-search"></i>
						</button>
						<!--    <button class="c-cart-toggler" type="button">
                            <i class="icon-handbag"></i>
                            <span class="c-cart-number c-theme-bg">2</span>
                        </button>-->
					</div>
					<!-- END: BRAND -->
					<!-- BEGIN: QUICK SEARCH -->
					<form class="c-quick-search" action="#">
						<input type="text" name="query" placeholder="Tìm kiếm..." value="" class="form-control" autocomplete="off">
						<span class="c-theme-link">×</span>
					</form>
					<!-- END: QUICK SEARCH -->
					<!-- BEGIN: HOR NAV -->
					<!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
					<!-- BEGIN: MEGA MENU -->
					<!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
					<style>
						.c-menu-type-mega:hover {
							transition-delay: 1s;
						}

						.c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu>.nav.navbar-nav>li:focus>a:not(.btn),
						.c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu>.nav.navbar-nav>li:active>a:not(.btn),
						.c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu>.nav.navbar-nav>li:hover>a:not(.btn) {
							color: #3a3f45;
						}
						.dropdown-menu{
							top: 65%;
						}

					</style>
					<nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold d-none hidden-xs hidden-sm">

						<ul class="nav navbar-nav c-theme-nav">
							<li class="c-menu-type-classic"><a rel="" href="index.php" class="c-link dropdown-toggle ">Trang chủ</a></li>
							<li class="c-menu-type-classic"><a rel="" href="#" class="c-link dropdown-toggle ">Tải game</a>
							<ul id="children-of-41" class="dropdown-menu c-menu-type-classic c-pull-left ">
									<li class="c-menu-type-classic"><a  href="#" class="">Tải bản X1</a></li>
									<li class="c-menu-type-classic"><a  href="#" class="">Tải bảng X3</a></li>
									<li class="c-menu-type-classic"><a  href="#" class="">Tải bảng X100</a></li>
								</ul>
						</li>
							<li class="c-menu-type-classic"><a rel="" href="topup.php" class="c-link dropdown-toggle ">Nạp lượng</a></li>
							<li class="c-menu-type-classic"><a rel="" href="https://www.facebook.com/quanghuynso" class="c-link dropdown-toggle ">Fanpage</a></li>

							<!-- DROPDOWN -->
							<!-- <li class="c-menu-type-classic"><a rel="" href="#" class="c-link dropdown-toggle ">Nạp tiền<span class="c-arrow c-toggler"></span></a>
								<ul id="children-of-41" class="dropdown-menu c-menu-type-classic c-pull-left ">
									<li class="c-menu-type-classic"><a rel="" href="login.html" class="">Nạp thẻ tự động</a></li>
									<li class="c-menu-type-classic"><a rel="/atm" href="atm.html" class="load-modal">Nạp tiền từ ATM/Ví điện tử</a></li>
								</ul>
							</li> -->

							<?php if ($_login == null) { ?>
								<li>
									<a href="login.php" class="header-btn c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
										<i class="icon-user"></i> Đăng nhập</a>
								</li>

								<li><a href="register.php" class="header-btn c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
										<i class="icon-key icons"></i> Đăng ký</a>
								</li>
							<?php } else { ?>
								<li>
									<a href="user.php" class="header-btn c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
										<i class="icon-user"></i><?php echo $_username; ?> - </i><?php echo number_format($_coin, 0, '.', '.'); ?> VNĐ</a>
								</li>
								<li><a href="logout.php" class="header-btn c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
										<i class="icon-key icons"></i> Đăng xuất</a>
								</li>
							<?php } ?>

						</ul>


					</nav>



					<nav class="menu-main-mobile c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold hidden-md hidden-lg">

						<ul class="nav navbar-nav c-theme-nav">
							<li class="c-menu-type-classic"><a rel="" href="index.php" class="c-link dropdown-toggle ">Trang chủ</a></li>

							<li class="c-menu-type-classic"><a rel="" href="#" class="c-link dropdown-toggle ">Tải Game<span class="c-arrow c-toggler"></span></a>
								<ul id="children-of-41" class="dropdown-menu c-menu-type-classic c-pull-left ">
									<li class="c-menu-type-classic"><a  href="#" class="">Tải bản X1</a></li>
									<li class="c-menu-type-classic"><a  href="#" class="">Tải bản X3</a></li>
									<li class="c-menu-type-classic"><a  href="#" class="">Tải bản X100</a></li>
								</ul>
							</li>
							<li class="c-menu-type-classic"><a rel="" href="topup.php" class="c-link dropdown-toggle ">Nạp lượng</a></li>
							<li class="c-menu-type-classic"><a rel="" href="https://www.facebook.com/quanghuynso" class="c-link dropdown-toggle ">Fanpage</a></li>
							<li><a href="login.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
									<i class="icon-user"></i> Đăng nhập</a>
							</li>
							<li><a href="register.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
									<i class="icon-key icons"></i> Đăng ký</a>
							</li>
						</ul>


					</nav>


					<!-- END: MEGA MENU -->
					<!-- END: LAYOUT/HEADERS/MEGA-MENU -->
					<!-- END: HOR NAV -->
				</div>
				<!-- BEGIN: LAYOUT/HEADERS/QUICK-CART -->
				<!-- BEGIN: CART MENU -->
				<!-- END: CART MENU -->
				<!-- END: LAYOUT/HEADERS/QUICK-CART -->
			</div>
		</div>
	</header>