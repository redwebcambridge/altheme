jQuery( document ).ready(function() {
  //Cookie consent
  (function() {
    if (!localStorage.getItem('cookieconsent')) {
      document.querySelector('.cookieconsent_msg').style.display = 'flex';
      document.querySelector('.backtotop').classList.remove("cookieaccepted");
      document.querySelector('.allow-button').onclick = function(e) {
        e.preventDefault();
        document.querySelector('.cookieconsent_msg').style.display = 'none';
        localStorage.setItem('cookieconsent', true);
        document.querySelector('.backtotop').classList.add("cookieaccepted");
      };
    } else {
      document.querySelector('.backtotop').classList.add("cookieaccepted");
    }
  })();
  //BACK TO TOP
  jQuery('.backtotop').on("click", function () {
    jQuery("html, body").animate({ scrollTop: 0 });
  });
  //back button on mobile
  jQuery('#stickynav .back-button').on("click",function() {
    var target = jQuery(this).attr('data-link');
    window.location.replace(target);
  })
  //SCROLLING
  jQuery('body').scroll(function(){
    var windowtop = jQuery('body').scrollTop();
    jQuery('.container-white-laurel').css('background-position-y',950-(windowtop/5));
    if (windowtop > 100) {
      jQuery('.back-button').fadeIn();
    } else {
      jQuery('.back-button').hide();
    }
  });
  //WINDOW RESIZE
    jQuery(window).resize(function(){
        if (jQuery('body').width() > 750) {
          var current = jQuery(".navbar-nav  li.active");
          hovericon(current);
          jQuery('html').css('opacity','0');
        }
    });
    jQuery(window).bind('resizeEnd', function() {
      jQuery('html').css('opacity','1')
    });
    jQuery(window).resize(function() {
      if (jQuery('body').width() > 750) {
        if(this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function() {
          jQuery(this).trigger('resizeEnd');
        }, 500);
      }
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
      {
        breakpoint: 420,
        settings: {
          slidesToShow: 2,
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
  //set to under current item - school icon
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
  //MOBILE MENU - DONT LINK THROUGH TO PARENT PAGES 
  if (jQuery(window).width() < 992) {
    jQuery('.menu-item-has-children').children('a').click(function(e) {
      e.preventDefault();
    });
    //copy parent into menu
    jQuery( "#mainnav li.menu-item-has-children" ).each(function( index ) {
      var url = jQuery(this).children().attr('href');
      if (url == "#"){return;}
      var parent_item_html = jQuery(this).children('a').html();
      jQuery(this).find('.dropdown-menu').prepend('<li><a class="dropdown-item" href="'+url+'">'+parent_item_html+'</a></li>');
    });
    //copy parent into menu for sidebars
    jQuery( "#sidebar-menu li.menu-item-has-children" ).each(function( index ) {
      var url = jQuery(this).children().attr('href');
      if (url == "#"){return;}
      var parent_item_html = jQuery(this).children('a').html();
      jQuery(this).find('.sub-menu').prepend('<li><a class="dropdown-item" href="'+url+'">'+parent_item_html+'</a></li>');
    });
    //SIDEBAR MENU ON MOBILE
    if (jQuery(window).width() < 780) {
      if (jQuery('#sidebar-menu li:not(.sub-menu li)').length > 4) {
          jQuery("#sidebar-menu li:not(.sub-menu li):lt(4)").wrapAll('<div class="mobilecontain"></div>');
          jQuery("#sidebar-menu .mobilecontain").append('<div class="showall"><i class="fas fa-chevron-circle-down"></i></div>');
          jQuery("#sidebar-menu li:not(.sub-menu li)").addClass("d-none");
          jQuery("#sidebar-menu .mobilecontain li").removeClass("d-none");
          jQuery(".showall,.sidebarclose").on("click", function () {
          jQuery("#sidebar-menu li:not(.sub-menu li):gt(4)").toggleClass("d-none");
          jQuery(".sidebarclose,.showall").toggle();
          jQuery("#sidebar-menu .mobilecontain li").removeClass("d-none");
        });
      }
    }
    

    
  }


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

  //Add search to burger menu
    var search_html = jQuery('.google_search #searchform').parent().html();
    search_html = '<div id="mobilesearch">'+search_html+'</div>';
    jQuery('#mainnav').prepend(search_html);

  //Clicking on search form button
  jQuery(".searchformcontain .btn").on("click", function () {
    jQuery(this).closest("form").submit();
  });
   
  //Search Form Submit
  jQuery("input[name='s']").closest("form").on("submit", function () {
    var searchvalue = jQuery(this).val();
    location.href = 'https://'+document.location.hostname+'?s='+searchvalue;
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
    jQuery(this).parent().find('.allcontent,.desc_short').toggle();
    jQuery(this).text(jQuery(this).text() == 'More' ? 'Less' : 'More');
  });
  //Homepage tabs on mobile
  if (jQuery(window).width() < 500) {
      jQuery(".homepage-tabs-nav .tab_button").click(function() {
          var target = jQuery(".tabcontent").offset().top;
          jQuery('html, body').animate({scrollTop:target}, 500);
      });
  }
  //Register an Interest form on vacancies page
  if (document.body.classList.contains('page-template-vacancies')) {
    jQuery('input:file').change(function(e){
      var file = '<p style="font-weight:700;"><i class="fas fa-file-alt"></i>&nbsp;'+e.target.files[0].name+'</p>';
      jQuery('.cv_upload small').append(file);
    });
    jQuery('.vacancy .btn-primary').click(function(){ 
      jQuery(this).text(function(i,old){
        return old=='View details' ?  'Hide details' : 'View details';
      });
    });
  }

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
