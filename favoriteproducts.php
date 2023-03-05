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
  $favorites = merrFavorites();
  $numriFavorites = numberofFavorites($perdoruesi);
  if($numriFavorites == 0){
    echo "<img src='images/emptyfavorites.png' id='emptyfavorites'>";
  }
  $i=0;
  while($favorite = mysqli_fetch_assoc($favorites)){
    $produktiid = $favorite['produkti_id'];
    $emri = $favorite['emri'];
    $cmimi = $favorite['cmimi'];
    $foto = $favorite['image_url'];
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
            <button type='submit' id='fav' name='cart{$produktiid}'>ADD TO CART</button><br>
            <button type='submit' id='remove' name='remove{$produktiid}'>REMOVE FROM FAVORITES</button>
          </form>";
    echo "</div>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";

    if(isset($_POST['remove'.$produktiid])){
      deleteFavorites($perdoruesi, $produktiid);
    }
    if(isset($_POST['cart'.$produktiid])){
      shtoCart($perdoruesi, $produktiid);
    }
  }
?>
    </table>
  </div>
<?php include 'footer.php' ?>