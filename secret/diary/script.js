$(document).ready(function(){
  $("#signUpForm").submit(function(event){
    var error = "";
    event.preventDefault();
    $("#submitBtn").prop("disabled", true)
    if (!isValidEmailAddress($("#email").val())) {
      $("#emailFormGroup").addClass("has-error");
      $("#emailSpan").addClass("glyphicon-remove");
      $("#helpBlock1").html("Please enter a valid email address.");
      error += "email";
    } else {
      $("#emailFormGroup").removeClass("has-error").addClass("has-success");
      $("#emailSpan").addClass("glyphicon-ok").removeClass("glyphicon-remove");
      $("#helpBlock1").html("That's a great email!")
    }
    if ($("#password").val() == "") {
      $("#passwordFormGroup").addClass("has-error");
      $("#passwordSpan").addClass("glyphicon-remove");
      $("#helpBlock2").html("Please enter a valid password.");
      error += "password";
    } else {
      $("#passwordFormGroup").removeClass("has-error").addClass("has-success");
      $("#passwordSpan").addClass("glyphicon-ok").removeClass("glyphicon-remove");
      $("#helpBlock2").html("What a nice password!")
    }
    if (error) {
      $("#alerts").addClass('alert-danger').html("Please fix the errors.");
      $("#submitBtn").prop("disabled", false);
    } else {
      $("#alerts").removeClass('alert-danger').addClass('alert-info').html("Submitting...");
      $("#submitBtn").prop("disabled", true);
      $("#signUpForm").unbind('submit').submit();
    }
  });
  // Email address validation
  function isValidEmailAddress(emailAddress) {
      var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
      return pattern.test(emailAddress);
  };
});

// create.php Validations
