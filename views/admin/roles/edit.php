<?php
include_once VIEWS.'/shared/admin/header.php';
?>
        <main>
            <h1><?= $title;?></h1>
        </main>

<article class='large'>
        <h1>Изменить роль</h1>
        <form action="#" method="post" id="add_form">
            <p>Название роли</p>
            <input required type="text" name="name" value="<?php echo $data['role']['name']?>">
            <hr>
            <?php foreach ($data["permissions"] as $permission):?>

            <input type="checkbox" name="check_list[]" value="<?=$permission['id']?>" <?=in_array($permission['id'], $data["perms"])?'checked':'';?>><label><?=$permission['name']?></label>
            <?php endforeach;?>
            <hr>
            <input type=submit name="submit" value="Сохранить" id="add_btn">
        </form>

</article>

<?php

include_once VIEWS.'/shared/admin/footer.php';
