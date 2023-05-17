<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <title>Skyline Main Search Page</title>
</head>
<body>
    <style>
      #map{
        width: 100%;
        height: 320px;
      }
    </style>
    <?php   
   include('header.html');

    ?>
  
     <section class="filter" style='padding-top:60px'>
        <div class="filter-contant container">
            <form class="form" action="">
                <div class="form1">
                <div class="origin">
                    <label for="from">From</label>
                    <input type="text" placeholder="Leaving Form">
                </div>
                <div class="switch">
                    <button><i class="fa-solid fa-arrows-rotate"></i></button>
                </div>
                <div class="origin">
                    <label for="from">Destination</label>
                    <input type="text" placeholder="Going To">
                </div>
            </div>
            <div class="form1 form22">
                <div class="origin custom-date-input">
                    <label for="from">Date</label>
                    <input type="date" placeholder="Choose Date">
                </div>
              
                <div class="origin dest">
                    <label for="from">Time</label>
                    <input type="text" placeholder="Select Time">
                </div>
            </div>
            <div class="form2">
                <button>Search<i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
            </form>
</div>
</section>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Result:</h5>
                        <?php include('searchresult.php') ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="map" class="card">
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.html'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script>
        var map = L.map("map").setView([33.8938, 35.5018], 8);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script>

</body>
</html>