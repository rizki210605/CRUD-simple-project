// Efek fade in pada elemen dengan class "fade-in"
$(document).ready(function() {
    $('.fade-in').fadeIn(1000);
  });
  
  // Efek smooth scroll pada link dengan class "scroll"
  $(document).ready(function() {
    $('a.scroll').click(function() {
      $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
      }, 1000);
      return false;
    });
  });
  
  // Efek dropdown pada navbar dengan class "navbar"
  $(document).ready(function() {
    $('.navbar li').hover(function() {
      $('ul', this).stop().slideDown(200);
    }, function() {
      $('ul', this).stop().slideUp(200);
    });
  });
  
  // Efek carousel pada elemen dengan class "carousel"
  $(document).ready(function() {
    $('.carousel').slick({
      autoplay: true,
      arrows: false,
      dots: true
    });
  });
  