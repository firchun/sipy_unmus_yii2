<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JadwalYudisiumSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jadwal-yudisium-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_users') ?>

    <?= $form->field($model, 'id_fakultas') ?>

    <?= $form->field($model, 'awal_daftar') ?>

    <?= $form->field($model, 'akhir_daftar') ?>

    <?php // echo $form->field($model, 'pelaksanaan') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
