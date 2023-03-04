<?php include 'header.php'?>
<div class="container-form">
<?php 


if(isset($_POST['register'])){
  $perdoruesit = merrPerdoruesit();
  while($perdoruesi = mysqli_fetch_assoc($perdoruesit)){
    $email = $perdoruesi['email'];
    if($_POST['email']==$email){
      echo "<p id='signuperror' style='color:red;font-size:30px'>USERI vecse ekziston</p>";
      break;
    }else{
      shtoPerdorues($_POST['email'],$_POST['password'],$_POST['emri'],$_POST['mbiemri'],$_POST['datalindjes'],
      $_POST['numritelefonit'],$_POST['adresa'],);
      login($_POST['email'],$_POST['password']);
      header("Location: index.php");
    }
   
  }

  
  }
  
  
  

?>    

<h1>REGISTER</h1>
    <form id="users" method="post">
      <div class="input-control">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" onkeyup="validateEmail()"><br>
        <div class="error"></div>
      </div>
      <div class="input-control">
      <label for="confirmemail">Confirm Email:</label>
      <input type="text" name="confirmemail" id="confirmemail" onkeyup="validateConfirmEmail()"><br>
      <div class="error"></div>
      </div>

      <div class="input-control">
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" onkeyup="validatePassword()"><br>
      <div class="error"></div>
      </div>

      <div class="input-control">
      <label for="confirmpassword">Confirm Password: </label>
      <input type="password" name="confirmpassword" id="confirmpassword" onkeyup="validateConfirmPassword()"><br>
      <div class="error"></div>
      </div>

      <div class="input-control">
      <label for="emri">Name:</label>
      <input type="text" name="emri" id="emri" onkeyup="validateName()"><br>
      <div class="error"></div>
      </div>

      <div class="input-control">
      <label for="mbiemri">Surname:</label>
      <input type="text" name="mbiemri" id="mbiemri" onkeyup="validateSurname()"><br>
      <div class="error"></div>
      </div>

      <div class="input-control">
      <label for="datalindjes">Date of Birth:</label>
      <input type="date" name="datalindjes" id="datalindjes" onkeyup="validateEmail()"><br>
      <div class="error"></div>
      </div>

      <div class="input-control">
      <label for="numritelefonit">Phone Number:</label>
      <input type="text" name="numritelefonit" id="numritelefonit" onkeyup="validatePhone()">
      <div class="error"></div>
      </div>

      <div class="input-control">
      <label for="adresa">Adresa: </label>
      <input type="text" name="adresa" id="adresa" onkeyup="validateAddress()">
      <div class="error"></div>
      </div>
      <button class="register" id="register" name="register" onclick="return validateInputs()">CREATE ACCOUNT</button>
    </form>
   
 </div>
 <script defer src="signup.js"></script>
 <?php include 'footer.php'?>
