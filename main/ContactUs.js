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