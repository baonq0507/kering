$(document).ready(function () {
  $(".focus-slider").slick({
    dots: false,
    autoplay: false,
    arrows: false,
    centerMode: false,
    slidesToShow: 1,
    variableWidth: true,
  });
});
$(window).ready(function () {
  const scrollingPosition = $(window).scrollTop();
  if (scrollingPosition > 1) {
    $(".headersp").addClass("header-active");
  } else {
    $(".headersp").removeClass("header-active");
  }
  if (scrollingPosition > 83) {
    $(".headerpc-sticky").addClass("header-sticky");
    $(".header-sticky_logo").addClass("block");
    $(".header-sticky_logo").removeClass("hidden");
  } else {
    $(".headerpc-sticky").removeClass("header-sticky");
    $(".header-sticky_logo").addClass("hidden");
    $(".header-sticky_logo").removeClass("block");
  }
});
$(window).scroll(function () {
  const scrollingPosition = $(window).scrollTop();
  if (scrollingPosition > 1) {
    $(".headersp").addClass("header-active");
  } else {
    $(".headersp").removeClass("header-active");
  }
  if (scrollingPosition > 83) {
    $(".headerpc-sticky").addClass("header-sticky");
    $(".header-sticky_logo").addClass("block");
    $(".header-sticky_logo").removeClass("hidden");
  } else {
    $(".headerpc-sticky").removeClass("header-sticky");
    $(".header-sticky_logo").addClass("hidden");
    $(".header-sticky_logo").removeClass("block");
  }
});

$(".headersp-btn").on("click", function (e) {
  $(".sidebar-mobile").width(275);
  $(".main").css("left", 275);
  $(".headersp").css("left", 275);
  $(".headersp-btn-close").addClass("block");
  $(".headersp-btn").addClass("hidden");
});
$(".headersp-btn-close").on("click", function (e) {
  $(".sidebar-mobile").width(0);
  $(".main").css("left", 0);
  $(".headersp").css("left", 0);
  $(".headersp-btn-close").removeClass("block");
  $(".headersp-btn").removeClass("hidden");
});

