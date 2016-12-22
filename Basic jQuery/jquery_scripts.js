// Regex functions
var regex = /is/;
var string = "Regex is great!";
var result = string.match(regex);
console.log(result);

// Case insenitive
var regex = /is/i
var string = "Regex is great!";
var result = string.match(regex);
console.log(result);

//How many times does is appear?
var regex = /e/g;
var string = "Regex is great!";
var result = string.match(regex);
console.log(result);

// Have the div animate a fade out
$("div").click(function(){
  $(this).fadeOut("slow", function(){
    $("#eventAlert").html($(this).attr("class") + " fade out has finished.");
  });
});

$("div").click(function(){
  $("#fadeInText").fadeIn()
});

// // A fade toggle button that will fade the selected once a button is clicked
$("#toggleButton").click(function(){
  $("#toggleText").fadeToggle()
});

// The long way of doing a toggle fade button/text
// $("#toggleButton").click(function() {
//   if ($("#toggleText").css("display") == "none") {
//     $("#toggleText").fadeIn();
//   } else {
//     $("#toggleText").fadeOut();
//   }
// });

// Set the text in paragraph when green circle is clicked
// $(".circle.green").click(function(){
//   $("p").html("The green circle was clicked.");
// });

// // Set the text in paragraph when red circle is hovered over
// $(".circle.red").hover(function(){
//   $("p").html("You hovered over the red circle.");
// });

// Set display of div clicked to none
// $("div").click(function(){
//   $(this).css("display", "none");
// });

// Set the bottom green square to blue
// $(".green.square").click(function(){
//   $(".green.square").css("background-color", "blue");
// });
