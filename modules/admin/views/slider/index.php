<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайдеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новый слайдер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'html',
                'label' => 'Изображение слайдера',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>400]);
                }
            ],
            [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width:260px;margin: 20px'],
            'header'=>'Действия',
            'template' => '{update} {delete}',
            'buttons' => [

                //view button
                'update' => function ($url, $model) {
                    return Html::a('<span class="fa fa-search"></span>Обновить слайдер', $url, [
                        'title' => Yii::t('app', 'Update'),
                        'class'=>'btn btn-primary btn-succes',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="fa fa-search"></span>Удалить', $url, [
                        'title' => Yii::t('app', 'Delete'),
                        'class'=>'btn btn-primary btn-danger',
                    ]);
                },
            ],


            ],

    ]]); ?>
<?php Pjax::end(); ?></div>
