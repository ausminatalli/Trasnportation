

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

function EditTrip()
{
  
  // Get all edit buttons
const editButtons = document.querySelectorAll('.btn-edit');

// Add event listener to each edit button
editButtons.forEach((button) => {
  button.addEventListener('click', openEditModal);
});

// Function to handle the edit button click event
function openEditModal(event) {
  // Get the current row data
  const row = event.target.closest('tr');
  const cells = row.querySelectorAll('td');
  const rowData = Array.from(cells).map((cell) => cell.textContent.trim());

  // Set the modal input values with the row data
  const modal = document.querySelector('#editModal');
  const form = modal.querySelector('form');
  const inputs = form.querySelectorAll('input, select'); // Include both inputs and selects
  inputs.forEach((input, index) => {
    input.value = rowData[index];
  });
  console.log(rowData);

  // Show the modal
  $(modal).modal('show');
}

}

function EditDriverModal()
{
  
  const editButtons = document.querySelectorAll('.btn-edit');

  // Add event listener to each edit button
  editButtons.forEach((button) => {
    button.addEventListener('click', openEditModal);
  });

  // Function to handle the edit button click event
  function openEditModal(event) {
    // Get the current row data
    const row = event.target.closest('tr');
    const cells = row.querySelectorAll('td');
    const rowData = Array.from(cells).map((cell) => cell.textContent.trim());

    // Set the modal input values with the row data
    const modal = document.querySelector('#editModal');
    const form = modal.querySelector('form');
    const inputs = form.querySelectorAll('input, select'); // Include both inputs and selects

    inputs.forEach((input) => {
      const name = input.getAttribute('name');
      const value = rowData[getFieldIndex(name)];
      input.value = value;
    });

    // Show the modal
    $(modal).modal('show');
  }

  // Function to get the index of the field name in rowData array
  function getFieldIndex(name) {
    const fields = ['Firstname', 'Lastname', 'MobileNumber', 'Email', 'Station', 'Licensedate', 'LicenseEx', 'Online', 'Action'];
    return fields.indexOf(name);
  }

}

function EditBusModal()
{
  
  const editButtons = document.querySelectorAll('.btn-edit');

  // Add event listener to each edit button
  editButtons.forEach((button) => {
    button.addEventListener('click', openEditModal);
  });

  // Function to handle the edit button click event
  function openEditModal(event) {
    // Get the current row data
    const row = event.target.closest('tr');
    const cells = row.querySelectorAll('td');
    const rowData = Array.from(cells).map((cell) => cell.textContent.trim());

    // Set the modal input values with the row data
    const modal = document.querySelector('#editModal');
    const form = modal.querySelector('form');
    const inputs = form.querySelectorAll('input, select'); // Include both inputs and selects

    inputs.forEach((input) => {
      const name = input.getAttribute('name');
      const value = rowData[getFieldIndex(name)];
      input.value = value;
    });

    // Show the modal
    $(modal).modal('show');
  }

  // Function to get the index of the field name in rowData array
  function getFieldIndex(name) {
    const fields = ['Bus ID', 'Driver name', 'capacity', 'Station', 'Mechanicdue Date', 'Insurance number', 'Accidents number','Action'];
    return fields.indexOf(name);
  }

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


function DashboardBlock() {
  let modal = $(".modal-container");
  let  btn = $(".blockuser");
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

function Paymentrefund() {
  let modal = $(".modal-container");
  let  btn = $(".btn-delete5");
 
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
      DriverDelete();
      EditDriverModal();
    } else if (url === 'viewtrip.php') {
      TripDelete();
      EditTrip();
    } else if (url === 'viewbus.php') {
      BusDelete();
      EditBusModal();
    } else if (url === 'viewadmin.php') {
      AdminDelete();
    } else if (url === 'applications.php') {
      ApplicationDelete();

    }else if (url === 'payments.php') {
    Paymentrefund();
    
    }else if (url === 'dashboard.php')
    {
      
      DashboardBlock();
    }
  };
  xhr.open('GET', url, true);
  xhr.send();
}


addtrip.addEventListener("click", function () {
 
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
      loadScript('js/validation/tripvalidation.js');
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
      loadScript('js/validation/drivervalidation.js');
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
      loadScript('js/validation/busvalidation.js');
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
      loadScript('js/validation/adminvalidation.js');
    }
  };
  xhr.open("GET", "addadmin.html", true);
  xhr.send();
});



viewadmin.addEventListener("click", function () {
  loadContent("viewadmin.php");
});


