<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JadwalYudisium $model */

$this->title = 'Create Jadwal Yudisium';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Yudisia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-yudisium-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
