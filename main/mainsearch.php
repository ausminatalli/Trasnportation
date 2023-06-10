<?php
include('../path.php');
include_once('../config.php');

$host = $_SERVER['HTTP_HOST'];
$apiUrl = "http://$host/transportation/api/admin/dropdown.php";
$data = file_get_contents($apiUrl);
$dropdown = json_decode($data, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/searchresult.css">
    <link rel="stylesheet" href="../css/currency.css" />
    <title>Skyline Main Search Page</title>
</head>
<body>

    <?php include('../include/mainheader.html') ?>

    <section class="filter" style='padding-top:60px'>
        <div class="filter-contant container">
            <form class="form" id="search-form">
                <div class="form1" id="validateform">
                    <div class="origin">
                        <label for="origin">From</label>
                        <select class="select" name="origin" id="origin">
                            <option selected value="">Leaving From</option>
                            <?php foreach ($dropdown['station'] as $station) {
                                $stationname = $station['stationname'];
                                $provincename = $station['provincename'];
                                echo '<option value="' . $provincename . '">' . $provincename . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="switch">
                        <button onclick="toggleLocation(event)"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </div>
                    <div class="origin">
                        <label for="destination">Destination</label>
                        <select class="select" name="destination" id="destination">
                            <option selected value="">Going To</option>
                            <?php foreach ($dropdown['station'] as $station) {
                                $stationname = $station['stationname'];
                                $provincename = $station['provincename'];
                                echo '<option value="' . $provincename . '">' . $provincename . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form1 form22">
                    <div class="origin custom-date-input">
                        <label for="date">Date</label>
                        <input type="date" name="date" placeholder="Choose Date" />
                    </div>

                    <div class="origin dest">
                        <label for="from">Time</label>
                        <input type="time" name="time" placeholder="Select Time" />
                    </div>
                </div>
                <div class="form2">
                    <button type="submit" id="validatesearch">Search<i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </section>

    <div class="container mt-4 mb-4">
        <div class="row flex-column-reverse-sm">
            <div class="col-md-6 mt-1">
                <h5 class="card-title mb-2  d-flex mt-lg-0 mt-sm-4">Result:  <span id="result-count">&nbsp0</span></h5>

                <div class="card mt-lg-0 mt-sm-4">
                    <div class="card-body scrollable-container">
                        <div id="result-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="map" class="card"></div>
            </div>
        </div>
    </div>

    <?php include('../include/footer.html'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="js/mainsearch.js"></script>
    <script src="js/validation.js"></script>
    <script src="../user/js/header.js"></script>

    <script>
        // AJAX Form Submission
        document.getElementById('search-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Get form data
            var formData = new FormData(this);

            // Make AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../api/user/stationsearch.php?' + new URLSearchParams(formData).toString(), true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        displaySearchResults(response);
                    } else {
                        console.error('Error: ' + xhr.status);
                    }
                }
            };
            xhr.send();
        });

        // Display search results
        function displaySearchResults(results) {
            let resultContainer = document.getElementById('result-container');
            let resultCount = document.getElementById('result-count');
            resultContainer.innerHTML = '';
            resultCount.textContent = results.length;

            if(results.length==0){
              resultCount.innerHTML=`<span class="text-danger mr-2">&nbspSorry No Result Found</span>`

            }else {

            

            for (let i = 0; i < results.length; i++) {
                let item = results[i];
                let box = document.createElement('div');
                box.className = 'box';
                box.innerHTML = `
                    <div class="leftsection">
                        <div class="firstrow">
                            <i class="fa-solid fa-location-dot fa-xs" id="uppericon"></i>
                            <h5 class="from">${item.movetime}</h5>
                            <h5 class="origin">${item.origin}</h5>
                        </div>
                        <div class="secondrow">
                            <i class="fa-solid fa-location-dot fa-xs" id="bottomicon"></i>
                            <h5 class="to">${item.schedule}</h5>
                            <h5 class="destination">${item.destination}</h5>
                        </div>
                        <div class="thirdrow">
                            <i class="fa-sharp fa-solid fa-bus fa-sm"></i>
                            <h5 class="totaltime">${item.totaltime}</h5>
                        </div>
                    </div>
                    <div class="rightsection">
                        <h5>${item.ticketprice} L.L</h5>
                        <a href="#">Select</a>
                        <i class="fa-solid fa-arrow-right fa-lg mt-2"></i>
                    </div>
                `;
                resultContainer.appendChild(box);
            }
        }
      }
    </script>
</body>
</html>
