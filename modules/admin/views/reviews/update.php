<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $comment app\models\Reviews */

$this->title = 'Редактирование отзыва ' . $comment->name;
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="reviews-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'comment' => $comment,
    ]) ?>

</div>
