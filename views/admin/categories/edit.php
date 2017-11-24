<?php
include_once VIEWS.'/includes/admin/header.php';
?>
        <main>
            <h1><?= $title;?></h1>
        </main>

<article class='large'>

        <h1>Изменить категорию</h1>
        <form action="#" method="post" id="add_form">

            <p>Название Категории</p>
            <input required type="text" name="name" value="<?php echo $data['category']['name']?>">

            <p>Статус</p>
            <select name="status">
                <option value="1" <?php if($data['category']['status'] == 1) echo 'selected'?>>Отображать</option>
                <option value="0" <?php if($data['category']['status'] == 0) echo 'selected'?>>Скрывать</option>
            </select>

            <input type=submit name="submit" value="Сохранить" id="add_btn">
        </form>

</article>

<?php

include_once VIEWS.'/includes/admin/footer.php';
