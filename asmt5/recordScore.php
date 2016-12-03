<?php
require_once('dbConVars.php');

// if a POST message was sent, process
if( isset($_POST['userName']) ) {
    // Connect to the database
    $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
    // temp vars for readability
    $userName = $_POST["userName"];
    $score = $_POST["score"];

    echo "userName is: " . $userName . "<br>";

    // check if user exists
    $query = "SELECT userName, score FROM CS290_Users WHERE userName='$userName'";
    $result = mysqli_query($dbc, $query);

    // if user exists and is unique, update their score
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $score = $score + $row['score'];
        $sql = "UPDATE CS290_Users SET score = $score WHERE userName = '$userName'";
        $update = mysqli_query($dbc, $sql);
        // echo out appropriate messages depending on the update query
        if($update){
            echo " Lifetime wins: " . $score;
        }
        else{
            echo " Records did not update successfully. ";
        }

    }else {
      // The username/password are incorrect so set an error message
        echo "Sorry, could not find the username: " . $userName;
    }
    // close mysql conn
    mysqli_free_result($result);
    mysqli_close($dbc);
}else {
    // if no post was sent for whatever reason, just exit
    exit();
}

?>
