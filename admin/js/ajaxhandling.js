

const dashboard = document.getElementById("dashboard");
const addtrip = document.getElementById("addtrip");
const viewtrip = document.getElementById("viewtrip");
const adddriver = document.getElementById("adddriver");
const viewdriver = document.getElementById("viewdriver");
const addbus = document.getElementById("addbus");
const viewbus = document.getElementById("viewbus");
const applications = document.getElementById("applications");
const stats = document.getElementById("stats");
const payments = document.getElementById("payments");
const addadmin = document.getElementById("addadmin");
const viewadmin = document.getElementById("viewadmin");




// Move the DataTable initialization code into a separate function
function initializeDataTable() {
  $(document).ready(function () {
    $("#myTable").DataTable();
  });
}

function DriverDelete() {
  let modal = $(".modal-container");
  let  btn = $(".btn-delete");
 
  let closeBtn = $(".btn");
  
  // EventListener
  btn.on("click", function() {
    modal.addClass("show");
  });
  
  closeBtn.each(function() {
    $(this).on("click", function() {
      modal.removeClass("show");
    });
  });
  
  $(window).on("click", function(event) {
    if (event.target == modal[0]) {
      modal.removeClass("show");
    }
  });
  
}
function BusDelete() {
  let modal = $(".modal-container");
  let  btn = $(".btn-delete2");
 
  let closeBtn = $(".btn");
  
  // EventListener
  btn.on("click", function() {
    modal.addClass("show");
  });
  
  closeBtn.each(function() {
    $(this).on("click", function() {
      modal.removeClass("show");
    });
  });
  
  $(window).on("click", function(event) {
    if (event.target == modal[0]) {
      modal.removeClass("show");
    }
  });
  
}
function TripDelete() {
  let modal = $(".modal-container");
  let  btn = $(".btn-delete1");
 
  let closeBtn = $(".btn");
  

  
  // EventListener
  btn.on("click", function() {

    modal.addClass("show");
  });
  
  closeBtn.each(function() {
    $(this).on("click", function() {
      modal.removeClass("show");
    });
  });
  
  $(window).on("click", function(event) {
    if (event.target == modal[0]) {
      modal.removeClass("show");
    }
  });
  
}
function AdminDelete() {
  let modal = $(".modal-container");
  let  btn = $(".btn-delete3");
 
  let closeBtn = $(".btn");
  
  
  // EventListener
  btn.on("click", function() {
    modal.addClass("show");
  });
  
  closeBtn.each(function() {
    $(this).on("click", function() {
      modal.removeClass("show");
    });
  });
  
  $(window).on("click", function(event) {
    if (event.target == modal[0]) {
      modal.removeClass("show");
    }
  });
  
}
function ApplicationDelete() {
  let modal = $(".modal-container");
  let  btn = $(".btn-delete4");
 
  let closeBtn = $(".btn");
  
  
  // EventListener
  btn.on("click", function() {
    modal.addClass("show");
  });
  
  closeBtn.each(function() {
    $(this).on("click", function() {
      modal.removeClass("show");
    });
  });
  
  $(window).on("click", function(event) {
    if (event.target == modal[0]) {
      modal.removeClass("show");
    }
  });
  
}
// Use a single function to load content and initialize DataTable
function loadContent(url) {
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
      initializeDataTable(); // Call the DataTable initialization function after loading content
    }
   if(url==='viewdriver.php'){
    DriverDelete();
   }
   else if(url==='viewtrip.php'){
      TripDelete();
   }
   else if(url==='viewbus.php'){
    BusDelete();
 }
 else if(url==='viewadmin.php'){
  AdminDelete();
}
else if(url==='applications.php'){
  ApplicationDelete();
}
  };
  xhr.open("GET", url, true);
  xhr.send();
}

// Use the loadContent function to load dashboard.html initially
window.onload = function() {
  loadContent("dashboard.php");
};

// Use the loadContent function for all the sidebar buttons
dashboard.addEventListener("click", function () {
  loadContent("dashboard.php");
});


addtrip.addEventListener("click", function () {
 
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
    }
  };
  xhr.open("GET", "addtrip.html", true);
  xhr.send();
});



viewtrip.addEventListener("click", function () {
  loadContent("viewtrip.php");
});

adddriver.addEventListener("click", function () {
  
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
    }
  };
  xhr.open("GET", "adddriver.html", true);
  xhr.send();
});



viewdriver.addEventListener("click", function () {
  loadContent("viewdriver.php");
});

addbus.addEventListener("click", function () {
  
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
    }
  };
  xhr.open("GET", "addbus.html", true);
  xhr.send();
});


viewbus.addEventListener("click", function () {
  loadContent("viewbus.php");
});


applications.addEventListener("click", function () {
  loadContent("applications.php");
});

stats.addEventListener("click", function () {
  
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
    }
  };
  xhr.open("GET", "stats.html", true);
  xhr.send();
});



payments.addEventListener("click", function () {
  loadContent("payments.php");
});

addadmin.addEventListener("click", function () {
  
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
    }
  };
  xhr.open("GET", "addadmin.html", true);
  xhr.send();
});



viewadmin.addEventListener("click", function () {
  loadContent("viewadmin.php");
});


