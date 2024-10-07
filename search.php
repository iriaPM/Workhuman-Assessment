<?php
include 'connection.php';

//SQL query to get the list of countries
$sql = "SELECT country_name FROM countries";
$result = $conn->query($sql);

//create an empty array to store the names of the countries 
$countryArray = array();

//check if there are results
if ($result->num_rows > 0) {
    //fetch data from each row and add it to the array
    while ($row = $result->fetch_assoc()) {
        $countryArray[] = $row['country_name'];
    }
}

//convert PHP array to JSON and return it
echo json_encode($countryArray);

//close the connection
$conn->close();
