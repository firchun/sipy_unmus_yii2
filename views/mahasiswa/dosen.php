<?php

use app\models\DataYudisium;
use app\models\Dosen;
use app\models\DosenPembimbing;
use app\models\DosenPenguji;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$dosen = Dosen::find()->where(['id_fakultas' => Yii::$app->user->identity->id_fakultas])->all();
$dosen_pembimbing = DosenPembimbing::find()->where(['id_users' => Yii::$app->user->identity->id])->all();
$dosen_penguji = DosenPenguji::find()->where(['id_users' => Yii::$app->user->identity->id])->all();
$data_yudisium = DataYudisium::findOne(['id_users' => Yii::$app->user->identity->id]);
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<div class="d-flex flex-wrap flex-stack my-5">
    <!--begin::Heading-->
    <h3 class="fw-bolder my-2 ml-10">Data Dosen Pembimbing dan Penguji</h3>
    <!--end::Heading-->
    <!--begin::Controls-->
    <div class="d-flex my-2">
        <a href="<?= Url::to(['/mahasiswa/data-yudisium']) ?>" class="btn btn-primary btn-sm fw-bolder">Data Yudisium</a>
    </div>
    <!--end::Controls-->
</div>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

    <div class="card-body">
        <div class="row">
            <div class="col-md-6 px-2">

                <!-- form dosen pembimbing -->
                <div class="my-2 border p-3">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="field">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Pilih Dosen Pembimbing</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                        </label>
                        <table class="table table-bordered" id="dynamic_field">
                            <tr>
                                <td><select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid" id="DosenPembimbing-id_dosen" name="DosenPembimbing[id_dosen][]">
                                        <option value="">Pilih Dosen</option>
                                        <?php
                                        foreach ($dosen as $d) : ?>
                                            <option value="<?= $d->id ?>"><?= $d->nama_lengkap ?> - <?= $d->nip ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><button type="button" name="add" id="add" class="btn btn-sm btn-secondary">+</button></td>
                            </tr>
                        </table>
                        <input type="hidden" id="DosenPembimbing-id_users" name="DosenPembimbing[id_users]" value="<?= Yii::$app->user->identity->id ?>" />
                        <input type="hidden" id="DosenPembimbing-id_data_yudisium" name="DosenPembimbing[id_data_yudisium]" value="<?= $data_yudisium->id ?>" />
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    </div>

                    <div class="form-group my-4">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <!--begin::Separator-->
                <!-- <div class="separator separator-dashed mb-8"></div> -->
                <!--end::Separator-->
                <!-- data dosen pembimbing -->
                <div class="p-3">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <td>Dosen Pembimbing</td>
                            <td>NIP/NIDN/NPPPT</td>
                            <td></td>
                        </thead>
                        <tbody>
                            <?php foreach ($dosen_pembimbing as $dt_d) : ?>
                                <tr>
                                    <td>
                                        <?= $dt_d->dosen->nama_lengkap ?>
                                    </td>
                                    <td>
                                        <?= $dt_d->dosen->nip ?>
                                    </td>

                                    <td><a href="<?= Url::to(['delete1', 'id' => $dt_d->id]) ?>" class="btn btn-icon btn-bg-secondary btn-active-color-danger btn-sm me-1" data-confirm="Dosen Penguji akan di hapus pada daftar" data-method="POST">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="col-md-6 ">
                <!-- form dosen penguji -->
                <div class="my-2 border p-3">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Pilih Dosen Penguji</span>
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                    </label>
                    <table class="table table-bordered" id="dynamic_field_penguji">
                        <tr>
                            <td><select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid" id="DosenPenguji-id_dosen" name="DosenPenguji[id_dosen][]">
                                    <option value="">Pilih Dosen</option>
                                    <?php
                                    foreach ($dosen as $d) : ?>
                                        <option value="<?= $d->id ?>"><?= $d->nama_lengkap ?> - <?= $d->nip ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td><button type="button" name="add_penguji" id="add_penguji" class="btn btn-sm btn-secondary">+</button></td>
                        </tr>
                    </table>

                    <input type="hidden" id="DosenPenguji-id_users" name="DosenPenguji[id_users]" value="<?= Yii::$app->user->identity->id ?>" />
                    <input type="hidden" id="DosenPenguji-id_data_yudisium" name="DosenPenguji[id_data_yudisium]" value="<?= $data_yudisium->id ?>" />
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    <div class="form-group my-4">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <!-- data dosen penguji -->
                <div class="p-3">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <td>Dosen Penguji</td>
                            <td>NIP/NIDN/NPPPT</td>
                            <td></td>
                        </thead>
                        <tbody>
                            <?php foreach ($dosen_penguji as $dt_p) : ?>
                                <tr>
                                    <td>
                                        <?= $dt_p->dosen->nama_lengkap ?>
                                    </td>
                                    <td>
                                        <?= $dt_p->dosen->nip ?>
                                    </td>
                                    <td><a href="<?= Url::to(['delete2', 'id' => $dt_p->id]) ?>" class="btn btn-icon btn-bg-secondary btn-active-color-danger btn-sm me-1" data-confirm="Dosen Penguji akan di hapus pada daftar" data-method="POST">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </td>

                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var i = 1;

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid" id="DosenPembimbing-id_dosen" name="DosenPembimbing[id_dosen][]"> <option value= ""> Pilih Dosen </option><?php foreach ($dosen as $d) : ?> <option value = "<?= $d->id ?>" > <?= $d->nama_lengkap ?> - <?= $d->nip ?> </option><?php endforeach; ?> </select></td> <td> <button type = "button" name = "remove"id = "' + i + '"class = "btn btn-sm btn-danger btn_remove" > X </button></td > </tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });

    $(document).ready(function() {
        var i = 1;

        $('#add_penguji').click(function() {
            i++;
            $('#dynamic_field_penguji').append('<tr id="row' + i + '" class="dynamic-added"><td><select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid" id="DosenPenguji-id_dosen" name="DosenPenguji[id_dosen][]"> <option value= ""> Pilih Dosen </option><?php foreach ($dosen as $d) : ?> <option value = "<?= $d->id ?>" > <?= $d->nama_lengkap ?> - <?= $d->nip ?> </option><?php endforeach; ?> </select></td> <td> <button type = "button" name = "remove"id = "' + i + '"class = "btn btn-sm btn-danger btn_remove_penguji" > X </button></td > </tr>');
        });

        $(document).on('click', '.btn_remove_penguji', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>