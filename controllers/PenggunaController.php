<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class PenggunaController extends \yii\web\Controller
{
    public function behaviors()
    {
        if (Yii::$app->user->identity) {
            if (Yii::$app->user->identity->role >= 2) {
                $this->redirect(['/mahasiswa/dashboard']);
            }
        }

        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['logout', 'mahasiswa', 'operator', 'view', 'tambah-operator'],
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
    public function actionMahasiswa()
    {
        $query = User::find()->where(['role' => 3]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('/admin/pengguna/mahasiswa', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionOperator()
    {
        $query = User::find()->where(['role' => 2]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('/admin/pengguna/operator', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('/admin/pengguna/view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionTambahOperator()
    {
        $model = new User();
        if (!Yii::$app->user->identity) {
            return $this->redirect('site/index');
        }
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            // form inputs are valid, do something here
            $model->username = $_POST['User']['npm'];
            $model->authKey = sha1(random_bytes(5));
            $model->accessToken = sha1(random_bytes(10));
            //foto profil
            $file = UploadedFile::getInstance($model, 'file');
            if ($file) {
                $model->foto = $_POST['User']['npm'] . $file->name;
                $file->saveAs(Yii::$app->basePath . '/web/images/user/' . $_POST['User']['npm'] . $file->name);
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Akun Operator berhasil dibuat');
                return $this->redirect(['login']);
            } else {
                Yii::$app->session->setFlash('error', 'Akun Operator gagal dibuat, cek kembali data anda');
            }
        }
        return $this->render('/admin/pengguna/tambah-operator', [
            'model' => $model,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
