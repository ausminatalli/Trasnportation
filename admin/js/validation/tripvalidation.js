function validateTrip() {
  let startLocation = document.getElementById('startLocation');
  let destinationLocation = document.getElementById('destinationLocation');
  let date = document.getElementById('date');
  let time = document.getElementById('time');
  let busNumber = document.getElementById('busNumber');
  let driverName = document.getElementById('driverName');
  let submit = document.getElementById('submit');
  let vStartLocation = document.getElementById('vStartLocation');
  let vDestinationLocation = document.getElementById('vDestinationLocation');
  let vDate = document.getElementById('vDate');
  let vTime = document.getElementById('vTime');
  let vBusNumber = document.getElementById('vBusNumber');
  let vDriverName = document.getElementById('vDriverName');
  vStartLocation.innerHTML = '';
  vDestinationLocation.innerHTML = '';
  vDate.innerHTML = '';
  vTime.innerHTML = '';
  vBusNumber.innerHTML = '';
  vDriverName.innerHTML = '';

  let isValid = true;

  if (startLocation.value === 'Start Location') {
    vStartLocation.innerHTML = 'Please select the origin location.*';
    isValid = false;
  }

  if (destinationLocation.value === 'Select Location') {
    vDestinationLocation.innerHTML = 'Please select the destination location.*';
    isValid = false;
  } else if (startLocation.value === destinationLocation.value) {
    vDestinationLocation.innerHTML = 'Please select a valid location.*';
    isValid = false;
  }

  if (date.value === '') {
    vDate.innerHTML = 'Please enter the date.*';
    isValid = false;
  }

  if (time.value === '') {
    vTime.innerHTML = 'Please enter the time.*';
    isValid = false;
  }

  if (busNumber.value === 'Bus Number') {
    vBusNumber.innerHTML = 'Please select the bus number.*';
    isValid = false;
  }

  if (driverName.value === 'Driver Name') {
    vDriverName.innerHTML = 'Please select the driver name.*';
    isValid = false;
  }

  if (isValid) {
    alert('The trip has been added.');
  }
}
