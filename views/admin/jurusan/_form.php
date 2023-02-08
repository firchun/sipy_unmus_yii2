<?php

use app\models\Fakultas;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Jurusan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jurusan-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?=
            $form->field($model, 'id_fakultas')
                ->dropDownList(
                    ArrayHelper::map(Fakultas::find()->asArray()->all(), 'id', 'fakultas'),
                    ['prompt' => 'Pilih Fakultas']
                )
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'jurusan')->textInput(['maxlength' => true]) ?>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>