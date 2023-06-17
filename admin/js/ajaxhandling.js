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

function initializeDataTable() {
  const myTable = document.getElementById("myTable");
  if (myTable) {
    new DataTable(myTable);
  }
}

const loadedScripts = new Set(); // Track loaded scripts

function loadScript(url) {
  if (loadedScripts.has(url)) {
    // Script already loaded, skip loading
    return;
  }

  const script = document.createElement("script");
  script.type = "text/javascript";
  script.src = url;
  document.head.appendChild(script);
  loadedScripts.add(url);
}

window.onload = function () {
  const lastVisitedUrl = localStorage.getItem("lastVisitedUrl");
  if (lastVisitedUrl) {
    loadContent(lastVisitedUrl);
  } else {
    loadContent("dashboard.php");
  }
};

function loadContent(url) {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      document.getElementById("content").innerHTML = this.responseText;
      initializeDataTable();
      localStorage.setItem("lastVisitedUrl", url);
    }

    if (url === "viewdriver.php") {
      loadScript("js/modal/viewdriver.js");
    } else if (url === "viewtrip.php") {
      loadScript("js/modal/viewtrip.js");
    } else if (url === "viewbus.php") {
      loadScript("js/modal/viewbus.js");
    } else if (url === "viewadmin.php") {
      loadScript("js/modal/viewadmin.js");
    } else if (url === "applications.php") {
      loadScript("js/modal/viewapplication.js");
    } else if (url === "payments.php") {
      loadScript("js/modal/viewpayment.js");
    } else if (url === "dashboard.php") {
      loadScript("js/modal/dashboard.js");
    } else if (url === "addbus.php") {
      loadScript("js/validation/busvalidation.js");
    } else if (url === "addtrip.php") {
      loadScript("js/validation/tripvalidation.js");
    } else if (url === "adddriver.php") {
      loadScript("js/validation/drivervalidation.js");
    } else if (url === "stats.php") {
      loadScript("js/modal/stats.js");
    }
  };
  xhr.open("GET", url, true);
  xhr.send();
}

addtrip.addEventListener("click", function () {
  loadContent("addtrip.php");
});

viewtrip.addEventListener("click", function () {
  loadContent("viewtrip.php");
});

adddriver.addEventListener("click", function () {
  loadContent("adddriver.php");
});

viewdriver.addEventListener("click", function () {
  loadContent("viewdriver.php");
});

addbus.addEventListener("click", function () {
  loadContent("addbus.php");
});

viewbus.addEventListener("click", function () {
  loadContent("viewbus.php");
});

applications.addEventListener("click", function () {
  loadContent("applications.php");
});

stats.addEventListener("click", function () {
  loadContent("stats.php");
});

payments.addEventListener("click", function () {
  loadContent("payments.php");
});

addadmin.addEventListener("click", function () {
  loadContent("addadmin.php");
});

viewadmin.addEventListener("click", function () {
  loadContent("viewadmin.php");
});
