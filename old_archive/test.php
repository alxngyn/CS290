<?php
//$servername = "oniddb.cws.oregonstate.edu";
//$dbname = "nguyalex-db";
//$username = "nguyalex-db";
//$password = "sf4PChMUktJ2TsEf";

// Create connection
include "dbConVars.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM cs290";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["name"]. " - Email: " .
			$row["email"]. " Wins:" . $row["wins"] .
			" Loses:" . $row["loses"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
