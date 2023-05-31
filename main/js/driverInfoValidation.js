function validation(event){
    event.preventDefault();

    let city =document.getElementById("city");
    let address =document.getElementById("address");
    let number =document.getElementById("number");
    let date =document.getElementById("date");
    let lnum =document.getElementById("lnum");
    let ledate =document.getElementById("ledate");
    let file =document.getElementById("file");
    let info =document.getElementById("info");


    let vcity =document.getElementById("vcity");
    let vaddress =document.getElementById("vaddress");
    let vnumber =document.getElementById("vnumber");
    let vdate =document.getElementById("vdate");
    let vlnum =document.getElementById("vlnum");
    let vledate =document.getElementById("vledate");
    let vfile =document.getElementById("vfile");
    let vinfo =document.getElementById("vinfo");


    vcity.innerHTML="";
    vaddress.innerHTML="";
    vnumber.innerHTML="";
    vdate.innerHTML="";
    vlnum.innerHTML="";
    vledate.innerHTML="";
    vfile.innerHTML="";
    vinfo.innerHTML="";

    let isValid=true;

    if(city.value === ""){
        vcity.innerHTML="Enter Your City";
        isValid=false;
    }
    if(address.value === ""){
        vaddress.innerHTML="Enter Your Address";
        isValid=false;
    }
    if(number.value === ""){
        vnumber.innerHTML="Enter Your Phone Number";
        isValid=false;
    }
    if (date.value=== "" ){
        vdate.innerHTML ="Enter Your Birthday Date"
        isValid=false;

    }
    if(lnum.value === ""){
        vlnum.innerHTML="Enter Your License Number";
        isValid=false;

    }
    if(ledate.value === ""){
        vledate.innerHTML="Enter Your License Expiry Date";
        isValid=false;
    }
    if(file.value === ""){
        vfile.innerHTML="Enter Your License file";
        isValid=false;
    }
    if(info.value === ""){
        vinfo.innerHTML="Please Describe YourSelf !";
        isValid=false;
    }
    if (isValid) {
        alert("Thank You to register");
        window.location.href=("../../driver/driver.html")
        
    }
}