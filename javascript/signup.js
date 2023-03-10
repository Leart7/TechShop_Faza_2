const form = document.getElementById("users");
const email = document.getElementById("email");
const email2 = document.getElementById("confirmemail");
const password = document.getElementById("password");
const password2 = document.getElementById("confirmpassword");
const name = document.getElementById("emri");
const surname = document.getElementById("mbiemri");
const phone = document.getElementById("numritelefonit");
const address = document.getElementById("adresa");
const email1 = document.getElementById("email1");
const password1 = document.getElementById("password1");

const setError = (element,message) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");

  errorDisplay.innerText = message;
  inputControl.classList.add("error");
  inputControl.classList.remove("success");
};

const setSuccess = element => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");

  errorDisplay.innerText = "";
  inputControl.classList.add("success");
  inputControl.classList.remove("error");
};

const isValidEmail = email => {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

  // let emailValue =email.value.trim();
  // let email2Value = email2.value.trim();
  // let passwordValue = password.value.trim();
  // let password2Value = password2.value.trim();
  // let nameValue = name.value.trim();
  // let surnameValue = surname.value.trim();
  // let phoneValue = phone.value.trim();
  // let addressValue = address.value.trim();


function validateEmail(){
  let emailValue = document.getElementById("email").value;
  if(emailValue.trim() === ""){
    setError(email, "Email is required");
    return false;
  }else if(!isValidEmail(emailValue)){
    setError(email, "Provide a valid email address");
    return false;
  }else{
    setSuccess(email);
    return true;
  }
}

function validateConfirmEmail(){
  let email2Value = document.getElementById("confirmemail").value;
  if(email2Value.trim() === ""){
    setError(email2, "Please confirm your email");
    return false;
  }else if(email2Value !== document.getElementById("email").value){
    setError(email2, "Emails do not match");
    return false;
  }else{
    setSuccess(email2);
    return true;
  }
}

function validatePassword(){
  let passwordValue = document.getElementById("password").value;
  if(passwordValue.trim() === ""){
    setError(password, "Password is required");
    return false;
  }else if(passwordValue.length < 8){
    setError(password, "Password must be at least 8 characters");
    return false;
  }else{
    setSuccess(password);
    return true;
  }
}

function validateConfirmPassword(){
  let password2Value = document.getElementById("confirmpassword").value;
  if(password2Value.trim() === ""){
    setError(password2, "Please confirm your password");
    return false;
  }else if(password2Value !== document.getElementById("password").value){
    setError(password2, "Passwords do not match");
    return false;
  }else{
    setSuccess(password2);
    return true;
  }
}

function validateName(){
  let nameValue = document.getElementById("emri").value;
  if(nameValue.trim()  === ""){
    setError(name, "Name is required");
    return false;
  }else if(nameValue.length < 3){
    setError(name, "Name must be at least 3 characters");
    return false;
  }else if(!nameValue.match(/^[A-Za-z]+$/)){
    setError(name, "Name should contain only letters");
    return false;
  }
  else{
    setSuccess(name);
    return true;
  }
}

function validateSurname(){
  let surnameValue = document.getElementById("mbiemri").value;
  if(surnameValue.trim()  === ""){
    setError(surname, "Surname is required");
    return false;
  }else if(surnameValue.length < 3){
    setError(surname, "Surname must be at least 3 characters");
    return false;
  }else if(!surnameValue.match(/^[A-Za-z]+$/)){
    setError(surname, "Surname should contain only letters");
    return false;
  }
  else{
    setSuccess(surname);
    return true;
  }
}

function validatePhone(){
  let phoneValue = document.getElementById("numritelefonit").value;
  if(phoneValue.trim() === ""){
    setError(phone, "Phone number is required");
    return false;
  }else if(!phoneValue.match(/^[0-9]+$/)){
    setError(phone, "Phone should only contain numbers");
    return false;
  }
  else if(phoneValue.length <= 8){
    setError(phone, "Phone should have at least 9 numbers");
    return false;
  }
  else{
    setSuccess(phone);
    return true;
  }
}

function validateAddress(){
  let addressValue = document.getElementById("adresa").value;
  if(addressValue.trim()  === ""){
    setError(address, "Address is required");
    return false;
  }else{
    setSuccess(address);
    return true;
  }
}

function validateInputs (){
  if(!validateEmail() || !validateConfirmEmail() || !validatePassword() || !validateConfirmPassword() || !validateName() || !validateSurname() || !validatePhone() || !validateAddress() ){
    return false;
  }else{
    return true;
  }
}

function validateEmail1(){
  let email1Value = document.getElementById("email1").value;
  if(email1Value.trim() === ""){
    setError(email1, "Email is required");
    return false;
  }else if(!isValidEmail(email1Value)){
    setError(email1, "Provide a valid email address");
    return false;
  }else{
    setSuccess(email1);
    return true;
  }
}

function validatePassword1(){
  let password1Value = document.getElementById("password1").value;
  if(password1Value.trim() === ""){
    setError(password1, "Password is required");
    return false;
  }else if(password1Value.length < 8){
    setError(password1, "Password must be at least 8 characters");
    return false;
  }else{
    setSuccess(password1);
    return true;
  }
}

function validateInputs1 (){
  if(!validateEmail1() || !validatePassword1()){
    return false;
  }else{
    return true;
  }
}