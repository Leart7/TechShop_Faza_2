<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<link rel="stylesheet" href="cartproducts.css">
<div class="cartfavoriteordercontainer">
    <table class="product-table">
    <?php 
    if(!isset($_SESSION['perdoruesi'])){
      header("Location: index.php#rightfooter");
    }
  if(isset($_SESSION['perdoruesi'])){
    $perdoruesi = $_SESSION['perdoruesi']['email'];
  }
        //second change comment
       
  $carts = merrCart();
  $numriCart = numberofCarts($perdoruesi);
  if($numriCart == 0){
    echo "<img src='images/empty-cart.png' id='emptycart'> ";
  }
  $i=0;
  while($cart = mysqli_fetch_assoc($carts)){
    $produktiid = $cart['produkti_id'];
    $emri = $cart['emri'];
    $cmimi = $cart['cmimi'];
    $foto = $cart['image_url'];
    echo "<tr>";
    echo "<td>";
    echo "<div class='imagecontainer'>";
    echo "<img src='uploads/$foto' id='first-product2'>";
    echo "</div>";
    echo "<div class='productandtext'>";
    echo "<p class='product-text2'>$emri</p>";
    echo "<p class='price2'>$cmimi&#x20AC;</p>";
    echo "</div>";
    echo "<div class='button-container'>";
    echo "<a href='buynow.php?pid=$produktiid'><button id='buy'>BUY NOW</button><br></a>";
    echo "<form method='post'>
            <button type='submit' id='remove' name='remove{$produktiid}'>REMOVE FROM CART</button>
          </form>";
    echo "</div>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";

    if(isset($_POST['remove'.$produktiid])){
      deleteCart($perdoruesi, $produktiid);
    }
  }
  ?>
   
    </table>
  </div>
<?php include 'footer.php' ?>