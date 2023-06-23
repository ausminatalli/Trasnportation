<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <title>Document</title>
  </head>
  <style>
    .users
    {
        background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
    }
    .drivers
    {
        background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);

    }
    .profit
    {
        background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);

    }
    .bus{
        background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);
    }
    .trips{
        background: linear-gradient(90deg, rgba(218,173,249,1) 0%, rgba(163,207,131,1) 80%, rgba(29,253,224,1) 99%, rgba(252,176,69,1) 100%);

    }
    .card-text , .card-title{
      font-family: fantasy;
    }
    .dots
    {
        cursor: pointer;
    }
    </style>
  </style>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="card w-75">
            <div class="card-body users">
                <span class="dots" onclick="toggleDropdownUser()" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">&#8230;</span>
                <div class="dropdown-menu" id="dropdownuser">
                    <a class="dropdown-item" href="#" onclick="changeStat('total','user')">Total</a>
                    <a class="dropdown-item" href="#" onclick="changeStat('monthly','user')">Monthly</a>
                    <a class="dropdown-item" href="#" onclick="changeStat('yearly','user')">Yearly</a>
                  </div>
              <h3 class="card-title text-center">Users</h3>
              <div class="text-center">
              <i class="fa-solid fa-circle-user fa-2xl"></i>
            </div>
              <h5 class="card-text text-center mt-4 userscount"></h5>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
            <div class="card w-75">
              <div class="card-body drivers">
                  <span class="dots" onclick="toggleDropdownDriver()" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">&#8230;</span>
                  <div class="dropdown-menu" id="dropdowndriver">
                      <a class="dropdown-item" href="#" onclick="changeStat('total','driver')">Total</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('monthly','driver')">Monthly</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('yearly','driver')">Yearly</a>
                    </div>
                <h3 class="card-title text-center">Drivers</h3>
                <div class="text-center">
                <i class="fa-solid fa-id-card fa-2xl text-center"></i>
            </div>
                <h5 class="card-text text-center mt-4 drivercount"></h5>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card w-75">
              <div class="card-body profit">
                  <span class="dots" onclick="toggleDropdownProfit()" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">&#8230;</span>
                  <div class="dropdown-menu" id="dropdownprofit">
                      <a class="dropdown-item" href="#" onclick="changeStat('total','profit')">Total</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('monthly','profit')">Monthly</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('yearly','profit')">Yearly</a>
                    </div>
                <h3 class="card-title text-center">Profit</h3>
                <div class="text-center">
                <i class="fa-solid fa-money-bill-trend-up fa-2xl"></i>
            </div>
                <h5 class="card-text text-center mt-4 profitcount"></h5>
              </div>
            </div>
          </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <div class="card w-75">
                <div class="card-body bus">
                    <h3 class="card-title text-center mt-4">Bus</h3>
                <div class="text-center">
                    <i class="fa-solid fa-van-shuttle fa-2xl"></i>
            </div>
                <h5 class="card-text text-center mt-4 buscount"></h5>
                    </div>
                    </div>
        </div>
        <div class="col-sm-4">
            <div class="card w-75">
              <div class="card-body trips">
                  <span class="dots" onclick="toggleDropdownTrips()" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">&#8230;</span>
                  <div class="dropdown-menu" id="dropdowntrips">
                      <a class="dropdown-item" href="#" onclick="changeStat('total','trips')">Total</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('monthly','trips')">Monthly</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('yearly','trips')">Yearly</a>
                    </div>
                <h3 class="card-title text-center">Trips</h3>
                <div class="text-center">
                <i class="fa-solid fa-money-bill-trend-up fa-2xl"></i>
            </div>
                <h5 class="card-text text-center mt-4 tripscount"></h5>
              </div>
            </div>
          </div>

      </div>
      <div class="row mt-5">
        <div class="col-sm-10" >
        <div class="card-body">
            <h5 class="card-title">Reports </h5>
        <!-- Create the chart containers -->
        <div class="col-sm-12" id="tripsChart"></div>
        <div class="col-sm-12 mt-2" id="amountChart"></div>
        <div class="col-sm-12 mt-2" id="usersChart"></div>
      </div>
    </div>
</div>
  </body>

</html>
