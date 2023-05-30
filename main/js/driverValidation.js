function validation(event) {
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

    let password = document.getElementById("password");
    let icon = document.querySelector("i");

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
  