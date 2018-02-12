<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $image app\models\ImageUpload */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(\app\models\Menu::getCategoryList()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consists')->textInput(['placeholder' => 'Состав Моцарелла &bull; кунжут &bull; помидор &bull; сливочный соус Альфредо(основа) &bull; сёмга &bull; филадельфия сыр']) ?>
    <p>(для того чтоб после каждого компонента ставился разделитель необходимо добавить &bull; )</p>
    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'size')->dropDownList(['30', '35', '50']) ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <img src="<?=$model->getImage()?>" alt="" height="200" width="200">

    <?= $form->field($image, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
