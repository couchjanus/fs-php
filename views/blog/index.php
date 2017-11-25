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
                <h2>Последние публикации</h2>
                <ul>

                    <?php foreach($posts as $singleItem): ?>
                    <li>
                        <h3><?php echo $singleItem['title']?></h3>
                        <p><?php echo $singleItem['created_at'];?></p>
                        <a href="/blog/<?php echo $singleItem['id']; ?>">Read More</a>
                    </li>

                    <?php endforeach; ?>
                </ul> <!-- gallery-items -->
            </div>
            </section>
        </main>

      </div>
      </div>
      </div>

    </section>
<?php
require_once realpath(__DIR__).'/../shared/footer.php';
