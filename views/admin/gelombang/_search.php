<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GelombangSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="gelombang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kode_gelombang') ?>

    <?= $form->field($model, 'gelombang') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'awal_daftar') ?>

    <?php // echo $form->field($model, 'akhir_daftar') ?>

    <?php // echo $form->field($model, 'pelaksanaan') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
