<?php include 'adminheader.php' ?>
<?php if(!isset($_SESSION['perdoruesi']) || $_SESSION['perdoruesi']['roli']==0){
    header("Location: ../index.php");
}
?>

    <nav class="container">

  <div class="navbar-div">
    
      <div class="link-div"><a href="#">Electronics</a></div>
      <div class="link-div"><a href="#"><span class="navspanshow">IT Shop</span><span class="navspanhide">IT.S</span></a></div>
      <div class="link-div"><a href="#"><span class="navspanshow">Smart Home</span><span class="navspanhide">S.H</span></a></div>
      <div class="link-div"><a href="#">Lifestyle</a></div>
      <div class="link-div"><a href="#">Accessories</a></div>
      <div class="link-div"><a href="#">Offers</a></div>
      <div class="link-div"><a href="#">New </a></div>
      
   
  </div>
 
</nav>


<main class="test">



  <!--First Row-->
  <?php

  class admin extends functions{
    public $sql;
    public $row;
  }
  $admin = new admin();
  $produktet = $admin->merrProduktetoop();
  
  $i=0;
  $j=1;
  while($produkti = $admin->row = $produktet->fetch_assoc()){
    $produktiid = $produkti['produkti_id'];
    $emri = $produkti['emri'];
    $cmimi = $produkti['cmimi'];
    $foto = $produkti['image_url'];
    
    
    
  echo "<div class='product-container'>";
  echo "<div class='imagecontainer'>";
  echo "<img src='../uploads/$foto' id='first-product'>";
  echo "</div>";
  echo "<p class='product-text'>$emri</p>";
  echo "<p class='product-text'>$cmimi&#8364;</p>";
  echo "<div class='twoitem-container'>";
  echo "<a href='modifikoproduktet.php?pid=$produktiid'><button class='edit'>EDIT</button></a>";
  echo " <a href='fshijproduktet.php?pid=$produktiid'><button class='delete'>DELETE</button></a>";
  echo "</div>";
  echo "</div>";
  $i++;


  } 
    echo "<div class='product-container4'>";
    echo "<a href='addproducts.php'><button class='addproduct'>ADD PRODUCT +</button></a>";
    echo "</div>";
  ?>

</main>