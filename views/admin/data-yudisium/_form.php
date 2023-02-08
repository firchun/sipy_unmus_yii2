<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DataYudisium $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="data-yudisium-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_users')->textInput() ?>

    <?= $form->field($model, 'id_jurusan')->textInput() ?>

    <?= $form->field($model, 'krs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'khs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transkrip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul_skripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cover_skripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'persetujuan_skripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pengesahan_skripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ijazah_terakhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sk_bimbingan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'persetujuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_yudisium')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
