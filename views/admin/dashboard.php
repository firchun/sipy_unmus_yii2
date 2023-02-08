<?php

/** @var yii\web\View $this */

use app\models\Gelombang;
use practically\chartjs\Chart;
?>

<div class="card border-0 h-md-100" data-theme="light" style="background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%)">
	<!--begin::Body-->
	<div class="card-body">
		<!--begin::Row-->
		<div class="row align-items-center h-100">
			<!--begin::Col-->
			<div class="col-7 ps-xl-13">
				<!--begin::Title-->
				<div class="text-white mb-6 pt-6">
					<span class="fs-4 fw-semibold me-2 d-block lh-1 pb-2 opacity-75">Hai <?= Yii::$app->user->identity->nama_lengkap ?></span>
					<span class="fs-2qx fw-bold">Selamat datang di dashboard</span>
				</div>
				<!--end::Title-->
				<!--begin::Text-->
				<span class="fw-semibold text-white fs-6 d-block opacity-80">Sistem Informasi Pendaftaran Yudisium Universitas Musamus</span>
				<span class="fw-semibold text-white  mb-8 d-block opacity-70">Pada tampilan ini anda akan melihat semua data pada sistem</span>
				<!--end::Text-->

			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-5 pt-10">
				<!--begin::Illustration-->
				<div class="bgi-no-repeat bgi-size-contain bgi-position-x-end h-225px" style="background-image:url('<?php echo Yii::$app->request->baseUrl; ?>/logo.png')"></div>
				<!--end::Illustration-->
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->
	</div>
	<!--end::Body-->
</div>
<div class="row my-5">
	<div class="col-sm-6 p-2">
		<div class="card">
			<div class="card-head text-center py-2 h3">
				Mahasiswa Yudisium
			</div>
			<div class="card-body">
				<div id="chart-1"></div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 p-2">
		<div class="card">
			<div class="card-body">
				<div id="chart-2"></div>
			</div>
		</div>
	</div>
</div>
<?php
$tahun = Gelombang::find()->all();
$dt_tahun = [];
foreach ($tahun as $th) {
	$dt_tahun[$th->tahun][$th->tahun];
	echo ',';
}
?>
<script>
	//chart 1

	var options = {
		series: [{
			name: 'Disetujui',
			data: [44, 55]
		}, {
			name: 'Tidak Disetujui',
			data: [53, 32]
		}],
		chart: {
			type: 'bar',
			height: 430
		},
		plotOptions: {
			bar: {
				horizontal: true,
				dataLabels: {
					position: 'top',
				},
			}
		},
		dataLabels: {
			enabled: true,
			offsetX: -6,
			style: {
				fontSize: '12px',
				colors: ['#fff']
			}
		},
		stroke: {
			show: true,
			width: 1,
			colors: ['#fff']
		},
		tooltip: {
			shared: true,
			intersect: false
		},
		xaxis: {
			categories: [2001, 2002, 2003, 2004, 2005, 2006, 2007],
		},
	};

	var chart = new ApexCharts(document.querySelector("#chart-1"), options);
	chart.render();
</script>

<script>
	//chart 2
	var options = {
		series: [{
			name: 'test',
			data: [44, 55, 41, 64, 22, 43, 21]
		}, {
			name: 'test2',
			data: [53, 32, 33, 52, 13, 44, 32]
		}],
		chart: {
			type: 'bar',
			height: 430
		},
		plotOptions: {
			bar: {
				horizontal: true,
				dataLabels: {
					position: 'top',
				},
			}
		},
		dataLabels: {
			enabled: true,
			offsetX: -6,
			style: {
				fontSize: '12px',
				colors: ['#fff']
			}
		},
		stroke: {
			show: true,
			width: 1,
			colors: ['#fff']
		},
		tooltip: {
			shared: true,
			intersect: false
		},
		xaxis: {
			categories: [2001, 2002, 2003, 2004, 2005, 2006, 2007],
		},
	};

	var chart = new ApexCharts(document.querySelector("#chart-2"), options);
	chart.render();
</script>