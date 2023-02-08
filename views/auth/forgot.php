<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Forgot Password';
$this->breadcrumbs = array(
    'Forgot Password',
);
?>
<?php if (Yii::$app->session->getFlash('forgot')) : ?>

    <div class="flash-success">
        <?= Yii::$app->session->getFlash('forgot'); ?>
    </div>

<?php else : ?>

    <div class="form">

        <?php $form = ActiveForm::begin([
            'id' => 'forgot-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ]); ?>

        <div class="row">
            Email : <input name="Lupa[email]" id="ContactForm_email" type="email">
        </div>

        <div class="row buttons">
            <?= Html::submitButton('Submit'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->

<?php endif; ?>