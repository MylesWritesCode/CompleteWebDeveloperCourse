$("#changeBtn").click(function(){
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

$('#myModal').on("hidden.bs.modal", function(e) {

});
