jQuery( document ).ready(function() {
  //SCROLLING
  jQuery('body').scroll(function(){
    var windowtop = jQuery('body').scrollTop();
    jQuery('.container-white-laurel').css('background-position-y',950-(windowtop/5));
    if (jQuery('body').scrollTop()  > 195) {
        jQuery( "body #stickynav" ).css('opacity','0');
    } else {
        jQuery( "body #stickynav" ).css('opacity','1');
    };
    if (jQuery('body').scrollTop()  > 200) {
       jQuery( "body #stickynav" ).css('opacity','1');
        jQuery('body #stickynav').addClass('fixed-top');
        navbar_height = jQuery('body .navbar').offsetHeight;
        jQuery('body').css('paddingTop',navbar_height);
    } else {
        jQuery('body #stickynav').removeClass('fixed-top');
        jQuery('body').css('paddingTop','0px');
      }
  });
  //WINDOW RESIZE
  jQuery(window).resize(function(){
    var current = jQuery("#menu-main-menu li.active");
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
  });
  jQuery('.partners').fadeIn();
  //Homepage SLider
  jQuery('.header-images-slick-slider').slick({
    dots: true,
    speed: 1000,
    fade: true,
    autoplay: true,
    arrows: false
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
      alwaysShowClose	: true
    });
  }); 
  //Menu hover
  var onloadleft = jQuery(".navbar #menu-main-menu li.active").offset().left;
  var leftpadding = jQuery(".navbar #menu-main-menu li.active").width()/2-18;
  jQuery(".navbar .currenthover").css("left",onloadleft+leftpadding);
  jQuery(".navbar .currenthover").css("display","block");
  jQuery("#menu-main-menu li").on("mouseover", function () {
    if(jQuery(this).is(':last-child')) {
      var lasthover = jQuery(this).prev('li');
      hovericon(lasthover);
    } else {
      hovericon(this);
    }
  });
  //Homepage Tabs
  jQuery('.homepage-tabs-nav .tab_button').on("click", function () {
    jQuery('.homepage-tabs-nav .tab_button').removeClass('active');
    jQuery(this).addClass('active');
    var num = jQuery('.homepage-tabs-nav .tab_button').index(this)+1;
    jQuery('.tabcontent .container').removeClass('active');
    jQuery('.tabcontent #tab-'+num).addClass('active');
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