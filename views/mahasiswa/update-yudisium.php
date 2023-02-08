<?php

use app\models\DataYudisium;
use kartik\form\ActiveForm;
use yii\helpers\Url;

$data_yudisium = DataYudisium::findOne(['id_users' => Yii::$app->user->identity->id]);
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
?>
<div class="d-flex flex-wrap flex-stack my-5">
    <!--begin::Heading-->
    <h3 class="fw-bolder my-2">Ubah Data Yudisium

    </h3>
    <!--end::Heading-->
    <!--begin::Controls-->
    <div class="d-flex my-2">
        <a href="<?= Url::to(['/mahasiswa/data-yudisium']) ?>" class="btn btn-danger btn-sm fw-bolder">Batalkan</a>
    </div>
    <!--end::Controls-->
</div>
<div class="row">
    <div class="col-md-3 pb-5">
        <!--begin::Card-->
        <div class="card ">
            <!--begin::Card body-->
            <div class="card-body p-3">

                <!--begin::Card body-->
                <div class="card-body border-top px-9 py-9">
                    <!--begin::Option-->
                    <label class="form-check form-check-custom form-check-solid align-items-start">
                        <!--begin::Label-->
                        <span class="form-check-label d-flex flex-column align-items-start">
                            <span class="fw-bolder text-primary fs-5 mb-0">Judul Skripsi</span>
                            <span class=" fs-6"><?= $data_yudisium->judul_skripsi ?></span>
                        </span>
                        <!--end::Label-->
                    </label>
                    <!--end::Option-->
                </div>
                <div class="card-body border-top px-9 py-9">
                    <!--begin::Option-->
                    <label class="form-check form-check-custom form-check-solid align-items-start">
                        <!--begin::Label-->
                        <span class="form-check-label d-flex flex-column align-items-start">
                            <span class="fw-bolder text-primary fs-5 mb-0">Status</span>
                            <span class=" fs-6"><?= $progress_status ?></span>
                        </span>
                        <!--end::Label-->
                    </label>
                    <!--end::Option-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <div class="col-md-9 ">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
            <!--begin::Col-->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!--begin::Card-->
                <div class="card h-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                        <div class="fs-5 fw-bolder mb-2">KRS

                            <hr>
                        </div>
                        <!--begin::Name-->
                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#krs_modal">

                            <!--begin::Image-->
                            <div class="symbol symbol-60px mb-5">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/svg/files/pdf.svg" alt="">
                            </div>
                            <!--end::Image-->
                            <!--begin::Title-->
                            <div class=" fw-bolder mb-2 opacity-50"><?= $model->krs ?></div>
                            <!--end::Title-->
                        </a>
                        <div class="p-2 mt-3">
                            <?= $form->field($model, 'file_krs')->fileInput()->label('Ubah KRS') ?>
                        </div>

                        <!--end::Name-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!--begin::Card-->
                <div class="card h-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">

                        <div class="fs-5 fw-bolder mb-2">KHS
                            <hr>
                        </div>
                        <!--begin::Name-->
                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#khs_modal">
                            <!--begin::Image-->
                            <div class="symbol symbol-60px mb-5">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/svg/files/pdf.svg" alt="">
                            </div>
                            <!--end::Image-->
                            <!--begin::Title-->
                            <div class="fw-bolder mb-2 opacity-50"><?= $model->khs ?></div>
                            <!--end::Title-->
                        </a>
                        <div class="p-2 mt-3">
                            <?= $form->field($model, 'file_khs')->fileInput()->label('Ubah KHS') ?>
                        </div>
                        <!--end::Name-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!--begin::Card-->
                <div class="card h-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                        <div class="fs-5 fw-bolder mb-2">Cover Skripsi
                            <hr>
                        </div>
                        <!--begin::Name-->
                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#cover_modal">
                            <!--begin::Image-->
                            <div class="symbol symbol-60px mb-5">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/svg/files/pdf.svg" alt="">
                            </div>
                            <!--end::Image-->
                            <!--begin::Title-->
                            <div class="fw-bolder mb-2 opacity-50"><?= $model->cover_skripsi ?></div>
                            <!--end::Title-->
                        </a>
                        <div class="p-2 mt-3">
                            <?= $form->field($model, 'file_cover')->fileInput()->label('Ubah Cover Skripsi') ?>
                        </div>
                        <!--end::Name-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!--begin::Card-->
                <div class="card h-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                        <div class="fs-5 fw-bolder mb-2">Persetujuan Skripsi
                            <hr>
                        </div>
                        <!--begin::Name-->
                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#persetujuan_modal">
                            <!--begin::Image-->
                            <div class="symbol symbol-60px mb-5">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/svg/files/pdf.svg" alt="">
                            </div>
                            <!--end::Image-->
                            <!--begin::Title-->
                            <div class="fw-bolder mb-2 opacity-50"><?= $model->persetujuan_skripsi ?></div>
                            <!--end::Title-->
                        </a>
                        <div class="p-2 mt-3">
                            <?= $form->field($model, 'file_persetujuan')->fileInput()->label('Ubah Persetujuan Skripsi') ?>
                        </div>
                        <!--end::Name-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!--begin::Card-->
                <div class="card h-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                        <div class="fs-5 fw-bolder mb-2">Ijazah Terakhir
                            <hr>
                        </div>
                        <!--begin::Name-->
                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#ijazah_modal">
                            <!--begin::Image-->
                            <div class="symbol symbol-60px mb-5">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/svg/files/pdf.svg" alt="">
                            </div>
                            <!--end::Image-->
                            <!--begin::Title-->
                            <div class="fw-bolder mb-2 opacity-50"><?= $model->ijazah_terakhir ?></div>
                            <!--end::Title-->
                        </a>
                        <div class="p-2 mt-3">
                            <?= $form->field($model, 'file_ijazah')->fileInput()->label('Ubah Ijazah Terakhir') ?>
                        </div>
                        <!--end::Name-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!--begin::Card-->
                <div class="card h-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                        <div class="fs-5 fw-bolder mb-2">SK Bimbingan
                            <hr>
                        </div>
                        <!--begin::Name-->
                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#sk_modal">
                            <!--begin::Image-->
                            <div class="symbol symbol-60px mb-5">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/svg/files/pdf.svg" alt="">
                            </div>
                            <!--end::Image-->
                            <!--begin::Title-->
                            <div class="fw-bolder mb-2 opacity-50"><?= $model->sk_bimbingan ?></div>
                            <!--end::Title-->
                        </a>
                        <div class="p-2 mt-3">
                            <?= $form->field($model, 'file_sk')->fileInput()->label('Ubah SK Bimbingan') ?>
                        </div>
                        <!--end::Name-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!--begin::Card-->
                <div class="card h-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                        <div class="fs-5 fw-bolder mb-2">KTP
                            <hr>
                        </div>
                        <!--begin::Name-->
                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#ktp_modal">
                            <!--begin::Image-->
                            <div class="symbol symbol-60px mb-5">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/svg/files/pdf.svg" alt="">
                            </div>
                            <!--end::Image-->
                            <!--begin::Title-->
                            <div class="fw-bolder mb-2 opacity-50"><?= $model->ktp ?></div>
                            <!--end::Title-->
                        </a>
                        <div class="p-2 mt-3">
                            <?= $form->field($model, 'file_ktp')->fileInput()->label('Ubah KTP') ?>
                        </div>
                        <!--end::Name-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!--begin::Card-->
                <div class="card h-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                        <div class="fs-5 fw-bolder mb-2">Pengesahan Skripsi
                            <hr>
                        </div>
                        <!--begin::Name-->
                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#pengesahan_modal">
                            <!--begin::Image-->
                            <div class="symbol symbol-60px mb-5">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/svg/files/pdf.svg" alt="">
                            </div>
                            <!--end::Image-->
                            <!--begin::Title-->
                            <div class="fw-bolder mb-2 opacity-50"><?= $model->pengesahan_skripsi ?></div>
                            <!--end::Title-->
                        </a>
                        <div class="p-2 mt-3">
                            <?= $form->field($model, 'file_pengesahan')->fileInput()->label('Ubah Pengesahan Skripsi') ?>
                        </div>
                        <!--end::Name-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<!-- modals -->
<!--begin::Modal - krs-->
<div class="modal fade" id="krs_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>File KRS</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y ">
                <!--begin::Form-->
                <embed type="application/pdf" src="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-krs/<?= $model->krs ?>" width="100%" height="500"></embed>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - krs-->
<!--begin::Modal - krs-->
<div class="modal fade" id="khs_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>File KHS</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y ">
                <!--begin::Form-->
                <embed type="application/pdf" src="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-khs/<?= $model->khs ?>" width="100%" height="500"></embed>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - krs-->
<!--begin::Modal - krs-->
<div class="modal fade" id="cover_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>File Cover Skripsi</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y ">
                <!--begin::Form-->
                <embed type="application/pdf" src="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-cover/<?= $model->cover_skripsi ?>" width="100%" height="500"></embed>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - krs-->
<!--begin::Modal - krs-->
<div class="modal fade" id="transkrip_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>File Transkrip Nilai</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y ">
                <!--begin::Form-->
                <embed type="application/pdf" src="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-transkrip/<?= $model->transkrip ?>" width="100%" height="500"></embed>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - krs-->
<!--begin::Modal - krs-->
<div class="modal fade" id="ijazah_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>File Ijazah Terakhir</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y ">
                <!--begin::Form-->
                <embed type="application/pdf" src="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-ijazah/<?= $model->ijazah_terakhir ?>" width="100%" height="500"></embed>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - krs-->
<!--begin::Modal - krs-->
<div class="modal fade" id="sk_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>File SK Bimbingan</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y ">
                <!--begin::Form-->
                <embed type="application/pdf" src="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-bimbingan/<?= $model->sk_bimbingan ?>" width="100%" height="500"></embed>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - krs-->
<!--begin::Modal - krs-->
<div class="modal fade" id="persetujuan_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>File Persetujuan Skripsi</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y ">
                <!--begin::Form-->
                <embed type="application/pdf" src="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-persetujuan/<?= $model->persetujuan_skripsi ?>" width="100%" height="500"></embed>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - krs-->
<!--begin::Modal - krs-->
<div class="modal fade" id="pengesahan_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>File Pengesahan Skripsi</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y ">
                <!--begin::Form-->
                <embed type="application/pdf" src="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-pengesahan/<?= $model->pengesahan_skripsi ?>" width="100%" height="500"></embed>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - krs-->
<!--begin::Modal - krs-->
<div class="modal fade" id="ktp_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>File KTP</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y ">
                <!--begin::Form-->
                <embed type="application/pdf" src="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-ktp/<?= $model->ktp ?>" width="100%" height="500"></embed>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - krs-->