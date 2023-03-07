<footer>


<link rel="stylesheet" href="index.css"> 

  <div class="middle-footer">
    <h3 id="contact"><a href="help_contact.php" id="contactlink">Contact:</a> </h3>
    <ul id="footer-list">
    <li><a href="mailto:leartshabani77@gmail.com">leartshabani77@gmail.com</a></li>
    <li><a href="mailto:techshop@gmail.com">techshop@gmail.com</a></li>
    <li><a href="tel:+045359900">045 359 900</a></li>
    
  </ul>
  </div>

  <div class="middle-footer2">
    <h3 id="follow">Follow us</h3>
    <ul id="footer-list">
      <li><a href="#"><img src="images/fb_ico.png" class="social-media"></a></li>
      <li><a href="#"><img src="images/insta_ico.png" class="social-media"></a></li>
      <li><a href="#"><img src="images/twitter_ico.png" class="social-media"></li>
    </ul>
  </div>
  
  </div>
  <div class="middle-footer3">
    <div><a href="#" class="footer-links">About us</a></div>
    <div><a href="#" class="footer-links">Terms and Agreements</a></div>
    <div><a href="#" class="footer-links">Location</a></div>
  </div>
  <?php 
if(isset($_POST['login'])){
  login($_POST['email1'],$_POST['password1']);
}
?>
<?php 
if(!isset($_SESSION['perdoruesi'])){
  echo "<div class='right-footer' id='rightfooter'>";
  echo "<form id='login' name='login' method='post' class='box' >";
  echo "<div class='input-control2'>";
  echo "<label>Email: </label><br>";
  echo "<input type='text' id='email1' name='email1' onkeyup='validateEmail1()'><br>";
  echo " <div class='error'></div>";
  echo "</div>";
  echo "<div class='input-control2'>";
  echo "<label>Password:</label><br>";
  echo "<input type='password' id='password1' name='password1' onkeyup='validatePassword1()'>";
  echo " <div class='error' id='errori'></div>";
  echo " </div>";
  echo " <input type='submit' value='Log in' name='login' onclick='return validateInputs1()'>";
  echo " <a href='signup.php'>Sign up</a>";
}
?>
  
    </form>

    
  </div>
</footer>
<!--============ End of Footer ======-->
<script defer src="login.js"></script> 
<script src="index.js"></script>

  </body>
</html>