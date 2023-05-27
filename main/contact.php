<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactstyle.css" />
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <?php
    include('header.html')
    ?>
    <div class="Contact mb-5">
      <div class="image">
        <img
          src="../img/email-support-outsourcing-service-in-australia-v3os-australia - Copy.png" />
      </div>
      <div class="con2">
        <h2>Contact us</h2>
        <form action="" class="contact-input">
          <input type="text" id="fullName" placeholder="Full Name" />
          <input type="text" id="email" placeholder="Email" />
          <input type="text" id="phoneNumber" placeholder="phone" />
          <textarea
            name=""
            placeholder="message..."
            id="message"
            cols="30"
            rows="10"></textarea>
          <button>Submit</button>
        </form>
      </div>
    </div>
    <script>
      const form = document.querySelector('form');
const fullName = document.querySelector('#fullName');
const email = document.querySelector('#email');
const phoneNumber = document.querySelector('#phoneNumber');
const message = document.querySelector('#message');

const errorMessage = document.createElement('span');
errorMessage.classList.add('error-message');
errorMessage.style.color ='red';
errorMessage.style.fontSize = '13px';

function validationForm(event) {
    event.preventDefault();
  
    const existingErrorMessages = form.querySelectorAll('.error-message');
    existingErrorMessages.forEach((errorMsg) => {
      errorMsg.remove();
    });
  
    let isValid = true;
  
    if (fullName.value === '') {
      isValid = false;
      const error = errorMessage.cloneNode(true);
      error.textContent = '* Please enter your name.';
      fullName.parentNode.insertBefore(error, fullName);
    } else if (fullName.value.length < 3 || /\d|\W/.test(fullName.value)) {
      isValid = false;
      const error = errorMessage.cloneNode(true);
      error.textContent = '* Please enter a valid name.';
      fullName.parentNode.insertBefore(error, fullName);
    }
  
    if (email.value === '') {
      isValid = false;
      const error = errorMessage.cloneNode(true);
      error.textContent = '* Please enter your email address.';
      email.parentNode.insertBefore(error, email);
    } else if (!/\S+@\S+\.\S+/.test(email.value)) {
      isValid = false;
      const error = errorMessage.cloneNode(true);
      error.textContent = '* Please enter a valid email address.';
      email.parentNode.insertBefore(error, email);
    }
  
    if (phoneNumber.value === '') {
      isValid = false;
      const error = errorMessage.cloneNode(true);
      error.textContent = '* Please enter your phone number.';
      phoneNumber.parentNode.insertBefore(error, phoneNumber);
    } else if (isNaN(phoneNumber.value)) {
      isValid = false;
      const error = errorMessage.cloneNode(true);
      error.textContent = '* Please enter a valid phone number.';
      phoneNumber.parentNode.insertBefore(error, phoneNumber);
    }
  
    if (message.value === '') {
      isValid = false;
      const error = errorMessage.cloneNode(true);
      error.textContent = '* Please enter a message.';
      message.parentNode.insertBefore(error, message);
    }
  
    if (isValid) {
      form.submit();
    }
  }
  form.addEventListener('submit',validationForm);  
    </script>
    <?php
    include('footer.html')
    ?>
  </body>
</html>
