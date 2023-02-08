<?php

use app\models\DataYudisium;
use yii\helpers\Url;

$data_yudisium = DataYudisium::findOne(['id_users' => Yii::$app->user->identity->id]);
if (!$data_yudisium == null) {
	if ($data_yudisium->persetujuan == 0) {
		$progress = '50';
		$progress_status = 'Pengecekan data';
	} else if ($data_yudisium->persetujuan == 1) {
		$progress =  '100';
		$progress_status = 'Data disetujui';
	} else {
		$progress = '100';
		$progress_status = 'Data Perlu Direvisi Kembali';
	}
}

?>
<div class="row">
	<div class="col-md-6">
		<div class="card bg-light-secondary card-xl-stretch mb-5 mb-xl-8">
			<!--begin::Body-->
			<div class="card-body my-3">
				<span class="card-title fw-bolder text-secondary fs-5 mb-3 d-block">Data Profil</span>
				<div class="py-1">
					<span class="text-dark fs-1 fw-bolder me-2">100%</span>
					<span class="fw-bold text-muted fs-7">Lengkap</span>
				</div>
				<div class="progress h-7px bg-primary bg-opacity-50 mt-7">
					<div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<!--end:: Body-->
		</div>
	</div>
	<?php if (!$data_yudisium == null) : ?>
		<div class="col-md-6">
			<div class="card 
		<?php if ($data_yudisium->persetujuan == 2) :
			echo 'bg-light-warning';
		else : echo 'bg-light-primary';
		endif; ?>
		 card-xl-stretch mb-5 mb-xl-8">
				<!--begin::Body-->
				<div class="card-body my-3">
					<span class="card-title fw-bolder text-primary fs-5 mb-3 d-block">Progress Data Yudisium</span>
					<div class="py-1">
						<span class="text-dark fs-1 fw-bolder me-2">
							<?= $progress ?>
							%</span>
						<span class="fw-bold text-muted fs-7"><?= $progress_status ?>
							<?php if ($data_yudisium->persetujuan == 2) : ?>
								<a href="" class="btn btn-sm btn-danger">Perbaiki data</a></span>
					<?php endif; ?>
					</div>

					<div class="progress h-7px bg-warning bg-opacity-50 mt-7">
						<div class="progress-bar bg-warning" role="progressbar" style="width: <?= $progress ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				<!--end:: Body-->
			</div>
		</div>
	<?php else : ?>
		<div class="col-md-6">
			<div class="card bg-light-warning card-xl-stretch mb-5 mb-xl-8">
				<!--begin::Body-->
				<div class="card-body my-3">
					<span class="card-title fw-bolder text-primary fs-5 mb-3 d-block">Progress Data Yudisium</span>
					<div class="py-1">
						<span class="text-dark fs-1 fw-bolder me-2">
							0 %</span>
						<span class="fw-bold text-muted fs-7">Anda belum mendaftar sebagai peserta yudisium

					</div>

					<div class="progress h-7px bg-warning bg-opacity-50 mt-7">
						<div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				<!--end:: Body-->
			</div>
		</div>
	<?php endif; ?>
</div>
<?php
if ($data_yudisium == null) :
?>
	<div class="card-body d-flex p-0">
		<div class="flex-grow-1 p-8 card-rounded bgi-no-repeat d-flex align-items-center" style="background-color: #FFF4DE; background-position: left bottom; background-size: auto 100%; background-image: url(<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/illustrations/sketchy-1/4.png)">
			<div class="row">
				<div class="col-12 col-xl-5"></div>
				<div class="col-12 col-xl-7">
					<h4 class="text-danger font-weight-bolder">Daftar Yudisium Sekarang</h4>
					<p class="text-dark-50 my-5 font-size-xl font-weight-bold">Silahkan melakukan pendaftaran pada tombol di bawah untuk menjadi peserta yudisium</p>
					<a href="<?= Url::to(['/mahasiswa/yudisium']) ?>" class="btn btn-danger font-weight-bold py-2 px-6">Daftar</a>
				</div>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="card mt-5 mt-xxl-8">
		<!--begin::Card head-->
		<div class="card-header card-header-stretch">
			<!--begin::Title-->
			<div class="card-title d-flex align-items-center">
				<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
				<span class="svg-icon svg-icon-1 svg-icon-primary me-3 lh-0">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black"></path>
						<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black"></path>
						<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black"></path>
					</svg>
				</span>
				<!--end::Svg Icon-->
				<h3 class="fw-bolder m-0 text-gray-800">Timeline</h3>
			</div>
			<!--end::Title-->

		</div>
		<!--end::Card head-->
		<!--begin::Card body-->
		<div class="card-body">
			<!--begin::Tab Content-->
			<div class="tab-content">
				<!--begin::Tab panel-->
				<div id="kt_activity_today" class="card-body p-0 tab-pane fade active show" role="tabpanel" aria-labelledby="kt_activity_today_tab">
					<!--begin::Timeline-->
					<div class="timeline">

						<!--begin::Timeline item-->
						<div class="timeline-item">
							<!--begin::Timeline line-->
							<div class="timeline-line w-40px"></div>
							<!--end::Timeline line-->
							<!--begin::Timeline icon-->
							<div class="timeline-icon symbol symbol-circle symbol-40px">
								<div class="symbol-label bg-light">
									<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
									<span class="svg-icon svg-icon-2 svg-icon-gray-500">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
											<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
							</div>
							<!--end::Timeline icon-->
							<!--begin::Timeline content-->
							<div class="timeline-content mb-10 mt-n1">
								<!--begin::Timeline heading-->
								<div class="pe-3 mb-5">
									<!--begin::Title-->
									<div class="fs-5 fw-bold mb-2">Anda Membuat Akun</div>
									<!--end::Title-->
									<!--begin::Description-->
									<div class="d-flex align-items-center mt-1 fs-6">
										<!--begin::Info-->
										<div class="text-muted me-2 fs-7">Pada <?= Yii::$app->user->identity->created_at ?></div>
										<!--end::Info-->
									</div>
									<!--end::Description-->
								</div>
								<!--end::Timeline heading-->
								<!--begin::Timeline details-->
								<div class="overflow-auto pb-5">
									<!--begin::Notice-->
									<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
										<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M19.0687 17.9688H11.0687C10.4687 17.9688 10.0687 18.3687 10.0687 18.9688V19.9688C10.0687 20.5687 10.4687 20.9688 11.0687 20.9688H19.0687C19.6687 20.9688 20.0687 20.5687 20.0687 19.9688V18.9688C20.0687 18.3687 19.6687 17.9688 19.0687 17.9688Z" fill="black"></path>
												<path d="M4.06875 17.9688C3.86875 17.9688 3.66874 17.8688 3.46874 17.7688C2.96874 17.4688 2.86875 16.8688 3.16875 16.3688L6.76874 10.9688L3.16875 5.56876C2.86875 5.06876 2.96874 4.46873 3.46874 4.16873C3.96874 3.86873 4.56875 3.96878 4.86875 4.46878L8.86875 10.4688C9.06875 10.7688 9.06875 11.2688 8.86875 11.5688L4.86875 17.5688C4.66875 17.7688 4.36875 17.9688 4.06875 17.9688Z" fill="black"></path>
											</svg>
										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Wrapper-->
										<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
											<!--begin::Content-->
											<div class="mb-3 mb-md-0 fw-bold">
												<h4 class="text-gray-900 fw-bolder">Berhasil membuat akun</h4>
												<!-- <div class="fs-6 text-gray-700 pe-7">Login into Metronic Admin Dashboard to make sure the data integrity is OK</div> -->
											</div>
											<!--end::Content-->
											<!--begin::Action-->
											<a href="<?= Url::to(['/mahasiswa/akun']) ?>" class="btn btn-primary px-6 align-self-center text-nowrap">Lihat akun saya</a>
											<!--end::Action-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Notice-->
								</div>
								<!--end::Timeline details-->
							</div>
							<!--end::Timeline content-->
						</div>
						<!--end::Timeline item-->
						<!--begin::Timeline item-->
						<?php if (!$data_yudisium == null) : ?>
							<div class="timeline-item">
								<!--begin::Timeline line-->
								<div class="timeline-line w-40px"></div>
								<!--end::Timeline line-->
								<!--begin::Timeline icon-->
								<div class="timeline-icon symbol symbol-circle symbol-40px">
									<div class="symbol-label bg-light">
										<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
										<span class="svg-icon svg-icon-2 svg-icon-gray-500">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
												<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</div>
								</div>
								<!--end::Timeline icon-->
								<!--begin::Timeline content-->
								<div class="timeline-content mb-10 mt-n1">
									<!--begin::Timeline heading-->
									<div class="pe-3 mb-5">
										<!--begin::Title-->
										<div class="fs-5 fw-bold mb-2">Anda mendaftar yudisium</div>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="d-flex align-items-center mt-1 fs-6">
											<!--begin::Info-->
											<div class="text-muted me-2 fs-7">Pada <?= $data_yudisium->created_at ?></div>
											<!--end::Info-->
										</div>
										<!--end::Description-->
									</div>
									<!--end::Timeline heading-->
									<!--begin::Timeline details-->
									<div class="overflow-auto pb-5">
										<!--begin::Notice-->
										<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
											<!--begin::Icon-->
											<!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
											<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M19.0687 17.9688H11.0687C10.4687 17.9688 10.0687 18.3687 10.0687 18.9688V19.9688C10.0687 20.5687 10.4687 20.9688 11.0687 20.9688H19.0687C19.6687 20.9688 20.0687 20.5687 20.0687 19.9688V18.9688C20.0687 18.3687 19.6687 17.9688 19.0687 17.9688Z" fill="black"></path>
													<path d="M4.06875 17.9688C3.86875 17.9688 3.66874 17.8688 3.46874 17.7688C2.96874 17.4688 2.86875 16.8688 3.16875 16.3688L6.76874 10.9688L3.16875 5.56876C2.86875 5.06876 2.96874 4.46873 3.46874 4.16873C3.96874 3.86873 4.56875 3.96878 4.86875 4.46878L8.86875 10.4688C9.06875 10.7688 9.06875 11.2688 8.86875 11.5688L4.86875 17.5688C4.66875 17.7688 4.36875 17.9688 4.06875 17.9688Z" fill="black"></path>
												</svg>
											</span>
											<!--end::Svg Icon-->
											<!--end::Icon-->
											<!--begin::Wrapper-->
											<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
												<!--begin::Content-->
												<div class="mb-3 mb-md-0 fw-bold">
													<h4 class="text-gray-900 fw-bolder">Berhasil mendaftar sebagai peserta yudisium </h4>
													<!-- <div class="fs-6 text-gray-700 pe-7">Login into Metronic Admin Dashboard to make sure the data integrity is OK</div> -->
												</div>
												<!--end::Content-->
												<!--begin::Action-->
												<a href="<?= Url::to(['/mahasiswa/data-yudisium']) ?>" class="btn btn-primary px-6 align-self-center text-nowrap">Lihat data yudisium</a>
												<!--end::Action-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Notice-->
									</div>
									<!--end::Timeline details-->
								</div>
								<!--end::Timeline content-->
							</div>
						<?php endif; ?>
						<!--end::Timeline item-->
					</div>
					<!--end::Timeline-->
				</div>
				<!--end::Tab panel-->



			</div>
			<!--end::Tab Content-->
		</div>
		<!--end::Card body-->
	</div>
<?php endif; ?>