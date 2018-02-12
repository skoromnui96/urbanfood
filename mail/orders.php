<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>

            <th>Наименование</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Cумма</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $item): ?>
            <tr>
                <td><?=$item['name']?></td>
                <td><?=$item['count']?></td>
                <td><?=$item['price']?></td>
                <td><?=$item['price']*$item['count']?></td>
            </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="3">Итого: </td>
            <td><?=$session['cart.count']?></td>
        </tr>
        <tr>
            <td colspan="3">На сумму: </td>
            <td><?=$session['cart.sum']?></td>
        </tr>
        </tbody>
    </table>
    <table class="table table-hover table-striped">
        <thead>
        <tr>

            <th>Телефон</th>
            <th>Город</th>
            <th>Улица</th>
            <th>Корпус</th>
            <th>Дом</th>
            <th>Квартира</th>
            <th>Комментарий</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$order->phone?></td>
                <td><?=$order->city?></td>
                <td><?=$order->street?></td>
                <td><?=$order->corps?></td>
                <td><?=$order->house?></td>
                <td><?=$order->flat?></td>
                <td><?=$order->comment?></td>
            </tr>
        </tbody>
    </table>
</div>







