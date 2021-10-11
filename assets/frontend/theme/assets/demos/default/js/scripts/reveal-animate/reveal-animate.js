// REVEAL ANIMATE

var revealAnimate = (function () {
  var _init = function () {
    wow = new WOW({
      animateClass: "animated",
      offset: 100,
      live: true,
      mobile: false,
    });
  };

  return {
    //main function to initiate the module
    init: function () {
      _init();
    },
  };
})();

$(document).ready(function () {
  revealAnimate.init();
  new WOW().init();
  setTimeout(function () {
    $(".wow").css("opacity", "1");
  }, 100);
});
// homepage slides animations
$(".custom-slide").on("translate.owl.carousel", function () {
  $(".hero-text-tablecell .subtitle")
    .removeClass("animated fadeInUp")
    .css({ opacity: "0" });
  $(".hero-text-tablecell h1")
    .removeClass("animated fadeInUp")
    .css({ opacity: "0", "animation-delay": "0.3s" });
  $(".hero-btns")
    .removeClass("animated fadeInUp")
    .css({ opacity: "0", "animation-delay": "0.5s" });
});

$(".custom-slide").on("translated.owl.carousel", function () {
  $(".hero-text-tablecell .subtitle")
    .addClass("animated fadeInUp")
    .css({ opacity: "0" });
  $(".hero-text-tablecell h1")
    .addClass("animated fadeInUp")
    .css({ opacity: "0", "animation-delay": "0.3s" });
  $(".hero-btns")
    .addClass("animated fadeInUp")
    .css({ opacity: "0", "animation-delay": "0.5s" });
});
