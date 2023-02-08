<?php

namespace app\controllers;

use app\models\DataYudisium;
use app\models\SearchDataYudisium;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use Yii;
use yii\filters\AccessControl;

/**
 * DataYudisiumController implements the CRUD actions for DataYudisium model.
 */
class DataYudisiumController extends Controller
{
    /**
     * @inheritDoc
     */
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
                        'actions' => ['logout', 'index', 'cetak', 'view', 'create', 'update'],
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


    /**
     * Lists all DataYudisium models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $id_fakultas = Yii::$app->user->identity->id_fakultas;
        $searchModel = new SearchDataYudisium();
        if (Yii::$app->user->identity->role == 1) {
            $dataProvider = $searchModel->search($this->request->queryParams);
        } else if (Yii::$app->user->identity->role == 2) {
            $dataProvider = $searchModel->search($this->request->queryParams);
            $dataProvider->query->andFilterWhere(['id_fakultas' => $id_fakultas]);
        }

        return $this->render('/admin/data-yudisium/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCetak()
    {
        $searchModel = new SearchDataYudisium();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/admin/data-yudisium/cetak', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single DataYudisium model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('/admin/data-yudisium/view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new DataYudisium model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DataYudisium();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('/admin/data-yudisium/create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing DataYudisium model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('/admin/data-yudisium/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DataYudisium model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DataYudisium model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return DataYudisium the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataYudisium::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
