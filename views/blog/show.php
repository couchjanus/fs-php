<?php
require_once realpath(__DIR__).'/../shared/head.php';
require_once realpath(__DIR__).'/../shared/nav.php';
?>
  <section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
        <main>
          <!-- Jumbotron -->
          <div class="jumbotron">
            <h1><?=$title?></h1>
          </div>
            <section class="thumbnail-grid flex">
              <div class="container">
                <h2><?= $post['title'];?></h2>
                <p>
                    Create At: <?= $post['created_at'];?>
                </p>
                
                <div>
                    <?= $post['content'];?>
                </div>

            </div>
            </section>
        </main>

      </div>
      </div>
      </div>

    </section>
<?php

require_once realpath(__DIR__).'/../shared/footer.php';