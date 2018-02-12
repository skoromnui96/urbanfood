<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */

$this->title = 'Обновление слайдера ';
$this->params['breadcrumbs'][] = ['label' => 'Слайдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="slider-update">

    <h1><?= Html::encode($this->title) ?></h1>
   
    <?= $this->render('_form', [
        'model' => $model,
        'image' => $image
    ]) ?>

</div>
