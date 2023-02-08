<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../../">
	<title><?= Yii::$app->name; ?></title>
	<meta name="description" content="Sistem Informasi pendaftaran yudisium universitas musamus merauke" />
	<meta name="keywords" content="sipy, unmus, universitas musamus, merauke, smart sistem, sistem informasi, universitas musamus merauke, wisudawan musamus, yudisium musamus" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Sistem Informasi pendaftaran yudisium universitas musamus merauke" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="SIPY - UNMUS" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon-unmus.ico" />

	<?php

	use yii\bootstrap5\Alert; ?>
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
</head>

<?= Alert::widget() ?>
<?= $content ?>
<!--begin::Footer-->
<div class="d-flex flex-center flex-column-auto p-10">
	<!--begin::Links-->
	<div class="d-flex align-items-center fw-bold fs-6">
		<a href="<?php echo Yii::$app->request->baseUrl; ?>" class="text-muted text-hover-primary px-2">Home</a>

	</div>
	<!--end::Links-->
</div>
<!--end::Footer-->
</div>
<!--end::Authentication - Sign-in-->
</div>
<!--end::Main-->
<script>
	var hostUrl = "<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/";
</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/new-target.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/scripts.bundle.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/create-app.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/modals/upgrade-plan.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/widgets.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/apps/chat/chat.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/assets/dist/assets/js/custom/authentication/sign-in/general.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>