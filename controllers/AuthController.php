<?php
/**
 * Created by PhpStorm.
 * User: Kurraz
 * Date: 18.01.2016
 * Time: 10:18
 */

namespace app\controllers;

use app\components\Controller;
use app\models\LoginForm;

class AuthController extends Controller
{
    public $layout = false;

    public function goAdmin()
    {
        return $this->redirect(['admin/dashboard/index']);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goAdmin();
        }

        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goAdmin();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }
}