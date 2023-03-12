<?php

use app\models\Dosen;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\multiselect\MultiSelect;
use mdm\widgets\GridInput;
use yii\helpers\Url;

$profil = User::findOne(['id' => Yii::$app->user->identity->id]);
$dosen = Dosen::find()->all();
?>
<!--begin::details View-->
<div class="my-2">

    <a href="<?= Url::to(['/mahasiswa/dashboard']) ?>" class="btn btn-danger">Kembali</a>
</div>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Form Pendaftaran Yudisium</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <!-- <a href="../../demo2/dist/account/settings.html" class="btn btn-primary align-self-center">Edit Profile</a> -->
        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->


    <div class="card-body p-9">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-md-10">
                <div class="d-flex flex-column mb-8">
                    <label class="fs-6 fw-bold mb-2">Judul Skripsi</label>
                    <textarea class="form-control form-control-solid" rows="3" name="DataYudisium[judul_skripsi]" id="datayudisium-judul_skripsi" value="<?= $model->judul_skripsi ?>" placeholder="Tulis Judul Skripsi Anda"></textarea>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex flex-column mb-8">
                    <label class="fs-6 fw-bold mb-2">Index Prestasi Komulatif (IPK)</label>
                    <input type="number" class="form-control form-control-solid" rows="3" name="DataYudisium[ipk]" id="datayudisium-ipk" placeholder="IPK"></input type="number">
                </div>
            </div>
        </div>

        <!-- upload file -->
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row my-4">

                    <label class="col-lg-5 col-form-label text-lg-right">Upload File KRS:<br>
                        <span class="form-text text-muted">Hasil Scan KRS Semester 1 Sampai Akhir</span>
                    </label>
                    <div class="col-lg-6">
                        <div class="uppy">
                            <div class="uppy-wrapper">
                                <div class="uppy-Root uppy-FileInput-container">
                                    <input type="file" class="order border-gray-300 border-dashed rounded p-5 bg-light" accept="application/pdf" name="DataYudisium[file_krs]" id="datayudisium-file_krs">
                                </div>
                            </div>

                        </div>
                        <span class="form-text text-muted">Ukuran file kurang dari 300 KB dan berbentuk PDF.</span>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-lg-5 col-form-label text-lg-right">Upload File KHS:<br>
                        <span class="form-text text-muted">Hasil Scan KHS Semester 1 Sampai Akhir</span>
                    </label>
                    <div class="col-lg-6">
                        <div class="uppy">
                            <div class="uppy-wrapper">
                                <div class="uppy-Root uppy-FileInput-container">
                                    <input type="file" class="order border-gray-300 border-dashed rounded p-5 bg-light" accept="application/pdf" name="DataYudisium[file_khs]" id="datayudisium-file_khs">
                                </div>
                            </div>

                        </div>
                        <span class="form-text text-muted">Ukuran file kurang dari 300 KB dan berbentuk PDF.</span>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-lg-5 col-form-label text-lg-right">Upload File Transkrip Nilai:<br>
                        <span class="form-text text-muted">Hasil Scan Transkrip Nilai Semester 1 Sampai Akhir</span>
                    </label>
                    <div class="col-lg-6">
                        <div class="uppy">
                            <div class="uppy-wrapper">
                                <div class="uppy-Root uppy-FileInput-container">
                                    <input type="file" class="order border-gray-300 border-dashed rounded p-5 bg-light" accept="application/pdf" name="DataYudisium[file_transkrip]" id="datayudisium-file_transkrip">
                                </div>
                            </div>

                        </div>
                        <span class="form-text text-muted">Ukuran file kurang dari 300 KB dan berbentuk PDF.</span>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-lg-5 col-form-label text-lg-right">Upload File Cover Skripsi:<br>
                        <span class="form-text text-muted">Hasil Scan Cover Skripsi </span>
                    </label>
                    <div class="col-lg-6">
                        <div class="uppy">
                            <div class="uppy-wrapper">
                                <div class="uppy-Root uppy-FileInput-container">
                                    <input type="file" class="order border-gray-300 border-dashed rounded p-5 bg-light" accept="application/pdf" name="DataYudisium[file_cover]" id="datayudisium-file_cover">
                                </div>
                            </div>

                        </div>
                        <span class="form-text text-muted">Ukuran file kurang dari 300 KB dan berbentuk PDF.</span>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-lg-5 col-form-label text-lg-right">Upload File Persetujuan Skripsi:<br>
                        <span class="form-text text-muted">Hasil ScanPersetujuan Skripsi </span>
                    </label>
                    <div class="col-lg-6">
                        <div class="uppy">
                            <div class="uppy-wrapper">
                                <div class="uppy-Root uppy-FileInput-container">
                                    <input type="file" class="order border-gray-300 border-dashed rounded p-5 bg-light" accept="application/pdf" name="DataYudisium[file_persetujuan]" id="datayudisium-file_persetujuan">
                                </div>
                            </div>

                        </div>
                        <span class="form-text text-muted">Ukuran file kurang dari 300 KB dan berbentuk PDF.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group row my-4">
                    <label class="col-lg-5 col-form-label text-lg-right">Upload File Pengesahan Skripsi:<br>
                        <span class="form-text text-muted">Hasil Scan Pengesahan Skripsi </span>
                    </label>
                    <div class="col-lg-6">
                        <div class="uppy">
                            <div class="uppy-wrapper">
                                <div class="uppy-Root uppy-FileInput-container">
                                    <input type="file" class="order border-gray-300 border-dashed rounded p-5 bg-light" accept="application/pdf" name="DataYudisium[file_pengesahan]" id="datayudisium-file_pengesahan">
                                </div>
                            </div>

                        </div>
                        <span class="form-text text-muted">Ukuran file kurang dari 300 KB dan berbentuk PDF.</span>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-lg-5 col-form-label text-lg-right">Upload File Ijazah Terakhir:<br>
                        <span class="form-text text-muted">Hasil Scan Ijazah Terakhir </span>
                    </label>
                    <div class="col-lg-6">
                        <div class="uppy">
                            <div class="uppy-wrapper">
                                <div class="uppy-Root uppy-FileInput-container">
                                    <input type="file" class="order border-gray-300 border-dashed rounded p-5 bg-light" accept="application/pdf" name="DataYudisium[file_ijazah]" id="datayudisium-file_ijazah">
                                </div>
                            </div>

                        </div>
                        <span class="form-text text-muted">Ukuran file kurang dari 300 KB dan berbentuk PDF.</span>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-lg-5 col-form-label text-lg-right">Upload File SK Bimbingan:<br>
                        <span class="form-text text-muted">Hasil Scan SK Bimbingan </span>
                    </label>
                    <div class="col-lg-6">
                        <div class="uppy">
                            <div class="uppy-wrapper">
                                <div class="uppy-Root uppy-FileInput-container">
                                    <input type="file" class="order border-gray-300 border-dashed rounded p-5 bg-light" accept="application/pdf" name="DataYudisium[file_sk]" id="datayudisium-file_sk">
                                </div>
                            </div>

                        </div>
                        <span class="form-text text-muted">Ukuran file kurang dari 300 KB dan berbentuk PDF.</span>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-lg-5 col-form-label text-lg-right">Upload File KTP:<br>
                        <span class="form-text text-muted">Hasil Scan KTP </span>
                    </label>
                    <div class="col-lg-6">
                        <div class="uppy">
                            <div class="uppy-wrapper">
                                <div class="uppy-Root uppy-FileInput-container">
                                    <input type="file" class="order border-gray-300 border-dashed rounded p-5 bg-light" accept="application/pdf" name="DataYudisium[file_ktp]" id="datayudisium-file_ktp">
                                </div>
                            </div>

                        </div>
                        <span class="form-text text-muted">Ukuran file kurang dari 300 KB dan berbentuk PDF.</span>
                    </div>
                </div>
            </div>
        </div>


        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
        <div class="form-group my-4 text-center">
            <button type="reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan Data</button>

        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <!--end::Card body-->
</div>