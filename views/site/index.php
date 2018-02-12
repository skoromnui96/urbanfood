<?php
    use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<header>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" alt="Логотип" id="logotip"></a>
      <button class="navbar-toggler flex-md-last" type="button"  data-target="#navbarResponsive"
              aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse " id="navbarResponsive">

        <ul class="navbar-nav pull-left nfd">
          <li class="nav-item">
            <img src="img/kyivstar.png" alt="" >
            <span id="star" class="">+38 (096) 123 22 33</span>
          </li>
          <li class="nav-item">
            <img src="img/lifecell.png" alt="" >
            <span id="star" class="">+38 (096) 123 22 33</span>
          </li>
        </ul>

        <ul class="navbar-nav  navbar-right ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#sale">Акции
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#menu">Наше меню</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#kids_menu">Десткое меню</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#delivery">Доставка</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#clients">Отзывы</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contacts">Контакты</a>
          </li>
        </ul>

        <div id="quick-menu">
          <ul class="navbar-nav ml-auto list2">
            <li class="nav-item" >
              <div id="quick-submenu" class="quick">
                <img src="img/phone.png" alt="">
                <a class="nav-link quick-or"  href="#" >Быстрый <br>заказ</a>
              </div>
              <ul id="quick" class="quick-order">
                <li>
                  <i class="triangle"></i>
                  <div class="quick-order-wrap centered phone-form">
                    <!-- <p id="message" ></p> -->




                        <?php $form = \yii\widgets\ActiveForm::begin([
                            'id' => 'phone_form'
                        ])?>
                      <button type="button" class="close" id="quick-close">&times;</button>
                      <p>Ваш номер телефона:</p>
                      <p>
                          <?=$form->field($quickorder, 'phone')->label(false)->textInput([
                              'class' => 'form-control quick_phone',
                              'placeholder' => '+ 38(0__) ___ __ __',
                          ])?>

                      </p>
                        <?= \yii\helpers\Html::submitButton('Перезвонить мне', [
                                'id' => 'callme'
                            ])?>
                      <!--<button id="callme" name="button" type="submit" >Перезвонить мне !</button>-->
                        <?php \yii\widgets\ActiveForm::end()?>



                  </div>
                </li>
              </ul>
            </li>
            <li class="nav-item" >
              <div id="basket-submenu" class="basket">
                <img src="img/basket.png" alt="">
                <a class="nav-link bas" href="#">Мой<br>заказ</a>
              </div>
              <ul  id="basket" class="basket-order">
                <li>
                  <i class="triangle2"></i>
                  <div class="basket-order-wrap">
                    <button type="button" class="close" id="basket-close">&times;</button>
                    <div class="container">
                        <div class="basket-products">
                            <div class="row">


                            </div>
                            <div class="show_list">

                                <div class="row">
                                    <?php if (!empty($session['cart'])):?>

                                        <?php foreach ($session['cart'] as $id => $item): ?>
                                            <div class="wrapper_list">
                                                <img src="images/<?= $item['img']?>">
                                                <p class="list_price">
                                                    <span class="food_type"><?=$item['category']?></span>
                                                    <span class="food_name">"<?=$item['name']?>"</span>
                                                    <span class="item_size"><?php if($item['size'] == 0){echo '30см';}
                                                        else if ($item['size'] == 1) {echo '35см';}
                                                        else if ($item['size'] == 2) {echo '50см';}
                                                        else echo '';
                                                        ?></span>
                                                    <span class="item_price"><?=$item['price']?> грн</span>

                                                    <span data-id="<?=$id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true">Удалить позицию</span>
                                                </p>
                                                <div class="number">
                                                    <span>Количество</span>
                                                    <div class="wrapp">
                                                        <p><?=$item['count']?></p>
                                                    </div>
                                                </div>

                                                <span class="count_price"><b><?=$item['count'] * $item['price']?> грн</b></span>
                                            </div>
                                        <?php endforeach;?>
                                    <?php else:?>
                                        <h3>Корзина пустая</h3>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <!-- <p id="message" ></p> -->

                        <form class="basket_form" action="" method="post" name="basket_form">

                            <div class="row">
                                <div class="basket-attention">

                                    <a href="<?=\yii\helpers\Url::to('cart/view')?>" id="submit-order" name="button">Оформить заказ</a>


                                </div>
                            </div>

                        </form>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>

      </div>

    </div>
  </nav>
  <!-- Модальное окно -->
  <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <h5>Благодарим за заказ!</h5>
          <p>Наш менеджер свяжеться с Вами в течении 3-5 минут для подтверждения.</p>
          <p>Оставайтесь с нами.</p>
        </div>
        <div class="modal-footer">
          <a class="my_btn btn-sample btn-xl" href="" dismiss="modal">ОК</a>
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-contnet-order">
        <div class="modal-body-order">
          <div class="quick-order-wrap phone-form ">

              <?php $form = \yii\widgets\ActiveForm::begin([
                  'id' => 'phone_form'
              ])?>
              <button type="button" class="close" id="quick-close">&times;</button>
              <p>Ваш номер телефона:</p>
              <p>
                  <?=$form->field($quickorder, 'phone')->label(false)->textInput([
                      'class' => 'form-control quick_phone',
                      'placeholder' => '+ 38(0__) ___ __ __',
                  ])?>

              </p>
              <?= \yii\helpers\Html::submitButton('Перезвонить мне', [
                  'id' => 'callme'
              ])?>
              <!--<button id="callme" name="button" type="submit" >Перезвонить мне !</button>-->
              <?php \yii\widgets\ActiveForm::end()?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-contnet-order">
        <div class="modal-body-order">
          <div class="basket-order-wrap">
            <button type="button" class="close" data-dismiss="modal" id="basket-close">&times;</button>
            <div class="container">
                <div class="basket-products">

                    <div class="show_list">

                        <div class="row">
                            <?php if (!empty($session['cart'])):?>

                                <?php foreach ($session['cart'] as $id => $item): ?>
                                    <div class="wrapper_list">
                                        <img src="images/<?= $item['img']?>">
                                        <p class="list_price">
                                            <span class="food_type"><?$item['category']?></span>
                                            <span class="food_name"><?php if($item['size'] == 0){echo '30см';}
                                                else if ($item['size'] == 1) {echo '35см';}
                                                else if ($item['size'] == 2) {echo '50см';}
                                                else echo '';
                                                ?></span>
                                            <span class="item_price"><?=$item['price']?> грн</span>
                                            <span data-id="<?=$id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true">Удалить позицию</span>
                                        </p>
                                        <div class="number">
                                            <span>Количество</span>
                                            <div class="wrapp">
                                                <p><?=$item['count']?></p>
                                            </div>
                                        </div>
                                        <span class="count_price"><b><?=$item['count'] * $item['price']?>  грн</b></span>
                                    </div>
                                <?php endforeach;?>
                            <?php else:?>
                                <h3>Корзина пустая</h3>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <!-- <p id="message" ></p> -->

                <form class="basket_form" action="" method="post" name="basket_form">

                    <div class="row">
                        <div class="basket-attention">

                            <a href="<?=\yii\helpers\Url::to('cart/view')?>" id="submit-order" name="button">Оформить заказ</a>


                        </div>
                    </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <?= $this->render('slider',[
    'sliders' => $sliders
  ])?>
</header>

<!-- SECTION SALE Акция-->
<?= $this->render('sale', [
    'stocks' => $stocks
]) ?>
<!-- SECTION MENU -->
<?= $this->render('menu', [
    'menu1' => $menu1,
    'menu2' => $menu2,
    'menu3' => $menu3,
]) ?>


<!-- SECTION KIDS MENU Детское меню-->

<?= $this->render('kidsmenu', [
    'kidsfood' => $kidsfood
]) ?>


<!--SECTION DELIVERY О доставке-->

<?= $this->render('delivery', [

]) ?>

<!--SECTION REVIEWS  Отзывы клиентов-->

<?= $this->render('reviews', [
    'reviews'=>$reviews,
]) ?>
<?= $this->render('new', [
    'model' => $model
]) ?>
<!--Map & Contacts-->
<?= $this->render('map')?>

<!-- Footer -->
<?= $this->render('footer')?>

