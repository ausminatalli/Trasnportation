console.log('driver script Loaded');
const form = document.querySelector('form');
const firstName = document.querySelector('#firstName');
const lastName = document.querySelector('#lastName');
const phoneNumber = document.querySelector('#phoneNumber');
const email = document.querySelector('#email');
const licenseNumber = document.querySelector('#licenseNumber');
const licenseDate = document.querySelector('#licenseDate');

function showErrorMessage(input, message) {
  const parentContainer = input.parentNode;
  parentContainer.style.position = 'relative';

  input.style.border = '1px solid red';

  const errorMessage = parentContainer.querySelector('.error-message');

  if (errorMessage) {
    errorMessage.textContent = `${message} *`;
  } else {
    const newErrorMessage = document.createElement('span');
    newErrorMessage.className = 'error-message';
    newErrorMessage.style.color = 'red';
    newErrorMessage.style.fontSize = '12px';
    newErrorMessage.textContent = `${message} *`;

    parentContainer.appendChild(newErrorMessage);
  }
}

function removeErrorMessage(input) {
  input.style.border = '1px solid initial';

  const errorMessage = input.parentNode.querySelector('.error-message');
  if (errorMessage) {
    errorMessage.remove();
  }
}

function validationForm(event) {
  event.preventDefault();

  let isValid = true;

  removeErrorMessage(firstName);
  removeErrorMessage(lastName);
  removeErrorMessage(email);
  removeErrorMessage(phoneNumber);
  removeErrorMessage(licenseNumber);
  removeErrorMessage(licenseDate);

  if (firstName.value === '') {
    isValid = false;
    showErrorMessage(firstName, 'Please enter your first name.');
  } else if (firstName.value.length < 3 || /\d|\W/.test(firstName.value)) {
    isValid = false;
    showErrorMessage(firstName, 'Please enter a valid name.');
  }

  if (lastName.value === '') {
    isValid = false;
    showErrorMessage(lastName, 'Please enter your last name.');
  } else if (lastName.value.length < 3 || /\d|\W/.test(lastName.value)) {
    isValid = false;
    showErrorMessage(lastName, 'Please enter a valid name.');
  }

  if (email.value === '') {
    isValid = false;
    showErrorMessage(email, 'Please enter your email address.');
  } else if (!/\S+@\S+\.\S+/.test(email.value)) {
    isValid = false;
    showErrorMessage(email, 'Please enter a valid email address.');
  }

  if (phoneNumber.value === '') {
    isValid = false;
    showErrorMessage(phoneNumber, 'Please enter your phone number.');
  } else if (isNaN(phoneNumber.value)) {
    isValid = false;
    showErrorMessage(phoneNumber, 'Please enter a valid phone number.');
  }

  if (licenseNumber.value === '') {
    isValid = false;
    showErrorMessage(licenseNumber, 'Please enter your license number.');
  }

  if (licenseDate.value === '') {
    isValid = false;
    showErrorMessage(licenseDate, 'Please enter the license date.');
  }

  if (isValid) {
    form.submit();
  }
}

form.addEventListener('submit', validationForm);
