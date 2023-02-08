<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JadwalYudisium $model */

$this->title = 'Update Jadwal Yudisium: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Yudisia', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwal-yudisium-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
