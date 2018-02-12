<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($comment, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($comment, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($comment, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($comment->isNewRecord ? 'Create' : 'Применить', ['class' => $comment->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
