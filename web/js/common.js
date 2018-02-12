$(document).ready(function(){
	$('a[href*="#"]')
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function(event) {
		if (
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
			&& 
			location.hostname == this.hostname
			) {

			var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

		if (target.length) {
			event.preventDefault();
			$('html, body').animate({
				scrollTop: target.offset().top
			}, 1000, function() {
				var $target = $(target);
				$target.focus();
				if ($target.is(":focus")) { 
					return false;
				} else {
					$target.attr('tabindex','-1'); 
					$target.focus(); 
				};
			});
		}
	}
}); 
});

	var step = 1;
	var prtype = "";
	var menu1 = $("div#menu_grid1");
	var menu2 = $("div#menu_grid2");
	var menu3 = $("div#menu_grid3");
	var loadmore = $(".loadmore");
	var kidsstep = 1;
	var kidsmenu = $("div#kids_menu_grid");
	var kidsloadmore = $(".kidsloadmore");

	var basket_count=0;
	var basket_list=[];

	loadKidsProducts();
	
	$(".main_categories > .row > #pizza_main").on("click", function (event) {
	   var el = $(event.currentTarget);
	   loadProducts(el.attr('id').replace("_main", ""));
	   $(".main_categories").css("display","none");
	   $(".categories").css("display","");
	   loadmore.css("display","");
	   menu1.css("display","");
	});
	$(".main_categories > .row > #sushi_main").on("click", function (event) {
		var el = $(event.currentTarget);
		loadProducts(el.attr('id').replace("_main", ""));
		$(".main_categories").css("display","none");
		$(".categories").css("display","");
		loadmore.css("display","");
		menu2.css("display","");
	});
	$(".main_categories > .row > #noodles_main").on("click", function (event) {
		var el = $(event.currentTarget);
		loadProducts(el.attr('id').replace("_main", ""));
		$(".main_categories").css("display","none");
		$(".categories").css("display","");
		loadmore.css("display","");
		menu3.css("display","");
	});
	$(".categories > .row > #pizza").on("click", function (event) {
		var el = $(event.currentTarget);
		loadProducts(el.attr('id').replace("_main", ""));
		$(".main_categories").css("display","none");
		$(".categories").css("display","");
		loadmore.css("display","");
		menu1.css("display","");
		menu2.css("display","none");
		menu3.css("display","none");
	});
	$(".categories > .row > #sushi").on("click", function (event) {
		var el = $(event.currentTarget);
		loadProducts(el.attr('id').replace("_main", ""));
		$(".main_categories").css("display","none");
		$(".categories").css("display","");
		loadmore.css("display","");
		menu1.css("display","none");
		menu2.css("display","");
		menu3.css("display","none");
	});
	$(".categories > .row > #noodles").on("click", function (event) {
		var el = $(event.currentTarget);
		loadProducts(el.attr('id').replace("_main", ""));
		$(".main_categories").css("display","none");
		$(".categories").css("display","");
		loadmore.css("display","");
		menu1.css("display","none");
		menu2.css("display","none");
		menu3.css("display","");
	});

	
	$(".categories > .row > .col-md-4").on("click", function (event) {
	   var el = $(event.currentTarget);
	   loadProducts(el.attr('id'));
	});

	loadmore.on("click", function (event) {
	   if(step == 2){
		    loadmore.find('img').css("transform","rotate(180deg)");
			loadProducts(prtype);
	   }
	   else{
		   step = 1;
		   loadmore.find('img').css("transform","rotate(0deg)");
		   loadProducts(prtype);

	   }
	});
	
	kidsloadmore.on("click", function (event) {
	   if(kidsstep == 2){
		    kidsloadmore.find('img').css("transform","rotate(180deg)");
			loadKidsProducts(prtype);
			
	   }
	   else{
		   kidsstep = 1;
		   kidsloadmore.find('img').css("transform","rotate(0deg)");
		   loadKidsProducts(prtype);
		   
	   }
	});


	function loadProducts(type){



		$.getJSON('../food.json', function (data) {


		var str = "";

		if(prtype != type || step == 1){
			var cnt = 0;
			$.each(data[type], function( index, value ) {
				if(cnt < 6){
				str = str + printProduct(value);
				cnt +=1;
				}
				loadmore.css("transform","");
			});
			step +=1;
			prtype = type;
		}else{
			$.each(data[type], function( index, value ) {
				str = str + printProduct(value);
			});
			step +=1;
		}
			menu.html("");
			menu.html("<div class='row paddingTop40'>" + str + "</div>");
			addItemToBucket();

		});




	}
	
	function loadKidsProducts(){
		$.getJSON('../kidsfood.json', function (data) {

		var str = "";
		
		if(kidsstep == 1){
			var cnt = 0;
			$.each(data, function( index, value ) {
				if(cnt < 3){
				str = str + printkidsProduct(value);
				cnt +=1;
				}
				kidsloadmore.css("transform","");
			});
			kidsstep +=1;
		}else{
			$.each(data, function( index, value ) {
				str = str + printkidsProduct(value);
			});
			kidsstep +=1;
		}
			kidsmenu.html("");
			kidsmenu.html("<div class='row paddingTop40'>" + str + "</div>");
			addItemToBucket();
			
		});
	}
	
	function printProduct(data){
		var sizes ="";

		for(var i =0; i < data.size.length; i++){
		 sizes = sizes + '<div class="item_size">'+'<img src="img/pizza2.png">'+'<p>'+data.size[i]+' см</p>'+'</div>';
		}

		var str = ' ';

              console.log(data);

		return str;


	}
	
	function printkidsProduct(data){
		var str = ' <div class="col-md-4 col-sm-6 col-xs-12 item">'+
				   ' <div class="item_wrapper">'+
					 ' <img src="img/item.png" alt="Alt" class="img_responsive"/>'+
					  '<div class="item_description">'+
						'<h4 class="category centered">Категория</h4>'+
						'<h3 class="title centered">'+data.name+'</h3>'+
						'<p class="item_descr centered">'+data.desc+'</p>'+
						'<h3 class="price centered">'+data.price+'</h3>'+
					  '</div> '+
				   ' </div>'+
					'<div class="item_cont">'+
					  '<div class="item_description">'+
						'<h4 class="category centered">Категория</h4>'+
						'<h3 class="title centered">'+data.name+'</h3>'+
						'<p class="item_descr centered">'+data.desc+'</p>'+
						'<p class="item_cook">Способоб приготовления: Картофель вареный, овощи на пару, мясо в духовке и тд...</p>'+
						'<p class="item_weight"><i>250 грамм</i></p>'+
						'<h3 class="price centered">'+data.price+'</h3>'+
						`<a class="my_btn btn-sample btn-xl centered" data-item='`+ JSON.stringify(data) +`' href="#">Заказать</a>`+
					  '</div> '+
					'</div>'+
				  '</div>';

				  console.log(data);
			  
		return str;
	}

$('#basket-close').click(function () {
    $("#basket").slideUp('fast');
});


$('#quick-close').click(function () {
    $("#quick").slideUp('fast');
});

$('#quick').hide();
$('#quick-submenu').click(function () {
    if(!window.matchMedia('(max-width: 992px)').matches) {
        if ($("#quick:first").is(":hidden")) {
            $("#basket").slideUp('fast');
            $("#quick").slideDown('fast');
            setupPhoneMask();
        } else {
            $("#quick").slideUp('fast');
        }
    }
    // open modal
    else{
        $('#quickModal').modal('show');
	}
});

$('#basket').hide();
$('#basket-submenu').click(function () {
    if(!window.matchMedia('(max-width: 992px)').matches){
        if ($( "#basket:first" ).is( ":hidden" ) ) {
            $( "#quick" ).slideUp('fast');
            $( "#basket" ).slideDown('fast');
        } else {
            $( "#basket" ).slideUp('fast');
        }
	}
    // open modal
	else{
        $('#orderModal').modal('show');
	}
});

// mask & validate phone number
$('input[name="phone"]').each(function(){
    $(this).mask("+38(099) 999-99-99");
});


function setupPhoneMask() {
    if ($('#phone_form').length) {
        var form = $('#phone_form'),
            btn = form.find('#callme');
        form.find('input[name="phone"]').addClass('empty_field');

        setInterval(function () {

            if ($('input[name="phone"]').length) {
                var pmc = $('input[name="phone"]');
                if ((pmc.val().indexOf("_") !== -1) || pmc.val() === '') {
                    pmc.addClass('empty_field');
                } else {
                    pmc.removeClass('empty_field');
                }
            }

            var sizeEmpty = form.find('.empty_field').length;

            if (sizeEmpty > 0) {
                if (btn.hasClass('disabled')) {
                    return false
                } else {
                    btn.addClass('disabled')
                }
            } else {
                btn.removeClass('disabled')
            }

        }, 200);

        btn.click(function () {
            if ($(this).hasClass('disabled')) {
                return false
            } else {
                form.submit();
                $('#confirmModal').modal('toggle');
            }
        });

    }
}

/*
	on submit from 'Phone number' form
 */
function sendPhoneNumber() {

}


$(".hide_list").click(function() {
	$('.show_list').toggle();
});
	  

$(document).ready(function(){
	$('.my-slick').slick({
		slidesToShow: 2,
		  slidesToScroll: 1,

	});
});

$(window).bind("resize", hideslider);
  hideslider();
  function hideslider()
  {
    if(window.matchMedia('(max-width: 992px)').matches)
    {
      $("#carouselExampleIndicators").carousel(0);
      setTimeout(function(){$(".carousel").carousel('pause');},2000);
      $("ol.carousel-indicators").css("display","none");
    } else {
      $(".carousel").carousel('cycle');
      $("ol.carousel-indicators").css("display","");
    }
  }

  //


$(window).on('load', function() {

	// $(".loader_inner").fadeOut();
	// $(".loader").delay(400).fadeOut("slow");

	// $(".top_text h1").animated("fadeInDown", "fadeOutUp");
	// $(".top_text p").animated("fadeInUp", "fadeOutDown");

});
$(function () {
        $('.radio_hidden').css('display', 'none');
        $(".radiotoogle1").click(function () {
            $('.radio_hidden').css('display', 'none')
        });

        $(".radiotoogle2").click(function () {
            $('.radio_hidden').css('display', 'block')
        });

        $('.navbar-toggler').click(function () {
            $('.navbar-collapse').toggleClass('right').toggleClass('translate-nav');
        });
    });




/* Скрипты для корзины
 * ******showCart для вывода модального окна
 * ******clearCart для очистки корзины
 * *******в ajax с помощью e.preventDefault() отменяем layout для того чтоб при
 * рендеринге модального окна шаблон не применялся еще раз на странице
 * */
function showCart(cart) {
	$('.show_list').html(cart);
	$('#cart').modal();
}
function getCart() {
	$.ajax({
		url: '/cart/show',
		type: 'GET',
		success: function (res) {
			if (!res) alert('Ошибка!');
			showCart(res);
		},
		error: function () {
			alert('Error!');
		}
	});
}

/*
 modal-body это модальное окно в котором показана корзина, данный ajax запрос удаляет товар
 по нажатие на крестик
 */
$('.show_list').on('click', '.del-item', function () {
	var id = $(this).data('id');
	$.ajax({
		url: '/cart/del-item',
		data: {id: id},
		type: 'GET',
		success: function (res) {
			if (!res) alert('Ошибка!');
			showCart(res);
		},
		error: function () {
			alert('Error!');
		}
	});
});

/*
 Функция clearCart очищает полность корзину
 */
function clearCart() {
	$.ajax({
		url: '/cart/clear',
		type: 'GET',
		success: function (res) {
			if (!res) alert('Ошибка!');
			showCart(res);
		},
		error: function () {
			alert('Error!');
		}

	});
}

/*
 В этом скрипте и следующих двух во вкладке продукта можно в поле указать количество продукции
 которую хотим добавить с помощью id указываем id продукта , count  количество продуктов
 */
$('.cartss').on('click', function (e) {
	e.preventDefault();
	var id = $('').val();
		count = $('#count').val();
	$.ajax({
		url: '/cart/add',
		data: {id: id, count: count},
		type: 'GET',
		success: function (res) {
			if (!res) alert('Выбранного размера пиццы нет в наличии!');
			showCart(res);я
		},
		error: function () {
			alert('Выбранного размера пиццы нет в наличии!');
		}

	});
})

$('.carts').on('click', function (e) {
	e.preventDefault();
	var id = $(this).data('id'),
		count = $('#count').val();
	$.ajax({
		url: '/cart/add',
		data: {id: id, count: count},
		type: 'GET',
		success: function (res) {
			if (!res) alert('Ошибка!');
			showCart(res);
		},
		error: function () {
			alert('Error!');
		}

	});
})

$('.minus').click(function () {
	var $input = $(this).parent().find('#count');
	var count = parseInt($input.val()) - 1;
	count = count < 1 ? 1 : count;
	$input.val(count);
	$input.change();
	return false;
});
$('.plus').click(function () {
	var $input = $(this).parent().find('#count');
	$input.val(parseInt($input.val()) + 1);
	$input.change();
	return false;
});

$('.btn-sample').click( function()
{
	$(this).css("background-color", "#f5c646");
} );

$('.cart_link').click(function () {
	$("#basket").css("display","");
});
$('#submit-order').click(function () {
	$("#confirmModal").css("display","");
});
