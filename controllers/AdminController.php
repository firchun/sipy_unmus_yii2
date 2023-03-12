<?php

namespace app\controllers;

use app\models\Fakultas;
use app\models\Jurusan;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AdminController extends \yii\web\Controller
{

    public function behaviors()
    {
        if (Yii::$app->user->identity) {
            if (Yii::$app->user->identity->role > 2) {
                $this->redirect(['/mahasiswa/dashboard']);
            }
        }
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['logout', 'dashboard', 'akun'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionDashboard()
    {
        $sum_fak_teknik = Jurusan::find()->where(['id_fakultas' => 1])->count();
        $sum_fak_feb = Jurusan::find()->where(['id_fakultas' => 2])->count();
        $sum_fak_faperta = Jurusan::find()->where(['id_fakultas' => 3])->count();
        $sum_fak_fkip = Jurusan::find()->where(['id_fakultas' => 4])->count();
        $sum_fak_fisip = Jurusan::find()->where(['id_fakultas' => 5])->count();
        $sum_fak_hukum = Jurusan::find()->where(['id_fakultas' => 6])->count();

        return $this->render('dashboard', [
            'sum_fak_teknik' => $sum_fak_teknik,
            'sum_fak_feb' => $sum_fak_feb,
            'sum_fak_faperta' => $sum_fak_faperta,
            'sum_fak_fkip' => $sum_fak_fkip,
            'sum_fak_fisip' => $sum_fak_fisip,
            'sum_fak_hukum' => $sum_fak_hukum,
        ]);
    }
    public function actionAkun()
    {
        return $this->render('akun');
    }
}
