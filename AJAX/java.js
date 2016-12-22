// Get command to pull and alert data in an "info.txt" file
// $.get("info.txt", function(data){
//   alert(data);
// });

// AJAX function that changes #statusMessage to the contents of the file, or displays an error (fail function)
$.ajax("/info.txt").done(function(data){
  $("#statusMessage").html(data);
}).fail(function() {
  $("#statusMessage").html("Could not get data.");
});
