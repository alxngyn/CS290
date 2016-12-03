<?php include("static/header.php"); ?>
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
        <h1>Your Favorites</h1>
        <?php
            require_once('dbConVars.php');
            // Connect to the database
            $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

            // get the username and ID and look up their favorites
            $sql = "SELECT * FROM `users_favorites` WHERE username='$userName' ";
            $data = mysqli_query($dbc, $sql);

            // using their pairIDs, generate Table data from food pairs table
            $sql2 = " SELECT * FROM `food_pairs` WHERE id='$pair_id' ";
            $data2 = mysqli_query($dbc, $sql2);

            if( mysqli_num_rows($data) > 0 ){
                echo '
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>
                                Food1
                            </td>
                            <td>
                                Food2
                            </td>
                        </tr>
                    </thead>
                    ';
                // Confirm success with the user
                while($row = mysqli_fetch_assoc($data)) {
                    //echo "<td>" . $row["pair_id"] . "</td>";
                    // grab pair id
                    $pair_id = $row["pair_id"];

                    // pass the pairID as a parameter and SELECT from food_pairs table
                    $sql2 = " SELECT * FROM `food_pairs` WHERE id='$pair_id' ";
                    $data2 = mysqli_query($dbc, $sql2);

                    // output to the HTML table
                    while($row2 = mysqli_fetch_assoc($data2)) {
                        echo "<tr>";
                        echo "<td>" . $row2["food1"] . "</td>";
                        echo "<td>" . $row2["food2"] . "</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
            } else {
                // if database is down show this:
                echo '<p>You do not have any favorites.' . mysqli_error() . '</p>';
            }
            // close mysqli
            mysqli_close($dbc);
        ?>
    </div>
</div>


<?php include("static/footer.php"); ?>
