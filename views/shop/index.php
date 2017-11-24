<?php
require_once realpath(__DIR__).'/../shared/head.php';
require_once realpath(__DIR__).'/../shared/nav.php';
?>

<!-- product Start -->
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Our <b>product Members</b></h3>
                    <h4 class="feature_sub">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </h4>
                    <div class="divider"></div>
                </div>
            </div>  <!-- Col-md-12 End -->

            <div class="product-items">

            </div>
        </div>
    </div> <!-- Conatiner product end -->
</section>  <!-- Section product End -->

<!-- Our product End -->
<div class="clearfix"></div>



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
        
        foreach($products as $row) {
            echo "<div class='col-lg-10'>";
            echo "<h2>".$row['name']."</h2>";
            echo "<p><a class='btn btn-primary' "."href=/detail?id=".$row['id']." role='button'>View details &raquo;</a></p></div>";
        }
        ?>
      </div>
    </div>
  </div>
</div>
</section>

<?php
require_once realpath(__DIR__).'/../shared/footer.php';
?>

  <script id="productTemplate" type="text/template">
        <div class="item text-center">
          <div class="single-member">
            <div class="overlay-hover">
              <img src="http://lorempixel.com/300/200/cats/" alt="" class="img-responsive productImg">
              <div class="overlay-effect">

                <div class="icons">
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"> <i class="fa fa-share"></i></a>
                  <a href="#"> <i class="fa fa-search"></i></a>
                </div>
                
                <a class="add-to-cart">Add to Cart</a>
                <a class="show-detail">Show Detail</a>
                <p class="productDescription">
                </p>
                
              </div>
            </div>
            <h3 class="productPrice" productPrice="">Price: </h3>
            <h5 class="productName" productName=""></h5>
          </div>
        </div>  <!-- item wrapper end -->
    </script>
<script>
  
  $(function() {

      // $.ajax({
      //       type: "GET",
      //       url: "/api/shop",
      //       dataType: "json",
      //       success: function (data) {
      //           console.log(data);
      //       },
      //       error: function (result) {
      //           console.log("data", result);
      //       }
      //   });

try {
    
    var url = '/api/shop';

    fetch(url).then((response) => response.json())
    .then((data) => {

      function initCatalog(){
        function makeItem(product){
        $template.find('.single-member').attr('productId', product["id"]);
        $template.find('.productName').text(product.name).attr('productName', product["name"]);
        $template.find('img').attr('src', "http://lorempixel.com/300/200/cats/" + (product.id + 1));
        $template.find('.productPrice').attr('productPrice', product["price"]);
        $template.find('.price').text('$' + product["price"]);
        $template.find('.productDescription').text(product["description"]);
        }

       $(".product-items").empty();

       for (var i=0; i<Object.keys(data).length; i++){
           var $template = $($('#productTemplate').html());
           makeItem(data[i]);
           $(".product-items").append($template);
       }
      }
      initCatalog();  
    });

  } catch (error) { throw error; };  

 });

</script>