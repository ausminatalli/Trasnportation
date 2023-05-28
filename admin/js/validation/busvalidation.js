function validatebus(){

let selectstation=document.getElementById('selectstation');
let selectdriver=document.getElementById('selectdriver');
let capacity=document.getElementById('capacity');
let platenumber=document.getElementById('platenumber');
let Mechanic=document.getElementById('Mechanic');
let Insurance=document.getElementById('Insurance');
let submit=document.getElementById('submit');
let vcapacity=document.getElementById('vcapacity');
let vplate=document.getElementById('vplate');
let vmechanic=document.getElementById('vmechanic');
let vinsurance=document.getElementById('vinsurance');
let vselectstation=document.getElementById('vselectstation');
let vselectdriver=document.getElementById('vselectdriver');
vselectstation.innerHTML='';
vselectdriver.innerHTML='';
vcapacity.innerHTML='';
vplate.innerHTML='';
vmechanic.innerHTML='';
vinsurance.innerHTML='';


let isvalid=true;

if(selectstation.value === 'Start Location'){
    vselectstation.innerHTML="Please select the station";
    isvalid=false;
}
if(selectdriver.value === 'Driver Name'){
    vselectdriver.innerHTML="Please select the driver";
    isvalid=false;
}
if(capacity.value === ''){
    vcapacity.innerHTML="Please enter the capacity";
    isvalid=false;
}
if(platenumber.value === ''){
    vplate.innerHTML="Please enter the platenumber";
    isvalid=false;
}
if(Insurance.value === ''){
    vinsurance.innerHTML="Please enter the insurance number";
    isvalid=false;
}
if(Mechanic.value === ''){
    vmechanic.innerHTML="Please enter the mechanic due";
    isvalid=false;
}
if(isvalid){
    alert('the bus has been added');
}
}