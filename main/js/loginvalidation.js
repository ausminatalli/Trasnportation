 // Function to validate the email format
 function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

// Function to validate the password length
function validatePassword(password) {
  return password.length >= 8;
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
    updateErrorMessage('password', 'Password must be at least 8 characters'); // Display error message
  }
}

// Function to handle form submission
function handleSubmit(event) {
  event.preventDefault(); // Prevent form submission

  // Perform additional checks or actions before submitting the form
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  if (!validateEmail(email) || !validatePassword(password)) {
    // If there are validation errors, update error messages and return
    handleEmailInput();
    handlePasswordInput();
    return;
  }

  // Form is valid, you can proceed with form submission
  console.log('Form submitted successfully!');
  // Add your code here to handle the form submission, e.g., AJAX request, page redirection, etc.
}

// Add event listeners for input events
document.getElementById('email').addEventListener('input', handleEmailInput);
document.getElementById('password').addEventListener('input', handlePasswordInput);

// Add event listener for form submission
document.getElementById('loginform').addEventListener('submit', handleSubmit);