// BACK TO TOP
jQuery(document).ready(function() {
  var offset = 220;
  var duration = 500;
  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.back-to-top').fadeIn(duration);
    } else {
      jQuery('.back-to-top').fadeOut(duration);
    }
  });
  jQuery('.back-to-top').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
});

// MENU TOP
(function ($) {
$(document).ready(function(){
  // hide .navbar first
  $(".top").hide();
  // fade in .navbar
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 500) {
        $('.top').fadeIn();
      } else {
        $('.top').fadeOut();
      }
    });
  });
});
}(jQuery));

// SIDEMENU SLIDE
function openNav() {
  document.getElementById("menu-slide").style.width = "250px";
}

function closeNav() {
  document.getElementById("menu-slide").style.width = "0";
}

// SLICK SLIDE
$(document).ready(function(){
  $('.home-banner-image').slick({
    fade: false,
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 500
  });

  $('.work-related').slick({
    dots: false,
    arrow: false,
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    autoplay: true,
    slidesToScroll: 1,
    responsive: 
    [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 479,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});

// TOOLTIP
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

// YOUTUBE MODAL
$(document).ready(function() {
  $('.modal').on('hidden.bs.modal', function() {
    var $this = $(this).find('iframe'),
      tempSrc = $this.attr('src');
    $this.attr('src', "");
    $this.attr('src', tempSrc);
  });
});

