jQuery(document).ready(function () {
    // Marquees request animation:
    window.requestAnimationFrame = (function() {
      return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 / 60);
        };
    })();

    let speed = 15000;

    // Hero marquee - hours (mobile) [Home and What's on Pages]
    function heroMarquee() {
      let contentWidth = jQuery('#hero_marquee li:first-child').outerWidth();

      jQuery('#hero_marquee ul').animate({
        marginLeft: -contentWidth
      }, speed, 'linear', function() {
        jQuery(this).css({
          marginLeft: 0
        }).find("li:last").after(jQuery(this).find("li:first"));
      });
    };

    // Home divisor marquee
    // function divMarquee() {
    //   let contentWidth = jQuery('#div-marquee li:first-child').outerWidth();

    //   jQuery('#div-marquee ul').animate({
    //     marginLeft: -contentWidth
    //   }, speed, 'linear', function() {
    //     jQuery(this).css({
    //       marginLeft: 0
    //     }).find("li:last").after(jQuery(this).find("li:first"));
    //   });
    // };

    (function anim() {
        requestAnimationFrame(anim);
        heroMarquee();
        // divMarquee();
    }());

});