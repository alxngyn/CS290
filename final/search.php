<?php include("static/header.php"); ?>
<?php
    if(isset($_GET['submit'])){
        $query = $_GET['query'];
    }
    //echo $query . " " . $_GET['submit'];

    require_once('dbConVars.php');
    // Connect to the database
    $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    // set up SQL statement and run with it
    $sql = "SELECT * FROM food_pairs WHERE food1='$query'";
    $data = mysqli_query($dbc, $sql);



    /* // This array fetch doesn't work and I don't know why.
    session_start();
    if( isset($_SESSION['valid_user']) ){
        $username = $_SESSION['valid_user'];
        // get data of user's favorites
        $sql2 = " SELECT * FROM users_favorites WHERE username='$username' ";
        $favs = mysqli_query($dbc, $sql2);
        if (mysqli_num_rows($favs) > 0) {
            while($favrow = mysqli_fetch_assoc($favs)) {
                echo "<br>";
                echo "favrow pair_id: " . $favRow["pair_id"] . " blank? ";
                echo "favrow username: " . $favRow["username"];
            }
        }
    }

    */

    // close connection
    mysqli_close($dbc);
?>

        <div class="jumbotron-results">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                <form method="get" action="search.php">
                     <div class="input-group">
                       <input type="text" class="form-control" name="query" value=<?php echo $query; ?> autofocus>
                       <span class="input-group-btn">
                         <button class="btn btn-default" type="submit" name="submit" value="true">Go!</button>
                       </span>
                     </div><!-- /input-group -->
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="search-results">
            <div class="container col-lg-10 col-lg-offset-1">
                <?php
                    if( mysqli_num_rows($data) > 0 ){
                        echo '<table class="table table-bordered table-hover">';
                        echo '<tr>
                                <td>Id #</td>
                                <td>Food1</td>
                                <td>Food2</td>
                            ';
                        // if user is logged in, show the favorite header
                        session_start();
                        if( isset($_SESSION['valid_user']) ){
                            echo "<td>Favorite</td>";
                        }

                        echo '</tr>';
                        while($row = mysqli_fetch_assoc($data)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["food1"] . "</td>";
                            echo "<td>" . $row["food2"] . "</td>";

                            // if user is loged in, show a favorite button for them
                            if( isset($_SESSION['valid_user']) ){
                                echo '<td>
                                        <div id="favorites" class="favorite">
                                            <button id="' . $row["id"] . '">
                                                <span class="glyphicon glyphicon-heart-empty"></span>
                                            </button>
                                        </div>
                                    </td>';
                            }
                            echo "</tr>";
                        }
                        echo '</table>';
                    } else {
                        echo '<h1>No results found for '. $query . mysqli_error() . '</h1>';
                    }
                ?>

            </div>
        </div>


<?php include("static/footer.php"); ?>
