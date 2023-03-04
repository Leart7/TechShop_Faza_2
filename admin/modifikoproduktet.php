<?php include 'adminheader.php' ?>
<?php if(!isset($_SESSION['perdoruesi']) || $_SESSION['perdoruesi']['roli']==0){
    header("Location: ../index.php");
}
?>
<link rel='stylesheet' href='modifikoproduktet.css'>
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
        $kategoriaid = $produkti['kategoria_id'];
        $foto = $produkti['image_url'];
      }
    if(isset($_POST['ruaj'])){
      $produktiid = $_POST['produkti_id'];
      $emri = $_POST['emriproduktit'];
      $prodhuesi = $_POST['prodhuesi'];
      $vitiprodhimit = $_POST['vitiprodhimit'];
      $cmimi = $_POST['cmimiproduktit'];
      $pershkrimi = $_POST['pershkrimiproduktit'];
      $kategoriaid = $_POST['kategoria'];
      editCategory($produktiid,$kategoriaid);
      editProducts($produktiid, $emri, $cmimi, $vitiprodhimit, $pershkrimi, $prodhuesi);
      
      

     
    }
  }
    
    
    
    ?>

<?php 
if(isset($_POST['submit']) && isset($_FILES['my_image'])){
  


  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  if($error ===0){
    if($img_size > 5000000){
      $em = "Sorry, your file is too large.";
      
    }else{
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png");

      if(in_array($img_ex_lc,$allowed_exs)){
        $new_img_name = uniqid("IMG-",true). '.'.$img_ex_lc;
        $img_upload_path = '../uploads/'.$new_img_name;
        move_uploaded_file($tmp_name,$img_upload_path);

        $sql = "UPDATE images SET image_url='$new_img_name' WHERE produkti_id = '$produktiid'";
        mysqli_query($dbconn,$sql);
      }else{
        $em = "You can't upload files of this type";
        
      }
    }
  }else{
    $em = "unknown error occured!";
  
  }
}else{

}

?> 

    
    <div class="form-container">
    <form  method="post" enctype="multipart/form-data" id='modifiko2'>
    <div style='padding: 7px 0px 7px 15px;'>
    <label>Product Image:</label><br>
    <input type="file" name="my_image">
    <input type="submit" name="submit" value="Upload">
    </div>
    
    

  </form>

    <form id="modifiko" class="box" method="post">
      <input type="hidden" name="produkti_id" id="produkti_id" value="<?php if(!empty($produktiid)) echo $produktiid ?>">
      <fieldset>
        <label>Product name:</label>
        <input type="text" name="emriproduktit" id="emriproduktit" value="<?php if(!empty($emri)) echo $emri ?>">
      </fieldset>
      <fieldset>
        <label>Product price:</label>
        <input type="text" name="cmimiproduktit" id="cmimiproduktit" value="<?php if(!empty($cmimi)) echo $cmimi ?>">
      </fieldset>
      <fieldset>
        <label>Production year:</label>
        <input type="text" name="vitiprodhimit" id="vitiprodhimit" value="<?php if(!empty($vitiprodhimit)) echo $vitiprodhimit ?>">
      </fieldset>
      <fieldset>
        <label>Category:</label><br>
        <select name="kategoria" id="kategoria" style="width:100%;border: 1px solid #1f2833;height: 40px;" >
          <option value="<?php echo"$kategoriaid"; ?>"><?php if(!empty($kategoria)) echo $kategoria ?></option>
          <?php 
          $kategoriaData = merrKategorite($kategoriaid);
          while($kategoriaa = mysqli_fetch_assoc($kategoriaData)){
            $kategoriaId = $kategoriaa['kategoria_id'];
            $kategoriaemri = $kategoriaa['emri_kategorise'];
            echo "<option value='$kategoriaId'>$kategoriaemri</option>";
          }
          
         
          ?>
        </select>
        
      </fieldset>
      <fieldset>
        <label>Details:</label>
        <input type="text" name="pershkrimiproduktit" id="pershkrimiproduktit" value="<?php if(!empty($pershkrimi)) echo $pershkrimi ?>">
      </fieldset>
      <fieldset>
        <label>Manufacturer:</label>
        <input type="text" name="prodhuesi" id="prodhuesi" value="<?php if(!empty($prodhuesi)) echo $prodhuesi ?>">
        </form>
 
        <input type="submit" name="ruaj" value="Save changes" >
      </fieldset>
      

</div>

<div class="product-container2">
      <?php  echo "<img src='../uploads/$foto' id='first-product2'>"; ?> 
      <p class="product-text2"><b>Product name: </b> <?php if(!empty($emri)) echo $emri ?></p>
      <p class="price2"><b>Product price: </b><?php if(!empty($cmimi)) echo $cmimi ?>&#x20AC;</p>
      <p class="productionyear"><b>Production year: </b><?php if(!empty($vitiprodhimit)) echo $vitiprodhimit ?></p>
      <p class="category"><b>Category: </b><?php if(!empty($kategoria)) echo $kategoria ?></p>
      <p class="manufacturer"><b>Manufacturer:</b><?php if(!empty($prodhuesi)) echo $prodhuesi ?></p>
      <p class="details"><b>Details:</b><?php if(!empty($pershkrimi)) echo $pershkrimi ?></p>
      
    </div>

</div>


