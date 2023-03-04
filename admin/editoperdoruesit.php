<?php include 'adminheader.php' ?>
<?php if(!isset($_SESSION['perdoruesi']) || $_SESSION['perdoruesi']['roli']==0){
    header("Location: ../index.php");
}
?>

<?php 
if (isset($_GET['em'])){
  $email = $_GET['em'];
  $perdoruesiData = merrEmail($email);
  if($perdoruesiData){
    $perdoruesi = mysqli_fetch_assoc($perdoruesiData);
    $email = $perdoruesi['email'];
    $emri = $perdoruesi['emri'];
    $mbiemri = $perdoruesi['mbiemri'];
    $dataLindjes = $perdoruesi['datalindjes'];
    $telefoni = $perdoruesi['telefoni'];
    $adresa = $perdoruesi['adresa'];
  }
}
if(isset($_POST['deleteuser'])){
      deleteUsers($_POST['email']);
}

if(isset($_POST['savechanges'])){
  $email = $_POST['email'];
  $emri = $_POST['emri'];
  $mbiemri = $_POST['mbiemri'];
  $adresa = $_POST['adresa'];
  $telefoni = $_POST['numritelefonit'];
  editUsers($email, $emri, $mbiemri, $adresa, $telefoni);
 
}




?>

<div class="container-form">
    <h1><?php echo "$emri" .' ' . "$mbiemri"?></h1>
    <form id="usersedit" method="post">
      <label>Email: </label>
      <input type="email" name="email" id="email" value="<?php if(!empty($email)) echo $email ?>">
      <label>Name:</label>
      <input type="text" name="emri" id="emri" value="<?php if(!empty($emri)) echo $emri ?>">
      <label>Mbiemri:</label>
      <input type="text" name="mbiemri" id="mbiemri" value="<?php if(!empty($mbiemri)) echo $mbiemri ?>">
      <label>Adresa:</label>
      <input type="text" name="adresa" id="adresa" value="<?php if(!empty($adresa)) echo $adresa ?>">
      <label>Numri i telefonit: </label>
      <input type="text" name="numritelefonit" id="numritelefonit" value="<?php if(!empty($telefoni)) echo $telefoni ?>">
       <input type="submit" name="savechanges" id="savechanges" value="SAVE CHANGES">  
     <input type="submit" name="deleteuser" id="deleteuser" value="DELETE USER">  
    </form>
    <div class="userinfo-container">
    <?php 
    echo "<a href='orders.php?em=$email'><button class='order-button'><img src='../images/orders.png' id='orders'></button></a> ";   
    echo "<a href='cartproducts.php?em=$email'><button class='cart-button'><img src='../images/shopping-cart-svg-png-icon-download-28.png' class='addtocart' alt='add to cart' title='add to cart' ></button></a>";
    echo "<a href='favoriteproducts.php?em=$email'><button class='favorite-button'><img src='../images/heart.png' class='heart'></button></a>";
    ?>
      </div>
    

 </div>