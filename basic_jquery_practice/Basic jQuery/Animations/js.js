$(".green.circle").click(function(){
  $(this).animate({
    width:"400px",
    height:"400px",
    marginLeft:"100px",
    marginTop:"100px",
  }, 2000, function () {
    $(this).css("background-color", "red");
  });
});
