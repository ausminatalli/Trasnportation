 function toggleLocation(event) {
        event.preventDefault();
        const location1 = document.getElementById("location1");
        const location2 = document.getElementById("location2");
        const validateform = document.getElementById("validateform");
  
        if (location1.value === "" || location2.value === "") {
            validateform.style.border='5px solid red !important';
        }
      };
      


   
      