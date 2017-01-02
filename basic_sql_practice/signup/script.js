$(document).ready(function(){
  $("#signUpForm").submit(function(event){
    var error = "";
    event.preventDefault();
    $("#submitBtn").prop("disabled", true);
    if (isValidEmailAddress($("#email").val())) {
      $("#emailAddon").removeClass("red-text");
    } else {
      error += "Please enter a valid email address.<br>";
      $("#emailAddon").addClass("red-text");
      // event.preventDefault();
    }
    if ($("#password").val() != "") {
      $("#passwordAddon").removeClass("red-text");
    } else {
      error += "Please enter a valid password.<br>";
      $("#passwordAddon").addClass("red-text");
      // event.preventDefault();
    }
    if (error) {
      $("#alerts").addClass('alert-danger').html(error);
      $("#submitBtn").prop("disabled", false);
      // event.preventDefault();
    } else {
      $("#alerts").removeClass('alert-danger').addClass('alert-info').html("Submitting...");
      $("#submitBtn").prop("disabled", true);
      $("#signUpForm").unbind('submit').submit();
    }
  })
  var inUse = /This email address is already in use./;
  var submitted = /Submitted!/;
  if (inUse.test($("#alerts").html())) {
    $("#alerts").removeClass('alert-info').addClass('alert-warning');
  } else if (submitted.test($("#alerts").html())) {
    $("#alerts").removeClass('alert-warning').addClass('alert-success');
    $("#submitBtn").prop("disabled", false);
  }
  // $("#signUpForm").unbind('submit').submit();
});

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};
