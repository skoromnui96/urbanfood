<?php

namespace app\modules\admin\controllers;
use Yii;
use yii\web\NotFoundHttpException;
use app\models\Comment;
use app\models\Reviews;
use app\models\ReviewsSearch;
use yii\web\Controller;

class ReviewsController extends Controller
{
    public function actionIndex()
    {
        $comments = Reviews::find()->orderBy('id desc')->all();

        return $this->render('index',['comments'=>$comments]);
    }

    public function actionDelete($id)
    {
        $comment = Reviews::findOne($id);
        if($comment->delete())
        {
            return $this->redirect(['reviews/index']);
        }
    }

    public function actionAllow($id)
    {
        $comment = Reviews::findOne($id);
        if($comment->allow())
        {
            return $this->redirect(['index']);
        }
    }

    public function actionDisallow($id)
    {
        $comment = Reviews::findOne($id);
        if($comment->disallow())
        {
            return $this->redirect(['index']);
        }
    }
    public function actionUpdate($id)
    {
        $comment = $this->findModel($id);

        if ($comment->load(Yii::$app->request->post()) && $comment->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'comment' => $comment,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($comment = Reviews::findOne($id)) !== null) {
            return $comment;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}