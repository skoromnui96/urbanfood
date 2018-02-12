<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'category_id',
                'label'=>'Категория блюд',
                'format'=>'text',//raw, html
                'content'=>function($data){
                    return $data->getParentName(); // функция получения имени из родительской таблицы
                },
                'filter' => \app\models\Menu::getCategoryList(),
            ],
            'name',
            'consists',
            'price',
            'size',
            'weight',

            [
                'format' => 'html',
                'label' => 'Изображение блюда',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>200]);
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
                        return Html::a('<span class="fa fa-search"></span>Обновить блюдо', $url, [
                            'title' => Yii::t('app', 'Update'),
                            'class'=>'btn btn-primary btn-succes',
                        ]);
                    },

                ],
        ],
    ]]); ?>
<?php Pjax::end(); ?></div>
