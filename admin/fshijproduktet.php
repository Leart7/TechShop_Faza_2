<?php include 'adminheader.php' ?>
<?php if(!isset($_SESSION['perdoruesi']) || $_SESSION['perdoruesi']['roli']==0){
    header("Location: ../index.php");
}
?>
<link rel='stylesheet' href='styles/modifikoproduktet.css'>
<div class="container2">
<?php 
    if (isset($_GET['pid'])){
      $produktiid = $_GET['pid'];
      $produktiData = merrProduktin($produktiid);
      if($produktiData){
        $produkti = mysqli_fetch_assoc($produktiData);
        $produktiid = $produkti['produkti_id'];
        $emri = $produkti['emri'];
        $prodhuesi = $produkti['prodhuesi'];
        $vitiprodhimit = $produkti['vitiprodhimit'];
        $cmimi = $produkti['cmimi'];
        $pershkrimi = $produkti['pershkrimi'];
        $kategoria = $produkti['emri_kategorise'];
        $foto = $produkti['image_url'];
      }
    }

    if(isset($_POST['fshij'])){
      deleteImage($_POST['produkti_id']);
      deleteProducts($_POST['produkti_id']);
}
    ?>

    <div class="form-container">
    <form id="modifiko" class="box" method="post">
    <input readonly type="hidden" name="produkti_id" id="produkti_id" value="<?php if(!empty($produktiid)) echo $produktiid ?>">
      <fieldset>
        <label>Product name:</label>
        <input readonly type="text" name="emriproduktit" id="emriproduktit" value="<?php if(!empty($emri)) echo $emri ?>">
      </fieldset>
      <fieldset>
        <label>Product price:</label>
        <input readonly type="text" name="cmimiproduktit" id="cmimiproduktit" value="<?php if(!empty($cmimi)) echo $cmimi ?>">
      </fieldset>
      <fieldset>
        <label>Production year:</label>
        <input readonly type="text" name="vitiprodhimit" id="vitiprodhimit" value="<?php if(!empty($vitiprodhimit)) echo $vitiprodhimit ?>">
      </fieldset>
      <fieldset>
        <label>Category:</label><br>
        <select readonly name="kategoria" id="kategoria" style="width:100%;border: 1px solid #1f2833;height: 40px;">
          <option value="category"><?php if(!empty($kategoria)) echo $kategoria ?></option>
          <!-- <option value="IT Shop">IT Shop</option>
          <option value="Smart Home">Smart Home</option>
          <option value="Lifestyle">Lifestyle</option>
          <option value="Accessories">Accessories</option> -->
        </select>
        <!-- <input type="text" name="emriproduktit" id="emriproduktit"> -->
      </fieldset>
      <fieldset>
        <label>Details:</label>
        <input readonly type="text" name="pershkrimiproduktit" id="pershkrimiproduktit" value="<?php if(!empty($pershkrimi)) echo $pershkrimi ?>">
      </fieldset>
      <fieldset>
        <label>Manufacturer:</label>
        <input readonly type="text" name="prodhuesi" id="prodhuesi" value="<?php if(!empty($prodhuesi)) echo $prodhuesi ?>">
        <input type="submit" name="fshij" value="Delete"> 
      </fieldset>
      
    </form>
</div>

<div class="product-container2">
      <?php  echo "<img src='../uploads/$foto' id='first-product2'>"; ?> 
      <p class="product-text2"><b>Product name:</b> <?php if(!empty($emri)) echo $emri ?></p>
      <p class="price2"><b>Product price:</b><?php if(!empty($cmimi)) echo $cmimi ?>&#x20AC;</p>
      <p class="productionyear"><b>Production year:</b><?php if(!empty($vitiprodhimit)) echo $vitiprodhimit ?></p>
      <p class="category"><b>Category: </b><?php if(!empty($kategoria)) echo $kategoria ?></p>
      <p class="manufacturer"><b>Manufacturer:</b><?php if(!empty($prodhuesi)) echo $prodhuesi ?></p>
      <p class="details"><b>Details:</b><?php if(!empty($pershkrimi)) echo $pershkrimi ?></p>
      
    </div>

</div>



