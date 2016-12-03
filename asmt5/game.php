<?php include("static/header.php"); ?>

<?PHP
    session_start();
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $userName = $_SESSION['valid_user'];

    if( isset($_SESSION['valid_user']) ){
        echo "Hello, <h3 id='userName'>" . $userName . "</h3>";
    } else{
        echo "Hello, <h3 id='userName'>Anonymous</h3>";
    }

?>
        <link rel="stylesheet" type="text/css" href="rps.css">
        <div class="menu">
            <h2>Play</h2>
            <table>
                <tr>
                    <td>
                        You
                    </td>
                    <td>
                        Computer
                    </td>

                </tr>
                <tr>
                    <td>
                        <img src="img/questionmark.gif" id="pChoice" height="300" width="300" alt="YOUR CHOICE IS HERE">

                    </td>
                    <td>
                        <img src="img/questionmark.gif" id="cChoice" height="300" width="300" alt="COMPUTER'S CHOICE IS HERE">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="image" src="img/rock.png" class="btn" id="rock" value="Rock">
                        <input type="image" src="img/paper.png" class="btn" id="paper" value="Paper">
                        <input type="image" src="img/scissor.png" class="btn" id="scissor" value="Scissors">
                    </td>
                    <td id="results">
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div class="scores">
            <h2>Current Session Scores</h2>
            <table>
                <tr>
                    <td>
                        You
                    </td>
                    <td id="pScore">
                        0
                    </td>
                </tr>
                <tr>
                    <td>
                        Computer
                    </td>
                    <td id="cScore">
                        0
                    </td>
                </tr>
                <tr>
                    <td>
                        Ties
                    </td>
                    <td id="tScore">
                        0
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div id="ajaxResponse"></div>
        <script src="rps.js"></script>

<?php include("static/footer.php"); ?>
