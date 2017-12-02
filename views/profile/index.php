<?php
include_once VIEWS.'/shared/head.php';
include_once VIEWS.'/shared/nav.php';
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

        <h4 id="cabinet_greeting">Привет, <?php echo $data['user']['name']; ?></h4>
        <ul id="cabinet_list">
           <li><a href="/profile/edit">Редактировать персональные данные</a></li>
           <li><a href="/profile/orders">Список покупок</a></li>
        </ul>
            
      </div>
    </div>
  </div>
</div>
</section>

<?php

include_once VIEWS.'/shared/footer.php';
