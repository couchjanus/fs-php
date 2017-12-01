<?php
include_once VIEWS.'/shared/admin/header.php';
?>
        <main>
            <h1><?= $title;?></h1>
        </main>

<article class='large'>

        <h1>Удалить пользователя #<?php echo $data['user_id']; ?></h1>
        <p>Вы действительно хотите удалить этого пользователя?</p>

        <form method="post">
            <input type="submit" name="submit" value="Удалить" />
        </form>

</article>

<?php

include_once VIEWS.'/shared/admin/footer.php';


