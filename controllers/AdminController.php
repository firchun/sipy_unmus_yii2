<?php

namespace app\controllers;

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
        return $this->render('dashboard');
    }
    public function actionAkun()
    {
        return $this->render('akun');
    }
}
