$(document).ready(function () {
  $("#primary-menu").slicknav();
  $(".mobile-menu-icon").on("click", function () {
    $("#primary-menu").slicknav("toggle");
  });
  $(".slider").slick({
    autoplay: true,
    autoplaySpeed: 5000,
  });
});
