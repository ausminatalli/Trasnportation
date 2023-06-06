     new WOW().init();
     let origin = document.getElementById('origin');
     let destination = document.getElementById('destination');
     let form = document.querySelector('.form1');
     let validateform = document.querySelector('#validateform');
     let validatesearch = document.getElementById('validatesearch');


     validatesearch.onclick=function vvv(e){
      e.preventDefault();
      if(origin.value == '' || destination.value == '' ){
        validateform.style.border='3px solid red';
      }
      else{
        validateform.style.border='';
      }
    }


     
     function toggleLocation(event){

      event.preventDefault();

      let swtich= origin.value;
      origin.value=destination.value;
      destination.value=swtich;
      }