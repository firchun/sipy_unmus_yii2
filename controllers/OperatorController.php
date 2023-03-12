<?php

namespace app\controllers;

use Yii;

class OperatorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->identity->role != 2) {
            return $this->redirect('site/index');
        }
        return $this->render('dashboard');
    }
}
