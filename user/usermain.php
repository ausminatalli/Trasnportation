<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="searchresult.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css"
    />
    <title>Skyline User Page</title>
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
    <div class="usermain">
    <section class="filter" style="padding-top: 60px">
      <div class="filter-contant container">
        <form class="form" action="#">
          <div class="form1">
            <div class="origin">
              <label for="origin">From</label>
              <select class="select" name="" id="location1">
                      <option selected value="">Leaving From</option>
                      <option value="Beirut">Beirut</option>
                      <option value="Baalbek">Baalbek</option>
                      <option value="Saida">Saida</option>
                      <option value="Nabatieh">Nabatieh</option>
                    </select>
            </div>
            <div class="switch">
            <button onclick="toggleLocation(event)"><i class="fa-solid fa-arrows-rotate"></i></button>
            </div>
            <div class="origin">
              <label for="destination">Destination</label>
              <select class="select" name="" id="location2">
                      <option selected value="">Going To</option>
                      <option value="Beirut">Beirut</option>
                      <option value="Baalbek">Baalbek</option>
                      <option value="Saida">Saida</option>
                      <option value="Nabatieh">Nabatieh</option>
                    </select>
            </div>
          </div>
          <div class="form1 form22">
            <div class="origin custom-date-input">
              <label for="date">Date</label>
              <input type="date" placeholder="Choose Date" />
            </div>

            <div class="origin dest">
              <label for="from">Time</label>
              <input type="time" placeholder="Select Time" />
            </div>
          </div>
          <div class="form2">
            <button onclick="calculateDistance()">
              Search<i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </form>
      </div>
    </section>
    <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Result:</h5>
              <div class="resultcontainer">
    <?php
    
    $data = json_decode(file_get_contents("../main/user.json"), true);

    
    foreach ($data as $item) {
    ?>
    <div class="box">
      <div class="leftsection">
        <div class="firstrow">
          <i class="fa-solid fa-location-dot fa-xs" id="uppericon"></i>
          <h5 class="from"><?php echo $item['from']; ?></h5>
          <h5 class="origin"><?php echo $item['origin']; ?></h5>
        </div>
        <div class="secondrow">
          <i class="fa-solid fa-location-dot fa-xs" id="bottomicon"></i>
          <h5 class="to"><?php echo $item['to']; ?></h5>
          <h5 class="destination"><?php echo $item['destination']; ?></h5>
        </div>
        <div class="thirdrow">
          <i class="fa-sharp fa-solid fa-bus fa-sm"></i>
          <h5 class="totaltime"><?php echo $item['totaltime']; ?></h5>
        </div>
      </div>
      <div class="rightsection">
        <h5><?php echo $item['price']; ?></h5>
        <a href="#">
          Book
        </a>
      </div>
    </div>
    <?php
    }
    ?>
  </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div id="map"></div>
        </div>
      </div>
      <div class="row">
      <div class="card shadow-lg rounded-lg">
        <div class="card-body text-center">
          <p class="card-text">Wherever you need to go, we'll take you there in comfort and style. Whether it's a business trip, vacation, or a special occasion, our experienced drivers will get you to your destination safely and on time. Book your ride today and experience the ultimate in luxury transportation.</p>
        </div>
      </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
  <div class="col-md-6">
    <div class="card mb-3">
      <img src="https://i.ibb.co/rc4qGTM/pexels-aysegul-alp-12133976.jpg" alt="" class="card-img-top">
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-3">
      <img src="https://i.ibb.co/rc4qGTM/pexels-aysegul-alp-12133976.jpg" alt="" class="card-img-top">
    </div>
  </div>
</div>
      </div>
    </div>
    <?php   
   include('../main/footer.html');

    ?>
    </div>
   <script src='./js/usermain.js'></script>
   <script>
    // Switch

function toggleLocation(event){

event.preventDefault();

let select1 = document.getElementById("location1");
let select2 = document.getElementById("location2");

let swich= select1.value;
select1.value=select2.value;
select2.value=swich;
}

// Switch
   </script>
  </body>
</html>
