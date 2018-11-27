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



/* BP Edits - Placement Filtering */

(function($) {
  var $items;
  var $noResults;
  var $container;
  var $form;
  var $filters;

  var activeFilters = [];
  var activeQuery = [];

  $(document).ready(function() {
    // init();

    $container = $("#filterResults");
    $form = $(".searchandfilter");
    $filters = $(".searchandfilter").find("select");

    if ($container.length) {
      onInit();
    }
  });

  // function init() {
  //   $.ajax({
  //     url: 'http://truesearch.test/wp-admin/admin-ajax.php',
  //     type: 'GET',
  //     data: {
  //       'action': 'placements_get_posts',
  //       'collection': 63
  //     },
  //     success: function(response) {
  //       $container.html(response);
  //
  //       onInit();
  //     }
  //   });
  // }

  function onInit() {
    $items = $(".placement-preview");
    $noResults = $(".placement-no-results");

    $container.equalize({
      target: ".placement-preview"
    });

    parseQuery();
  }

  function parseQuery() {
    var parts = window.location.hash.replace("#", "").split("&");
    var query = {};

    for (var i = 0; i < parts.length; i++) {
      var s = parts[i].split("=");

      $('select[name="' + s[0] + '"]').val(s[1]);
    }

    doFilter();

    $form.on("change", "select", onFilterChange);
    $form.on("click", ".search-filter-reset", onFilterReset);
  }

  function onFilterChange(e) {
    doFilter();
  }

  function onFilterReset(e) {
    e.preventDefault();
    e.stopPropagation();

    $filters.val("");

    doFilter();
  }

  function doFilter() {
    var activeFilters = [];
    var activeQuery = [];

    $filters.each(function() {
      var $this = $(this);
      var key = $this.attr("name");
      var val = $this.val();

      if ( val !== "" ) {
        activeFilters.push(val);
        activeQuery.push( key + '=' + val );
      }
    });

    $items.each(function() {
      var $this = $(this);
      var classes = $this.attr("class").split(" ");
      var visible = true;

      for (var i = 0; i < activeFilters.length; i++) {
        var alt1 = activeFilters[i] + '-1';
        var alt2 = activeFilters[i] + '-2';

        if ($.inArray(activeFilters[i], classes) < 0 && $.inArray(alt1, classes) < 0 && $.inArray(alt2, classes) < 0) {
          visible = false;
        }
      }

      if (visible) {
        $this.show();
      } else {
        $this.hide();
      }
    });

    if ($items.filter(":visible").length == 0) {
      $noResults.show();
    } else {
      $noResults.hide();
    }

    window.location.hash = activeQuery.length ? activeQuery.join("&") : "-";

    $container.equalize("resize");
  }
})(jQuery);
