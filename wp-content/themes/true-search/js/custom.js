var menuRight = document.getElementById( 'site-navigation' ),
    showRight = document.getElementById( 'showRight' ),
    body = document.body;
showRight.onclick = function() {
    classie.toggle( this, 'active' );
    classie.toggle( menuRight, 'cbp-spmenu-open' );
    disableOther( 'showRight' );
};

function disableOther( button ) {
    if( button !== 'showRight' ) {
        classie.toggle( showRight, 'disabled' );
    }
}

/* Home screen text efects
--------------------------- */
 
(function() {
    
    function showNextQuote() {
        jQuery('.quote1')
            .delay(500)
            .fadeIn(800)
            .addClass('animated2 slideInUp')
            .delay(3500)
            .fadeOut(800);

        jQuery('.quote2')
            .delay(5000)
            .fadeIn(800)
            .addClass('animated slideInUp')
            .delay(3000)
            .fadeOut(800);

        jQuery('.quote3')
            .delay(9000)
            .fadeIn(800)
            .addClass('animated slideInUp')
            .delay(3000)
            .fadeOut(800);

        jQuery('.quote4')
            .delay(13000)
            .fadeIn(800)
            .addClass('animated slideInUp');
    }
  
    showNextQuote();
    
})();



/* Scroll offset for Smoothscroll
-----------------------------------------*/

jQuery(document).ready(function() {
      jQuery('a').smoothScroll({offset: -30});
      jQuery('.home a').smoothScroll({offset: -1});
});


/* Click X on team members
-----------------------------------------*/

jQuery('.featured-team-member').hover(
  function () {
    jQuery(this).find('.grid-team-member-mask').addClass('displayed');
  }, 
  function () {
    jQuery(this).find('.grid-team-member-mask').removeClass('displayed');
  }
);

jQuery('.grid-team-member').hover(
  function () {
    jQuery(this).find('.grid-team-member-mask').addClass('displayed');
  }, 
  function () {
    jQuery(this).find('.grid-team-member-mask').removeClass('displayed');
  }
);


jQuery('.team-close').on( 'click', function( event ) {
  jQuery(this).parent('.grid-team-member-mask').removeClass('displayed');
});
// e.preventDefault();
      

/* Lazy load team images
-----------------------------------------*/

jQuery(function() {
  jQuery('.lazy').Lazy({
    // your configuration goes here
    scrollDirection: 'vertical',
    effect: 'fadeIn',
    visibleOnly: true,

    });
});

/* Search Bar
-----------------------------------------*/

jQuery(document).ready(function(){
  jQuery(".searchtop a").addClass('grey_button close');
  jQuery('.grey_button.close').click(function() {
    //$('.grey_button.open').click();
    jQuery('#true-search-bar').slideToggle();
    //$(this).toggleClass('close open');
    return false;
  });
  jQuery('.grey_button.open').click(function() {
    //$('.grey_button.close').click();
    jQuery('#true-search-bar').hide();
    //$(this).toggleClass('close open');
    return false;
  });

});

/* SVG 
-----------------------------------------*/

//var svgFixer = require('/wp-content/themes/true-search/js/webkit-svg-fixer.js');


/* Call SVG Fixer
-----------------------------------------*/

//webkitSvgFixer.fixall()