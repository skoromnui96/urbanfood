    <?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $model app\models\Reviews */
    /* @var $form yii\widgets\ActiveForm */
    ?>

    <div id="reviewModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="review_modal-content">
                <div class="modal-body">
                    <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
                    <div class="form_wrapper">
                        <?php $form = ActiveForm::begin([
                            'id' => 'main_form',
                        ]); ?>

                        <?= $form->field($model, 'name')->label(false)->textInput(['placeholder' => 'Ф.И.О','maxlength' => true, 'class' => 'form-fields form-control']) ?>

                        <?= $form->field($model, 'email')->label(false)->textInput(['placeholder' => 'e-mail','maxlength' => true, 'class' => 'form-fields form-control']) ?>

                        <?= $form->field($model, 'text')->label(false)->textarea([
                            'placeholder' => 'Напишите комментарий здесь',
                            'maxlength' => true,
                            'class' => 'form-control',
                            'id' => 'comment',
                            'cols' =>'30',
                            'rows'=>'10',
                        ]) ?>

                        <?= $form->field($model, 'status')->label(false)->hiddenInput(['value' => '0'])?>


                        <?= Html::submitButton('Оставить отзыв', ['class' => 'my_btn btn-sample btn-xl b1']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
