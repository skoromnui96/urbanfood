<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'count_item') ?>

    <?php // echo $form->field($model, 'sum_item') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
