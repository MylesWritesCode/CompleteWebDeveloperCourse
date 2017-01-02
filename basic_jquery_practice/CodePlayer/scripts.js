function updateOutput() {
    $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $("#cssPanel").val() + "</style></head><body>" + $("#htmlPanel").val() + "</body></html>");
    document.getElementById("outputPanel").contentWindow.eval($("#javascriptPanel").val());
};

$(".btn-default.navbar-btn").click(function(){
  $(this).toggleClass("highlightedButton");
  var panelId = $(this).attr("id") + "Panel";
  $("#" + panelId).toggleClass("hidden");
  var activePanels = 4 - $(".hidden").length;
  $(".panel").width(($(window).width() / activePanels) - 5);
});

// $("textarea").height($(window).height() - $(".navbar").height() - 11);
$(".panel").height($(window).height() - (($(".navbar").height()) / 2) - 11);
updateOutput();

$("textarea").on("change keyup paste", function() {
  updateOutput();
});
