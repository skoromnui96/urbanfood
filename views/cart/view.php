<div class="container">

<div class="basket-products">
    <?php if (Yii::$app->session->hasFlash('success')) :?>
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('success');?>
        </div>
    <?php endif;?>
    <?php if (Yii::$app->session->hasFlash('error')) :?>
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif;?>
    <div class="row">
        <div class="col-md-8">
            <h4 id="basket_count">В корзине  <span class="count"><?=$session['cart.count']?></span> товара</h4>
        </div>
    </div>
    <div>

        <div class="row">
            <?php if (!empty($session['cart'])):?>

                <?php foreach ($session['cart'] as $id => $item): ?>
                    <div class="wrapper_list">
                        <img src="/images/<?= $item['img']?>">
                        <p class="list_price">
                            <span class="food_type"><?=$item['category']?></span>
                            <span class="food_name">"<?=$item['name']?>"</span>
                            <span class="item_size"><?php if($item['size'] == 0){echo '30см';}
                                else if ($item['size'] == 1) {echo '35см';}
                                else if ($item['size'] == 2) {echo '50см';}
                                else echo '';
                                ?></span>
                            <span class="item_price"><?=$item['price']?> грн</span>
                        </p>
                        <div class="number">
                               <span><?=$item['count']?> шт.</span>
                        </div>
                        <span class="count_price"><b><?=$item['count'] * $item['price']?> грн</b></span>
                    </div>

                <?php endforeach;?>
            </div>
            </div>
                <!-- <p id="message" ></p> -->
                <p class="basket-price">Итого: <span id="basket-price"><?=$session['cart.sum']?> грн</span></p>
    <a id="go-home"  href="/">Продолжить покупки</a>
                <form class="basket_form" action="" method="post" name="basket_form">
                    <p class="basket-parag">Время доставки</p>
                    <div class="basket-time">
                        <input type="radio" class="radiotoogle1" id="t1" name="dzen" value="dzen" checked="checked">
                        <label for="t1">Как можно быстрее</label>
                        <input type="radio" class="radiotoogle2" id="t2" name="dzen" value="dzen">
                        <label for="t2"> К определенному времени</label>
                    </div>
                    <?php $form = \yii\widgets\ActiveForm::begin()?>
                    <div class="radio_hidden">
                        <p class="basket-parag">Дата и Время получения заказа</p>
                        <div class="basket-datetime">

                            <?= $form->field($order, 'delivery_date')->label(false)->textInput() ?>
                        </div>

                    </div>


                        <?=$form->field($order, 'phone')->textInput([
                            'class' => 'form-fields form-control',
                            'placeholder' => '+ 38(0__)___-__-__'
                        ])?>

                    <p class="basket-parag">Куда везти?</p>
                    <div class="basket-destination">
                        <?=$form->field($order, 'city')->textInput([
                            'class' => 'form-fields form-control',
                            'id' => 'city'

                        ])?>
                        <?=$form->field($order, 'street')->textInput([
                            'class' => 'form-fields form-control',
                            'id' => 'street'
                        ])?>
                        <?=$form->field($order, 'corps')->textInput([
                            'class' => 'form-fields form-control',
                            'id' => 'corps'
                        ])?>
                        <?=$form->field($order, 'house')->textInput([
                            'class' => 'form-fields form-control',
                            'id' => 'house'
                        ])?>
                        <?=$form->field($order, 'flat')->textInput([
                            'class' => 'form-fields form-control',
                            'id' => 'flat'
                        ])?>
                    </div>
                    <p class="basket-parag">Комментарий к адресу или заказу</p>
                    <?=$form->field($order, 'comment')->textarea([
                        'class' => 'form-control',
                        'id' => 'comment',
                        'cols' => '30',
                        'rows' => '10',
                        'placeholder' => 'Напишите комментарий здесь..'
                    ])?>

                    <div class="row">
                        <div class="basket-attention">
                            <p><b>Внимание !</b> Ни один заказ не считаеться принятым пока наш оператор не перезвонит вам для подтверждения.</p>
                            <?= \yii\helpers\Html::submitButton('Подтвердить заказ !',[
                                'id' => 'submit-order'
                            ])?>
                            <?php \yii\widgets\ActiveForm::end()?>
                        </div>
                    </div>

                </form>
            <?php else:?>
                <h3>Корзина пустая</h3>
                <a id="go-home"  href="/">Продолжить покупки</a>
            <?php endif;?>
        </div>
    </div>
</div>
