$(document).ready(function(){
  $("#createForm").submit(function(event){
    event.preventDefault();
    if ($("#title").val() == "" || $("#secret").val() == "") {
      if ($("#title").val() == "") {
        $("#titleFormGroup").addClass("has-error");
        $("#titleSpan").addClass("glyphicon-remove");
      } else {
        $("#titleFormGroup").removeClass("has-error").addClass("has-success");
        $("#titleSpan").addClass("glyphicon-ok").removeClass("glyphicon-remove");
      }
      if ($("#secret").val() == "") {
        $("#secretFormGroup").addClass("has-error");
        $("#secretSpan").addClass("glyphicon-remove");
      } else {
        $("#secretFormGroup").removeClass("has-error").addClass("has-success");
        $("#secretSpan").addClass("glyphicon-ok").removeClass("glyphicon-remove");
      }
    } else {
      $("#createForm").unbind('submit').submit();
    }
  });
  $("#editBtn").click(function(){
    $("#edited").val("1");
  });
});
