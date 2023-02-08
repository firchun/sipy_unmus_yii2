<?php

use app\models\Gelombang;
use app\models\Jurusan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$persetujuan = [
    '' => 'Semua',
    '0' => 'Belum Disetujui',
    '1' => 'Sudah Disetujui',
]
/** @var yii\web\View $this */
/** @var app\models\SearchDataYudisium $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="data-yudisium-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class=" fw-bold fs-6 mb-4 pe-2 border border-gray-300 border-dashed rounded p-5 bg-light">
        <div class="row">
            <div class="col-lg-6 my-3">
                <div class="row">
                    <span class="border-bottom mb-2 text-primary">Cari By Gelombang</span>
                    <div class="col-md-6 my-2">
                        <?= $form->field($model, 'gelombangfrom')->dropDownList(ArrayHelper::map(Gelombang::find()->all(), 'id', 'kode_gelombang'), ['prompt' => 'Semua Gelombang',])->label('Dari'); ?>
                    </div>
                    <div class="col-md-6 my-2">
                        <?= $form->field($model, 'gelombangto')->dropDownList(ArrayHelper::map(Gelombang::find()->all(), 'id', 'kode_gelombang'), ['prompt' => 'Semua Gelombang',])->label('Sampai'); ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 my-3 boreder-left">
                <div class="row">
                    <span class="border-bottom mb-2 text-primary">Cari By Tahun</span>
                    <div class="col-md-6 my-2">
                        <?= $form->field($model, 'tahunfrom')->dropDownList(ArrayHelper::map(Gelombang::find()->all(), 'tahun', 'tahun'), ['prompt' => 'Semua Tahun',])->label('Dari'); ?>
                    </div>
                    <div class="col-md-6 my-2">
                        <?= $form->field($model, 'tahunto')->dropDownList(ArrayHelper::map(Gelombang::find()->all(), 'tahun', 'tahun'), ['prompt' => 'Semua Tahun',])->label('Sampai'); ?>
                    </div>

                </div>
            </div>
        </div>

        <div class=" my-2">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Reset', Url::to(['/data-wisuda/index']), ['class' => 'btn btn-secondary']) ?>
        </div>


    </div>



    <?php ActiveForm::end(); ?>

</div>