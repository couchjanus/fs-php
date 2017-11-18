<?php
include_once VIEWS.'/includes/head.php';
include_once VIEWS.'/includes/header.php';
?>
        <main>

            <h1><?= $title;?></h1>
            <h2><?= $post['title'];?></h2>
            <p>
                Create At: <?= $post['formated_date'];?>
            </p>
            
            <div>
                <?= $post['content'];?>
            </div>

            
        </main>
       

<?php

include_once VIEWS.'/includes/footer.php';