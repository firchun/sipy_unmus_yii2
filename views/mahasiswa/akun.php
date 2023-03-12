<div class="text-center">
	<div class="d-flex justify-content-center mb-7">
		<div class="image-input image-input-outline text-center" data-kt-image-input="true" style="background-image: url(<?php echo Yii::$app->request->baseUrl; ?>/images/user/<?= $profil->foto ?>)">
			<!--begin::Preview existing avatar-->
			<?php if ($profil->foto != null || $profil->foto != 0) : ?>
				<div class="image-input-wrapper w-150px h-150px" style="background-image: url(<?php echo Yii::$app->request->baseUrl; ?>/images/user/<?= $profil->foto ?>)"></div>
			<?php else : ?>
				<div class="image-input-wrapper w-150px h-150px"></div>
			<?php endif; ?>
			<!--end::Preview existing avatar-->
			<!--begin::Label-->
			<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Upload Foto">
				<i class="bi bi-pencil-fill fs-7"></i>
				<!--begin::Inputs-->
				<input type="file" accept=".png, .jpg, .jpeg" id="user-file" name="User[file]" />
				<input type="hidden" name="User[file]">
				<!--end::Inputs-->
			</label>
			<!--end::Label-->
			<!--begin::Cancel-->
			<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel">
				<i class="bi bi-x fs-2"></i>
			</span>
			<!--end::Cancel-->
			<!--begin::Remove-->
			<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove">
				<i class="bi bi-x fs-2"></i>
			</span>
			<!--end::Remove-->
		</div>

	</div>
	<div class="mt-4 mb-7">
		<a href="" class="btn btn-primary ">Update Photo</a>
	</div>
</div>
<div class="cursor-pointer m-4">
	<h3 class="fw-bolder m-0">Account Info</h3>
</div>
<div class="card mb-5 mb-xl-10 mt-4">
	<div class="card-body p-9">
		<div class="row mb-7 ">
			<!--begin::Label-->
			<label class="col-lg-3 fw-bold text-muted">Nama Lengkap</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8">
				<span class="fw-bolder fs-6 text-gray-800"><?= $profil->nama_lengkap ?></span>
			</div>
			<!--end::Col-->
		</div>
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-3 fw-bold text-muted">NPM</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8">
				<span class="fw-bolder fs-6 text-gray-800"><?= $profil->npm ?></span>
			</div>
			<!--end::Col-->
		</div>
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-3 fw-bold text-muted">Email
				<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8 d-flex align-items-center">
				<span class="fw-bolder fs-6 text-gray-800 me-2"><?= $profil->email; ?></span>
			</div>
			<!--end::Col-->
		</div>

	</div>
</div>
<div class="cursor-pointer m-4">
	<h3 class="fw-bolder m-0">Account Password</h3>
</div>
<div class="card mb-10">
	<div class="card-body">
		<div class="row mb-7 d-flex justify-content-center">
			<!--begin::Label-->

			<!--begin::Col-->
			<div class="col-md-6 ">
				<div class="border-dashed p-4 rounded">
					<div class="mb-10 fv-row" data-kt-password-meter="true">
						<!--begin::Wrapper-->
						<div class="mb-1">
							<!--end::Label-->
							<label class="form-label fw-bolder text-dark fs-6">Old Password</label>
							<!--begin::Input wrapper-->
							<div class="position-relative mb-3">
								<input class="form-control form-control-lg form-control-solid" type="password" minlength="6" placeholder="New Password" autocomplete="off" id="user-password" name="User[password]" />
								<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
									<i class="bi bi-eye-slash fs-2"></i>
									<i class="bi bi-eye fs-2 d-none"></i>
								</span>
							</div>
							<!--end::Input wrapper-->
							<!--begin::Meter-->
							<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
							</div>
							<!--end::Meter-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Hint-->
						<!-- <div class="text-muted">Gunakan 6 karakter atau lebih dengan campuran huruf, angka , &amp;simbol.</div> -->
						<!--end::Hint-->
					</div>
					<div class="mb-2 fv-row" data-kt-password-meter="true">
						<!--begin::Wrapper-->
						<div class="mb-1">
							<!--end::Label-->
							<label class="form-label fw-bolder text-dark fs-6">New Password</label>
							<!--begin::Input wrapper-->
							<div class="position-relative mb-3">
								<input class="form-control form-control-lg form-control-solid" type="password" minlength="6" placeholder="New Password" autocomplete="off" id="user-password" name="User[password]" />
								<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
									<i class="bi bi-eye-slash fs-2"></i>
									<i class="bi bi-eye fs-2 d-none"></i>
								</span>
							</div>
							<!--end::Input wrapper-->
							<!--begin::Meter-->
							<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
							</div>
							<!--end::Meter-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Hint-->
						<div class="text-muted">Gunakan 6 karakter atau lebih dengan campuran huruf, angka , &amp;simbol.</div>
						<!--end::Hint-->
					</div>
				</div>

			</div>
			<!--end::Col-->
		</div>
	</div>
	<div class="card-footer">
		<a href="" class="btn btn-primary ">Change Password</a>
	</div>
</div>


<div class="cursor-pointer m-4">
	<h3 class="fw-bolder m-0">Account Details</h3>
</div>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
	<!-- <div class="card-header cursor-pointer">
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">Akun</h3>
		</div>
		
	</div> -->
	<div class="card-body p-9">
		<!--begin::Row-->


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
			<label class="col-lg-4 fw-bold text-muted">Fakultas / Jurusan</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8 fv-row">
				<span class="fw-bold text-gray-800 fs-6"> <?= $profil->fakultas->fakultas; ?> / <?= $profil->jurusan->jurusan; ?></span>
			</div>
			<!--end::Col-->
		</div>
		<!--end::Input group-->
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

		<!--end::Input group-->
		<!--begin::Input group-->
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">Jenis Kelamin</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8">
				<span class="fw-bolder fs-6 text-gray-800 me-2"><?= $profil->jenis_kelamin ?></span>
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