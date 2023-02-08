<?php

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
        'action' => ['cetak'],
        'method' => 'get',
    ]); ?>
    <div class=" fw-bold fs-6 mb-4 pe-2 border border-gray-300 border-dashed rounded p-5 bg-light">
        <div class="row">
            <div class="col-md-8 my-2">
                <?= $form->field($model, 'id_jurusan')->dropDownList(ArrayHelper::map(Jurusan::find()->all(), 'id', 'jurusan'), ['prompt' => 'Semua Jurusan',])->label('By Jurusan'); ?>
            </div>
            <div class="col-md-4 my-2">
                <?= $form->field($model, 'persetujuan')->dropDownList($persetujuan)->label('By Persetujuan') ?>
            </div>
            <div class="col-lg-12 my-5">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Reset', Url::to(['/data-yudisium/index']), ['class' => 'btn btn-secondary']) ?>
            </div>
        </div>



    </div>



    <?php ActiveForm::end(); ?>

</div>