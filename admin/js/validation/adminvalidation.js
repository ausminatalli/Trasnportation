

function validateadmin(){


    let fname=document.getElementById('fname');
    let last=document.getElementById('last');
    let phone=document.getElementById('phone');
    let email=document.getElementById('email');
    let birth=document.getElementById('birth');
    let Gender=document.getElementById('Gender');
    let city=document.getElementById('city');
    let address=document.getElementById('address');
    let vfirst=document.getElementById('vfirst');
    let vlast=document.getElementById('vlast');
    let vphone=document.getElementById('vphone');
    let vemail=document.getElementById('vemail');
    let vbirth=document.getElementById('vbirth');
    let vGender=document.getElementById('vGender');
    let vcity=document.getElementById('vcity');
    let vaddress=document.getElementById('vaddress');

    vfirst.innerHTML='';
    vlast.innerHTML='';
    vphone.innerHTML='';
    vemail.innerHTML='';
    vbirth.innerHTML='';
    vGender.innerHTML='';
    vcity.innerHTML='';
    vaddress.innerHTML='';
    
    
    let isvalid=true;
    
    if(fname.value === ''){
        vfirst.innerHTML="Please enter the name";
        isvalid=false;
    }
    if(last.value === ''){
        vlast.innerHTML="Please enter the last name";
        isvalid=false;
    }
    if(phone.value === ''){
        vphone.innerHTML="Please enter the phone number";
        isvalid=false;
    }
    if (email.value === "") {
        vemail.innerHTML = "Please Enter the Email Address";
        isvalid = false;
      } else if (!validateEmail(email.value)) {
        vemail.innerHTML = "Please Enter a Valid Email Address";
        isvalid = false;
      }
    if(birth.value === ''){
        vbirth.innerHTML="Please enter the date of birth";
        isvalid=false;
    }
    if(Gender.value === 'Gender'){
        vGender.innerHTML="Please select the gender";
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
        alert('the admin has been added');
    }

    function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
    }
