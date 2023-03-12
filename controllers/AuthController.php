<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\User;
use app\widgets\Alert;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\base\Model;
use yii\web\HttpException;

class AuthController extends \yii\web\Controller
{
    public $layout = 'auth';
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
    public function actionLogin()
    {
        if (Yii::$app->user->identity) {
            return $this->redirect('site/index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) {
                return $this->goBack();
            } else {
                // $model->loadDefaultValues();
                Yii::$app->session->setFlash('error', 'Cek kembali NPM / NIP atau password anda');
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionLoginOperator()
    {
        if (Yii::$app->user->identity) {
            return $this->redirect('site/index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) {
                return $this->goBack();
            } else {
                $model->loadDefaultValues();
                Yii::$app->session->setFlash('error', 'Cek kembali NIP / NIDN atau password anda');
            }
        }

        $model->password = '';
        return $this->render('login-operator', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionRegister()
    {
        if (Yii::$app->user->identity) {
            return $this->redirect('site/index');
        }
        $model = new User();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            // form inputs are valid, do something here
            $model->username = $_POST['User']['npm'];
            $model->authKey = sha1(random_bytes(5));
            $model->accessToken = sha1(random_bytes(10));
            $model->password = md5($_POST['User']['password']);
            $model->id_status = 1;
            $model->role = 3;
            //foto profil
            $file = UploadedFile::getInstance($model, 'file');
            if ($file) {
                $model->foto = $_POST['User']['npm'] . $file->name;
                $file->saveAs(yii::$app->basePath . '/web/images/user/' . $_POST['User']['npm'] . $file->name);
            }
            if ($model) {
                $model->save(false);
                Yii::$app->session->setFlash('success', 'Akun anda berhasil dibuat');
                return $this->redirect(['login']);
            } else {
                $model->loadDefaultValues();
                Yii::$app->session->setFlash('error', 'Akun anda gagal dibuat, cek kembali data anda');
            }
        }





        return $this->render('register', [
            'model' => $model,
        ]);
    }
    public function getAuthToken($authtoken)
    {
        $model = User::find(array('authtoken' => $authtoken));
        if ($model === null)
            throw new HttpException(404, 'The requested page does not exist.');
        return $model;
    }


    public function actionVerToken($authtoken)
    {
        $model = $this->getToken($authtoken);
        if (isset($_POST['Ganti'])) {
            if ($model->authtoken == $_POST['Ganti']['tokenid']) {
                $model->password = md5($_POST['Ganti']['password']);
                $model->authtoken = "null";
                $model->save();
                Yii::$app->session->setFlash('ganti', '<b>Password has been successfully changed! please login</b>');
                $this->redirect('?r=site/login');
                $this->refresh();
            }
        }
        $this->render('verifikasi', array(
            'model' => $model,
        ));
    }


    public function actionForgot()
    {
        $getEmail = $_POST['Lupa']['email'];
        $getModel = User::find(array('email' => $getEmail));
        if (isset($_POST['Lupa'])) {
            $getToken = rand(0, 99999);
            $getTime = date("H:i:s");
            $getModel->authtoken = md5($getToken . $getTime);
            $namaPengirim = "SIPY Universitas Musamus Merauke";
            $emailadmin = "admin_sipy@gmail.com";
            $subjek = "Reset Password";
            $setpesan = "you have successfully reset your password<br/>
                    <a href='http://yourdomain.com/index.php?r=site/vertoken/view&authtoken=" . $getModel->authtoken . "'>Click Here to Reset Password</a>";
            if ($getModel->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($namaPengirim) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($subjek) . '?=';
                $headers = "From: $name <{$emailadmin}>\r\n" .
                    "Reply-To: {$emailadmin}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-type: text/html; charset=UTF-8";
                $getModel->save();
                Yii::$app->session->setFlash('forgot', 'link to reset your password has been sent to your email');
                mail($getEmail, $subject, $setpesan, $headers);
                $this->refresh();
            }
        }
        $this->render('forgot');
    }
}
