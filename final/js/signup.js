/*
    Alex Nguyen
    CS290 Fall 2015
    Asmt 5
    November 25, 2015
*/

// set regex
var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
var ck_password = /^[A-Z].*\d{2}$/;

// run this function everytime the user tries to submit
function validate(form){
    // grab the input data
    var userName = form.username.value;
    var password = form.password.value;
    var firstName = form.firstName.value;
    var lastName = form.lastName.value;
    var errors = [];

    // check each field, append to the errors array if any fail.
    if(ck_name.test(userName) === false){
        errors[errors.length] = "Please enter a valid name. Must be between 3 and 20 characters.";
    }
    if(ck_password.test(password) === false){
        errors[errors.length] = "Please enter a valid password. It must start with a capital letter and end with two digits.";
    }

    // check if errors array has filled, and alert them accordingly.
    if(errors.length > 0){
        var msg = "Please check the following: \n";
        for(var i = 0; i< errors.length; i++){
            msg += errors[i] + "\n";
        }
        alert(msg);
        return false;
    }
    else {
        // if no errors, return true and let the form submit.
        return true;
    }
}

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
            document.getElementById("ajaxResponse").innerHTML = "<h3>" + xhttp.responseText + "</h3>";
          }
        };
        // setup POST w/ data and send
        xhttp.open("POST", "recordScore.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // parse the user ID to check for validity
        xhttp.send("userName="+ id.innerHTML +"&score=1");
    }
}
