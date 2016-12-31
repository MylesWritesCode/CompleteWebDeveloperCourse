$(document).ready(function(){
  var href = document.location.href;
  var lastPathSegment = href.substr(href.lastIndexOf('/') + 1);
  if (lastPathSegment == "search.php") {
  // search active
    $('#viewMenu').removeClass('active'); $('#createMenu').removeClass('active'); $('#logoutMenu').removeClass('active'); $('#searchMenu').addClass('active');
  }
});
