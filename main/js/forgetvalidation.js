function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
  function updateErrorMessage(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.getElementById(`${fieldId}-error`);
    errorDiv.style.color='red'
    if (message) {
        field.classList.add('error-field'); // Add error style to field
        errorDiv.textContent = message;
      } else {
        field.classList.remove('error-field'); // Remove error style from field
        errorDiv.textContent = '';
      }
  }  

  function handleEmailInput() {
    const emailInput = document.getElementById('email');
    const email = emailInput.value;
  
    if (validateEmail(email)) {
      updateErrorMessage('email', ''); // Clear error message
    } else {
      updateErrorMessage('email', 'Invalid email address'); // Display error message
    }
  }
  function handleSubmit(event) {
    event.preventDefault(); // Prevent form submission
  
    // Perform additional checks or actions before submitting the form
    const email = document.getElementById('email').value;
   
  
    if (!validateEmail(email)) {
      // If there are validation errors, update error messages and return
      handleEmailInput();
     
      return;
    }
}

document.getElementById('email').addEventListener('input', handleEmailInput);

document.getElementById('forgetform').addEventListener('submit', handleSubmit);