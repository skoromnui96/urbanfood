<section id="menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="head_wrap">
                    <h2 class="centered">Меню</h2>
                    <p class="centered">Обязательно сказать о том что заказ вы можете сделать на любое время и день недели! <br>Ну и пару слов о вкуснейшем меню от виртуозных поваров компании.</p>
                </div>
            </div>
        </div>
        <div class="main_categories">
            <div class="row paddingTop30">
                <div class="col-md-4" id="pizza_main">
                    <div class="main_outer">
                        <a href="#menu">
                            <img src="img/pizza_main.png" class="img_responsive" />
                            <h3>Pizza</h3>
                            <p class="item_descr centered">Состав Моцарелла &bull; кунжут &bull; помидор &bull; сливочный соус Альфредо(основа) &bull; сёмга &bull; филадельфия сыр</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4" id="sushi_main">
                    <div class="main_outer">
                        <a href="#menu">
                            <img src="img/sushi_main.png" class="img_responsive" />
                            <h3>Sushi</h3>
                            <p class="item_descr centered">Состав Моцарелла &bull; кунжут &bull; помидор &bull; сливочный соус Альфредо(основа) &bull; сёмга &bull; филадельфия сыр</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4" id="noodles_main">
                    <div class="main_outer">
                        <a href="#menu">
                            <img src="img/noodles_main.png" class="img_responsive" />
                            <h3>Wok</h3>
                            <p class="item_descr centered">Состав Моцарелла &bull; кунжут &bull; помидор &bull; сливочный соус Альфредо(основа) &bull; сёмга &bull; филадельфия сыр</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="categories" style="display: none;">
            <div class="row paddingTop30">
                <!--start first row-->
                <div class="col-md-4" id="pizza">
                    <div class="outer">
                        <a href="#menu" class="pizza">
                            <img src="img/pizza_blur.png" class="img_responsive" />
                            <h3>Pizza</h3>
                        </a>
                    </div>
                </div>
                <div class="col-md-4" id="sushi">
                    <div class="outer">
                        <a href="#menu" class="sushi">
                            <img src="img/sushi_blur.png" class="img_responsive" />
                            <h3>Sushi</h3>
                        </a>
                    </div>
                </div>
                <div class="col-md-4" id="noodles">
                    <div class="outer">
                        <a href="#menu" class="noodles">
                            <img src="img/noodles_blur.png" class="img_responsive" />
                            <h3>Wok</h3>
                        </a>
                    </div>
                </div>
            </div>
            <!--end first row-->
        </div>
        <div id="menu_grid1" style="display: none;">
            <!--start menu grid-->
            <div class="row paddingTop40">
                <?php foreach ($menu1 as $item):?>
                    <div class="col-md-4 col-sm-6 col-xs-12 item">
                        <div class="item_wrapper">
                            <img src="images/<?=$item->img?>" alt="Alt" class="img_responsive"/>
                            <div class="item_description">
                                <h4 class="category centered"></h4>

                                <h3 class="title centered"><?=$item->category->name?></h3>

                                <p class="item_descr centered"><?=$item->consists?></p>
                                <h3 class="price centered"><?= $item->price?> грн</h3>
                            </div>
                        </div>
                        <div class="item_cont">
                            <div class="item_description">
                                <h4 class="category centered"><?=$item->category->name?></h4>
                                <h3 class="title centered"><?=$item->name?></h3>
                                <p class="item_descr centered"><?=$item->consists?></p>
                                <p class="item_weight"><i><?=$item->weight?> грамм</i></p>
                                    <?php
                                    $menus30 = \app\models\Menu::find()->select('id')->where(['size' => 0, 'name' => $item->name])->one();
                                    $menus35 = \app\models\Menu::find()->select('id')->where(['size' => 1, 'name' => $item->name])->one();
                                    $menus50 = \app\models\Menu::find()->select('id')->where(['size' => 2, 'name' => $item->name])->one();

                                    ?>

                                <div class="item_size">
                                    <button class="pizza_size" onclick="document.getElementById('<?=$item->name.$menus30->id?>').href='<?= \yii\helpers\Url::to(['cart/add', 'id' => $menus30->id]) ?>';
                                        var a = document.getElementById('<?=$item->name.$menus30->id?>'); a.setAttribute('data-id' , '<?=$menus30->id?>');">
                                        <img src="img/pizza_1.png">
                                        <p>30 см</p>
                                    </button>

                                    <a  id="<?=$item->name.$menus30->id?>"
                                        title="Для увеличения количества просто нажмите кнопку 'Заказать'"
                                        class="carts my_btn btn-sample btn-xl centered cart_link">Заказать
                                    </a>
                                </div>


                                <div class="item_size">
                                    <button class="pizza_size" onclick="document.getElementById('<?=$item->name.$menus35->id?>').href = '<?= \yii\helpers\Url::to(['cart/add', 'id' => $menus35->id]) ?>';
                                        var b = document.getElementById('<?=$item->name.$menus35->id?>'); b.setAttribute('data-id' , '<?=$menus35->id?>');">

                                        <img src="img/pizza_2.png">
                                        <p>35  см</p>
                                    </button>
                                    <a  id="<?=$item->name.$menus35->id?>"
                                        title="Для увеличения количества просто нажмите кнопку 'Заказать'"
                                        class="carts my_btn btn-sample btn-xl centered cart_link">Заказать
                                    </a>
                                </div>

                                <div class="item_size">
                                    <button  class="pizza_size" onclick="document.getElementById('<?=$item->name.$menus50->id?>').href = '<?= \yii\helpers\Url::to(['cart/add', 'id' => $menus50->id]) ?>';
                                        var c = document.getElementById('<?=$item->name.$menus50->id?>'); c.setAttribute('data-id' , '<?=$menus50->id?>');">
                                        <img src="img/pizza_3.png" class="piz3">
                                        <p>50 см </p>
                                    </button>
                                    <a  id="<?=$item->name.$menus50->id?>"
                                        title="Для увеличения количества просто нажмите кнопку 'Заказать'"
                                        class="carts my_btn btn-sample btn-xl centered cart_link">Заказать
                                    </a>
                                </div>


                                <h3 class="price centered"><?=$item->price?> грн</h3>

                            </div>
                        </div>
                    </div>

                <?php endforeach;?>
            </div>

            <!--end menu grid-->
        </div>
        <div id="menu_grid2" style="display: none;">
            <!--start menu grid-->
            <div class="row paddingTop40">
                <?php foreach ($menu2 as $item):?>
                    <?php $sushi = \app\models\Menu::find()->where(['size' => 0, 'name' => $item->name])->one();?>
                    <div class="col-md-4 col-sm-6 col-xs-12 item">
                        <div class="item_wrapper">
                            <img src="images/<?=$item->img?>" alt="Alt" class="img_responsive"/>
                            <div class="item_description">
                                <h4 class="category centered"></h4>

                                <h3 class="title centered"><?=$item->category->name?></h3>

                                <p class="item_descr centered"><?=$item->consists?></p>
                                <h3 class="price centered"><?= $item->price?> грн</h3>
                            </div>
                        </div>
                        <div class="item_cont">
                            <div class="item_description">
                                <h4 class="category centered"><?=$item->category->name?></h4>
                                <h3 class="title centered"><?=$item->name?></h3>
                                <p class="item_descr centered"><?=$item->consists?></p>
                                <p class="item_weight"><i><?=$item->weight?> грамм</i></p>
                                <h3 class="price centered"><?=$item->price?> грн</h3>
                                <input  type="hidden" class="pizza_price" id="<?=$item->id?>" value="<?=$sushi->id?>">
                                <a  data-id="<?=$item->id?>" title="Для увеличения количества просто нажмите кнопку 'Заказать'" href="<?= \yii\helpers\Url::to(['cart/add','id' => $item->id])?>" class="carts my_btn btn-sample btn-xl centered cart_link">Заказать</a>

                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <!--end menu grid-->
        </div>
        <div id="menu_grid3" style="display: none;">
            <!--start menu grid-->
            <div class="row paddingTop40">
                <?php foreach ($menu3 as $item):?>
                    <div class="col-md-4 col-sm-6 col-xs-12 item">
                        <div class="item_wrapper">
                            <img src="images/<?=$item->img?>" alt="Alt" class="img_responsive"/>
                            <div class="item_description">
                                <h4 class="category centered"></h4>

                                <h3 class="title centered"><?=$item->category->name?></h3>

                                <p class="item_descr centered"><?=$item->consists?></p>
                                <h3 class="price centered"><?= $item->price?> грн</h3>
                            </div>
                        </div>
                        <div class="item_cont">
                            <div class="item_description">
                                <h4 class="category centered"><?=$item->category->name?></h4>
                                <h3 class="title centered"><?=$item->name?></h3>
                                <p class="item_descr centered"><?=$item->consists?></p>
                                <p class="item_weight"><i><?=$item->weight?> грамм</i></p>
                                <h3 class="price centered"><?=$item->price?> грн</h3>
                                <a  data-id="<?=$item->id?>" title="Для увеличения количества просто нажмите кнопку 'Заказать'" href="<?= \yii\helpers\Url::to(['cart/add','id' => $item->id])?>" class="carts my_btn btn-sample btn-xl centered cart_link">Заказать</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <!--end menu grid-->
        </div>

    </div>
    <!--end container-->
    <!-- <div class="navigation_arrow loadmore" style="cursor: pointer;display: none;">Показать еще
      <img style="width: 50px; " src="img/arrow_down.png">
    </div> -->

</section>
