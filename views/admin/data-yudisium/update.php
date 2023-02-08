<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DataYudisium $model */

$this->title = 'Update Data Yudisium: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Yudisia', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-yudisium-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
