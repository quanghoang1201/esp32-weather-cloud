<?php
  $servername = "iot-database-group-4.cldwbybyk6bh.us-east-1.rds.amazonaws.com";

  //Database name
  $dbname = "weatherDatabase";
  //Database user
  $username = "Group4";
  //Database user password
  $password = "hmqGroup4";


  function insertSQL($location, $temperature, $humidity, $pressure, $altitude, $co2_ppm, $rain, $air_quality) {
    global $servername, $username, $password, $dbname;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO dataCollect (location, temperature, humidity, pressure, altitude, co2_ppm, rain, air_quality)
    VALUES ('" . $location . "', '" . $temperature . "', '" . $humidity . "', '" . $pressure . "', '" . $altitude . "', '" . $co2_ppm . "', '" . $rain . "', '" . $air_quality . "')";

    if ($conn->query($sql) === TRUE) {
      return "New record created!";
    }
    else {
      return "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }

?>
