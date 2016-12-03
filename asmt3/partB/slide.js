/*
Alex Nguyen
CS290 Fall 2015
Asmt3
October 25, 2015
*/

// convert HTML elements to javascript variables
prev = document.getElementById('prev');
next = document.getElementById('next');
feature = document.getElementById('feature');

// create an array of the photos located in img/
var photos = ["benedict.jpg", "burger.jpg", "fajita.jpg", "milkshakes.jpg", "poached.jpg"];
// create an integer variable for length and index
var length = photos.length;
var index = 0;

// these functions ensures that the index variable never goes outside the range of the array
function incIndex() {
    // if index is at max, move index to 0
    if (index == length-1){
        index = 0;
    }
    // if index is not at max, increment as usual
    else {
        index++;
    }
}
function decIndex() {
    // if index is at 0, move index to max
    if (index === 0){
        index = length-1;
    }
    // if index is not at 0, decrement as usual
    else {
        index--;
    }
}

// event listeners for click for next, next will increment the index
next.addEventListener('click', function(){
    incIndex();
    feature.src = "img/"+photos[index];
});

// event listener for click even for prev, prev will decrement index.
prev.addEventListener('click', function(){
    decIndex();
    feature.src = "img/"+photos[index];
});
