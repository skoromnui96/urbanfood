<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderItems */

$this->title = 'Create Order Items';
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
