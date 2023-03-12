<?php include 'header.php'?>
<div class="container-form">
<?php 

class signup extends functions{
  public $sql;
  public $row;
}
$signup = new signup();


if(isset($_POST['register'])){
  $perdoruesit = $signup->merrPerdoruesitoop();
  while($perdoruesi =  $signup->row = $perdoruesit->fetch_assoc()){
    $email = $perdoruesi['email'];
    if($_POST['email']==$email){
      $emailerror = "User already exists";
    }
    else if(strlen($_POST['email']) === 0){
      $emailerror = "Email is required";
    }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $emailerror = "Provide a valid email address";
    }else if(strlen($_POST['confirmemail']) === 0){
      $confirmemailerror = "Please confirm your email";
    }else if(!filter_var($_POST['confirmemail'], FILTER_VALIDATE_EMAIL)){
      $confirmemailerror = "Provide a valid email address";
    }else if($_POST['confirmemail'] != $_POST['email']){
      $confirmemailerror = "Emails do not match";
    }else if(strlen($_POST['password']) === 0){
      $passworderror = "Password is required";
    }else if(strlen($_POST['password']) < 8){
      $passworderror = "Password must be at least 8 characters";
    }else if(strlen($_POST['confirmpassword']) === 0){
      $confirmpassworderror = "Please confirm your password";
    }else if($_POST['confirmpassword'] != $_POST['password']){
      $passworderror = "Passwords do not match!";
    }else if(strlen($_POST['emri']) === 0){
      $nameerror = "Name is required";
    }else if(strlen($_POST['emri']) < 3){
      $nameerror = "Name must be at least 3 characters";
    }else if((preg_match('/[^a-zA-Z]/', $_POST['emri']))){
      $nameerror = "Name should contain only letters";
    }else if(strlen($_POST['mbiemri']) === 0){
      $surnameerror = "Surname is required";
    }else if(strlen($_POST['mbiemri']) < 3){
      $surnameerror = "Surname must be at least 3 characters";
    }else if((preg_match('/[^a-zA-Z]/', $_POST['mbiemri']))){
      $surnameerror = "Surname should contain only letters";
    }else if(strlen($_POST['numritelefonit']) === 0){
      $phoneerror = "Phone number is required";
    }else if(!(is_numeric($_POST['numritelefonit']))){
      $phoneerror = "Phone number should only contain numbers";
    }else if(strlen($_POST['numritelefonit']) <= 8){
      $phoneerror = "Phone should have at least 8 numbers";
    }else if(strlen($_POST['adresa']) === 0){
      $adresserror = "Address is required";
    }
    else{
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
        <input type="text" name="email" id="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'] ?>" onkeyup="validateEmail()"><br>
        <div class="error"><?php  if(!empty($emailerror)) echo $emailerror?></div>
      </div>
      <div class="input-control">
      <label for="confirmemail">Confirm Email:</label>
      <input type="text" name="confirmemail" id="confirmemail" value="<?php  if(!empty($_POST['confirmemail'])) echo $_POST['confirmemail'] ?>" onkeyup="validateConfirmEmail()"><br>
      <div class="error"><?php if(!empty($confirmemailerror)) echo $confirmemailerror ?></div>
      </div>

      <div class="input-control">
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" value="<?php if(!empty($_POST['password'])) echo $_POST['password'] ?>" onkeyup="validatePassword()"><br>
      <div class="error"><?php if(!empty($passworderror)) echo $passworderror ?></div>
      </div>

      <div class="input-control">
      <label for="confirmpassword">Confirm Password: </label>
      <input type="password" name="confirmpassword" id="confirmpassword" value="<?php if(!empty($_POST['confirmpassword'])) echo $_POST['confirmpassword'] ?>" onkeyup="validateConfirmPassword()"><br>
      <div class="error"><?php if(!empty($confirmpassworderror)) echo $confirmpassworderror ?></div>
      </div>

      <div class="input-control">
      <label for="emri">Name:</label>
      <input type="text" name="emri" id="emri" value="<?php if(!empty($_POST['emri'])) echo $_POST['emri'] ?>" onkeyup="validateName()"><br>
      <div class="error"><?php if(!empty($nameerror)) echo $nameerror ?></div>
      </div>

      <div class="input-control">
      <label for="mbiemri">Surname:</label>
      <input type="text" name="mbiemri" id="mbiemri" value="<?php if(!empty($_POST['mbiemri'])) echo $_POST['mbiemri'] ?>" onkeyup="validateSurname()"><br>
      <div class="error"><?php if(!empty($surnameerror)) echo $surnameerror ?></div>
      </div>

      <div class="input-control">
      <label for="datalindjes">Date of Birth:</label>
      <input type="date" name="datalindjes" id="datalindjes" onkeyup="validateEmail()"><br>
      <div class="error"></div>
      </div>

      <div class="input-control">
      <label for="numritelefonit">Phone Number:</label>
      <input type="text" name="numritelefonit" id="numritelefonit" value="<?php if(!empty($_POST['numritelefonit'])) echo $_POST['numritelefonit'] ?>" onkeyup="validatePhone()">
      <div class="error"><?php if(!empty($phoneerror)) echo $phoneerror ?></div>
      </div>

      <div class="input-control">
      <label for="adresa">Adresa: </label>
      <input type="text" name="adresa" id="adresa"  value="<?php if(!empty($_POST['adresa'])) echo $_POST['adresa'] ?>" onkeyup="validateAddress()">
      <div class="error"><?php if(!empty($adresserror)) echo $adresserror ?></div>
      </div>
      <div class="registercontainer">
      <button class="register" id="register" name="register" onclick="return validateInputs()">CREATE ACCOUNT</button>
      </div>
      
    </form>
   
 </div>
 <!-- <script defer src="javascript/signup.js"></script> -->
 <?php include 'footer.php'?>
