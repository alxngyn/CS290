

// this function changes the heart and triggers the async call
// when the user clicks on a food pairing favorite.
$("button").click(function() {
    var icon = $(this).children().first();
    // if the heart is unfilled, do this process
    if(icon.hasClass("glyphicon-heart-empty"))
    {
        var id = this.id;
        var username = document.getElementById("username").innerHTML;
        console.log(username + " " + id);

        // create ajax call to test
        var xhttp = new XMLHttpRequest();
        // since were running async, we need to define wat to do with the result
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                $(this).parent().innerHTML = xhttp.responseText;
            }
        };
        // setup POST w/ data and send
        xhttp.open("POST", "recordFavorites.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // parse the user ID to check for validity
        xhttp.send("userName="+ username + "&id=" + id );


        // change heart icon from empty to filled
        icon.removeClass("glyphicon-heart-empty");
        icon.addClass("glyphicon-heart");
    }
});

function checkLogin(){
    username = document.getElementById('userName').value;
    password = document.getElementById('password').value;
    var xhttp = new XMLHttpRequest();
    // since were running async, we need to define wat to do with the result
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
          if(xhttp.responseText == "<h5>Successfully logged in</h5>"){
                location.reload();
          }else{
                document.getElementById("ajaxResponse").innerHTML = xhttp.responseText;
            }
      }
    };
    // setup POST w/ data and send
    xhttp.open("POST", "checkLogin.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // parse the user ID to check for validity
    xhttp.send("userName="+ username + "&password=" + password );

}
