<section id="sale">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="sale_outer_mobile">
                    <img src="img/sale_phone.png" alt="">
                    <div class="sale_inner_mobile">
                        <h1></h1>
                        <p>и пояснение особенности скидки и пояснение о собенности скидки <p>
                            <a class="my_btn btn-sample btn-xl" id="sale_btn" href="#menu">Оформить заказ</a>
                    </div>
                </div>
                <?php foreach ($stocks as $stock) :?>
                    <div class="sale_outer">
                        <img src="img/sale.png" class="img_responsive">
                        <div class="sale_inner">
                            <h1><?= $stock->title?></h1>
                            <p><?= $stock->description?><p>
                                <a class="my_btn btn-sample btn-xl" href="#menu">Оформить заказ</a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
