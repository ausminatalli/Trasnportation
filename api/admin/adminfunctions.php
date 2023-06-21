<?php
# Trip Functions
function AddTrip($conn,$data)
 {
        $busNumber = $data['busNumber'];
        $startLocation = $data['startLocation'];
        $destinationLocation = $data['destinationLocation'];
        $date = $data['date'];
        $time = $data['time'];
        $arriveTime = $data['arriveTime'];
        $ticketprice = $data['ticketprice'];
        $details= $data['details'];

        $sql = "INSERT INTO skyline.trips (busid,tripfrom,tripto,schedule,movetime,arrivetime,ticketprice,details) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssss",$busNumber, $startLocation, $destinationLocation, $date, $time, $arriveTime, $ticketprice, $details);

        if (mysqli_stmt_execute($stmt)) {
            echo "Trip added successfully.";
            
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        
        mysqli_stmt_close($stmt);
    }

    function EditTrip($conn, $data)
{
    $tripid = $data['tripid'];
    $schedule = $data['date'];
    $movetime = $data['startTime'];
    $arriveTime = $data['arriveTime'];
    
    // Prepare the update query
    $query = "UPDATE trips SET schedule = ?, movetime = ?, arriveTime = ? WHERE tripid = ?";
    $stmt = $conn->prepare($query);
    
    // Bind the parameters
    $stmt->bind_param("sssi", $schedule, $movetime, $arriveTime, $tripid);
    // Execute the query
    if ($stmt->execute()) {
        echo "Trip details updated successfully.";
    } else {
        echo "Error updating trip details.";
    }
    
}



    function AddBus($conn,$data)
 {
        $selectstation = $data['selectstation'];
        $selectdriver = $data['selectdriver'];
        $capacity = $data['capacity'];
        $platenumber = $data['platenumber'];
        $Mechanic = $data['Mechanic'];
        $Insurance = $data['Insurance'];
       
          
        $sql = "INSERT into bus (driverid,mechanicdate,insurancenb,capacity,stationid)  VALUES (?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss",$selectdriver, $Mechanic, $Insurance,$capacity,$selectstation);

        if (mysqli_stmt_execute($stmt)) {
            echo "Bus added successfully.";
            
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        
        mysqli_stmt_close($stmt);
    }
    function EditBus($conn, $data)
    {
        $Busid = $data['Busid'];
        $Drivername = $data['Drivername'];
        $MechanicDueDate = $data['MechanicDueDate'];
        $InsuranceNumber = $data['InsuranceNumber'];
        // Prepare the update query
        $query = "UPDATE bus SET driverid = ? ,mechanicdate = ?, insurancenb = ? WHERE busid = ?";
        $stmt = $conn->prepare($query);
        
        // Bind the parameters
        $stmt->bind_param("issi", $Drivername,$MechanicDueDate, $InsuranceNumber, $Busid);
        // Execute the query
        if ($stmt->execute()) {
            echo "Bus details updated successfully.";
        } else {
            echo "Error updating bus details.";
        }
        
    }
    
    






?>