function validateDriver(){

  let firstName=document.getElementById('firstName');
  let lastName=document.getElementById('lastName');
  let phoneNumber=document.getElementById('phoneNumber');
  let email=document.getElementById('email');
  let licenseNumber=document.getElementById('licenseNumber');
  let licenseDate=document.getElementById('licenseDate');
  let submit = document.getElementById('submit');
  let vFirstName=document.getElementById('vFirstName');
  let vLastName=document.getElementById('vLastName');
  let vPhoneNumber=document.getElementById('vPhoneNumber');
  let vEmail=document.getElementById('vEmail');
  let vLicenseNumber=document.getElementById('vLicenseNumber');
  let vLicenseDate=document.getElementById('vLicenseDate');
  vFirstName.innerHTML='';
  vLastName.innerHTML='';
  vPhoneNumber.innerHTML='';
  vEmail.innerHTML='';
  vLicenseNumber.innerHTML='';
  vLicenseDate.innerHTML='';
  
  
  let isvalid=true;
  
  if (firstName.value === '') {
      vFirstName.innerHTML="Please enter your first name.*";
      isvalid=false;
  }else if (firstName.value.length < 3 || /\d|\W/.test(firstName.value)){
    vFirstName.innerHTML="Please enter a valid name.*";
    isvalid=false;
  }
  if (lastName.value === '') {
    vLastName.innerHTML="Please enter your last name.*";
    isvalid=false;
}else if (lastName.value.length < 3 || /\d|\W/.test(lastName.value)){
  vLastName.innerHTML="Please enter a valid name.*";
  isvalid=false;
}
if (phoneNumber.value === '') {
  vPhoneNumber.innerHTML="Please enter your phone number.*";
  isvalid = false;
} else if (isNaN(phoneNumber.value)) {
  vPhoneNumber.innerHTML="Please enter a valid phone number.*";
  isvalid = false;
}

if (email.value === '') {
  vEmail.innerHTML="Please enter your email address.*";
  isvalid = false;
} else if (!/\S+@\S+\.\S+/.test(email.value)) {
  vEmail.innerHTML="Please enter a valid email address.*";
  isvalid = false;
}
  if(licenseNumber.value === ''){
      vLicenseNumber.innerHTML="Please enter the license number.*";
      isvalid=false;
  }
  if(licenseDate.value === ''){
      vLicenseDate.innerHTML="Please enter the license date.*";
      isvalid=false;
  }
  if(isvalid){
      alert('the driver has been added');
  }
  }