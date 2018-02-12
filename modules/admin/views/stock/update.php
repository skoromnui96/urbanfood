<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stock */

$this->title = 'Изменить акцию';
$this->params['breadcrumbs'][] = ['label' => 'Акция', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
