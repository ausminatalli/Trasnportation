function validateadmin(){


    let first=document.getElementById('first');
    let last=document.getElementById('last');
    let phone=document.getElementById('phone');
    let email=document.getElementById('email');
    let birth=document.getElementById('birth');
    let gender=document.getElementById('gender');
    let city=document.getElementById('city');
    let address=document.getElementById('address');
    let vfirst=document.getElementById('vfirst');
    let vlast=document.getElementById('vlast');
    let vphone=document.getElementById('vphone');
    let vemail=document.getElementById('vemail');
    let vbirth=document.getElementById('vbirth');
    let vgender=document.getElementById('gender');
    let vcity=document.getElementById('vcity');
    let vaddress=document.getElementById('vaddress');

    vfirst.innerHTML='';
    vlast.innerHTML='';
    vphone.innerHTML='';
    vemail.innerHTML='';
    vbirth.innerHTML='';
    vgender.innerHTML='';
    vcity.innerHTML='';
    vaddress.innerHTML='';
    
    
    let isvalid=true;
    
    if(first.value === ''){
        vfirst.innerHTML="Please enter the name";
        isvalid=false;
    }
    if(last.value === 'Driver Name'){
        vlast.innerHTML="Please enter the last name";
        isvalid=false;
    }
    if(phone.value === ''){
        vphone.innerHTML="Please enter the phone number";
        isvalid=false;
    }
    if (email.value === "") {
        vemail.innerHTML = "Please Enter Your Email Address";
        isvalid = false;
      } else if (!validateEmail(email.value)) {
        vemail.innerHTML = "Please Enter a Valid Email Address";
        isvalid = false;
      }
    if(birth.value === ''){
        vbirth.innerHTML="Please enter the date of birth";
        isvalid=false;
    }
    if(gender.value === 'Gender'){
        vgender.innerHTML="Please select the gender";
        isvalid=false;
    }
    if(city.value === ''){
        vcity.innerHTML="Please enter the city";
        isvalid=false;
    }
    if(address.value === ''){
        vaddress.innerHTML="Please enter the address";
        isvalid=false;
    }
    if(isvalid){
        alert('the bus has been aded');
    }

    function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
    }