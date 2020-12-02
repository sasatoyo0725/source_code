jQuery(function ($) {
  jQuery("#slides").append(
    '<ul id="pager"><li><a href="#" class="prev">◀︎</a></li><li><a href="#" class="next">▶︎</a></li></ul>'
  );
  var pager = jQuery("#pager"),
    slidesWrap = jQuery("#slides"),
    slides = jQuery("#slides-inner"),
    slideKiji = slides.find(".slidekiji"),
    slidenav = jQuery("#slides-nav"),
    current = 0,
    number = slideKiji.length;

  slideKiji.each(function (i) {
    jQuery(this).css({
      left: "100" * i + "%",
    });
    slidenav.append('<a href="#"></a>');
  });

  function navUpdate() {
    slidenav.find("a").removeClass("active");
    slidenav.find("a").eq(current).addClass("active");
  }

  function slider(index) {
    if (index < 0) {
      index = number - 1;
    }
    if (index > number - 1) {
      index = 0;
    }
    slides.animate({
      left: "-100" * index + "%",
    });
    current = index;
    navUpdate();
  }

  pager.find("a").click(function (event) {
    event.preventDefault();
    if (jQuery(this).hasClass("prev")) {
      slider(current - 1);
    } else {
      slider(current + 1);
    }
  });

  slidenav.find("a").click(function (event) {
    event.preventDefault();
    var navIndex = jQuery(this).index();
    navUpdate();
    slider(navIndex);
  });
});
