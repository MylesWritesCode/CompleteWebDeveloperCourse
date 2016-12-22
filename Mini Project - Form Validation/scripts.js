function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

    return pattern.test(emailAddress);
};

$("#submitBtn").click(function(){
  var errorMessage = "";
  if (isValidEmailAddress($("#email").val()) == false){
    errorMessage += "<p>Your email address is not valid.</p>";
    // console.log(errorMessage);
  }
  if ($.isNumeric($("#phone").val()) == false) {
    errorMessage += "<p>Your phone number needs to be all numbers.</p>"
    // console.log(errorMessage);
  }
  if ($("#password").val() != $("#confirmPassword").val()) {
    errorMessage += "<p>Your passwords do no match.</p>"
    // console.log(errorMessage);
  }
  $("#errorMessages").html(errorMessage)
});

$(function() {
  $("#draggable").draggable();
});

$(function(){
  $("#vertDraggable").draggable({
    axis: "y"
  });
});

$(function(){
  $("#horiDraggable").draggable({
    axis: "x"
  });
});

$(function(){
  $("#boxResizeable").resizable({
    grid:50,
    resize: function(event, ui){
      if ($(this).width() > 300) {
        $("#boxResizeText").html("This box is bigger.");
      }
    }
  });
});

$(function(){
  $("#smallDroppable").draggable();
});

$(function(){
  $("#bigDroppable").droppable({
    drop: function(event, ui){
      $("#droppableText").html("You dropped me");
    }
  });
});

// Accordion function (with headers)
$(function(){
  $("#accordion").accordion();
});

// Sortable list function (draggable list)
$(function(){
  $("#sortable").sortable();
  $("#sortable").disableSelection();
});
