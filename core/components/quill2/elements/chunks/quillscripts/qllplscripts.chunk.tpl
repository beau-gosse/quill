<script src="[[++quill_js]]"></script>
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
      // # Dynamic Table of Contents (Needed for the this guide only)
      // Credits: https://css-tricks.com/automatic-table-of-contents
      var ToC =
        "<nav role='navigation' class='text-sans'>" +
        "<h5>Table of contents:</h5>" +
        "<ul class='list-unstyled'>";
      var newLine, el, title, link;

      $("h3.top-spacer").each(function() {

        el = $(this);
        title = el.text();
        link = "[[~[[*id]]]]#" + el.attr("id");
        newLine =
          "<li>" +
          "<a href='" + link + "'>" +
          title +
          "</a>" +
          "</li>";
        ToC += newLine;
      });
      ToC +=
        "</ul>" +
        "</nav>";
      $("#toc").prepend(ToC);
      // # Prevent empty searches
      $('#search-form').submit(function(s) {
        var search = $(this).find("#term").val($.trim($(this).find("#term").val()));
        if (!search.val()) {
          s.preventDefault();
          $('#term').focus();
        }
      });
      // # Lazy load Disqus w/ Murat Corlu's method.
      var disqus_div = $("#disqus_thread");
      if (disqus_div.size() > 0) {
        var disqus_loaded = false,
          // Where to start loading
          top = disqus_div.offset().top,
          disqus_data = disqus_div.data(),
          check = function() {
            if (!disqus_loaded && $(window).scrollTop() + $(window).height() > top) {
              disqus_loaded = true;
              for (var key in disqus_data) {
                if (key.substr(0, 6) == 'disqus') {
                  // Get Disqus parameters via data attributes
                  window['disqus_' + key.replace('disqus', '').toLowerCase()] = disqus_data[key];
                }
              }
              var dsq = document.createElement('script');
              dsq.type = 'text/javascript';
              dsq.async = true;
              dsq.src = 'http://' + window.disqus_shortname + '.disqus.com/embed.js';
              (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            }
          };
        $(window).scroll(check);
        check();
      }
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
