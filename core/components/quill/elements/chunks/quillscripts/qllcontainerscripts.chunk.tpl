<script>
  // IIFE -> Within this function, $ will always refer to jQuery
  (function($) {
    /* Execute on DOM ready */
    $(function() {
      // # Lazy load images
      $("img").unveil(200);
      // # Animate navbar on scroll
      var previousScroll = 0,
        navbar = $('#navbar'),
        navbarFixed = 'navbar-fixed-top',
        navBarOrgOffset = navbar.offset().top;

      $('#masthead').height(navbar.height());

      $(window).scroll(function() {
        var currentScroll = $(this).scrollTop();
        if (currentScroll > navBarOrgOffset) {
          if ((currentScroll > previousScroll) && (currentScroll > 80)) {
            navbar.fadeOut();
          } else {
            navbar.fadeIn();
            navbar.addClass(navbarFixed);
          }
        } else {
          navbar.removeClass(navbarFixed);
        }
        previousScroll = currentScroll;
      });
      // # Prevent empty searches
      $('#search-form').submit(function(s) {
        var search = $(this).find("#term").val($.trim($(this).find("#term").val()));
        if (!search.val()) {
          s.preventDefault();
          $('#term').focus();
        }
      });
    });
    /* Execute later */
    // # Smooth Scrolling
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  })(jQuery);
</script>
