$(function () {

  $(window).on('scroll', function() {

    var scrollValue = $(window).scrollTop();    

      if (scrollValue > 117) { 

        $('.navbar-brand').css({
          'padding-top': '25px',
          'padding-left': '5%',
      });

        $('.navbar').addClass('fixed-top').css({
          'background' : 'rgba(6,165,245,1)',
          'padding-right' : '2%'
        });

      } else {

        $('.navbar-brand').css({
          'padding-top': '',
          'padding-left': '',
        });

        $('.navbar').removeClass('fixed-top').css({
            'background': '',
            'padding-right' : ''
        });
    }

  });

});