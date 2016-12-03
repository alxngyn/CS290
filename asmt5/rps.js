/*
    Alex Nguyen
    CS290 Fall 2015
    Asmt 5
    November 25, 2015
*/


// convert HTML elements to javascript variables
var pImage = document.getElementById('pChoice');
var cImage = document.getElementById('cChoice');

var rock = document.getElementById('rock');
var paper = document.getElementById('paper');
var scissor = document.getElementById('scissor');

var results = document.getElementById('results');
var pScore = document.getElementById('pScore');
var cScore = document.getElementById('cScore');
var tScore = document.getElementById('tScore');

// for PHP stuff
var id = document.getElementById("userName");


// Initialize counters for player wins, computer wins and ties
var pWins = 0;
var cWins = 0;
var ties = 0;

// Create event listeners for the RPS buttons
// When an event happens, pass info to the playGame function to process
rock.addEventListener("click", function(){
    playGame(1);
});

paper.addEventListener("click", function(){
    playGame(2);
});

scissor.addEventListener("click", function(){
    playGame(3);
});

// playGame is the main processing function
function playGame(choice){
    // Look at the player's choce and change their image appropriately.
    switch(choice){
        case 1:
            pImage.src="img/rock.gif";
            break;
        case 2:
            pImage.src="img/paper.gif";
            break;
        case 3:
            pImage.src="img/scissor.gif";
            break;
        default:
            pImage.src="img/questionmark.gif";
            break;
    }
    // Pass the player's choice to the game evaluator with a randomly generated
    // computer choice
    evalChoices(choice, getcChoice());
}

// generator function for computer's choice
function getcChoice(){
    // randomly generate a number from 1-3
    var result = Math.floor((Math.random() * 3)+1);

    // set the computer image appropriately
    switch(result){
        case 1:
            cImage.src="img/rock.gif";
            break;
        case 2:
            cImage.src="img/paper.gif";
            break;
        case 3:
            cImage.src="img/scissor.gif";
            break;
        default:
            cImage.src="img/questionmark.gif";
            break;
    }
    // return the result
    return result;
}

// this function is the game's logic and processes the win and tie counters
// the function also displays the result on the document
function evalChoices(pChoice, cChoice){
    // if a tie happens, print and record the tie
    if(pChoice == cChoice){
        results.innerHTML = "TIE!!!";
        ties++;
        tScore.innerHTML = ties;
    }
    // if the players choice is a rock ...
    else if(pChoice == 1){
        // if the computers choice is a paper then computer wins ..
        if(cChoice == 2){
            results.innerHTML = "Computer WINS!!!";
            cWins++;
            cScore.innerHTML = cWins;
        }
         // otherwise the player wins
        else{
            results.innerHTML = "YOU WIN!!!";
            pWins++;
            playerWins();
            pScore.innerHTML = pWins;
        }
    }
    // if the players choice is a paper...
    else if(pChoice == 2){
        // if the computers choice is a scissor then computer wins ..
        if(cChoice == 3){
            results.innerHTML = "Computer WINS!!!";
            cWins++;
            cScore.innerHTML = cWins;
        }
        // otherwise the player wins
        else{
            results.innerHTML = "YOU WIN!!!";
            pWins++;
            playerWins();
            pScore.innerHTML = pWins;
        }
    }
    // if the players choice is a scissor...
    else if(pChoice == 3){
        // if the computers choice is a rock then computer wins ..
        if(cChoice == 1){
            results.innerHTML = "Computer WINS!!!";
            cWins++;
            cScore.innerHTML = cWins;
        }
        // otherwise the player wins
        else{
            results.innerHTML = "YOU WIN!!!";
            pWins++;
            playerWins();
            pScore.innerHTML = pWins;
        }
    }
}

// the ajax function
function playerWins(){
    // Console log for debugging
    console.log(id.innerHTML + " wins!");
    // if the user is logged in then do this ...
    if(id.innerHTML != "Anonymous"){
        // create ajax conn
        var xhttp = new XMLHttpRequest();
        // since were running async, we need to define wat to do with the result
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("ajaxResponse").innerHTML = xhttp.responseText;
          }
        };
        // setup POST w/ data and send
        xhttp.open("POST", "recordScore.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // parse the user ID to check for validity
        xhttp.send("userName="+ id.innerHTML +"&score=1");
    }
}
