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
    var userName = form.userName.value;
    var password = form.password1.value;
    var firstName = form.firstName.value;
    var lastName = form.lastName.value;
    var errors = [];

    // check each field, append to the errors array if any fail.
    if(ck_name.test(userName) === false){
        errors[errors.length] = "Please enter a valid name.";
    }
    if(ck_password.test(password) === false){
        errors[errors.length] = "Please enter a valid password.";
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
