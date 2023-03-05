<aside class="sidebar">
  <div class="sidebar-div" id="home-link">
    <div class="icon-div"><img src="images/home_icon2.png" class="icons" title="Home"></div>
    <div class="text-div"><a href="#" class="link-sidebar">Home</a></div>
  </div>

  <a href="favoriteproducts.php">
  <div class="sidebar-div" id="fav-link">
    <div id="favorite-container">
      <div class="icon-div"><img src="images/favorite_icon.png" class="icons" title="Favorites"></a></div>
      <?php 
      
      if(isset($_SESSION['perdoruesi'])){
        $perdoruesi = $_SESSION['perdoruesi']['email'];
        merrFavorites();
        $numriFavorites = numberofFavorites($perdoruesi);
        if($numriFavorites > 0){
          echo "<div id='favorite-counter'>$numriFavorites</div>";
        }
      
      }
      ?>
      
     
    </div>
    <div class="text-div"><a href="favoriteproducts.php" class="link-sidebar">Favorites</a></div>
  </div>
  </a>
  

  <div class="sidebar-div">
    <div class="icon-div"><img src="images/giftcard_icon.png" class="icons" title="Giftcards"></div>
    <div class="text-div"><a href="#" class="link-sidebar">Giftcards</a></div>
  </div>

  <div class="sidebar-div">
    <div class="icon-div"><img src="images/sell_icon.png" class="icons" title="Sell"></div>
    <div class="text-div"><a href="#" class="link-sidebar">Sell</a></div>
  </div>

  <div class="sidebar-div">
    <div class="icon-div"><img src="images/faq_icon.png" class="icons" title="FAQ"></div>
    <div class="text-div"><a href="#" class="link-sidebar">FAQ</a></div>
  </div>
  
  <div class="sidebar-div">
    <div class="icon-div"><img src="images/help_icon.png" class="icons" title="Help"></div>
    <div class="text-div"><a href="#" class="link-sidebar">Help</a></div>
  </div>

  
</aside>