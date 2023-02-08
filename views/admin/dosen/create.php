<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dosen $model */

$this->title = 'Tambah Data Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
	<div class="card-header cursor-pointer">
			<div class="card-title m-0">
				<h3 class="fw-bolder m-0"><?= Html::encode($this->title) ?></h3>
			</div>
				
	</div>
	<div class="card-body p-9">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
