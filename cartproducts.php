<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

<link rel="stylesheet" href="styles/cartproducts.css">
<div class="cartfavoriteordercontainer">
    <table class="product-table">
    <?php 
    if(!isset($_SESSION['perdoruesi'])){
      echo("<script>location.href = 'index.php#rightfooter'</script>");
    }
  if(isset($_SESSION['perdoruesi'])){
    $perdoruesi = $_SESSION['perdoruesi']['email'];
  }
        //second change comment
    class cartProducts extends functions{
    public $sql;
    public $row;
    }
    $cp = new cartProducts();
    
  $carts = $cp->merrCartoop();
  $numriCart =  $cp->numberofCartsoop($perdoruesi);
  
  if($numriCart == 0){
    echo "<img src='images/empty-cart.png' id='emptycart'> ";
  }
  $i=0;
  while($cart = $cp->row = $carts->fetch_assoc()){
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
      $cp->deleteCartoop($perdoruesi, $produktiid);
    }
  }
  ?>
   
    </table>
  </div>
<?php include 'footer.php' ?>