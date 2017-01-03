$(document).ready(function(){
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
  })
  // Log In Modal
  $("#togLogIn").click(function(){
    if ($("#logInToggleHidden").val() == 1) {
      $(this).html("Switch to Log In");
      $("#logInLabel").html("Sign Up Form");
      $("#logInToggleHidden").val("0");
      $("#logInBtn").html("Sign Up");
    } else {
      $(this).html("Switch to Sign Up");
      $("#logInLabel").html("Log In Form");
      $("#logInToggleHidden").val("1");
      $("#logInBtn").html("Log In");
    }
  });

  // Ajax to send POST to actions.php
  $("#logInBtn").click(function(){
    $.ajax({
      type: "POST",
      url: "actions.php?action=loginSignUp",
      data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#logInToggleHidden").val(),
      success: function(result) {
        $("#alerts").html(result);
      }
    })
  });
  // On enter, clicks #loginBtn
  $("#password").keypress(function(event){
    if(event.keyCode == 13){
      $('#logInBtn').click();
    }
  });
});
