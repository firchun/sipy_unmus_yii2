<?php

namespace app\controllers;

use app\models\DataWisuda;
use app\models\DataWisudaSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class DataWisudaController extends \yii\web\Controller
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
                        'actions' => ['logout', 'index'],
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

    public function actionIndex()
    {
        $searchModel = new DataWisudaSearch();
        $id_fakultas = Yii::$app->user->identity->id_fakultas;

        if (Yii::$app->user->identity->role == 1) {
            $dataProvider = $searchModel->search($this->request->queryParams);
        } else if (Yii::$app->user->identity->role == 2) {
            $dataProvider = $searchModel->search($this->request->queryParams);
            $dataProvider->query->andFilterWhere(['id_fakultas' => $id_fakultas]);
        }

        return $this->render('/admin/data-wisuda/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = DataWisuda::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
