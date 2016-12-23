// funciton to validate email address
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

    return pattern.test(emailAddress);
};

function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}

// on submit form click
$("#submitBtn").click(function(){
  event.preventDefault();
  $(this).prop("disabled", true);
  var danger = "";
  var success = "";
  if (isValidEmailAddress($("#email").val()) == false) {
    danger += "<p>Please enter a valid email address.</p>";
  }
  if (isBlank($("#subject").val())) {
    danger += "<p>Please enter a valid subject.</p>"
  }
  if (isBlank($("#bodyText").val())) {
    danger += "<p>Please fill out the body.</p>"
  }
  if (isBlank(danger)) {
    $("#alerts").removeClass("alert-danger");
    $("#alerts").addClass("alert-success");
    $("#alerts").html("Thank you for your message. We will contact you once we go over it.");
  } else {
    $("#alerts").removeClass("alert-success");
    $("#alerts").addClass("alert-danger");
    $("#alerts").html(danger);
  }
  $(this).prop("disabled", false);
});
