<?php
require_once('dbConVars.php');
// Connect to the database

if( isset($_POST['userName']) ) {
    $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    $userName = $_POST["userName"];
    $score = $_POST["score"];

    echo "Post userName is: " . $userName . "<br>";

    // check if user exists
    $query = "SELECT * FROM CS290_Users WHERE userName='$userName'";
    $result = mysqli_query($dbc, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $score = $score + $row['score'];
        $sql = "UPDATE CS290_Users SET score = $score WHERE userName = '$userName'";
        $update = mysqli_query($dbc, $sql);
        if($update){
            echo " Records update successful. ";
        }
        else{
            echo " Records did not update successfully. ";
        }

    }else {
      // The username/password are incorrect so set an error message
        echo "Sorry, could not find the username: " . $userName;
    }
    mysqli_free_result($result);
    mysqli_close($dbc);
}else {
    echo "No POST";
    exit();
}


?>
