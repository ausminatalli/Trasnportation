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


function loadScript(url) {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = url;
  document.head.appendChild(script);
}
// Use a single function to load content and initialize DataTable
window.onload = function () {
  // Check if the last visited URL is stored in localStorage
  const lastVisitedUrl = localStorage.getItem('lastVisitedUrl');
  if (lastVisitedUrl) {
    loadContent(lastVisitedUrl);
  } else {
    loadContent('dashboard.php');
  }
};

// Use the loadContent function for all the sidebar buttons
dashboard.addEventListener('click', function () {
  loadContent('dashboard.php');
});

// Update the loadContent function to store the last visited URL in localStorage
function loadContent(url) {
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('content').innerHTML = this.responseText;
      initializeDataTable(); // Call the DataTable initialization function after loading content
      localStorage.setItem('lastVisitedUrl', url); // Store the last visited URL in localStorage
    }

    if (url === 'viewdriver.php') {
      
      loadScript('js/modal/viewdruver.js');
    } else if (url === 'viewtrip.php') {
      loadScript('js/modal/viewtrip.js');
      
    } else if (url === 'viewbus.php') {
      loadScript('js/modal/viewbus.js');
    } else if (url === 'viewadmin.php') {
      loadScript('js/modal/viewadmin.js');
    } else if (url === 'applications.php') {
      loadScript('js/modal/viewapplication.js');
    }else if (url === 'payments.php') {
      loadScript('js/modal/viewpayment.js');
    }else if (url === 'dashboard.php')
    {
      loadScript('js/modal/dashboard.js');
    }
    else if(url === 'addbus.php')
    {
      loadScript('js/validation/busvalidation.js');
    }
    else if(url === 'addtrip.php')
    {
      loadScript('js/validation/tripvalidation.js');
    }
    else if(url === 'adddriver.php')
    {
      loadScript('js/validation/drivervalidation.js');
    }
    else if(url=== 'stats.php')
    {
      loadScript('js/validation/stats.js');
    }
  };
  xhr.open('GET', url, true);
  xhr.send();
}


addtrip.addEventListener("click", function () {
  loadContent("addtrip.php");
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
    }
  };
 
  xhr.open("GET", "addtrip.php", true);
  xhr.send();
});



viewtrip.addEventListener("click", function () {
  loadContent("viewtrip.php");
});

adddriver.addEventListener("click", function () {
  loadContent("adddriver.php");
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
    }
  };
  xhr.open("GET", "adddriver.php", true);
  xhr.send();
});



viewdriver.addEventListener("click", function () {
  loadContent("viewdriver.php");
});

addbus.addEventListener("click", function () {
  loadContent("addbus.php");
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
    }
  };
  xhr.open("GET", "addbus.php", true);
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
  xhr.open("GET", "stats.php", true);
  xhr.send();
});



payments.addEventListener("click", function () {
  loadContent("payments.php");
});

addadmin.addEventListener("click", function () {
  loadContent("addadmin.php");
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
      loadScript('js/validation/adminvalidation.js');
    }
  };
  xhr.open("GET", "addadmin.php", true);
  xhr.send();
});



viewadmin.addEventListener("click", function () {
  loadContent("viewadmin.php");
});


