<?php
// link to the connections page to connect with database 
include 'connection.php';

//sql query to select the id and country from the db 
$sql = "SELECT id, country_name FROM countries";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find your country!</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="title">
        <h1>Find Your Country!</h1>
    </div>
    <!--search Bar -->
    <form action="" autocomplete="off">
        <div class="autocomplete-wrapper" id="autocomplete-wrapper">
            <input id="autocomplete-input" type="text" placeholder="country name...">
        </div>
    </form>

    <!--dropdown list/table to display the data -->
    <ul id="countries-list">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<span class='country-name'>" . $row['country_name'] . "</span>";
                echo "</li>";
            }
        } else {
            echo "<li>No countries in the database</li>";
        }
        ?>
    </ul>

    <!-- connect to the javascript files  -->
    <script src="scripts/search.js"></script>
    <!--get jQuery ajax methods to exchange data with a server and update the web app-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>