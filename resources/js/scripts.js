$(document).ready(function () {
  $("#hamburger-menu .menu-item-has-children > a").on("click", function (e) {
    e.preventDefault();
    $(this).parent().find("ul.sub-menu:first").toggle("slow");
  });
  $(".hamburger-menu-open").on("click", function (e) {
    e.preventDefault();
    $(".hamburger-menu-wrapper").fadeIn();
    $(".hamburger-menu-container").animate({ left: "0" });
  });
  $(".hamburger-menu-close").on("click", function () {
    $(".hamburger-menu-container").animate({ left: "-100%" });
    $(".hamburger-menu-wrapper").fadeOut();
  });
});
