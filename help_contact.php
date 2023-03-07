<?php include 'header.php'?>

  <link rel="stylesheet" href="contact.css">


  <div class="grid-contact">
    <div class="threeboxes">
      <div class="iconcontainer">
        <img src="images/email.png" alt=""  id="firsticon">
      </div>
      <h2>EMAIL</h2>
      <h3>techshop@gmail.com</h3>
    </div>

    <div class="threeboxes">
    <div class="iconcontainer">
        <img src="images/phone.png" alt="" id="secondicon">
      </div>
      <h2>PHONE NUMBER</h2>
      <h3>+383(45)359900</h3>
    </div>

    <div class="threeboxes">
    <div class="iconcontainer">
        <img src="images/location.png" alt=""  id="thirdicon">
      </div>
      <h2>LOCATION</h2>
      <h3>Prishtine</h3>
    </div>
  </div>
  <div class="contact-container">
    <h1>Contact Us</h1>
    <form id="contact-form" name="login" class="box" >
      
       
        <input type="text" id="name" name="name" placeholder="Enter your name" ><br>
       
        <input type="email" id="email" name="email" placeholder="Enter a valid email address"><br>
        <textarea name="txtarea" id="txtarea" cols="" rows=""></textarea><br>
      
        <input type="submit" value="Submit" name="login">
  
      </form>
  </div>
  <?php include 'footer.php'?>
