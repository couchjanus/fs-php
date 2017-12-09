<?php
include_once VIEWS.'/shared/admin/header.php';
?>
         <main>
            <h1><?= $title;?></h1>
        </main>
       

    <article class='large'>

        <table>
            <tr>
                <th>ID заказа</th>
                <th>Имя покупателя</th>
                <th>Телефон покупателя</th>
                <th>Дата оформления</th>
                <th>Статус</th>
            </tr>

            <?php foreach ($orders as $order):?>
                <tr>
                    <td><?php echo $order['id']?></td>
                    <td><?php echo $order['user_name']?></td>
                    <td><?php echo $order['user_phone']?></td>
                    <td><?php echo $order['date']?></td>
                    <td>
                        <?php echo Order::getStatusText($order['status']);?>
                    </td>

                    <td><a title="Просмотр" href="/admin/orders/view/<?php echo $order['id']?>" class="del">
                        <i class="fa fa-file-code-o fa-2x" aria-hidden="true"></i>
                        </a></td>

                    <td><a title="Редактировать" href="/admin/orders/edit/<?php echo $order['id']?>" class="del">
                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                    </a></td>

                    <td><a title="Удалить" href="/admin/orders/delete/<?php echo $order['id']?>" class="del">
                            <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                    </a></td>
                </tr>
            <?php endforeach;?>
        </table>

</article>

<?php

include_once VIEWS.'/shared/admin/footer.php';

