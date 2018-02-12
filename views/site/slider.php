<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('img/background.jpg')">
            <div class="top_wrapper">
                <div class="top_descr">
                    <div class="top_centered">
                        <div class="top_text">
                            <span id="circle"><img src="img/circle2.png"></span>
                            <h1>Доставка еды  <br>от поселка котовского до южного</h1>
                            <p>Пицца Суши Вок Лапша</p>
                            <a class="my_btn btn-sample btn-xl" href="#menu">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide Two  -->
        <?php foreach ($sliders as $slider):?>
            <div class="carousel-item" style="background-image: url('images/<?=$slider->bg_img?>')">
                <div class="top_wrapper">
                    <div class="top_descr">
                        <div class="top_centered">
                            <div class="top_text">
                                <span id="circle"><img src="img/circle2.png"></span>
                                <h1>Доставка еды  <br>от поселка котовского до южного</h1>
                                <p>Пицца Суши Вок Лапша</p>
                                <a class="my_btn btn-sample btn-xl" href="#menu">Заказать</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <!-- Slide Three  -->

    </div> <!--end carousel-inner-->
    <!--    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
       </a> -->
</div>