<?php

namespace app\controllers;

use app\models\DataYudisium;
use app\models\SearchDataYudisium;
use app\models\User;
use app\models\DosenPembimbing;
use app\models\DosenPenguji;
use DateTime;
use Symfony\Component\CssSelector\Parser\Handler\WhitespaceHandler;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class MahasiswaController extends \yii\web\Controller
{


    public function behaviors()
    {
        if (yii::$app->user->identity) :
            if (yii::$app->user->identity->role < 3) {
                $this->redirect(['/admin/dashboard']);
            }
        endif;

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['dashboard', 'akun', 'yudisium', 'data-yudisium', 'logout', 'update-yudisium', 'dosen', 'delete1', 'delete2'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete1' => ['post'],
                    'delete2' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionDashboard()
    {
        return $this->render('dashboard');
    }
    public function actionAkun()
    {
        if (yii::$app->user->identity->role != 3) {
            $this->redirect(['/admin/dashboard']);
        }
        $profil = User::findOne(['id' => Yii::$app->user->identity->id]);
        return $this->render('akun', [
            'profil' => $profil
        ]);
    }
    public function actionWisuda()
    {
        return $this->render('wisuda');
    }
    public function actionYudisium()
    {
        $cek_data_yudisium = DataYudisium::find()->where('id_users', Yii::$app->user->identity->id);
        if (!Yii::$app->user->identity || Yii::$app->user->identity->role != 3) {
            return $this->redirect('site/index');
        } else if (Yii::$app->user->identity->role == 3 && $cek_data_yudisium != null) {
            return $this->redirect('mahasiswa/data-yudisium');
        }
        $user = User::findOne(['id' => Yii::$app->user->identity->id]);
        $model = new DataYudisium();
        if ($model->load(Yii::$app->request->post())) {

            // form inputs are valid, do something here
            $model->id_users = Yii::$app->user->identity->id;
            $model->id_jurusan = $user->id_jurusan;
            $model->persetujuan = '0';
            //berkas
            $file_krs = UploadedFile::getInstance($model, 'file_krs');
            $file_khs = UploadedFile::getInstance($model, 'file_khs');
            $file_transkrip = UploadedFile::getInstance($model, 'file_transkrip');
            $file_sk = UploadedFile::getInstance($model, 'file_sk');
            $file_cover = UploadedFile::getInstance($model, 'file_cover');
            $file_persetujuan = UploadedFile::getInstance($model, 'file_persetujuan');
            $file_pengesahan = UploadedFile::getInstance($model, 'file_pengesahan');
            $file_ktp = UploadedFile::getInstance($model, 'file_ktp');
            $file_ijazah = UploadedFile::getInstance($model, 'file_ijazah');
            if ($file_krs) {
                $model->krs = 'KRS-' . $user->npm . $file_krs->name;
                $file_krs->saveAs(yii::$app->basePath . '/web/berkas/berkas-krs/' . 'KRS-' . $user->npm . $file_krs->name);
            }
            if ($file_khs) {
                $model->khs = 'KHS-' . $user->npm . $file_khs->name;
                $file_khs->saveAs(yii::$app->basePath . '/web/berkas/berkas-khs/' . 'KHS-' . $user->npm . $file_khs->name);
            }
            if ($file_transkrip) {
                $model->transkrip = 'transkrip-nilai-' . $user->npm . $file_transkrip->name;
                $file_transkrip->saveAs(yii::$app->basePath . '/web/berkas/berkas-transkrip/' . 'transkrip-nilai-' . $user->npm . $file_transkrip->name);
            }
            if ($file_sk) {
                $model->sk_bimbingan = 'sk-bimbingan-' . $user->npm . $file_sk->name;
                $file_sk->saveAs(yii::$app->basePath . '/web/berkas/berkas-bimbingan/' . 'sk-bimbingan-' . $user->npm . $file_sk->name);
            }
            if ($file_cover) {
                $model->cover_skripsi = 'cover-' . $user->npm . $file_cover->name;
                $file_cover->saveAs(yii::$app->basePath . '/web/berkas/berkas-cover/' . 'cover-' . $user->npm . $file_cover->name);
            }
            if ($file_persetujuan) {
                $model->persetujuan_skripsi = 'persetujuan-' . $user->npm . $file_persetujuan->name;
                $file_persetujuan->saveAs(yii::$app->basePath . '/web/berkas/berkas-persetujuan/' . 'persetujuan-' . $user->npm . $file_persetujuan->name);
            }
            if ($file_pengesahan) {
                $model->pengesahan_skripsi = 'pengesahan-' . $user->npm . $file_pengesahan->name;
                $file_pengesahan->saveAs(yii::$app->basePath . '/web/berkas/berkas-pengesahan/' . 'pengesahan-' . $user->npm . $file_pengesahan->name);
            }
            if ($file_ktp) {
                $model->ktp = 'KTP-' . $user->npm . $file_ktp->name;
                $file_ktp->saveAs(yii::$app->basePath . '/web/berkas/berkas-ktp/' . 'KTP-' . $user->npm . $file_ktp->name);
            }
            if ($file_ijazah) {
                $model->ijazah_terakhir = 'ijazah-' . $user->npm . $file_ijazah->name;
                $file_ijazah->saveAs(yii::$app->basePath . '/web/berkas/berkas-ijazah/' . 'ijazah-' . $user->npm . $file_ijazah->name);
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Berkas anda berhasil di upload');
                return $this->redirect(['/mahasiswa/dosen']);
            } else {
                $model->loadDefaultValues();
                Yii::$app->session->setFlash('error', 'berkas anda gagal untuk di upload');
            }
        }

        return $this->render('yudisium', [
            'model' => $model,
        ]);
    }
    public function actionUpdateYudisium($id)
    {
        if (!Yii::$app->user->identity) {
            return $this->redirect('site/index');
        }
        $user = User::findOne(['id' => Yii::$app->user->identity->id]);
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            // form inputs are valid, do something here
            $model->id_users = Yii::$app->user->identity->id;
            $model->id_jurusan = $user->id_jurusan;
            $model->persetujuan = 0;
            //berkas
            $file_krs = UploadedFile::getInstance($model, 'file_krs');
            $file_khs = UploadedFile::getInstance($model, 'file_khs');
            $file_transkrip = UploadedFile::getInstance($model, 'file_transkrip');
            $file_sk = UploadedFile::getInstance($model, 'file_sk');
            $file_cover = UploadedFile::getInstance($model, 'file_cover');
            $file_persetujuan = UploadedFile::getInstance($model, 'file_persetujuan');
            $file_pengesahan = UploadedFile::getInstance($model, 'file_pengesahan');
            $file_ktp = UploadedFile::getInstance($model, 'file_ktp');
            $file_ijazah = UploadedFile::getInstance($model, 'file_ijazah');
            if ($file_krs) {
                $model->krs = 'KRS-' . $user->npm . $file_krs->name;
                $file_krs->saveAs(yii::$app->basePath . '/web/berkas/berkas-krs/' . 'KRS-' . $user->npm . $file_krs->name);
            }
            if ($file_khs) {
                $model->khs = 'KHS-' . $user->npm . $file_khs->name;
                $file_khs->saveAs(yii::$app->basePath . '/web/berkas/berkas-khs/' . 'KHS-' . $user->npm . $file_khs->name);
            }
            if ($file_transkrip) {
                $model->transkrip = 'transkrip-nilai-' . $user->npm . $file_transkrip->name;
                $file_transkrip->saveAs(yii::$app->basePath . '/web/berkas/berkas-transkrip/' . 'transkrip-nilai-' . $user->npm . $file_transkrip->name);
            }
            if ($file_sk) {
                $model->sk_bimbingan = 'sk-bimbingan-' . $user->npm . $file_sk->name;
                $file_sk->saveAs(yii::$app->basePath . '/web/berkas/berkas-bimbingan/' . 'sk-bimbingan-' . $user->npm . $file_sk->name);
            }
            if ($file_cover) {
                $model->cover_skripsi = 'cover-' . $user->npm . $file_cover->name;
                $file_cover->saveAs(yii::$app->basePath . '/web/berkas/berkas-cover/' . 'cover-' . $user->npm . $file_cover->name);
            }
            if ($file_persetujuan) {
                $model->persetujuan_skripsi = 'persetujuan-' . $user->npm . $file_persetujuan->name;
                $file_persetujuan->saveAs(yii::$app->basePath . '/web/berkas/berkas-persetujuan/' . 'persetujuan-' . $user->npm . $file_persetujuan->name);
            }
            if ($file_pengesahan) {
                $model->pengesahan_skripsi = 'pengesahan-' . $user->npm . $file_pengesahan->name;
                $file_pengesahan->saveAs(yii::$app->basePath . '/web/berkas/berkas-pengesahan/' . 'pengesahan-' . $user->npm . $file_pengesahan->name);
            }
            if ($file_ktp) {
                $model->ktp = 'KTP-' . $user->npm . $file_ktp->name;
                $file_ktp->saveAs(yii::$app->basePath . '/web/berkas/berkas-ktp/' . 'KTP-' . $user->npm . $file_ktp->name);
            }
            if ($file_ijazah) {
                $model->ijazah_terakhir = 'ijazah-' . $user->npm . $file_ijazah->name;
                $file_ijazah->saveAs(yii::$app->basePath . '/web/berkas/berkas-ijazah/' . 'ijazah-' . $user->npm . $file_ijazah->name);
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Akun anda berhasil dibuat');
                return $this->redirect(['/mahasiswa/dosen']);
            } else {
                Yii::$app->session->setFlash('error', 'Akun anda gagal dibuat, cek kembali data anda');
            }
        }

        return $this->render('update-yudisium', [
            'model' => $model,
        ]);
    }
    public function actionDataYudisium()
    {
        return $this->render('data-yudisium');
    }
    public function actionDosen()
    {
        $dosen_penguji = new DosenPenguji();
        $dosen_pembimbing = new DosenPembimbing();

        if ($this->request->isPost) {
            if ($dosen_penguji->load($this->request->post()) && $dosen_penguji->save()) {
                return $this->redirect(['/mahasiswa/dosen']);
            }
        } else {
            $dosen_penguji->loadDefaultValues();
        }

        if ($this->request->isPost) {
            if ($dosen_pembimbing->load($this->request->post()) && $dosen_pembimbing->save()) {
                return $this->redirect(['/mahasiswa/dosen']);
            }
        } else {
            $dosen_pembimbing->loadDefaultValues();
        }

        return $this->render('dosen', [
            'dosen_penguji' => $dosen_penguji,
            'dosen_pembimbing' => $dosen_pembimbing,
        ]);
    }
    public function actionDelete1($id)
    {
        DosenPembimbing::find()->where(['id' => $id])->one()->delete();

        return $this->redirect(['/mahasiswa/dosen']);
    }
    public function actionDelete2($id)
    {
        DosenPenguji::find()->where(['id' => $id])->one()->delete();


        return $this->redirect(['/mahasiswa/dosen']);
    }

    protected function findModel($id)
    {
        if (($model = DataYudisium::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
