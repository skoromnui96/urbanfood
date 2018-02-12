




<section id="clients">
    <div class="container">
        <div class="row pb">
            <div class="col-md-12 col-sm-12">
                <h2 class="centered">ЧТО ГОВОРЯТ НАШИ КЛИЕНТЫ</h2>
                <p class="centered">Почему мы лучшие в своем деле? Потому что мы слушаем своих клиентов, нам важно мнение каждого!<br>
                    Оставьте нам свой отзыв что бы мы могли стать еще лучше!</p>
            </div>
        </div>
        <div class="row">


            <div class="col-md-12 col-sm-12">
                <div class="my-slick">
                    <?php foreach ($reviews as $review):?>
                        <?php if ($review->status == 1):?>
                            <div class="col-md-6">
                                <div class="block_1 block">
                                    <h3><?=$review->name?></h3>
                                    <p class="date"><i><?=
                                            Yii::$app->formatter->asDatetime($review->created_at, "php:d F Y г.");?></i></p>
                                    <p><?=$review->text?></p>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>

                </div>

            </div>

            <div class="cl_wrapp">
                <img src="img/petra.png" alt="">
            </div>

        </div>
        <div class="paddingTop35">
            <div class="col-md-12 col-sm-12 centered">
                <a class="my_btn btn-sample btn-xl b1" data-toggle="modal" data-target="#reviewModal">Оставить отзыв</a>
            </div>
        </div>
    </div>
</section>