<?php
require_once realpath(__DIR__).'/../shared/head.php';
require_once realpath(__DIR__).'/../shared/nav.php';
?>
<!-- product Start -->
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            <!-- Jumbotron -->
            <div class="jumbotron">
              <h1><?=$title?></h1>
            </div>

      <!-- Example row of columns -->
      <div class="row">
        <?php

        foreach($posts as $row) {
            echo "<div class='col-lg-10'>";
            echo "<h2>".$row['title']."</h2>";
            echo "<p><a class='btn btn-primary' "."href=/blog/".$row['id']." role='button'>View details &raquo;</a></p></div>";
        }
        ?>
      </div>
    </div>
  </div>
</div>
</section>
<?php
require_once realpath(__DIR__).'/../shared/footer.php';
