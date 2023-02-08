<?php

use app\models\Fakultas;
use app\models\Jurusan;
use app\widgets\Alert;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm as WidgetsActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dosen $model */

$this->title = 'Tambah Operator Fakultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <div class="card-header cursor-pointer">
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= Html::encode($this->title) ?></h3>
        </div>

    </div>
    <div class="card-body p-9">
        <?= Alert::widget() ?>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
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
                    <span class="required">NIP / NIDN </span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Npm maksimal 12 karakter / angka"></i>
                </label>
                <input class="form-control form-control-lg form-control-solid" minlength="12" maxlength="12" type="text" placeholder="" autocomplete="off" id="user-npm" name="User[npm]" required />
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-6" data-kt-password-meter="true">
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
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row">
            <div class="col-lg-4">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Nama Lengkap</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                </label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" autocomplete="off" id="user-nama_lengkap" name="User[nama_lengkap]" required />
            </div>
            <div class="col-lg-4">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Email</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                </label>
                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" autocomplete="off" id="user-email" name="User[email]" required />
            </div>
            <div class="col-lg-4">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">NIK</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                </label>
                <input class="form-control form-control-lg form-control-solid" minlength="15" maxlength="20" type="text" placeholder="" autocomplete="off" id="user-nik" name="User[nik]" required />
            </div>
        </div>

        <!--end::Input group-->
        <!--begin::Input group-->


        <div class="row fv-row mb-7">
            <div class="col-md-4">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Nomor HP / WA</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                </label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="user-no_hp" name="User[no_hp]" autocomplete="off" required />
            </div>
            <!--begin::Col-->
            <div class="col-md-4">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Fakultas</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                </label>
                <select class="form-select form-select-solid" data-control="select2" data-kt-select2="true" data-allow-clear="true" data-placeholder="Pilih Fakultas" id="user-id_fakultas" name="User[id_fakultas]">
                    <option value="">Pilih Fakultas</option>
                    <?php $fakultas = Fakultas::find()->all();
                    foreach ($fakultas as $f) : ?>
                        <option value="<?= $f->id ?>"><?= $f->fakultas ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <!--end::Col-->
            <!--begin::Col-->

            <!--end::Col-->
        </div>

        <input type="hidden" id=" user-role" name="User[role]" value="2">
        <input type="hidden" id=" user-id_status" name="User[id_status]" value="2">

        <!--end::Input group=-->
        <!--begin::Actions-->
        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
        <?php ActiveForm::end(); ?>
        <!-- </form> -->
        <!--end::Form-->
    </div>

</div>