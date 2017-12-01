<?php
include_once VIEWS.'/shared/admin/header.php';
?>
        <main>
            <h1><?= $title;?></h1>
        </main>
       

<article class='large'>
        <a href="/admin/users/add" class="add_item"><i class="fa fa-plus fa-2x" aria-hidden="true"></i> Добавить пользователя
        </a>
        <h4>Список пользователей</h4>
        <table>
            <tr>
                <th>ID пользователя</th>
                <th>Имя пользователя</th>
                <th>Роль пользователя</th>
            </tr>

            <?php foreach ($users as $user):?>
                <tr>
                    <td><?php echo $user['id']?></td>
                    <td><?php echo $user['name']?></td>
                    <td><?php echo $user['role_id']?></td>
                    <td><a title="Редактировать" href="/admin/users/edit/<?php echo $user['id']?>" class="del">
                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                        </a></td>
                    <td><a title="Удалить" href="/admin/users/delete/<?php echo $user['id']?>" class="del">
                            <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                        </a></td>
                </tr>
            <?php endforeach;?>
        </table>
</article>

<?php

include_once VIEWS.'/shared/admin/footer.php';

