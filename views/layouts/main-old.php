<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon-unmus.ico')]);
$brand_label = "<b>" . Yii::$app->name . "</b>";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Yii::$app->name ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => $brand_label,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-lg navbar-light bg-light']
        ]);
        echo Nav::widget([
            'options' => ['class' => 'nav d-flex justify-content-end w-100 nav-pills'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Peserta Wisuda', 'url' => ['/site/peserta']],
                ['label' => 'Jadwal Wisuda', 'url' => ['/site/jadwal']],
                Yii::$app->user->isGuest
                    ? ['label' => 'Login', 'url' => ['/site/login']]
                    : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link text-danger logout']
                    )
                    . Html::endForm()
                    . '</li>'
            ]
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container pt-0">

            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <div class="border-bottom mt-2">
                    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                </div>
            <?php endif ?>

            <?= Alert::widget() ?>
            <?= $content ?>

        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="<?= Url::to(['/site/index']) ?>" class="nav-link px-2 text-muted">Home</a></li>
                    <li class="nav-item"><a href="<?= Url::to(['/site/peserta']) ?>" class="nav-link px-2 text-muted">Peserta Wisuda</a></li>
                    <li class="nav-item"><a href="<?= Url::to(['/site/jadwal']) ?>" class="nav-link px-2 text-muted">Jadwal Wisuda</a></li>
                    <li class="nav-item"><a href="<?= Url::to(['/site/login']) ?>" class="nav-link px-2 text-muted">Login</a></li>
                </ul>
                <p class="text-center text-muted">© <?= date('Y') ?> SIPY Universitas Musamus</p>
            </footer>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>