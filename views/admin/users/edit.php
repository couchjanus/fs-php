<?php
include_once VIEWS.'/shared/admin/header.php';
?>
        <main>
            <h1><?= $title;?></h1>
        </main>

<article class='large'>

        <h1>Изменить параметры пользователя</h1>
        <form action="#" method="post" id="add_form">

            <p>Имя пользователя</p>
            <input required type="text" name="name" value="<?php echo $data['user']['name']?>">

            <p>Почтовый адрес пользователя</p>
            <input required type="email" name="email" value="<?php echo $data['user']['email']?>">

            <p>Пароль пользователя</p>

            <input required type="password" name="password" value="<?php echo $data['user']['password']?>">

            <p>Роль пользователя</p>
            <select name="role">
                <?php if (is_array($data['roles'])): ?>
                    <?php foreach ($data['roles'] as $role): ?>
                        <option value="<?php echo $role['id']; ?>"
                            <?php if ($data['user']['role_id'] == $role['id']) echo ' selected'; ?>>
                            <?php echo $role['name']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <p>Status пользователя</p>
            <input type="checkbox" name="status" <?php if ($data['user']['status'] == 1) echo ' checked'; ?>>
            <br>
            <input type=submit name="submit" value="Сохранить">
        </form>

</article>

<?php

include_once VIEWS.'/shared/admin/footer.php';
