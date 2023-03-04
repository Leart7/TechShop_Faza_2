<?php include 'functions.php' ?>
<?php if(!isset($_SESSION['perdoruesi']) || $_SESSION['perdoruesi']['roli']==0){
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Tech Shop</title>
    <link rel="stylesheet" href="admin.css" type="text/css">
    
    
  </head>
    <!--============== Start of Header =========-->
    <header id="header">  
      
      <div class="left-section">
        <a href="admin.php" id="logo-link"><img src="../images/logo.png" id="logo" alt="Logo" title="TechShop Home"></a>
      </div>

      <div class="middle-section">
        <input type="search" placeholder="Search for products" id="search-box">
      </div>
     
      <div class="right-section">
      <a href="users.php"><img src="../images/clients_white.png" id="clients" alt="clients" title="clients"></a>
      <a href="#"><img src="../images/Sample_User_Icon_white.png" id="user" alt="User" title="User"></a>
      <a href="#"><img src="../images/Windows_Settings_app_icon_white.png" id="settings" alt="Settings" title="Settings"></a>
      <?php 
        if(isset($_SESSION['perdoruesi'])){
          echo  "<form method='post'>
          <button type='submit' name='logout' id='logoutbtn' style='background-color:#1f2833; border:none; cursor:pointer'><img src='../images/logout_white.png' style='width:26px;margin-right:10px'></button>
          </form>";
          if(isset($_POST['logout'])){
            unset($_SESSION['perdoruesi']);
            header("Location: ../index.php");
          }
        }
        
        ?>    
    </div>
    
      
    </header>
   