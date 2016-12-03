<?php
require_once('dbConVars.php');

// if a POST message was sent, process
if( isset($_POST['userName']) ) {
    // Connect to the database
    $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
    // temp vars for readability
    $userName = $_POST["userName"];
    $id = $_POST["id"];

    echo "userName is: " . $userName . "<br>";
    echo "id is: " . $id . "<br>";

    // check if the user+foodPair already exists
    $query = "SELECT username, pair_id FROM users_favorites WHERE username='$userName' AND pair_id='$id'  ";
    $result = mysqli_query($dbc, $query);

    // if user and foodpair is unique, insert a row
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO users_favorites(userName, pair_id) VALUES ('$userName', '$id')";
        $update = mysqli_query($dbc, $sql);

        // echo out appropriate messages depending on the update query
        if($update){
            echo "Favorite Saved.";
        }
        else{
            echo "Favorite did not save successfully. ";
        }
    }
    // close mysql conn
    mysqli_free_result($result);
    mysqli_close($dbc);
}

?>
