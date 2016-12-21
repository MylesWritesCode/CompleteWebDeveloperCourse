// Have the div animate a fade out
$("div").click(function(){
  $(this).fadeOut("slow", function(){
    $("p").html($(this).attr("class") + " fade out has finished.");
  });
});

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
