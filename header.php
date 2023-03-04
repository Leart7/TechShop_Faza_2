<?php include 'admin/functions.php'?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Tech Shop</title>
    <link rel="stylesheet" href="index.css" type="text/css">

    
    
    
  </head>
    <!--============== Start of Header =========-->
    <header id="header">  
      
      <div class="left-section">
        <a href="index.php" id="logo-link"><img src="images/logo.png" id="logo" alt="Logo" title="TechShop Home"></a>
      </div>

      <div class="middle-section">
        <input type="search" placeholder="Search for products" id="search-box">
      </div>
     
      <div class="right-section">
        <div id="cart-container">
      
          <a href="cartproducts.php"><img src="images/shopping-cart-svg-png-icon-download-28_white.png" id="cart" alt="Cart" title="Cart" ></a>
          <?php 
      
      if(isset($_SESSION['perdoruesi'])){
        $perdoruesi = $_SESSION['perdoruesi']['email'];
        merrCart();
        $numriCart = numberofCarts($perdoruesi);
        if($numriCart > 0){
          echo "<div id='cart-count'>$numriCart</div>";
        }
      
      }
      ?>
        </div>
       
      <a href="#"><img src="images/Sample_User_Icon_white.png" id="user" alt="User" title="User"></a>
      <a href="#"><img src="images/Windows_Settings_app_icon_white.png" id="settings" alt="Settings" title="Settings"></a>
      <?php 
        if(isset($_SESSION['perdoruesi'])){
          echo  "<form method='post'>
          <button type='submit' name='logout' id='btnlogout'><img src='images/logout_white.png' id='logoutbtn'></button>
          </form>";
          if(isset($_POST['logout'])){
            unset($_SESSION['perdoruesi']);
            header("Location: index.php");
          }
        }
        
        ?>  
    </div>
      
    </header>
    
   
   
    



<!------------- End of Header ============-->