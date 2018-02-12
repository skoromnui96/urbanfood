<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
/*
* @inheritdoc
*/
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = 'left';

    public function redirect($url, $statusCode = 302)
    {
        return Yii::$app->getResponse()->redirect(Url::to($url), $statusCode);
    }


    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    throw new \yii\web\NotFoundHttpException();
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {
                            if(Yii::$app->user->isGuest) {
                                return $this->redirect('/auth/login');
                            }else {
                                return Yii::$app->user->identity->isAdmin;
                            }
                        }
                    ]
                ]
            ]
        ];
    }

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}