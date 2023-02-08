<?php

use app\models\User;

$profil = User::findOne(['id' => Yii::$app->user->identity->id]);
?>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
	<div class="card-header cursor-pointer">
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">Akun</h3>
		</div>
		<!-- <a href="../../demo2/dist/account/settings.html" class="btn btn-primary align-self-center">Edit Profile</a> -->
	</div>
	<div class="card-body p-9">
		<!--begin::Row-->
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">Nama Lengkap</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8">
				<span class="fw-bolder fs-6 text-gray-800"><?= $profil->nama_lengkap ?></span>
			</div>
			<!--end::Col-->
		</div>
		<?php if (Yii::$app->user->identity->role != 1) : ?>
			<div class="row mb-7">
				<!--begin::Label-->
				<label class="col-lg-4 fw-bold text-muted">NPM</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8">
					<span class="fw-bolder fs-6 text-gray-800"><?= $profil->npm ?></span>
				</div>
				<!--end::Col-->
			</div>
			<!--begin::Input group-->
			<div class="row mb-7">
				<!--begin::Label-->
				<label class="col-lg-4 fw-bold text-muted">Fakultas / Jurusan</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row">
					<span class="fw-bold text-gray-800 fs-6"> <?= $profil->fakultas->fakultas; ?> / <?= $profil->jurusan->jurusan; ?></span>
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
		<?php endif; ?>
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">NIK</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8">
				<span class="fw-bolder fs-6 text-gray-800"><?= $profil->nik ?></span>
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->
		<!--begin::Input group-->
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">Nomor HP
				<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8 d-flex align-items-center">
				<span class="fw-bolder fs-6 text-gray-800 me-2"><?= $profil->no_hp; ?></span>
			</div>
			<!--end::Col-->
		</div>
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">Email
				<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8 d-flex align-items-center">
				<span class="fw-bolder fs-6 text-gray-800 me-2"><a href="mailto:<?= $profil->email; ?>"><?= $profil->email; ?></a> </span>
			</div>
			<!--end::Col-->
		</div>
		<!--end::Input group-->
		<!--begin::Input group-->
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">Jenis Kelamin</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8">
				<span class="fw-bolder fs-6 text-gray-800 me-2"><?= $profil->jenis_kelamin == 1 ? 'Laki-Laki' : 'Perempuan' ?></span>
			</div>
			<!--end::Col-->
		</div>
		<!--end::Input group-->
		<!--begin::Input group-->
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">Tempat dan tanggal lahir
				<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i></label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8">
				<span class="fw-bolder fs-6 text-gray-800"><?= $profil->tempat_lahir; ?>, <?= $profil->tanggal_lahir; ?></span>
			</div>
			<!--end::Col-->
		</div>
		<!--end::Input group-->


	</div>
	<!--end::Card body-->
</div>