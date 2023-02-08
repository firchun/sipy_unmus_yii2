<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Gelombang $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="gelombang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_gelombang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gelombang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'awal_daftar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'akhir_daftar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelaksanaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
