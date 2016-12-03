<?php include("static/header.php"); ?>

<?php
  require_once('dbConVars.php');
  // Connect to the database
  $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
  echo "PRE Post message: " . $_POST['submit'];

  if (isset($_POST['submit'])) {

    echo "POST Post message: " . $_POST['submit'];
    // Grab the profile data from the POST
    $userName = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $confirm = mysqli_real_escape_string($dbc, trim($_POST['confirm']));

    if($confirm == "Yes"){
        if (!empty($userName) && !empty($password1)) {
          // Make sure the username + password match
          // sha1 the password
          $password1 = sha1($password1);
          $query = "SELECT * FROM CS290_Users WHERE userName='$userName' AND password='$password1' ";
          $data = mysqli_query($dbc, $query);
          if (mysqli_num_rows($data) == 1) {
            // The username is unique, so delete the row from the database
            $query = "DELETE FROM CS290_Users WHERE userName='$userName' AND password='$password1';";
            //$query = "INSERT INTO CS290_Users (userName, password, firstName, lastName) VALUES ('$userName', '$password1', '$firstName' , '$lastName')";
            if( mysqli_query($dbc, $query) ){
                // Confirm success with the user
                echo '<h3>Your new account has been successfully deleted.</h3>';
                // kill session data
                session_start();
                unset($_SESSION['valid_user']);
                session_destroy();
            } else {
                echo '<h3>Error, could not delete from database. Error:' . mysqli_error() .' </h3>';
            }

            mysqli_close($dbc);
            exit();
          }else {
            // An account already exists for this username, so display an error message
            echo '<h3 class="error">An account does not exists for this username.</h3>';
            $userName = "";
          }
        }
    }
  }
  mysqli_close($dbc);
?>
<?php include("static/footer.php"); ?>
