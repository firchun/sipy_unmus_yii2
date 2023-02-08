<?php

use app\models\JadwalYudisium;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\JadwalYudisiumSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jadwal Yudisia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-yudisium-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jadwal Yudisium', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_users',
            'id_fakultas',
            'awal_daftar',
            'akhir_daftar',
            //'pelaksanaan',
            //'status',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, JadwalYudisium $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
