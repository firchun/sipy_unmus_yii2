<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>


<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - 404 Page-->
    <div class="d-flex flex-column flex-center flex-column-fluid p-10">
        <!--begin::Illustration-->
        <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/media/illustrations/sigma-1/17.png" alt="" class="mw-100 mb-10 h-lg-450px" />
        <!--end::Illustration-->
        <!--begin::Message-->
        <h1 class="fw-bold mb-10" style="color: #A3A3C7"><?= nl2br(Html::encode($message)) ?></h1>
        <!--end::Message-->
        <!--begin::Link-->
        <a href="<?= Url::to(['/site/index']) ?>" class="btn btn-primary">Return Home</a>
        <!--end::Link-->
    </div>
    <!--end::Authentication - 404 Page-->
</div>