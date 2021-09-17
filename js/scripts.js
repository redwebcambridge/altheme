jQuery( document ).ready(function() {
  //Cookie consent
  (function() {
    if (!localStorage.getItem('cookieconsent')) {
      document.querySelector('.cookieconsent_msg').style.display = 'flex';
      document.querySelector('.allow-button').onclick = function(e) {
        e.preventDefault();
        document.querySelector('.cookieconsent_msg').style.display = 'none';
        localStorage.setItem('cookieconsent', true);
      };
    } 
  })();
  //SCROLLING
  jQuery('body').scroll(function(){
    var windowtop = jQuery('body').scrollTop();
    jQuery('.container-white-laurel').css('background-position-y',950-(windowtop/5));
  });
  //WINDOW RESIZE
  jQuery(window).resize(function(){
    var current = jQuery(".navbar-nav  li.active");
    hovericon(current);
    jQuery('html').css('opacity','0');
  });

  jQuery(window).bind('resizeEnd', function() {
    jQuery('html').css('opacity','1');
  });
  jQuery(window).resize(function() {
      if(this.resizeTO) clearTimeout(this.resizeTO);
      this.resizeTO = setTimeout(function() {
        jQuery(this).trigger('resizeEnd');
      }, 500);
  });
  //Partners
  jQuery('.partner-slider').slick({
    speed: 1000,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    nextArrow: '.next-slide-lower',
    prevArrow: '.prev-slide-lower',
    autoplay: true,
    responsive: [
      {
        breakpoint: 780, 
        settings: {
          slidesToShow: 3,
        }
      },
    ]  
  });
  //Hide partner arrows if less than 6 slides
  if (!(jQuery('.slick-track .slick-slide').length > 6)) {
    jQuery('.slick-controls-lower').hide();
  }
  jQuery('.partners').fadeIn();
  //Homepage SLider
  jQuery('.header-images-slick-slider').slick({
    dots: true,
    speed: 1000,
    fade: true,
    autoplay: true,
    arrows: false,
    appendDots: '#slider_nav'
  });
  //Twitter
  jQuery('.slick-twitter').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    nextArrow: '.next-tweet',
    prevArrow: '.prev-tweet',
    adaptiveHeight: true,
    fade: true
  });
  //Search Button
  jQuery('#searchform button').on("click", function () {
    jQuery('#searchform').submit();
  });
  //Lightbox
   jQuery('body').on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    jQuery(this).ekkoLightbox({
      loadingMessage: '<div class="spinner-grow" role="status"> <span class="sr-only">Loading...</span></div>',
      alwaysShowClose	: true,
      showArrows : true,
      leftArrow: '<i class="fas fa-chevron-circle-left left"></i>',
      rightArrow: '<i class="fas fa-chevron-circle-right right"></i>',
    });
  }); 
  //Menu hover
  //set to under current item
  if( jQuery(".navbar .navbar-nav li.active").length ){
    var onloadleft = jQuery(".navbar .navbar-nav li.active").offset().left;
    var leftpadding = jQuery(".navbar .navbar-nav li.active").width()/2-18;
  } else {
    var onloadleft = jQuery(".navbar .navbar-nav li:first-child").offset().left;
    var leftpadding = jQuery(".navbar .navbar-nav li:first-child").width()/2-18;
  }
  jQuery(".navbar .currenthover").css("left",onloadleft+leftpadding);
  jQuery(".navbar .currenthover").css("display","block");
  if(jQuery('.navbar .navbar-nav li.active').is('.navbar-nav li:last-child')) {
    jQuery(".navbar .currenthover").hide();
    var lasthover = jQuery('.navbar .navbar-nav li.active').prev('li');
    hovericon(lasthover);
  }
  jQuery(".navbar-nav li").on("mouseover", function () {
    if(jQuery(this).is(':last-child')) {
      var lasthover = jQuery(this).prev('li');
      hovericon(lasthover);
    } else {
      hovericon(this);
    }
  });
  //add class if has submenu for top buttons
  jQuery('#menu-top-buttons li').has("i").addClass('hasdropdown');

  //Homepage Tabs
  jQuery('.homepage-tabs-nav .tab_button').on("click", function () {
    jQuery('.homepage-tabs-nav .tab_button').removeClass('active');
    jQuery(this).addClass('active');
    var num = jQuery('.homepage-tabs-nav .tab_button').index(this)+1;
    jQuery('.tabcontent .container').removeClass('active');
    jQuery('.tabcontent #tab-'+num).addClass('active');
  });

  //Newspage Pagnation
  jQuery(".newseventcontainer").slice(0, 6).show();
  jQuery("#loadMore").on("click", function(e){
    e.preventDefault();
    jQuery(".newseventcontainer:hidden").slice(0, 3).slideDown();
    if(jQuery(".newseventcontainer:hidden").length == 0) {
      jQuery("#loadMore").text("No More Posts").addClass("disabled");
    }
  });

  //Newspage Newsletter Pagnation
  jQuery(".newslettercontainer").slice(0, 6).show();
  jQuery("#loadMore").on("click", function(e){
    e.preventDefault();
    jQuery(".newslettercontainer:hidden").slice(0, 6).slideDown();
    if(jQuery(".newslettercontainer:hidden").length == 0) {
      jQuery("#loadMore").text("No More Posts").addClass("disabled");
    }
  });

  //Remove top pixels when anchor link present
  function offsetAnchor() {
    if (location.hash.length !== 0) {
      jQuery('body').scrollTop(jQuery(location.hash).position().top-200);
      jQuery(location.hash).find('a.btn-primary').click();
    }
  }
  window.setTimeout(offsetAnchor, 0);

  //Staff With pics page read more
  jQuery('.read-more-button').on( "click", function() {
    jQuery(this).parent('.staff-text').find('.whitegrad').toggle();
    jQuery(this).parent('.staff-text').find('.desc').toggleClass('increaseheight');
    jQuery(this).text(jQuery(this).text() == 'More' ? 'Less' : 'More'); 
    
  });
        
});  
    
function hovericon(location){
  var newleft = jQuery(location).offset().left;
  var leftpadding = jQuery(location).width()/2-18;
  jQuery(".navbar .currenthover").css("left",newleft+leftpadding);
  jQuery(".navbar .currenthover").css("display","block");
}

//Google Translate
function googleTranslateElementInit() {
  new google.translate.TranslateElement(
    {pageLanguage: 'en'},
    'google_translate_el'
  );
}

