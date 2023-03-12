<?php

use app\models\Fakultas;
use app\models\Jurusan;
use app\widgets\Alert;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<!--begin::Body-->

<body id="kt_body" class="bg-body">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-up -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/illustrations/sigma-1/14.png">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a href="<?= Url::to(['/site/index']) ?>" class="mb-12">
					<img alt="Logo" src="<?php echo Yii::$app->request->baseUrl; ?>/logo.png" class="h-100px" />
				</a>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<!--begin::Form-->
					<!-- <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form"> -->
					<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
					<!--begin::Heading-->
					<div class="mb-10 text-center">
						<!--begin::Title-->
						<h1 class="text-dark mb-3">Register</h1>
						<!--end::Title-->
						<!--begin::Link-->
						<div class="text-gray-400 fw-bold fs-4">Sudah Memiliki akun?
							<a href=".<?= Url::to(['/auth/login']) ?>" class="link-primary fw-bolder">Sign in disini</a>
						</div>
						<div class="text-gray-400  mt-2">
							Sebelum mendaftarkan sebagai peserta yudisium,<br> silahkan membuat akun terlebih dahulu..
						</div>
						<?= Alert::widget() ?>
						<!--end::Link-->
					</div>
					<!--end::Heading-->

					<!--begin::Input group-->
					<div class="row fv-row mb-7">
						<!--begin::Col-->

						<div class="col-12 align-items-center text-center mb-3">
							<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">Foto</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
							</label>
							<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
								<!--begin::Preview existing avatar-->
								<div class="image-input-wrapper w-125px h-125px"></div>
								<!--end::Preview existing avatar-->
								<!--begin::Label-->
								<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Upload Foto">
									<i class="bi bi-pencil-fill fs-7"></i>
									<!--begin::Inputs-->
									<input type="file" accept=".png, .jpg, .jpeg" id="user-file" name="User[file]" />
									<input type="hidden" name="User[file]" value="">
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
							<!--end::Image input-->
							<!--begin::Hint-->
							<div class="form-text">Pas Foto berformat : png, jpg, jpeg.</div>
						</div>
						<div class="col-xl-6">
							<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">NPM</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Npm maksimal 12 karakter / angka"></i>
							</label>
							<input class="form-control form-control-lg form-control-solid" minlength="12" maxlength="12" type="text" placeholder="" autocomplete="off" id="user-npm" name="User[npm]" required />
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-xl-6">
							<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">NIK</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
							</label>
							<input class="form-control form-control-lg form-control-solid" minlength="10" maxlength="12" type="text" placeholder="" autocomplete="off" id="user-nik" name="User[nik]" required />
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="fv-row mb-7">
						<label class="d-flex align-items-center fs-6 fw-bold mb-2">
							<span class="required">Nama Lengkap</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
						</label>
						<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" autocomplete="off" id="user-nama_lengkap" name="User[nama_lengkap]" required />
					</div>
					<div class="fv-row mb-7">
						<label class="d-flex align-items-center fs-6 fw-bold mb-2">
							<span class="required">Email</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
						</label>
						<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" autocomplete="off" id="user-email" name="User[email]" required />
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="mb-10 fv-row" data-kt-password-meter="true">
						<!--begin::Wrapper-->
						<div class="mb-1">
							<!--begin::Label-->
							<label class="form-label fw-bolder text-dark fs-6">Password</label>
							<!--end::Label-->
							<!--begin::Input wrapper-->
							<div class="position-relative mb-3">
								<input class="form-control form-control-lg form-control-solid" type="password" minlength="6" placeholder="" autocomplete="off" id="user-password" name="User[password]" required />
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
					<div class="seprator"></div>
					<div class="fv-row mb-7">
						<label class="d-flex align-items-center fs-6 fw-bold mb-2">
							<span class="required">Nomor HP / WA</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
						</label>
						<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="user-no_hp" name="User[no_hp]" autocomplete="off" required />
					</div>
					<div class="row fv-row mb-7">
						<!--begin::Col-->
						<div class="col-xl-6">
							<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">Fakultas</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
							</label>
							<select class="form-select form-select-solid" data-kt-select2="true" data-allow-clear="true" data-placeholder="Pilih Fakultas" id="user-id_fakultas" name="User[id_fakultas]">
								<option value="">Pilih Fakultas</option>
								<?php $fakultas = Fakultas::find()->all();
								foreach ($fakultas as $f) : ?>
									<option value="<?= $f->id ?>"><?= $f->fakultas ?></option>
								<?php endforeach; ?>
							</select>

						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-xl-6">
							<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">Jurusan</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
							</label>
							<select class="form-select form-select-solid" data-kt-select2="true" data-allow-clear="true" data-placeholder="Pilih Jurusan" id="user-id_jurusan" name="User[id_jurusan]" required>
								<option value="">Pilih Jurusan</option>
								<?php $jurusan = Jurusan::find()->all();
								foreach ($jurusan as $j) : ?>
									<option value="<?= $j->id ?>"><?= $j->jurusan ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<!--end::Col-->
					</div>
					<div class="row fv-row mb-7">
						<!--begin::Col-->
						<div class="col-xl-6">
							<label class="d-flex align-items-center fs-6 fw-bold mb-2">
								<span class="required">Tempat Lahir</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
							</label>
							<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="user-tempat_lahir" name="User[tempat_lahir]" autocomplete="off" required />
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-xl-6">
							<label class="required fs-6 fw-bold mb-2">Tanggal Lahir</label>
							<!--begin::Input-->
							<div class="position-relative d-flex align-items-center" data-provide="datepicker">

								<input class="form-control form-control-solid ps-12" data-date-format="mm/dd/yyyy" type="date" " id=" user-tanggal_lahir" name="User[tanggal_lahir]" required />
								<!--end::Datepicker-->
							</div>
						</div>
						<!--end::Col-->
					</div>
					<div class="col-md-6 fv-row mb-3">
						<label class="required fs-6 fw-bold mb-2">Jenis Kelamin</label>
						<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Pilih Jenis Kelamin" id=" user-jenis_kelamin" name="User[jenis_kelamin]" required>
							<option value="">Pilih Jenis Kelamin</option>
							<option value="1">Pria</option>
							<option value="2">Wanita</option>
						</select>
					</div>
					<!--end::Input group=-->
					<!--begin::Actions-->
					<div class="text-center">
						<button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
							<span class="indicator-label">Register</span>
							<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
					<?php ActiveForm::end(); ?>
					<!-- </form> -->
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->