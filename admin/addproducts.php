<?php include 'adminheader.php' ?>
<?php if(!isset($_SESSION['perdoruesi']) || $_SESSION['perdoruesi']['roli']==0){
    header("Location: ../index.php");
}
?>

<?php 
 $res =  produktiFundit();
 $result = mysqli_fetch_assoc($res);
 $resultnumber = $result['produkti_id'];
if(isset($_POST['shtoproduktin'])){
  shtoProdukte($_POST['emri'],$_POST['prodhuesi'],$_POST['vitiprodhimit'],$_POST['cmimi'],
  $_POST['pershkrimi'],$_POST['kategoria']);
 
  
}
?>
<?php 
 $res =  produktiFundit();
 $result = mysqli_fetch_assoc($res);
 $resultnumber = $result['produkti_id'];
?>


<div class="container-form">
<h1>Add Product</h1>

<form id="usersedit" method="post">
  <input hidden type='text' name='id' id='id' value="<?php echo $resultnumber ?>"><br> 
  <label>Product name: </label>
  <input type="text" name="emri" id="emri"><br>
  <label>Manufacturer: </label>
  <input type="text" name="prodhuesi" id="prodhuesi"><br>
  <label>Production year:</label>
  <input type="text" name="vitiprodhimit" id="vitiprodhimit"><br>
  <label>Product price:</label>
  <input type="text" name="cmimi" id="cmimi"><br>
  <label>Details: </label>
  <input type="text" name="pershkrimi" id="pershkrimi"><br>
  <label>Category:</label>
  <input type="text" name="kategoria" id="kategoria">
  <input type="submit" name="shtoproduktin" id="addproduct" value="ADD PRODUCT">  
</form>


  <form  method="post" enctype="multipart/form-data">
    <input type="file" name="my_image">
    <input type="submit" name="submit" value="Upload">

  </form>

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

        $sql = "INSERT INTO images(produkti_id,image_url) VALUES('$resultnumber','$new_img_name')";
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
// echo $resultnumber;
?> 

</div>

