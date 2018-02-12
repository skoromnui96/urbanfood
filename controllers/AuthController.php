<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $this->layout = 'left';
        if (!Yii::$app->user->isGuest) {
            return $this->getModules('admin');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin/default/index');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        $this->layout = 'left';
        Yii::$app->user->logout();

        return $this->goHome();
    }
}