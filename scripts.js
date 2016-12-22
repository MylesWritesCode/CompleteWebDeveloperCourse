// btn-default - leftText
// btn-success - midText
// btn-danger - rightText

$(".btn").click(function(){
  $(this).prop("disabled", true);
});

$(".btn-default").click(function(){
  $("#leftText").html("You clicked on the white button");
});

$(".btn-success").click(function(){
  $("#midText").html("You clicked on the green button");
});

$(".btn-danger").click(function(){
  $("#rightText").html("You clicked on the red button");
});
