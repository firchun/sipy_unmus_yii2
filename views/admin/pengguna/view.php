<?php

use app\models\User;
use yii\helpers\Url;

?>
<div class="d-flex flex-wrap flex-stack my-5 mx-5">
    <!--begin::Heading-->
    <h3 class="fw-bolder my-2">Data Mahasiswa : <?= $model->nama_lengkap . ' [' . $model->npm  . ']' ?>

    </h3>
    <!--end::Heading-->
    <!--begin::Controls-->
    <div class="d-flex my-2">
        <a href="<?= Url::to(['/pengguna/mahasiswa']) ?>" class="btn btn-primary btn-sm fw-bolder">Kembali</a>
    </div>
    <!--end::Controls-->
</div>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

    <div class="card-body p-9">
        <!--begin::Row-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Nama Lengkap</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800"><?= $model->nama_lengkap ?></span>
            </div>
            <!--end::Col-->
        </div>
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">NPM</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800"><?= $model->npm ?></span>
            </div>
            <!--end::Col-->
        </div>
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">NIK</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800"><?= $model->nik ?></span>
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
                <span class="fw-bold text-gray-800 fs-6"> <?= $model->fakultas->fakultas; ?> / <?= $model->jurusan->jurusan; ?></span>
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
                <span class="fw-bolder fs-6 text-gray-800 me-2"><?= $model->no_hp; ?></span>
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
                <span class="fw-bolder fs-6 text-gray-800 me-2"><?= $model->email; ?></span>
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
                <span class="fw-bolder fs-6 text-gray-800 me-2"><?= $model->jenis_kelamin ?></span>
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
                <span class="fw-bolder fs-6 text-gray-800"><?= $model->tempat_lahir; ?>, <?= $model->tanggal_lahir; ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->


    </div>
    <!--end::Card body-->
</div>