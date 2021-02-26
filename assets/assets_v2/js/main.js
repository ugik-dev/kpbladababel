(function($) {
    "use strict";
    jQuery(document).ready(function($) {

/*--------------------
            wow js init
--------------------*/

    new WOW().init();

/*---------------------
    popup-videos
---------------------*/

    $('.popup-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });
  
  });
  
}(jQuery));