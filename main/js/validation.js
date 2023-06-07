
/* ---- user register validation -----*/
function UserRegValid(event) {
    event.preventDefault();
    let name = document.getElementById("name");
    let lastName = document.getElementById("lastName");
    let number = document.getElementById("number");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let cpassword = document.getElementById("cpassword");
    let vname = document.getElementById("vname");
    let vlastName = document.getElementById("vlastName");
    let vnumber = document.getElementById("vnumber");
    let vemail = document.getElementById("vemail");
    let vpassword = document.getElementById("vpassword");
    let vcpassword = document.getElementById("vcpassword");
  
    vname.innerHTML = "";
    vlastName.innerHTML = "";
    vnumber.innerHTML = "";
    vemail.innerHTML = "";
    vpassword.innerHTML = "";
    vcpassword.innerHTML = "";
  
    let isValid = true;
  
    if (name.value === '') {
      vname.innerHTML="Please Enter Your First Name";
      isValid=false;
  }else if (name.value.length < 3 || /\d|\W/.test(name.value)){
    vname.innerHTML="Please Enter a Valid Name";
    isValid=false;
  }
  if (lastName.value === '') {
    vlastName.innerHTML="Please Enter Your Last Name";
    isValid=false;
}else if (lastName.value.length < 3 || /\d|\W/.test(lastName.value)){
  vlastName.innerHTML="Please Enter a Valid Name";
  isValid=false;
}
    if (number.value === "") {
      vnumber.innerHTML = "Please Enter Your Phone Number";
      isValid = false;
    }
    if (email.value === "") {
      vemail.innerHTML = "Please Enter Your Email Address";
      isValid = false;
    } else if (!validateEmail(email.value)) {
      vemail.innerHTML = "Please Enter a Valid Email Address";
      isValid = false;
    }
    if (password.value === "") {
      vpassword.innerHTML = "Please Enter a Password";
      isValid = false;
    } else if (!validatePassword(password.value)) {
      vpassword.innerHTML = "Password should be at least 8 characters long and contain at least one digit, one lowercase letter, and one uppercase letter";
      isValid = false;
    }
    if (cpassword.value === "") {
      vcpassword.innerHTML = "Please Confirm Your Password";
      isValid = false;
    } else if (cpassword.value !== password.value) {
      vcpassword.innerHTML = "Password does not match";
      isValid = false;
    }
  
    if (isValid) {
      alert("Registration successful");
      window.location.href=("../login.html");
    }
  }
  
  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
  function validatePassword(password) {
    // Password validation criteria
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return passwordRegex.test(password);
  }

  function showpassword (event){
    event.preventDefault();

    let showpass = document.getElementsByClassName('fa-eye');
    let password = document.getElementById("password");
    let icon = document.querySelector("i");
    let cpassword = document.getElementById("cpassword");

    if (password.type==="password"){
        password.type='text';
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
    else {
        password.type='password';
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }


  }
  function showcpassword (event){
    event.preventDefault();

    let icon2 = document.querySelector(".confirmpass");
    let cpassword = document.getElementById("cpassword");

    if (cpassword.type==="password"){
        cpassword.type='text';
        icon2.classList.remove("fa-eye");
        icon2.classList.add("fa-eye-slash");
    }
    else {
        cpassword.type='password';
        icon2.classList.remove("fa-eye-slash");
        icon2.classList.add("fa-eye");
    }


  }

  /* ---- end of user register validation -----*/


/* ---- login/forgetpassword validation -----*/
  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
  
  // Function to validate the password length
  function validatePassword(password) {
    // Password validation criteria
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return passwordRegex.test(password);
  }
  
  // Function to update the error message for a field
  function updateErrorMessage(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.getElementById(`${fieldId}-error`);
  
    if (message) {
      field.classList.add('error-field'); // Add error style to field
      errorDiv.textContent = message;
    } else {
      field.classList.remove('error-field'); // Remove error style from field
      errorDiv.textContent = '';
    }
  }
  
  // Function to handle input events for email field
  function handleEmailInput() {
    const emailInput = document.getElementById('email');
    const email = emailInput.value;
  
    if (validateEmail(email)) {
      updateErrorMessage('email', ''); // Clear error message
    } else {
      updateErrorMessage('email', 'Invalid email address'); // Display error message
    }
  }
  
  // Function to handle input events for password field
  function handlePasswordInput() {
    const passwordInput = document.getElementById('password');
    const password = passwordInput.value;
  
    if (validatePassword(password)) {
      updateErrorMessage('password', ''); // Clear error message
    } else {
      updateErrorMessage('password', 'Password should be at least 8 characters contain at least one digit, one lowercase letter, and one uppercase letter'); // Display error message
    }
  }
  
  // Function to handle form submission
  function handleSubmit(page) {
     // Prevent form submission
  
    // Perform additional checks or actions before submitting the form
    const email = document.getElementById('email').value;

    if(page == 'login'){
    const password = document.getElementById('password').value;
  
    if (!validateEmail(email) || !validatePassword(password)) {
      // If there are validation errors, update error messages and return
      handleEmailInput();
      handlePasswordInput();
      return false;
    }
}
else
{
    if (!validateEmail(email)) {
        // If there are validation errors, update error messages and return
        handleEmailInput();
        return true;
      }
}
    // Add your code here to handle the form submission, e.g., AJAX request, page redirection, etc.
  }
  
  /* ---- end login/forget validation -----*/

  /* ---- driver validation -----*/


  function drivervalidation(event) {
    event.preventDefault();
  
    let name = document.getElementById("name");
    let lastName = document.getElementById("lastName");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let cpassword = document.getElementById("cpassword");
    let vname = document.getElementById("vname");
    let vlastName = document.getElementById("vlastName");
    let vemail = document.getElementById("vemail");
    let vpassword = document.getElementById("vpassword");
    let vcpassword = document.getElementById("vcpassword");
  
    vname.innerHTML = "";
    vlastName.innerHTML = "";
    vemail.innerHTML = "";
    vpassword.innerHTML = "";
    vcpassword.innerHTML = "";
  
    let isValid = true;
  
    if (name.value === '') {
      vname.innerHTML="Please Enter Your First Name";
      isValid=false;
  }else if (name.value.length < 3 || /\d|\W/.test(name.value)){
    vname.innerHTML="Please Enter a Valid Name";
    isValid=false;
  }
  if (lastName.value === '') {
    vlastName.innerHTML="Please Enter Your Last Name";
    isValid=false;
}else if (lastName.value.length < 3 || /\d|\W/.test(lastName.value)){
  vlastName.innerHTML="Please Enter  a Valid Name";
  isValid=false;
}
   
    if (email.value === "") {
      vemail.innerHTML = "Please Enter Your Email Address";
      isValid = false;
    } else if (!validateEmail(email.value)) {
      vemail.innerHTML = "Please Enter a Valid Email Address";
      isValid = false;
    }
    if (password.value === "") {
      vpassword.innerHTML = "Please Enter a Password";
      isValid = false;
    } else if (!validatePassword(password.value)) {
      vpassword.innerHTML = "Password should be at least 8 characters long and contain at least one digit, one lowercase letter, and one uppercase letter";
      isValid = false;
    }
    if (cpassword.value === "") {
      vcpassword.innerHTML = "Please Confirm Your Password";
      isValid = false;
    } else if (cpassword.value !== password.value) {
      vcpassword.innerHTML = "Password does not match";
      isValid = false;
    }
  
    if (isValid) {
      alert("successful");
      window.location.href=('driverinfo.html');
    }
  }

  /* ---- end driver validation -----*/

/* ----  driverInfo validation -----*/
  function driverInfovalidation(event){
    event.preventDefault();

    let city =document.getElementById("city");
    let address =document.getElementById("address");
    let number =document.getElementById("number");
    let date =document.getElementById("date");
    let lnum =document.getElementById("lnum");
    let ledate =document.getElementById("ledate");
    let file =document.getElementById("file");
    let info =document.getElementById("info");


    let vcity =document.getElementById("vcity");
    let vaddress =document.getElementById("vaddress");
    let vnumber =document.getElementById("vnumber");
    let vdate =document.getElementById("vdate");
    let vlnum =document.getElementById("vlnum");
    let vledate =document.getElementById("vledate");
    let vfile =document.getElementById("vfile");
    let vinfo =document.getElementById("vinfo");


    vcity.innerHTML="";
    vaddress.innerHTML="";
    vnumber.innerHTML="";
    vdate.innerHTML="";
    vlnum.innerHTML="";
    vledate.innerHTML="";
    vfile.innerHTML="";
    vinfo.innerHTML="";

    let isValid=true;

    if(city.value === ""){
        vcity.innerHTML="Enter Your City";
        isValid=false;
    }
    if(address.value === ""){
        vaddress.innerHTML="Enter Your Address";
        isValid=false;
    }
    if(number.value === ""){
        vnumber.innerHTML="Enter Your Phone Number";
        isValid=false;
    }
    if (date.value=== "" ){
        vdate.innerHTML ="Enter Your Birthday Date"
        isValid=false;

    }
    if(lnum.value === ""){
        vlnum.innerHTML="Enter Your License Number";
        isValid=false;

    }
    if(ledate.value === ""){
        vledate.innerHTML="Enter Your License Expiry Date";
        isValid=false;
    }
    if(file.value === ""){
        vfile.innerHTML="Enter Your License file";
        isValid=false;
    }
    if(info.value === ""){
        vinfo.innerHTML="Please Describe YourSelf !";
        isValid=false;
    }
    if (isValid) {
        alert("Thank You to register");
        window.location.href=("../../driver/driver.html")
        
    }
}

/* ---- end driverInfo validation -----*/


/* ----  userSearch validation -----*/
function userSearchValidation(e){
    let origin=document.getElementById('origin');
    let destination=document.getElementById('destination');
    let validateform=document.querySelector('#validateform');
     e.preventDefault();
     if(origin.value=='' || destination.value=='' ){
       validateform.style.border='3px solid red';
     }
     else{
       validateform.style.border='';
     }
    
   }
   /* ---- end userSearch validation -----*/