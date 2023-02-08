<?php

use app\models\Jurusan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use sdelfi\datatables\DataTables;
use yii\bootstrap5\Modal;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var app\models\FakultasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Mahasiswa Yudisium';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <div class="card-header cursor-pointer">
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= Html::encode($this->title) ?></h3>
        </div>

    </div>
    <div class="card-body p-9">


        <?php echo $this->render('_search', ['model' => $searchModel]);
        ?>
        <div class="my-3 ">
            <a href="<?= Url::to(['/data-yudisium/cetak']) ?>" class="btn btn-success align-self-center">Perisapan Cetak</a>
        </div>

        <div class="table-responsive">

            <?= DataTables::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4'],
                'rowOptions' => function ($model) {
                    if ($model->persetujuan == 1) {

                        return ['class' => 'bg-white'];
                    } else  if ($model->persetujuan == 0) {
                        return ['class' => 'bg-warning text-white'];
                    } else {
                        return ['class' => 'bg-danger text-white'];
                    }
                },
                'columns' => [
                    [
                        'header' => 'No.',
                        'headerOptions' => ['style' => 'width:30px', 'class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'class' => 'yii\grid\SerialColumn'
                    ],
                    'user.nama_lengkap',
                    'user.npm',
                    'jurusan.jurusan',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Aksi',
                        'headerOptions' => ['style' => 'width:50px', 'class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'template' => '{leadSertifikat}{leadDetail}{leadUpdate}{leadDelete}',
                        'buttons' => [
                            'leadDetail' => function ($url, $model) {
                                $url = Url::to(['view', 'id' => $model->id]);
                                return Html::a('
                        <span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black"></path>
																				<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black"></path>
																			</svg>
																		</span>
                                                                        ', $url, ['class' => 'btn btn-icon btn-bg-secondary btn-active-color-primary btn-sm me-1']);
                            },
                        ],
                    ]
                ],

            ]); ?>
        </div>



    </div>
</div>