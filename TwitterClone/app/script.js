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
        if (result == "1") {
          // Good login/signup
          window.location.assign("index.php");
        } else {
          $("#alerts").addClass("alert-danger").html(result);
        }
      }
    })
  });
  // Toggle follow/unfollow
  $(".toggleFollow").click(function(){
    var id = $(this).attr("data-userId");
    $.ajax({
      type: "POST",
      url: "actions.php?action=toggleFollow",
      data: "userId=" + $(this).attr("data-userId"),
      success: function(result) {
        if (result == "1") {
          // Unfollowed
          $("a[data-userId='" + id + "']").html("Follow");
        } else if (result == "2"){
          // Followed
          $("a[data-userId='" + id + "']").html("Unfollow");
        }
      }
    })
  });
  // Posts tweet to SQL server
  $("#postTweetBtn").click(function(){
    $.ajax({
      type: "POST",
      url: "actions.php?action=postTweet",
      data: "tweetContent=" + $("#tweetContent").val(),
      success: function(result) {
        if (result == "1"){
          $("#tweetSucess").show();
          $("#tweetFail").hide();
        } else if (result != "") {
          $("#tweetFail").show().html(result);
          $("#tweetSuccess").hide();
        }
      }
    })
  });
  // Submit tweet on ENTER keypress
  $("#tweetContent").keypress(function(event){
    if (event.keyCode == 13) {
      $("#postTweetBtn").click();
    }
  });
  // Login on ENTER keypress while in password form.
  $("#password").keypress(function(event){
    if(event.keyCode == 13){
      $('#logInBtn').click();
    }
  });
});
