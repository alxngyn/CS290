
<?php include("static/header.php"); ?>

<?php
    require_once('dbConVars.php');
    // Connect to the database
    $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    $sql = "SELECT * FROM `CS290_Users` ORDER BY score DESC";
    $data = mysqli_query($dbc, $sql);
    //echo "Data: " . $data;
    if( mysqli_num_rows($data) > 0 ){
        // Confirm success with the user
    } else {
        echo '<p>Error, could not access to database. Error:' . mysqli_error() . '</p>';
    }
    mysqli_close($dbc);
?>

<table class="scoreboard">
    <thead>
        <tr>
            <td>
                UserName
            </td>
            <td>
                Wins
            </td>
        </tr>
    </thead>
    <?php
        while($row = mysqli_fetch_assoc($data)) {
            echo "<tr>";
            echo "<td>" . $row["userName"] . "</td>";
            echo "<td>" . $row["score"] . "</td>";
            echo "</tr>";
        }
    ?>
</table>

<?php include("static/footer.php"); ?>
