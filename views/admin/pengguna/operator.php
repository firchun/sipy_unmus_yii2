<?php

use app\models\Jurusan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use sdelfi\datatables\DataTables;

/** @var yii\web\View $this */
/** @var app\models\FakultasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Mahasiswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <div class="card-header cursor-pointer">
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= Html::encode($this->title) ?></h3>
        </div>
        <!-- <a href="../../demo2/dist/account/settings.html" class="btn btn-primary align-self-center">Edit Profile</a> -->
        <a href="<?= Url::to(['/pengguna/tambah-operator']) ?>" class="btn  btn-light btn-active-primary align-self-center">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                </svg>
            </span>
            <!--end::Svg Icon-->Tambah Data
        </a>
    </div>
    <div class="card-body p-9">


        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <div class="table-responsive">
            <?= DataTables::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4'],
                'columns' => [
                    [
                        'header' => 'No.',
                        'headerOptions' => ['style' => 'width:30px', 'class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'class' => 'yii\grid\SerialColumn'
                    ],

                    // 'id',
                    'nama_lengkap',
                    [
                        'attribute' => 'npm',
                        'header' => 'NIP/NIDN',
                    ],
                    'no_hp',
                    'fakultas.fakultas',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Aksi',
                        'headerOptions' => ['style' => 'width:300px', 'class' => 'text-center'],
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
                            'leadDelete' => function ($url, $model) {
                                $url = Url::to(['delete', 'id' => $model->id]);
                                return Html::a('<span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                        </svg>
                    </span>', $url, [
                                    'title' => 'delete',
                                    'data-confirm' => Yii::t('yii', 'data ini di hapus'),
                                    'data-method' => 'post',
                                    'class' => 'btn btn-icon btn-bg-secondary btn-active-color-danger btn-sm me-1',
                                ]);
                            },

                        ],
                    ]
                ],
            ]); ?>
        </div>



    </div>
</div>