<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Акция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:260px;margin: 20px'],
                'header'=>'Действия',
                'template' => '{update}',
                'buttons' => [

                    //view button
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-search"></span>Изменить условия акции', $url, [
                            'title' => Yii::t('app', 'Update'),
                            'class'=>'btn btn-primary btn-succes',
                        ]);
                    },
                ],


            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
