<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DataYudisium $model */

$this->title = 'Create Data Yudisium';
$this->params['breadcrumbs'][] = ['label' => 'Data Yudisia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-yudisium-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
