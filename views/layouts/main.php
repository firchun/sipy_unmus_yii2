<?php

use app\models\DataYudisium;
use app\models\Dosen;
use app\models\Fakultas;
use app\models\Jurusan;
use app\models\User;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

if (Yii::$app->user->identity) {
	$role = Yii::$app->user->identity->role;
}

?>
<?php
if (Yii::$app->user->identity) {
	if (Yii::$app->user->identity->foto == null) {
		$foto_profil = 'no-image.jpg';
	} else {
		$foto_profil = Yii::$app->user->identity->foto;
	}
	$yudisium = DataYudisium::findOne(['id_users' => Yii::$app->user->identity->id]);
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
	<base href="../">
	<title>
		<?php if ($role == 1) {
			echo "Admin";
		} else if ($role == 2) {
			echo "Operator Fakultas";
		} else {
			echo "Mahasiswa";
		} ?>

		| <?php echo Yii::$app->name; ?></title>
	<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon-unmus.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

	<link href="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/custom/prismjs/prismjs.bundle.css rel=" stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url(<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/patterns/header-bg.jpg)" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
	<?php $this->beginBody() ?>
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Header-->
				<div id="kt_header" class="header align-items-stretch" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
					<!--begin::Container-->
					<div class="container-xxl d-flex align-items-center">
						<!--begin::Heaeder menu toggle-->
						<div class="d-flex topbar align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
							<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
								<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
								<span class="svg-icon svg-icon-2x">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
										<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
						</div>
						<!--end::Heaeder menu toggle-->
						<!--begin::Header Logo-->
						<div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
							<a href="<?php echo Yii::$app->request->baseUrl; ?>">
								<img alt="Logo" src="<?php echo Yii::$app->request->baseUrl; ?>/logo.png" class="logo-default h-25px" />
								<img alt="Logo" src="<?php echo Yii::$app->request->baseUrl; ?>/logo.png" class="logo-sticky h-25px" />
							</a>
						</div>
						<!--end::Header Logo-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
							<!--begin::Navbar-->
							<div class="d-flex align-items-stretch" id="kt_header_nav">
								<!--begin::Menu wrapper-->
								<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
									<!--begin::Menu-->
									<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
										<!-- navigasi admin  -->
										<?php
										if ($role == 1) : ?>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/site/index']) ?>">
													<span class="menu-title">Home</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/admin/dashboard']) ?>">
													<span class="menu-title">Dashboard</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>

											<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">Master Data</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
												<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
													<div class="menu-item">
														<a class="menu-link py-3" href="<?= Url::to(['/fakultas/index']) ?>" title="" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" data-bs-original-title="List, ubah, tambah dan hapus data fakultas">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: /icons/duotune/general/gen002.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
																		<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Data Fakultas</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="<?= Url::to(['/jurusan/index']) ?>" title="" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" data-bs-original-title="List, ubah, tambah dan hapus data jurusan">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
																		<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Data Jurusan</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="<?= Url::to(['/dosen/index']) ?>" title="" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" data-bs-original-title="List, ubah, tambah dan hapus data dosen">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
																<span class="svg-icon svg-icon-2">
																	<span class="svg-icon svg-icon-2">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
																			<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
																		</svg>
																	</span>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Data Dosen</span>
														</a>
													</div>
												</div>

											</div>
											<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">Pengguna</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
												<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
													<div class="menu-item">
														<a class="menu-link py-3" href="<?= Url::to(['/pengguna/mahasiswa']) ?>" title="" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" data-bs-original-title="List, ubah, tambah dan hapus data fakultas">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: /icons/duotune/general/gen002.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
																		<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Mahasiswa</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="<?= Url::to(['/pengguna/operator']) ?>" title="" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" data-bs-original-title="List, ubah, tambah dan hapus data jurusan">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
																		<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Operator Fakultas</span>
														</a>
													</div>

												</div>

											</div>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/gelombang/index']) ?>">
													<span class="menu-title">Gelombang Wisuda</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/data-yudisium/index']) ?>">
													<span class="menu-title">Data Yudisium</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/data-wisuda/index']) ?>">
													<span class="menu-title">Data Wisuda</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>

											<!-- navigasi operator -->
										<?php elseif ($role == 2) : ?>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/site/index']) ?>">
													<span class="menu-title">Home</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/admin/dashboard']) ?>">
													<span class="menu-title">Dashboard</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/data-yudisium/index']) ?>">
													<span class="menu-title">Data Yudisium</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/data-wisuda/index']) ?>">
													<span class="menu-title">Data Wisuda</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>


											<!-- navigasi mahasiswa -->
										<?php else : ?>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3" href="<?= Url::to(['/site/index']) ?>">
													<span class="menu-title">Home</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<div class="menu-item menu-lg-down-accordion me-lg-1">
												<a class="menu-link py-3 " href="<?= Url::to(['/mahasiswa/dashboard']) ?>">
													<span class="menu-title">Dashboard</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<?php if (!$yudisium == null) : ?>
												<div class="menu-item menu-lg-down-accordion me-lg-1">
													<a class="menu-link py-3" href="<?= Url::to(['/mahasiswa/data-yudisium']) ?>">
														<span class="menu-title">Data Yudisium</span>
														<span class="menu-arrow d-lg-none"></span>
													</a>
												</div>
											<?php endif; ?>

										<?php endif; ?>


									</div>
									<!--end::Menu-->
								</div>
								<!--end::Menu wrapper-->
							</div>
							<!--end::Navbar-->
							<!--begin::Topbar-->
							<div class="d-flex align-items-stretch flex-shrink-0">
								<!--begin::Toolbar wrapper-->
								<div class="topbar d-flex align-items-stretch flex-shrink-0">




									<!--begin::User-->
									<div class="d-flex align-items-center me-n3 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
										<!--begin::Menu wrapper-->
										<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											<img class="h-30px w-30px rounded" src="<?php echo Yii::$app->request->baseUrl; ?>/images/user/<?= $foto_profil ?>" alt="" />

										</div>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content d-flex align-items-center px-3">
													<!--begin::Avatar-->
													<div class="symbol symbol-50px me-5">

														<img alt="Logo" src="<?php echo Yii::$app->request->baseUrl; ?>/images/user/<?= $foto_profil ?>" />
													</div>
													<!--end::Avatar-->
													<!--begin::Username-->
													<div class="d-flex flex-column">
														<div class="fw-bolder d-flex align-items-center fs-5"><?= Yii::$app->user->identity->nama_lengkap; ?>
															<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">
																<?php if (Yii::$app->user->identity->role == 1) {
																	echo "Admin";
																} else if (Yii::$app->user->identity->role == 2) {
																	echo "Operator Fakultas";
																} else {
																	echo "Mahasiswa";
																} ?>
															</span>
														</div>
													</div>
													<!--end::Username-->
												</div>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="<?= Yii::$app->user->identity->role == 1 ? Url::to(['/admin/akun']) : Url::to(['/mahasiswa/akun']) ?>" class="menu-link px-5">Akun</a>
											</div>
											<!--end::Menu item-->

											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->

											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a data-method="POST" href="<?= Url::to(['/auth/logout']) ?>" class="menu-link px-5">Sign Out</a>
											</div>
											<!--end::Menu item-->

										</div>
										<!--end::Menu-->
										<!--end::Menu wrapper-->
									</div>
									<!--end::User -->
									<!--begin::Aside mobile toggle-->
									<!--end::Aside mobile toggle-->
								</div>
								<!--end::Toolbar wrapper-->
							</div>
							<!--end::Topbar-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Toolbar-->
				<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
					<!--begin::Container-->
					<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
						<!--begin::Page title-->
						<div class="page-title d-flex flex-column me-3">
							<!--begin::Title-->
							<h1 class="d-flex text-white fw-bolder my-1 fs-3">Account <?= Yii::$app->user->identity->nama_lengkap; ?></h1>
							<!--end::Title-->

						</div>
						<!--end::Page title-->

					</div>
					<!--end::Container-->
				</div>
				<!--end::Toolbar-->
				<!--begin::Container-->
				<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
					<!--begin::Post-->
					<div class="content flex-row-fluid" id="kt_content">
						<!--begin::Navbar-->
						<div class="card mb-5 mb-xl-10">
							<div class="card-body pt-9 pb-0">
								<!--begin::Details-->
								<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
									<!--begin: Pic-->
									<div class="me-7 mb-4">
										<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
											<img src="<?= Yii::$app->request->baseUrl; ?>/images/user/<?= $foto_profil ?>" alt="image" />
											<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
										</div>
									</div>
									<!--end::Pic-->
									<!--begin::Info-->
									<div class="flex-grow-1">
										<!--begin::Title-->
										<div class=" mb-2">
											<!--begin::User-->
											<div class="d-flex flex-column">
												<!--begin::Name-->
												<div class="d-flex align-items-center mb-2">
													<div class="text-gray-900 text-hover-primary fs-1 fw-bolder me-1">
														<?= Yii::$app->user->identity->nama_lengkap ?>
													</div>
													<a href="#">
														<!-- begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
														<!-- <span class="svg-icon svg-icon-1 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
																<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
															</svg>
														</span> -->
														<!--end::Svg Icon -->
													</a>
													<div class="badge badge-light-success fw-bolder ms-2 fs-8 py-1 px-3">
														<?php if (Yii::$app->user->identity->role == 1) {
															echo "Admin";
														} else if (Yii::$app->user->identity->role == 2) {
															echo "Operator Fakultas";
														} else {
															echo "Mahasiswa";
														} ?>
													</div>

												</div>
												<!--end::Name-->
												<!--begin::Info-->
												<?php if (Yii::$app->user->identity->role != 1) : ?>
													<div class="fs-6 mb-4 pe-2 border border-gray-300 border-dashed rounded p-5">
														<span class="d-flex align-items-center text-hover-primary me-5 mb-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
															<?php $data_user = User::findOne(['id' => Yii::$app->user->identity->id]); ?>
															<strong> Fakultas : </strong> <?= $data_user->fakultas->fakultas; ?>
														</span>
														<?php if (Yii::$app->user->identity->role == 3) : ?>
															<span class="d-flex align-items-center  text-hover-primary me-5 mb-2">
																<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
																<strong> Jurusan : </strong> <?= $data_user->jurusan->jurusan; ?>
															</span>
														<?php endif; ?>

													</div>
												<?php else : ?>
													<div class="row fw-bold fs-6 mb-4 pe-2 border border-gray-300 border-dashed rounded p-5" style="width: 100%;">
														<span class="col-lg-2 text-gray-400 text-hover-primary  mb-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
															<strong>Total Fakultas : </strong> <span class="badge badge-danger"><?= Fakultas::find()->count(); ?></span>
														</span>
														<span class="col-lg-2 text-gray-400 text-hover-primary  mb-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
															<strong>Total Jurusan : </strong><span class="badge badge-danger"><?= Jurusan::find()->count(); ?></span>
														</span>
														<span class="col-lg-2 text-gray-400 text-hover-primary  mb-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
															<strong>Total Dosen : </strong><span class="badge badge-danger"><?= Dosen::find()->count(); ?></span>
														</span>
														<span class="col-lg-3 text-gray-400 text-hover-primary  mb-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
															<strong>Total Operator Fakultas : </strong><span class="badge badge-danger"><?= User::find()->where(['role' => 2])->count(); ?></span>
														</span>
														<span class="col-lg-3 text-gray-400 text-hover-primary  mb-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
															<strong>Total Mahasiswa: </strong><span class="badge badge-danger"><?= User::find()->where(['role' => 3])->count(); ?></span>
														</span>

													</div>
												<?php endif; ?>
												<!--end::Info-->
											</div>
											<!--end::User-->

										</div>
										<!--end::Title-->
									</div>
									<!--end::Info-->
								</div>
								<!--end::Details-->

							</div>
						</div>
						<!--end::Navbar-->
						<main id="main" role="main">
							<div class="my-5">
								<?= Alert::widget() ?>
							</div>
							<?php echo $content ?>

						</main>
						<!--begin::Footer-->
						<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
							<!--begin::Container-->
							<div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
								<!--begin::Copyright-->
								<div class="text-dark order-2 order-md-1">
									<span class="text-muted fw-bold me-1"><?= date('Y') ?> ©</span>
									<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Sistem Informasi Pendaftaran Yudisium UNMUS</a>
								</div>
								<!--end::Copyright-->
								<!--begin::Menu-->
								<!-- <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
									<li class="menu-item">
										<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
									</li>
									<li class="menu-item">
										<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
									</li>
									<li class="menu-item">
										<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
									</li>
								</ul> -->
								<!--end::Menu-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Page-->
			</div>
			<!--end::Root-->
			<!--begin::Drawers-->
			<!--begin::Activities drawer-->

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
			<!--end::Main-->
			<script>
				var hostUrl = "<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/";
			</script>
			<!--begin::Javascript-->
			<!--begin::Global Javascript Bundle(used by all pages)-->
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/global/plugins.bundle.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/scripts.bundle.js"></script>
			<!--end::Global Javascript Bundle-->
			<!--begin::Page Custom Javascript(used by this page)-->
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/widgets.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/apps/chat/chat.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/create-app.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/upgrade-plan.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.9"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/pages/crud/file-upload/dropzonejs.js?v=7.2.9"></script>
			<!--begin::Page Scripts(used by this page)-->
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/custom/uppy/uppy.bundle.js?v=7.2.9"></script>

			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/authentication/sign-in/general.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/create-app.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/upgrade-plan.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/new-target.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/create-app.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/upgrade-plan.js"></script>

			<link href="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/global/plugins.bundle.js"></script>
			<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/apps/invoices/create.js"></script>

			<!--end::Javascript-->
			<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>