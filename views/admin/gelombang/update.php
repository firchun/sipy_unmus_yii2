<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Gelombang $model */

$this->title = 'Update Gelombang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gelombangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gelombang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
