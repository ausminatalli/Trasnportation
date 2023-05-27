const currencyLink = document.getElementById("currency");

      currencyLink.addEventListener("click", function (event) {
        event.preventDefault();

        if (currencyLink.textContent === "Lira") {
          currencyLink.textContent = "USD";
          currencyLink.style.setProperty("--currency-content", '" Lira"');
        } else {
          currencyLink.textContent = "Lira";
          currencyLink.style.setProperty("--currency-content", '" USD"');
        }
        const xhr = new XMLHttpRequest();
        const url = "http://localhost/transportation/user/usermain.php";
        const currency = currencyLink.textContent;
      
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
          }
        };
      
        xhr.send("currency=" + encodeURIComponent(currency));
      });


