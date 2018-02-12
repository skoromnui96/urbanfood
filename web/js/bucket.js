var template = '<div class="row item_in_backet">\
<div class="wrapper_list">\
<img class="item_image" src="img/pizza_sm.png">\
<p class="list_price">\
    <span class="food_type">Пицца</span>\
    <span class="food_name">"Сицилийская"</span>\
    <span class="item_size">30см</span>\
    <span class="item_price">122 грн</span>\
</p>\
<div class="number">\
    <span>Количество</span>\
    <div class="count_wrapp">\
    <span class="minus">-</span>\
    <input class="bn" type="text" value="1" size="5"/>\
    <span class="plus">+</span>\
    </div>\
</div>\
<span class="count_price"><b>222 грн</b></span>\
<button type="button" class="close basket-delete" id="basket-delete">×</button>\
</div>\
</div>';

function addChangeOfCount(){
    $('.minus').click(function () {
        var mainParent = $(this).closest('.item_in_backet');
        var index = $('.item_in_backet').index(mainParent);
        var price = parseInt(mainParent.find('.item_price').text());
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
        $input.val(count);
        console.log(price , count);
        $('.count_price b').eq(index).text(price * count + 'грн');
		$input.change();
		return false;
	});
	$('.plus').click(function () {
        var mainParent = $(this).closest('.item_in_backet');
        var index = $('.item_in_backet').index(mainParent);
        var price = parseInt(mainParent.find('.item_price').text());
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) + 1;
        $input.val(parseInt($input.val()) + 1);
        $('.count_price b').eq(index).text(price * count + 'грн');
		$input.change();
		return false;
	});
}

function addItemToBucket(){
    $('a.my_btn').on('click', function(event){
        var currentClickedItemData = JSON.parse($(this).attr('data-item'));
        console.log(currentClickedItemData + "text");
        var objToStorage = {
            name : currentClickedItemData.name,
            img : currentClickedItemData.img,
            price : currentClickedItemData.price,
            type :  currentClickedItemData.type
        };

        var currentStateOfStorage = getUpdatedLocalStorage();
        console.log('current state', currentStateOfStorage);
        currentStateOfStorage.push(objToStorage);
        setDataToLocalStorage(currentStateOfStorage);
        addTemplateToBucket();
        event.preventDefault();
    });
}

function addTemplateToBucket(){
    $('.nav-link.bas').on('click', function(){
        showBucketItems();
        deleteItem();
    });
    
}

function showBucketItems(){
    var currentLocalStorage = getUpdatedLocalStorage();
    $('.row.item_in_backet').remove();
    $('span.count').text(currentLocalStorage.length);
    for(var i = 0; i < currentLocalStorage.length; i++){
        var Jtemplate = $(template).clone();
        Jtemplate.find('.food_name').text(currentLocalStorage[i].name);
        Jtemplate.find('.item_price').text(currentLocalStorage[i].price);
        Jtemplate.find('.item_image').attr("img", currentLocalStorage[i].img);
        Jtemplate.find('.count_price b').text(currentLocalStorage[i].price);
        Jtemplate.find('.food_type').text(currentLocalStorage[i].type);
        $('.show_list').append(Jtemplate);
    }
    addChangeOfCount();
}

function deleteItem(){
    $('.basket-delete').on('click', function(){
        var index = $('.item_in_backet').index($(this).closest('.item_in_backet'));
        var currentLocalStorage = getUpdatedLocalStorage();
        currentLocalStorage.splice(index, 1);
        setDataToLocalStorage(currentLocalStorage);
        showBucketItems();
        deleteItem();
    });
}

function getUpdatedLocalStorage(){
    console.log('getted');
    return JSON.parse(window.localStorage.getItem('bucket')) || [];
}

function setDataToLocalStorage(data){
    console.log('setted');
    window.localStorage.setItem('bucket', JSON.stringify(data));
}

$(function(){
    
});