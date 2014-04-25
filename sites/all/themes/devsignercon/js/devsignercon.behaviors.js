(function ($) {

  /**
   * The recommended way for producing HTML markup through JavaScript is to write
   * theming functions. These are similiar to the theming functions that you might
   * know from 'phptemplate' (the default PHP templating engine used by most
   * Drupal themes including Omega). JavaScript theme functions accept arguments
   * and can be overriden by sub-themes.
   *
   * In most cases, there is no good reason to NOT wrap your markup producing
   * JavaScript in a theme function.
   */
  Drupal.theme.prototype.devsignerconExampleButton = function (path, title) {
    // Create an anchor element with jQuery.
    return $('<a href="' + path + '" title="' + title + '">' + title + '</a>');
  };

  /**
   * Behaviors are Drupal's way of applying JavaScript to a page. In short, the
   * advantage of Behaviors over a simple 'document.ready()' lies in how it
   * interacts with content loaded through Ajax. Opposed to the
   * 'document.ready()' event which is only fired once when the page is
   * initially loaded, behaviors get re-executed whenever something is added to
   * the page through Ajax.
   *
   * You can attach as many behaviors as you wish. In fact, instead of overloading
   * a single behavior with multiple, completely unrelated tasks you should create
   * a separate behavior for every separate task.
   *
   * In most cases, there is no good reason to NOT wrap your JavaScript code in a
   * behavior.
   *
   * @param context
   *   The context for which the behavior is being executed. This is either the
   *   full page or a piece of HTML that was just added through Ajax.
   * @param settings
   *   An array of settings (added through drupal_add_js()). Instead of accessing
   *   Drupal.settings directly you should use this because of potential
   *   modifications made by the Ajax callback that also produced 'context'.
   */
  Drupal.behaviors.devsignerconLettering = {
    attach: function (context, settings) {
      $('.site-name a', context).once('lettering', function () {
        $(this).lettering();
      });
    }
  };
  
  Drupal.behaviors.mobileNav = {
    attach: function(context, settings) {
      // see whether device supports touch events (a bit simplistic, but...)
      var hasTouch = ("ontouchstart" in window);
       
      // hook touch events for drop-down menus
      // @note: if has touch events, then has standards event handling too
      if (hasTouch && document.querySelectorAll) {
        
        var i, len, element, dropdowns = document.querySelectorAll("#main-menu li.dropdown > a");
        
        function menuTouch(event) {
          // toggle flag for preventing click for this link
          var i, noclick = !(this.dataNoclick);
        
          // reset flag on all links
          for (i = 0; i < dropdowns.length; i++) {
            dropdowns[i].dataNoclick = false;
          }
        
          // set new flag value and focus on dropdown menu
          this.dataNoclick = noclick;
          this.focus();
        }
        
        function menuClick(event) {
          // if click isn't wanted, prevent it
          if (this.dataNoclick) {
            event.preventDefault();
          }
        }
     
        for (i = 0; i < dropdowns.length; i++) {
          element = dropdowns[i];
          element.dataNoclick = false;
          element.addEventListener("touchstart", menuTouch, false);
          element.addEventListener("click", menuClick, false);
        }
      }
    }
  };
  
  Drupal.behaviors.equalHeightUsers = {
    attach: function (context, settings) {
      $('.view-cod-community-attendees', context).once('equal-height', function () {
        var attendees = $(this).find('.user--profile__simple');

        setTimeout( function() {
          var height =  attendees.equalHeights();
          attendees.each( function() {
            $(this).css('height', height);
          });
        }, 600);
      });
    }
  };
  
  // Constructors
  $.fn.equalHeights = function () {
    var maxHeight = 0,
        $this = $(this);

    $this.each( function() {
      var height = $(this).outerHeight(true);

      if ( height > maxHeight ) {
        maxHeight = height;
      }
    });

    return maxHeight;
  };

})(jQuery);
