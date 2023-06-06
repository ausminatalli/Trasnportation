let location1=document.getElementById('location1');
     let location2=document.getElementById('location2');
     let form=document.querySelector('.form1');
     let validateform=document.querySelector('#validateform');
     let validatesearch=document.getElementById('validatesearch');
     console.log(validateform);
     validatesearch.onclick=function vvv(){
      
      if(location1.value=='' || location2.value=='' ){
        validateform.style.border='3px solid red';
      }
      else{
        validateform.style.border='';
      }
     }


     new WOW().init();