<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $currency = $_POST['currency'];
      if (empty($currency)) {
        echo "currency not found";
      } else {
        print($currency);
      }
    }
    ?>