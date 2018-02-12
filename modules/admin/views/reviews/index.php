<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>На этой странице вы можете опубликовать либо запретить публикацию отзыва</p>
    <p>Так же можно редактировать либо удалить отзыв</p>
    <?php if(!empty($comments)):?>

        <table class="table">
            <thead>
            <tr>
                <td>Автор</td>
                <td>Текст отзыва</td>
                <td>E-mail</td>
            </tr>
            </thead>

            <tbody>
            <?php foreach($comments as $comment):?>
                <tr class="comment-hover" onmouseover="this.style.backgroundColor='#555';this.style.color='#fff'" onmouseout="this.style.backgroundColor='#fff';this.style.color='#000'">
                    <td><?= $comment->name?></td>
                    <td><?= $comment->text?></td>
                    <td><?= $comment->email?></td>
                    <td>
                        <?php if($comment->isAllowed()):?>
                            <a class="btn btn-warning" href="<?= Url::toRoute(['reviews/disallow', 'id'=>$comment->id]);?>">Запретить публикацию</a>
                        <?php else:?>
                            <a class="btn btn-success" href="<?= Url::toRoute(['reviews/allow', 'id'=>$comment->id]);?>">Опубликовать</a>
                        <?php endif?>
                        <a class="btn btn-danger" href="<?= Url::toRoute(['reviews/delete', 'id' => $comment->id]); ?>">Удалить</a>
                        <a class="btn btn-primary" href="<?= Url::toRoute(['reviews/update', 'id' => $comment->id]); ?>">Редактировать</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

    <?php endif;?>
</div>
