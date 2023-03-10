<?php include 'adminheader.php' ?>
<?php if(!isset($_SESSION['perdoruesi']) || $_SESSION['perdoruesi']['roli']==0){
    header("Location: ../index.php");
}
?>
<link rel="stylesheet" href="styles/cartproductsadmin.css">
<div class="cartfavoriteordercontainer">
    <table class="product-table">
    <?php 
    if (isset($_GET['em'])){
      $email = $_GET['em'];
      $perdoruesiData = merrEmail($email);
      $carts = merrFavoritesAdmin($email);
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
    echo "<img src='../uploads/$foto' id='first-product2'>";
    echo "</div>";
    echo "<div class='productandtext'>";
    echo "<p class='product-text2'>$emri</p>";
    echo "<p class='price2'>$cmimi&#x20AC;</p>";
    echo "</div>";
    echo "<div class='button-container'>";
    echo "</div>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";


  }
  ?>
   
    </table>
  </div>