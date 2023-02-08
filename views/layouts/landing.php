<?php

use app\models\DataYudisium;
use app\models\User;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<?php $this->beginPage() ?>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="">
	<title><?php echo Yii::$app->name; ?></title>
	<meta name="description" content="Sistem Informasi pendaftaran yudisium universitas musamus merauke" />
	<meta name="keywords" content="sipy, unmus, universitas musamus, merauke, smart sistem, sistem informasi, universitas musamus merauke, wisudawan musamus, yudisium musamus" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Sistem Informasi pendaftaran yudisium universitas musamus merauke" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="SIPY - UNMUS" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon-unmus.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
</head>

<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url(<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/patterns/header-bg.jpg)" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
	<?php $this->beginBody() ?>
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Header Section-->
		<div class="mb-0" id="home">
			<!--begin::Wrapper-->
			<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(a<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/ssets/media/svg/illustrations/landing.svg)">
				<!--begin::Header-->
				<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center justify-content-between">
							<!--begin::Logo-->
							<div class="d-flex align-items-center flex-equal">
								<!--begin::Mobile menu toggle-->
								<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<span class="svg-icon svg-icon-2hx">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</button>
								<!--end::Mobile menu toggle-->
								<!--begin::Logo image-->
								<a href="<?php echo Yii::$app->request->baseUrl; ?>">
									<img alt="Logo" src="<?php echo Yii::$app->request->baseUrl; ?>/logo.png" class="logo-default h-25px h-lg-30px" />
									<img alt="Logo" src="<?php echo Yii::$app->request->baseUrl; ?>/logo.png" class="logo-sticky h-20px h-lg-25px" />
								</a>
								<!--end::Logo image-->
							</div>
							<!--end::Logo-->
							<!--begin::Menu wrapper-->
							<div class="d-lg-block" id="kt_header_nav_wrapper">
								<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
									<!--begin::Menu-->
									<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link active py-3 px-4 px-xxl-6 active" href="<?= Url::to(['/site/index']) ?>" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Cara Pendaftaran</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->

										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#peserta" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Peserta Wisuda</a>
											<!--end::Menu link-->
										</div>
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pricing" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Jadwal Wisuda</a>
											<!--end::Menu link-->
										</div>
										<?php if (Yii::$app->user->identity) : ?>
											<div class="menu-item">
												<!--begin::Menu link-->
												<?php if (Yii::$app->user->identity->role == 1) : ?>
													<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="<?= Url::to(['/admin/dashboard']) ?>" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Dashboard</a>
												<?php else : ?>
													<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="<?= Url::to(['/mahasiswa/dashboard']) ?>" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Dashboard</a>
												<?php endif; ?>
												<!--end::Menu link-->
											</div>
										<?php endif; ?>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</div>
							</div>
							<!--end::Menu wrapper-->
							<!--begin::Toolbar-->
							<div class="flex-equal text-end ms-1">
								<?php if (Yii::$app->user->identity) : ?>
									<a data-method="POST" href="<?= Url::to(['/auth/logout']) ?>" class="btn btn-danger">

										<span class="svg-icon svg-icon-primary svg-icon-2x">
											<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Sign-out.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) " />
													<rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1" />
													<path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) " />
												</g>
											</svg>
										</span>Sign Out
									</a>
								<?php else : ?>
									<a href="<?= Url::to(['/auth/login']) ?>" class="btn btn-success">Sign In</a>
								<?php endif; ?>
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Landing hero-->
				<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
					<!--begin::Heading-->
					<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
						<!--begin::Title-->
						<div>
							<img src="<?php echo Yii::$app->request->baseUrl; ?>/logo.png" height="200px" alt="logo universitas musamus merauke">
						</div>
						<h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Selamat Datang
							<br />di
							<span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">Sistem Informasi Pendaftaran Yudisium</span>
							</span><br /> Universitas Musamus Merauke
						</h1>
						<!--end::Title-->
						<!--begin::Action-->
						<?php if (Yii::$app->user->identity) : ?>
							<h3 class="text-white">
								Anda Sign in Sebagai : <br>
								<span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
									[ <?= Yii::$app->user->identity->nama_lengkap; ?> ]<br>
									<?php if (!Yii::$app->user->identity->role == 2 && !Yii::$app->user->identity->role == 1) : ?>
										[ <?= Yii::$app->user->identity->npm; ?> ]
									<?php endif; ?>
								</span>

							</h3>
							<?php if (Yii::$app->user->identity->role == 3) :
								$user_data = DataYudisium::findOne(['id_users' => Yii::$app->user->identity->id]);
								if ($user_data == null) : ?>
									<a href="<?= Url::to(['/mahasiswa/yudisium']) ?>" class="btn btn-primary mt-3">Daftar Yudisium Sekarang</a>
							<?php
								endif;
							endif; ?>
						<?php else : ?>
							<a href="<?= Url::to(['/mahasiswa/yudisium']) ?>" class="btn btn-primary">Daftar Yudisium Sekarang</a>
						<?php endif; ?>
						<!--end::Action-->
					</div>
					<!--end::Heading-->

				</div>
				<!--end::Landing hero-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Curve bottom-->
			<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<main id="main" role="main">
			<?php echo $content ?>
		</main>
		<!--begin::Footer Section-->
		<div class="mb-0">
			<!--begin::Curve top-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve top-->
			<!--begin::Wrapper-->
			<div class="landing-dark-bg pt-20">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Row-->
					<div class="row py-10 py-lg-20">
						<!--begin::Col-->
						<div class="col-lg-12 pe-lg-16 mb-10 mb-lg-0">
							<!--begin::Block-->
							<div class="rounded landing-dark-border p-9 mb-10">
								<!--begin::Title-->
								<h2 class="text-white">Would you need a Custom License?</h2>
								<!--end::Title-->
								<!--begin::Text-->
								<span class="fw-normal fs-4 text-gray-700">Email us to
									<a href="https://keenthemes.com/support" class="text-white opacity-50 text-hover-primary">support@keenthemes.com</a></span>
								<!--end::Text-->
							</div>
							<!--end::Block-->

						</div>
						<!--end::Col-->

					</div>
					<!--end::Row-->
				</div>
				<!--end::Container-->
				<!--begin::Separator-->
				<div class="landing-dark-separator"></div>
				<!--end::Separator-->
				<!--begin::Container-->
				<div class="container">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
						<!--begin::Copyright-->
						<div class="d-flex align-items-center order-2 order-md-1">
							<!--begin::Logo-->

							<!--end::Logo image-->
							<!--begin::Logo image-->
							<a class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="<?php echo Yii::$app->request->baseUrl; ?>">© 2021 SIPY Universitas Musamus</a>
							<!--end::Logo image-->
						</div>
						<!--end::Copyright-->
						<!-- begin::Menu
						<ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
							<li class="menu-item">
								<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
							</li>
							<li class="menu-item mx-5">
								<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
							</li>
							<li class="menu-item">
								<a href="" target="_blank" class="menu-link px-2">Purchase</a>
							</li>
						</ul> -->
						<!--end::Menu-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Wrapper-->
		</div>

		<!--end::Footer Section-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
	</div>
	<!--end::Main-->
	<script>
		var hostUrl = "<?php echo Yii::getAlias('@web/assets/dist/assets/') ?>";
	</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/landing.js"></script>
	<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/pages/company/pricing.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>