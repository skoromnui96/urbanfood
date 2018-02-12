<section id="kids_menu" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="head_wrap">
                    <h2 class="centered">Детское меню</h2>
                    <p class="centered">В чем секрет приготовления блюд для детей? Приготовить полезную еду так, чтобы детки ее ели с удовольствием.
                        И мы в “Название” стараемся составлять детское меню, исходя из пожеланий маленьких гостей и их родителей.
                        Детские блюда оформляем с фантазией и улыбкой.</p>
                </div>
            </div>
        </div>
        <div id="kids_menu_grid"><!--start kids menu grid-->
            <div class="row paddingTop40">
                <?php foreach($kidsfood as $food):?>
                    <div class="col-md-4 col-sm-6 col-xs-12 item">
                        <div class="item_wrapper">
                            <img src="images/<?=$food->img?>" alt="Alt" class="img_responsive"/>
                            <div class="item_description">
                                <h4 class="category centered"><?=$food->category->name?></h4>
                                <h3 class="title centered"><?=$food->name?></h3>
                                <p class="item_descr centered"><?=$food->consists?></p>
                                <h3 class="price centered"><?=$food->price?> грн</h3>
                            </div>
                        </div>
                        <div class="item_cont">
                            <div class="item_description">
                                <h4 class="category centered"><?=$food->category->name?></h4>
                                <h3 class="title centered"><?=$food->name?></h3>
                                <p class="item_descr centered"><?=$food->consists?></p>
                                <p class="item_weight"><i><?=$food->weight?> грамм</i></p>
                                <h3 class="price centered"><?=$food->price?> грн</h3>
                                <a  data-id="<?=$food->id?>" title="Для увеличения количества просто нажмите кнопку 'Заказать'" href="<?= \yii\helpers\Url::to(['cart/add','id' => $food->id])?>" class="carts my_btn btn-sample btn-xl centered cart_link">Заказать</a>

                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div><!--end kids menu grid-->
        

    </div><!--end сontaier -->
</section>