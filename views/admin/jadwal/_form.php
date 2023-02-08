<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JadwalYudisium $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jadwal-yudisium-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_users')->textInput() ?>

    <?= $form->field($model, 'id_fakultas')->textInput() ?>

    <?= $form->field($model, 'awal_daftar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'akhir_daftar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelaksanaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
