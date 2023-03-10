<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/buynow.css">
<?php
if(!isset($_SESSION['perdoruesi'])){
  header("Location: index.php#rightfooter");
}
if (isset($_GET['pid'])){
  $produktiid = $_GET['pid'];
  $produktiData = merrProduktin($produktiid);
  if($produktiData){
    $produkti = mysqli_fetch_assoc($produktiData);
    $produktiid = $produkti['produkti_id'];
    $emri = $produkti['emri'];
    $cmimi = $produkti['cmimi'];
    $viti = $produkti['vitiprodhimit'];
    $prodhuesi = $produkti['prodhuesi'];
    $pershkrimi = $produkti['pershkrimi'];
    $foto = $produkti['image_url'];
  }
}
  
// test comment
  if(isset($_POST['porosit'])){
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    buyProducts($perdoruesi,$_GET['pid'],date('Y-m-d H:i:s'),$cmimi);
  }
 

    ?>
<div class="container2">
<div class="product-container2">
      
      <?php
      echo "<div class='imagecontainer'>";
      echo "<img src='uploads/$foto' id='first-product2'>";
      echo "</div>";
        echo "<p class='product-text2'><b>Product name:</b> $emri</p>";
        echo "<p class='price2'><b>Product price:</b> $cmimi &#x20AC;</p>";
        echo "<p class='productionyear'><b>Production year:</b> $viti </p>";
        echo "<p class='manufacturer'><b>Manufacturer:</b> $prodhuesi </p>";
        echo "<p class='details'><b>Details:</b> $pershkrimi </p>";
      ?>
      <form method="post">
      <input type="submit" class="order" value="ORDER" name="porosit">
      </form>
      
      
    </div>
</div>

<?php include 'footer.php' ?>
