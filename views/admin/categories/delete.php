<?php
include_once VIEWS.'/includes/admin/header.php';
?>
        <main>
            <h1><?= $title;?></h1>
        </main>

<article class='large'>

        <h1>Удалить категорию #<?php echo $data['category_id']; ?></h1>
        <p>Вы действительно хотите удалить эту категорию?</p>

        <form method="post">
            <input type="submit" name="submit" value="Удалить" />
        </form>

</article>

<?php

include_once VIEWS.'/includes/admin/footer.php';


