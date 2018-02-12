<div class="basket-products">
    <div class="row">
        <div class="col-md-8">

            <h4 id="basket_count">В корзине  <span class="count"><?=$session['cart.count']?></span> товара</h4>
        </div>

    </div>
    <div >

        <div class="row">
            <?php if (!empty($session['cart'])):?>

                <?php foreach ($session['cart'] as $id => $item): ?>
                    <div class="wrapper_list">
                        <img src="images/<?= $item['img']?>">
                        <p class="list_price">
                            <span class="food_type"><?=$item['category']?></span>
                            <span class="food_name">"<?=$item['name']?>"</span>
                            <span class="item_size"><?php if($item['size'] == 0 && $item['category'] == 'Пицца' ){echo '30см';}
                                else if ($item['size'] == 1 && $item['category'] == 'Пицца') {echo '35см';}
                                else if ($item['size'] == 2 && $item['category'] == 'Пицца') {echo '50см';}
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
<p class="basket-price">Итого: <span id="basket-price"><?=$session['cart.sum']?> грн</span></p>

