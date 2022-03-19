$(document).ready(function () {
  $(".active-menu-mobile").on("click", function () {
    $("#sidebar-container").animate({ left: 0 });
  });
  $(".desactive-menu-mobile").on("click", function () {
    $("#sidebar-container").animate({ left: "-100%" });
  });
  $(".slider").slick({
    autoplay: true,
    autoplaySpeed: 5000,
  });
});
