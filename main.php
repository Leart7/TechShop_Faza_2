
<main class="test">



<?php

class main extends functions{
  public $sql;
  public $row;
}
$main = new main();

  if(isset($_SESSION['perdoruesi'])){
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $roli = $_SESSION['perdoruesi']['roli'];
  }
  $produktet = $main->merrProduktetoop();
  
  $i=0;
  $j=0;
  while($produkti = $main->row = $produktet->fetch_assoc()){
    $produktiid = $produkti['produkti_id'];
    $emri = $produkti['emri'];
    $cmimi = $produkti['cmimi'];
    $foto = $produkti['image_url'];
    
 
  echo "<div class='product-container'>";
  echo "<div class='imagecontainer'>";
  echo "<img src='uploads/$foto' id='first-product'>";
  echo "</div>";
  echo "<p class='product-text'>$emri</p>";
  echo "<p class='price'>$cmimi&#8364;</p>";
  echo "<div class='threeitem-container'>";
  echo "<div>";
  echo "<a href='buynow.php?pid=$produktiid'><button class='buy-button'>Buy now</button></a>";
  echo "</div>";
  echo "<div class='twoitem-container'>";
  echo "<form method='post' id='favor'>
  <button type='submit' class='favorite-button' name='fav{$produktiid}' ><img src='images/heart.png' class='heart'></button>
  </form>";
  echo "<form method='post' id='cartor'>
  <button type='submit' class='cart-button' name='cart{$produktiid}'><img src='images/shopping-cart-svg-png-icon-download-28.png' class='addtocart'></button>
  </form>";
  if(!isset($_SESSION['perdoruesi']) && (isset($_POST['cart'.$produktiid]) || isset($_POST['fav'.$produktiid]))){
    echo("<script>location.href = 'index.php#rightfooter'</script>");
  }else{
    if(isset($_POST['cart'.$produktiid])){
      $main->shtoCartoop($perdoruesi,$produktiid);
    }
    if(isset($_POST['fav'.$produktiid])){
      $main->shtoFavoritesoop($perdoruesi,$produktiid);
      } 
  }
  echo "</div>";
 

  echo "</div>";
  echo "</div>";

  $i++;
  if( $i%4==0){
    echo "</div>";
    
  }
  }

?>

</main>