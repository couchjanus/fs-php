<?php
include_once VIEWS.'/shared/admin/header.php';
?>
        <main>
            <h1><?= $title;?></h1>
        </main>

<article class='large'>
        <h1>Добавить нового пользователя</h1>
        <form action="#" method="post" id="add_form">
            <p>Имя пользователя</p>
            <input required type="text" name="name">

            <p>Почтовый адрес пользователя</p>
            <input required type="email" name="email">

            <p>Пароль пользователя</p>

            <input required type="password" name="password">
            <p>Роль пользователя</p>
            <select name="role">
                <?php if (is_array($data['roles'])): ?>
                    <?php foreach ($data['roles'] as $role): ?>
                        <option value="<?php echo $role['id']; ?>">
                            <?php echo $role['name']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <input type=submit name="submit" value="Сохранить" id="add_btn">
        </form>

</article>

<?php

include_once VIEWS.'/shared/admin/footer.php';

