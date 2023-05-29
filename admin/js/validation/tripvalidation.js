const form = document.querySelector('form');
const startLocation = document.querySelector('#startLocation');
const destinationLocation = document.querySelector('#destinationLocation');
const date = document.querySelector('#date');
const time = document.querySelector('#time');
const busNumber = document.querySelector('#busNumber');
const driverName = document.querySelector('#driverName');

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


function removeErrorMessage(input){

  input.style.border ='1px solid initial';

  const errorMessage = input.parentNode.querySelector('.error-message');
  if(errorMessage){
    errorMessage.remove();
  }
}

function validationForm(event){
  event.preventDefault();
  
  let isValid = true;

  if(startLocation.value === 'Start Location'){
    showErrorMessage(startLocation,'Please select the origin location')
    isValid = false;
  } else{
    removeErrorMessage(startLocation);
  }
  if (destinationLocation.value === 'Select Location') {
   showErrorMessage(destinationLocation, 'Please select the destination location');
    isValid = false;
   } else if (startLocation.value === destinationLocation.value) {
    showErrorMessage(destinationLocation, 'Please enter a valid location');
    isValid = false;
     } else {
          removeErrorMessage(destinationLocation);
    }
  if(date.value === ''){
    showErrorMessage(date,'Please enter the date')
    isValid = false;
  }else{
    removeErrorMessage(date);
  }
  if(time.value === ''){
    showErrorMessage(time,'Please enter the time')
    isValid = false;
  }else{
    removeErrorMessage(time);
  }

  if(busNumber.value === 'Bus Number'){
    showErrorMessage(busNumber,'Please select the bus')
    isValid = false;
  }else{
    removeErrorMessage(busNumber);
  }
                          
  if(driverName.value === 'Driver Name'){
    showErrorMessage(driverName,'Please select the driver')
    isValid = false;
  }else{
    removeErrorMessage(driverName);
  }

  if(isValid){
    form.submit();
  }
}

form.addEventListener('submit', validationForm);
