<?php

use app\models\DataYudisium;
use app\models\DosenPembimbing;
use app\models\DosenPenguji;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$dosen_pembimbing = DosenPembimbing::find()->where(['id_data_yudisium' => $model->id])->all();
$dosen_penguji = DosenPenguji::find()->where(['id_data_yudisium' => $model->id])->all();
if ($model->persetujuan == 0) {
    $progress = '50';
    $progress_status = 'Pengecekan data';
} else if ($model->persetujuan == 1) {
    $progress =  '100';
    $progress_status = 'Data disetujui';
} else {
    $progress = '100';
    $progress_status = 'Data Perlu Direvisi Kembali';
}
?>
<div class="d-flex flex-wrap flex-stack my-5 mx-5">
    <!--begin::Heading-->
    <h3 class="fw-bolder my-2">Data Yudisium : <?= $model->user->nama_lengkap . ' [' . $model->user->npm  . ']' ?>

    </h3>
    <!--end::Heading-->
    <!--begin::Controls-->
    <div class="d-flex my-2">
        <a href="<?= Url::to(['/data-yudisium/index']) ?>" class="btn btn-primary btn-sm fw-bolder">Kembali</a>
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
                <div class="card-body border-bottom px-9 py-9">
                    <!--begin::Option-->
                    <label class="form-check form-check-custom form-check-solid align-items-start">
                        <!--begin::Label-->
                        <span class="form-check-label d-flex flex-column align-items-start">
                            <span class="fw-bolder text-primary fs-5 mb-0">Informasi Mahasiswa</span>
                            <span class=" fs-6">
                                Nama : <?= $model->user->nama_lengkap ?><br>
                                NPM : <?= $model->user->npm ?><br>
                                <!-- Fakultas : <?php //echo $model->fakultas->fakultas 
                                                ?><br> -->
                                Jurusan : <?= $model->jurusan->jurusan ?><br>
                                NIK : <?= $model->user->nik ?><br>
                            </span>
                        </span>
                        <!--end::Label-->
                    </label>
                    <!--end::Option-->
                </div>
                <div class="card-body  px-9 py-9">
                    <!--begin::Option-->
                    <label class="form-check form-check-custom form-check-solid align-items-start">
                        <!--begin::Label-->
                        <span class="form-check-label d-flex flex-column align-items-start">
                            <span class="fw-bolder text-primary fs-5 mb-0">Judul Skripsi</span>
                            <span class=" fs-6"><?= $model->judul_skripsi ?></span>
                        </span>
                        <!--end::Label-->
                    </label>
                    <!--end::Option-->
                </div>
                <div class="card-body border-top px-3 py-5">
                    <!--begin::Option-->
                    <label class="form-check form-check-custom form-check-solid align-items-start">
                        <!--begin::Label-->
                        <span class="form-check-label d-flex flex-column align-items-start">
                            <span class="fw-bolder text-primary fs-5 mb-0">Index Prestasi Komulatif</span>
                            <span class="  fs-1 <?= $model->ipk < 3 ? 'text-danger' : 'text-success'; ?>"><?= $model->ipk ?></span>
                        </span>
                        <!--end::Label-->
                    </label>
                    <!--end::Option-->
                </div>
                <div class="card-body border-top px-3 py-5">
                    <!--begin::Option-->
                    <label class="form-check form-check-custom form-check-solid align-items-start">
                        <!--begin::Label-->
                        <span class="form-check-label d-flex flex-column align-items-start">
                            <span class="fw-bolder text-primary fs-5 mb-0">Dosen Pembimbing

                            </span>
                            <?php if ($dosen_pembimbing == null) : ?>
                                <span class="text-danger">Anda Belum Mengisi Data Dosen Pembimbing</span>
                                <a href="<?= Url::to(['/mahasiswa/dosen']) ?>" class="btn btn-sm btn-secondary my-2">Isi Data Dosen</a>
                            <?php else : ?>
                                <ul>
                                    <?php foreach ($dosen_pembimbing as $bimbing) : ?>
                                        <li><?= $bimbing->dosen->nama_lengkap ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </span>
                        <!--end::Label-->
                    </label>
                    <!--end::Option-->
                </div>
                <div class="card-body border-top px-3 py-5">
                    <!--begin::Option-->
                    <label class="form-check form-check-custom form-check-solid align-items-start">
                        <!--begin::Label-->
                        <span class="form-check-label d-flex flex-column align-items-start">
                            <span class="fw-bolder text-primary fs-5 mb-0">Dosen Penguji

                            </span>
                            <?php if ($dosen_penguji == null) : ?>
                                <span class="text-danger">Anda Belum Mengisi Data Dosen Pembimbing</span>
                                <a href="<?= Url::to(['/mahasiswa/dosen']) ?>" class="btn btn-sm btn-secondary my-2">Isi Data Dosen</a>
                            <?php else : ?>

                                <ul>
                                    <?php foreach ($dosen_penguji as $uji) : ?>
                                        <li><?= $uji->dosen->nama_lengkap ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </span>
                        <!--end::Label-->
                    </label>
                    <!--end::Option-->
                </div>
                <?php if (Yii::$app->user->identity->role == 2) : ?>
                    <div class="card-body  px-9 py-9 border border-gray-300 border-dashed rounded bg-light">
                        <label class="form-check form-check-custom form-check-solid align-items-start">
                            <!--begin::Label-->
                            <span class="form-check-label d-flex flex-column align-items-start">
                                <span class="fw-bolder text-black fs-5 mb-0">Persetujuan Yudisium</span>
                            </span>
                            <!--end::Label-->
                        </label>
                        <?php $form = ActiveForm::begin();
                        ?>

                        <!--begin::Option-->
                        <div class="row mb-0 border-top border-bottom mb-3">
                            <!--begin::Label-->

                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="align-items-center">
                                <?= $form->field($model, 'persetujuan')->dropDownList(['0' => 'Proses', '1' => 'Disetujui'])->label('') ?>

                            </div>

                            <!--begin::Label-->
                        </div>
                        <button type=" submit" class="btn btn-sm btn-primary">Simpan Perubahan</button>
                        <!--end::Option-->
                        <?php ActiveForm::end(); ?>
                    </div>
                <?php else : ?>
                    <div class="card-body border-top px-3 py-5">
                        <!--begin::Option-->
                        <label class="form-check form-check-custom form-check-solid align-items-start">
                            <!--begin::Label-->
                            <span class="form-check-label d-flex flex-column align-items-start">
                                <span class="fw-bolder text-primary fs-5 mb-0">Status</span>
                                <span class=" fs-6"><?= $model->persetujuan ?></span>
                            </span>
                            <!--end::Label-->
                        </label>
                        <!--end::Option-->
                    </div>

                <?php endif; ?>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <div class="col-md-9 ">
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
                            <div class="fs-5 fw-bolder mb-2"><?= $model->krs ?></div>
                            <!--end::Title-->
                        </a>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-krs/<?= $model->krs ?>" class="btn btn-sm btn-block btn-light-success font-weight-bold my-4" download="<?= $model->krs ?>">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            Download
                        </a>
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
                            <div class="fs-5 fw-bolder mb-2"><?= $model->khs ?></div>
                            <!--end::Title-->
                        </a>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-krs/<?= $model->krs ?>" class="btn btn-sm btn-block btn-light-success font-weight-bold my-4" download="<?= $model->krs ?>">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            Download
                        </a>
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
                            <div class="fs-5 fw-bolder mb-2"><?= $model->cover_skripsi ?></div>
                            <!--end::Title-->
                        </a>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-krs/<?= $model->krs ?>" class="btn btn-sm btn-block btn-light-success font-weight-bold my-4" download="<?= $model->krs ?>">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            Download
                        </a>
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
                            <div class="fs-5 fw-bolder mb-2"><?= $model->persetujuan_skripsi ?></div>
                            <!--end::Title-->
                        </a>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-krs/<?= $model->krs ?>" class="btn btn-sm btn-block btn-light-success font-weight-bold my-4" download="<?= $model->krs ?>">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            Download
                        </a>
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
                            <div class="fs-5 fw-bolder mb-2"><?= $model->ijazah_terakhir ?></div>
                            <!--end::Title-->
                        </a>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-krs/<?= $model->krs ?>" class="btn btn-sm btn-block btn-light-success font-weight-bold my-4" download="<?= $model->krs ?>">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            Download
                        </a>
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
                            <div class="fs-5 fw-bolder mb-2"><?= $model->sk_bimbingan ?></div>
                            <!--end::Title-->
                        </a>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-krs/<?= $model->krs ?>" class="btn btn-sm btn-block btn-light-success font-weight-bold my-4" download="<?= $model->krs ?>">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            Download
                        </a>
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
                            <div class="fs-5 fw-bolder mb-2"><?= $model->ktp ?></div>
                            <!--end::Title-->
                        </a>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-krs/<?= $model->krs ?>" class="btn btn-sm btn-block btn-light-success font-weight-bold my-4" download="<?= $model->krs ?>">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            Download
                        </a>
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
                            <div class="fs-5 fw-bolder mb-2"><?= $model->pengesahan_skripsi ?></div>
                            <!--end::Title-->
                        </a>
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/berkas/berkas-krs/<?= $model->krs ?>" class="btn btn-sm btn-block btn-light-success font-weight-bold my-4" download="<?= $model->krs ?>">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            Download
                        </a>
                        <!--end::Name-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->

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